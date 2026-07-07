<?php
declare(strict_types=1);

require __DIR__ . '/includes/functions.php';

// Wysyłka mailowa zgłoszeń jest przygotowana, ale wyłączona do czasu skonfigurowania
// transportu SMTP na serwerze produkcyjnym. Żadnego wywołania modelu językowego — asystent
// zgłoszeń w tej iteracji to wyłącznie UI + zapis, bez realnej klasyfikacji AI.
const SEND_INTAKE_EMAIL = false;

function redirect_to_intake(string $status): never
{
    header('Location: index.php?intake=' . $status . '#asystent');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirect_to_intake('error');
}

// Honeypot antyspamowy — jeśli wypełniony, cichy exit bez zapisu (bot).
if (trim((string) ($_POST['website'] ?? '')) !== '') {
    exit;
}

$email = trim((string) ($_POST['email'] ?? ''));
$description = trim((string) ($_POST['description'] ?? ''));
$consent = isset($_POST['consent']);

if (!filter_var($email, FILTER_VALIDATE_EMAIL) || mb_strlen($description) < 20 || !$consent) {
    redirect_to_intake('error');
}

$practiceArea = (string) ($_POST['practice_area'] ?? '');
if ($practiceArea !== '' && get_practice_area($practiceArea) === null) {
    $practiceArea = '';
}

$entry = [
    'timestamp' => date('c'),
    'name' => trim((string) ($_POST['name'] ?? '')),
    'email' => $email,
    'phone' => trim((string) ($_POST['phone'] ?? '')),
    'practice_area' => $practiceArea,
    'description' => $description,
    'context' => trim((string) ($_POST['context'] ?? '')),
    'ip' => $_SERVER['REMOTE_ADDR'] ?? '',
];

$storageDir = __DIR__ . '/storage';
if (!is_dir($storageDir)) {
    mkdir($storageDir, 0755, true);
}
file_put_contents(
    $storageDir . '/intake-log.jsonl',
    json_encode($entry, JSON_UNESCAPED_UNICODE) . PHP_EOL,
    FILE_APPEND | LOCK_EX
);

if (SEND_INTAKE_EMAIL) {
    // Gdy transport mailowy będzie skonfigurowany na serwerze:
    // mail('intake@kancelaria.pl', 'Nowe zgłoszenie', $description, 'From: no-reply@kancelaria.pl');
}

redirect_to_intake('ok');
