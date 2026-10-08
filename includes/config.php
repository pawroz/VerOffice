<?php
declare(strict_types=1);

const FIRM_LAWYER_NAME = 'Weronika Leśna';
const FIRM_LABEL = 'Obsługa Prawna';
// Podpis pod nazwiskiem w logo (nagłówek, menu mobilne, stopka) — wielkimi literami jak w projekcie.
const BRAND_TAGLINE = 'OBSŁUGA PRAWNA';
const FIRM_ADDRESS_LINE1 = 'ul. Łowiecka 7';
const FIRM_ADDRESS_LINE2 = '62-800 Kalisz';
const FIRM_PHONE = '+48 665 782 601';
const FIRM_EMAIL = 'kontakt@lesnaprawo.pl';
// Dane rejestrowe (CEIDG) — używane w polityce prywatności (RODO).
const FIRM_LEGAL_NAME = 'Weronika Leśna Obsługa Prawna Kalisz';
const FIRM_NIP = '6182214105';
const PRIVACY_POLICY_UPDATED = '2026-10-06';

// Godziny do wyboru w kalendarzu „Umów spotkanie” (pon–pt, od jutra) — sprawdzane też na serwerze.
const BOOKING_HOURS = ['10:00', '12:00', '15:00', '17:00'];

const FIRM_AVAILABILITY = 'Spotkania oraz konsultacje odbywają się po wcześniejszym umówieniu terminu.';

const SITE_TITLE = 'Weronika Leśna — Obsługa Prawna | Prawnik w Kaliszu i Poznaniu';
const SITE_DESCRIPTION = 'Weronika Leśna Obsługa Prawna — Kalisz, Poznań i zdalnie w całej Polsce. Prawo cywilne, gospodarcze, nieruchomości, pracy oraz transportowe. Umów konsultację.';
// Adres kanoniczny (bez www). Przy zmianie domeny zaktualizuj też sitemap.xml,
// robots.txt i przekierowania w .htaccess.
const SITE_URL = 'https://lesnaprawo.pl';


function h(?string $value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}
