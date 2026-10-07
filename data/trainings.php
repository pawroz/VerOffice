<?php
declare(strict_types=1);

/**
 * Szkolenia: opis oferty (strona główna + /szkolenia) oraz lista
 * zrealizowanych szkoleń i wystąpień.
 *
 * 'events' — każdy wpis:
 *     'date'        => 'RRRR-MM-DD', 'RRRR-MM' albo 'RRRR' (wymagane; sortowanie
 *                      od najnowszych, wpis z samym rokiem trafia za datowane z tego roku)
 *     'title'       => tytuł szkolenia / wystąpienia (wymagane)
 *     'format'      => np. 'Szkolenie', 'Warsztaty', 'Konferencja', 'Webinar' (wymagane)
 *     'organizer'   => organizator / wydarzenie i miejsce (opcjonalnie)
 *     'description' => 1–2 zdania o tematyce (wymagane; strona główna)
 *     'details'     => pełny opis — lista akapitów (opcjonalnie; na /szkolenia
 *                      zastępuje 'description')
 *     'url'         => link do wydarzenia lub relacji (opcjonalnie)
 *     'image'       => zdjęcie z wydarzenia — ścieżka w assets/img bez rozszerzenia,
 *                      wersje .webp i .jpg 1200×800 (opcjonalnie; tylko na /szkolenia)
 *     'imageAlt'    => opis zdjęcia (wymagany, gdy jest 'image')
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
    'events' => [
        [
            'date' => '2026-05-21',
            'title' => 'Formy zatrudnienia w podmiotach leczniczych: odpowiedzialność oraz prawa i obowiązki',
            'format' => 'Wystąpienie',
            'organizer' => 'XIX Zjazd Naukowy Polskiego Towarzystwa Medycyny Nuklearnej, Łódź',
            'url' => 'https://www.ptmn.pl/zjazd.html',
            'image' => 'trainings/ptmn-2026-wystapienie',
            'imageAlt' => 'Weronika Leśna przy mównicy podczas wystąpienia na XIX Zjeździe Naukowym PTMN w Łodzi',
            'description' => 'Prawne aspekty zatrudnienia lekarzy: formy współpracy, zasady odpowiedzialności oraz prawa i obowiązki lekarzy i podmiotów leczniczych.',
            'details' => [
                'Miałam przyjemność być prelegentką podczas XIX Zjazdu Naukowego Polskiego Towarzystwa Medycyny Nuklearnej, gdzie wygłosiłam wystąpienie pt. „Formy zatrudnienia w podmiotach leczniczych: odpowiedzialność oraz prawa i obowiązki”.',
                'Wystąpienie poświęcone było prawnym aspektom zatrudnienia lekarzy, w szczególności dostępnym formom współpracy oraz wynikającym z nich zasadom odpowiedzialności, a także prawom i obowiązkom lekarzy i podmiotów leczniczych. Przedstawione zagadnienia zostały ujęte w praktycznym kontekście, z uwzględnieniem konsekwencji prawnych związanych z wyborem poszczególnych form zatrudnienia.',
            ],
        ],
    ],
];
