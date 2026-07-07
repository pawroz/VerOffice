<?php
require __DIR__ . '/includes/functions.php';

$lawyer = get_lawyer((string) ($_GET['id'] ?? ''));
if ($lawyer === null) {
    http_response_code(404);
    exit('Nie znaleziono.');
}

$office = get_office($lawyer['office']);
$name = str_replace(['[', ']'], '', $lawyer['name']);
$email = str_replace(['[', ']'], '', $lawyer['email']);
$phone = str_replace(['[', ']'], '', $lawyer['phone']);

$lines = [
    'BEGIN:VCARD',
    'VERSION:3.0',
    'FN:' . $name,
    'N:;' . $name . ';;;',
    'ORG:Kancelaria [Nazwa]',
    'TITLE:' . position_label($lawyer['position']),
    'EMAIL:' . $email,
    'TEL:' . $phone,
    'ADR:;;' . str_replace(['[', ']'], '', $office['address']) . ';;;;',
    'END:VCARD',
];
$vcard = implode("\r\n", $lines) . "\r\n";

header('Content-Type: text/vcard; charset=utf-8');
header('Content-Disposition: attachment; filename="' . $lawyer['id'] . '.vcf"');
header('Content-Length: ' . strlen($vcard));
echo $vcard;
