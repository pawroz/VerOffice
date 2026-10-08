<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/mailer.php';
require_once __DIR__ . '/includes/functions.php';

header('Content-Type: application/json; charset=utf-8');

const CONTACT_MAX_PER_HOUR = 5;
const CONTACT_RATE_FILE = __DIR__ . '/storage/contact-rate.json';

function respond(int $status, array $payload): never
{
    http_response_code($status);
    echo json_encode($payload);
    exit;
}

/**
 * Prosty limit wiadomości z jednego adresu IP (zapisywany jako skrót, nie
 * surowy adres). Gdy pliku nie da się zapisać, nie blokuje wysyłki —
 * formularz ma działać nawet przy problemie z uprawnieniami.
 */
function contact_rate_limited(string $ip): bool
{
    $handle = @fopen(CONTACT_RATE_FILE, 'c+');
    if ($handle === false) {
        error_log('[contact] nie można zapisać ' . CONTACT_RATE_FILE . ' — limit wyłączony');
        return false;
    }
    flock($handle, LOCK_EX);
    $data = json_decode(stream_get_contents($handle) ?: '[]', true) ?: [];

    $now = time();
    $key = hash('sha256', $ip);
    foreach ($data as $k => $times) {
        $data[$k] = array_values(array_filter($times, fn($t) => $t > $now - 3600));
        if (!$data[$k]) {
            unset($data[$k]);
        }
    }
    $limited = count($data[$key] ?? []) >= CONTACT_MAX_PER_HOUR;
    if (!$limited) {
        $data[$key][] = $now;
    }

    ftruncate($handle, 0);
    rewind($handle);
    fwrite($handle, json_encode($data));
    flock($handle, LOCK_UN);
    fclose($handle);
    return $limited;
}

/**
 * Termin z kalendarza „Umów spotkanie”: dzień roboczy od jutra i godzina
 * z BOOKING_HOURS (te same zasady co w kalendarzu na stronie).
 * Zwraca opis do maila, null gdy terminu nie podano, false gdy jest błędny.
 */
function booking_label(string $date, string $hour): string|null|false
{
    if ($date === '' && $hour === '') {
        return null;
    }
    $tz = new DateTimeZone('Europe/Warsaw');
    $day = DateTimeImmutable::createFromFormat('!Y-m-d', $date, $tz);
    if (!$day || $day->format('Y-m-d') !== $date || !in_array($hour, BOOKING_HOURS, true)) {
        return false;
    }
    $today = new DateTimeImmutable('today', $tz);
    if ($day <= $today || (int) $day->format('N') >= 6 || $day > $today->modify('+1 year')) {
        return false;
    }
    $weekdays = [1 => 'poniedziałek', 'wtorek', 'środa', 'czwartek', 'piątek'];
    return format_date_pl($date) . ' (' . $weekdays[(int) $day->format('N')] . '), godz. ' . $hour;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    respond(405, ['success' => false, 'error' => 'method_not_allowed']);
}

// Honeypot — pole ukryte w CSS, wypełniane tylko przez boty.
if (($_POST['website'] ?? '') !== '') {
    respond(200, ['success' => true]);
}

$name = trim(preg_replace('/[\r\n]+/', ' ', (string) ($_POST['name'] ?? '')));
$email = trim((string) ($_POST['email'] ?? ''));
$msg = trim((string) ($_POST['msg'] ?? ''));
$phone = trim((string) ($_POST['phone'] ?? ''));
$booking = booking_label(trim((string) ($_POST['booking_date'] ?? '')), trim((string) ($_POST['booking_hour'] ?? '')));

if ($name === '' || $msg === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)
    || mb_strlen($name) > 120 || mb_strlen($msg) > 5000
    || ($phone !== '' && !preg_match('/^[+()\d\s-]{7,20}$/', $phone))
    || $booking === false) {
    respond(422, ['success' => false, 'error' => 'invalid_input']);
}

if (contact_rate_limited($_SERVER['REMOTE_ADDR'] ?? 'unknown')) {
    respond(429, ['success' => false, 'error' => 'rate_limited']);
}

if (!send_contact_mail($name, $email, $msg, $phone, $booking)) {
    respond(502, ['success' => false, 'error' => 'send_failed']);
}

respond(200, ['success' => true]);
