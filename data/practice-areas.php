<?php
// Jedyne źródło prawdy o obszarach praktyki — kolejność = waga/rozpoznawalność firmy.
// Konsumowane przez stronę główną, filtry zespołu, profile prawników i Insights,
// żeby kolor obszaru był identyczny w każdym widoku.

return [
    'ma' => [
        'name' => 'Prawo korporacyjne i M&A',
        'class' => 'practice-ma',
        'desc' => '[Fuzje i przejęcia, ład korporacyjny, transakcje, spółki]',
    ],
    'litigation' => [
        'name' => 'Spory sądowe i arbitraż',
        'class' => 'practice-litigation',
        'desc' => '[Spory gospodarcze, arbitraż krajowy i międzynarodowy]',
    ],
    'banking' => [
        'name' => 'Bankowość i finanse',
        'class' => 'practice-banking',
        'desc' => '[Finansowanie, rynki kapitałowe, regulacje]',
    ],
    'realestate' => [
        'name' => 'Nieruchomości',
        'class' => 'practice-realestate',
        'desc' => '[Transakcje, inwestycje, najem komercyjny]',
    ],
    'ip' => [
        'name' => 'Własność intelektualna',
        'class' => 'practice-ip',
        'desc' => '[Znaki towarowe, patenty, spory IP, technologie]',
    ],
    'labor' => [
        'name' => 'Prawo pracy',
        'class' => 'practice-labor',
        'desc' => '[Doradztwo pracownicze, restrukturyzacje, spory]',
    ],
];
