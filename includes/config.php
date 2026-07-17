<?php
declare(strict_types=1);

const FIRM_LAWYER_NAME = 'Weronika Leśna';
const FIRM_LABEL = 'Kancelaria Prawna';
const FIRM_ADDRESS_LINE1 = 'ul. Łowiecka 7';
const FIRM_ADDRESS_LINE2 = '62-800 Kalisz';
const FIRM_PHONE = '+48 665 782 601';
const FIRM_EMAIL = 'lesna.prawnik@gmail.com';
const FIRM_HOURS = 'Pon – Pt: 9:00 – 17:00';

const SITE_TITLE = 'Weronika Leśna — Kancelaria Prawna | Radca prawny w Kaliszu';
const SITE_DESCRIPTION = 'Kancelaria Prawna Weronika Leśna — radca prawny w Kaliszu. Prawo cywilne, gospodarcze, rodzinne, pracy i karne. Umów konsultację.';
const SITE_URL = 'https://www.kancelaria-lesna.pl';

// Testowy adres — docelowo do zmiany na skrzynkę kancelarii.
const CONTACT_FORM_RECIPIENT = 'pawerozpochowski@gmail.com';

function h(?string $value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}
