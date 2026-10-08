<?php
declare(strict_types=1);

/**
 * WZÓR konfiguracji wysyłki maili z formularza kontaktowego.
 *
 * Skopiuj jako `mail-config.php` i uzupełnij hasło. Plik z hasłem NIE trafia
 * do repozytorium (.gitignore). Wyszukiwany jest w kolejności:
 *   1. katalog nad public_html, np. domains/lesnaprawo.pl/mail-config.php
 *      (zalecane na Hostingerze — poza zasięgiem przeglądarki),
 *   2. includes/mail-config.php (fallback, np. lokalnie).
 *
 * Hostinger: dane SMTP skrzynki są w hPanel → Emails → Konta e-mail →
 * „Konfiguracja klientów pocztowych”.
 */
return [
    'host' => 'smtp.hostinger.com',
    'port' => 465,
    'encryption' => 'ssl',            // 'ssl' (port 465), 'tls' (port 587) albo '' (bez szyfrowania — tylko lokalnie)
    'username' => 'kontakt@lesnaprawo.pl',
    'password' => '',                 // hasło do skrzynki — wpisz tylko w mail-config.php
    'from_email' => 'kontakt@lesnaprawo.pl', // musi być tą samą skrzynką, na którą się logujemy
    'from_name' => 'Formularz — lesnaprawo.pl',
    'to_email' => 'kontakt@lesnaprawo.pl',   // gdzie trafiają wiadomości z formularza
];
