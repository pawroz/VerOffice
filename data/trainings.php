<?php
declare(strict_types=1);

/**
 * Szkolenia: opis oferty (strona główna + /szkolenia) oraz lista
 * zrealizowanych szkoleń i wystąpień.
 *
 * 'events' — każdy wpis:
 *     'date'        => 'RRRR-MM-DD' (wymagane, sortowanie od najnowszych)
 *     'title'       => tytuł szkolenia / wystąpienia (wymagane)
 *     'format'      => np. 'Szkolenie', 'Warsztaty', 'Konferencja', 'Webinar' (wymagane)
 *     'organizer'   => organizator / wydarzenie i miejsce (opcjonalnie)
 *     'description' => 1–2 zdania o tematyce (wymagane)
 *     'url'         => link do wydarzenia lub relacji (opcjonalnie)
 *
 * Przykład:
 *     [
 *         'date' => '2026-05-14',
 *         'title' => 'Odpowiedzialność przewoźnika w transporcie krajowym',
 *         'format' => 'Szkolenie',
 *         'organizer' => 'Firma XYZ Sp. z o.o., Kalisz',
 *         'description' => 'Szkolenie dla działu spedycji z zasad odpowiedzialności przewoźnika i obsługi reklamacji.',
 *     ],
 */
return [
    'lead' => 'Oferuję szkolenia dopasowane do specyfiki działalności, potrzeb przedsiębiorstwa oraz aktualnych wyzwań prawnych.',
    'topics' => [
        'Prawo pracy',
        'Prawo gospodarcze',
        'Odpowiedzialność przedsiębiorców',
        'Nieruchomości',
    ],
    'topicsNote' => 'Tematyka może obejmować także inne obszary istotne dla prowadzonej działalności.',
    'audiences' => [
        'Firmy',
        'Zespoły pracowników',
        'Konferencje i wydarzenia branżowe',
    ],
    'approach' => 'Stawiam na praktyczne podejście i przedstawianie zagadnień prawnych w sposób zrozumiały i przydatny w codziennej pracy.',
    'cta' => 'Zapraszam do kontaktu w celu omówienia zakresu szkolenia i indywidualnego przygotowania oferty.',
    'events' => [],
];
