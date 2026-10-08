<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/mailer.php';

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

if ($name === '' || $msg === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)
    || mb_strlen($name) > 120 || mb_strlen($msg) > 5000) {
    respond(422, ['success' => false, 'error' => 'invalid_input']);
}

if (contact_rate_limited($_SERVER['REMOTE_ADDR'] ?? 'unknown')) {
    respond(429, ['success' => false, 'error' => 'rate_limited']);
}

if (!send_contact_mail($name, $email, $msg)) {
    respond(502, ['success' => false, 'error' => 'send_failed']);
}

respond(200, ['success' => true]);
