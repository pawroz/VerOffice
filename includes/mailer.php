<?php
declare(strict_types=1);

use PHPMailer\PHPMailer\Exception as MailerException;
use PHPMailer\PHPMailer\PHPMailer;

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/lib/PHPMailer/Exception.php';
require_once __DIR__ . '/lib/PHPMailer/PHPMailer.php';
require_once __DIR__ . '/lib/PHPMailer/SMTP.php';

/** Szuka mail-config.php nad public_html, potem w includes/ (patrz mail-config.example.php). */
function load_mail_config(): ?array
{
    foreach ([dirname(__DIR__, 2) . '/mail-config.php', __DIR__ . '/mail-config.php'] as $path) {
        if (is_file($path)) {
            $config = require $path;
            return is_array($config) ? $config : null;
        }
    }
    return null;
}

/**
 * Wysyła wiadomość z formularza kontaktowego przez SMTP.
 * Zwraca true przy sukcesie; szczegóły błędu trafiają do logu serwera, nie do przeglądarki.
 */
function send_contact_mail(string $name, string $email, string $message): bool
{
    $config = load_mail_config();
    if ($config === null) {
        error_log('[contact] brak pliku mail-config.php — wiadomość nie została wysłana');
        return false;
    }

    $sentAt = (new DateTimeImmutable('now', new DateTimeZone('Europe/Warsaw')))->format('d.m.Y, H:i');
    $host = parse_url(SITE_URL, PHP_URL_HOST) ?: 'strona';

    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = $config['host'];
        $mail->Port = (int) $config['port'];
        $mail->SMTPAuth = ($config['username'] ?? '') !== '';
        $mail->Username = $config['username'] ?? '';
        $mail->Password = $config['password'] ?? '';
        $mail->SMTPSecure = $config['encryption'] ?? '';
        $mail->SMTPAutoTLS = ($config['encryption'] ?? '') !== '';
        $mail->Timeout = 15;
        $mail->CharSet = PHPMailer::CHARSET_UTF8;

        $mail->setFrom($config['from_email'], $config['from_name'] ?? '');
        $mail->addAddress($config['to_email']);
        // „Odpowiedz” w skrzynce trafia od razu do osoby, która napisała.
        $mail->addReplyTo($email, $name);

        $mail->Subject = 'Wiadomość ze strony ' . $host . ' — ' . $name;
        $mail->Body = "Nowa wiadomość z formularza kontaktowego na stronie {$host}.\n\n"
            . "Imię i nazwisko: {$name}\n"
            . "E-mail: {$email}\n"
            . "Wysłano: {$sentAt}\n\n"
            . "Wiadomość:\n{$message}\n\n"
            . "—\nAby odpowiedzieć, użyj opcji „Odpowiedz” — wiadomość trafi bezpośrednio do nadawcy.\n";

        $mail->send();
        return true;
    } catch (MailerException $e) {
        error_log('[contact] błąd wysyłki: ' . $mail->ErrorInfo);
        return false;
    }
}
