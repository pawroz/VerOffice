<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/config.php';

header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'error' => 'method_not_allowed']);
    exit;
}

// Honeypot — pole ukryte w CSS, wypełniane tylko przez boty.
if (($_POST['website'] ?? '') !== '') {
    echo json_encode(['success' => true]);
    exit;
}

$name = trim(preg_replace('/[\r\n]+/', ' ', (string) ($_POST['name'] ?? '')));
$email = trim((string) ($_POST['email'] ?? ''));
$msg = trim((string) ($_POST['msg'] ?? ''));

if ($name === '' || $msg === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(422);
    echo json_encode(['success' => false, 'error' => 'invalid_input']);
    exit;
}

$host = parse_url(SITE_URL, PHP_URL_HOST) ?: 'localhost';
$fromAddress = 'noreply@' . $host;

$subject = mb_encode_mimeheader('Nowa wiadomość ze strony — ' . FIRM_LAWYER_NAME, 'UTF-8');

$body = "Imię i nazwisko: {$name}\n"
    . "E-mail: {$email}\n\n"
    . "Wiadomość:\n{$msg}\n";

$headers = "From: {$fromAddress}\r\n"
    . "Reply-To: {$name} <{$email}>\r\n"
    . "Content-Type: text/plain; charset=UTF-8\r\n";

$sent = mail(CONTACT_FORM_RECIPIENT, $subject, $body, $headers);

if (!$sent) {
    http_response_code(502);
    echo json_encode(['success' => false, 'error' => 'send_failed']);
    exit;
}

echo json_encode(['success' => true]);
