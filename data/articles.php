<?php
declare(strict_types=1);

/**
 * Artykuły bloga (sortowane po dacie, od najnowszych).
 *
 * 'image' (opcjonalnie) — ścieżka w assets/img bez rozszerzenia; muszą istnieć
 *     wersje .webp i .jpg (1200×675). Brak = placeholder.
 * 'body' — lista bloków: string = akapit, ['h2' => '...'] = śródtytuł,
 *     ['box' => ['...', ...]] = wyróżniona ramka (przykład, orzeczenie).
 */
return [
    [
        'slug' => 'ulga-na-start-przy-jdg',
        'title' => 'Ulga na start przy JDG – kto może z niej skorzystać i jak długo trwa?',
        'excerpt' => 'Kto może skorzystać z ulgi na start, jak liczyć 6 miesięcy bez składek społecznych i co na ten temat orzekł Sąd Najwyższy.',
        'category' => 'Prawo przedsiębiorców',
        'date' => '2026-10-06',
        'image' => 'blog/ulga-na-start-jdg',
        'imageAlt' => 'Kalendarz z sześcioma wyróżnionymi miesiącami i dokument z pieczęcią — ilustracja ulgi na start',
        'body' => [
            'Rozpoczęcie jednoosobowej działalności gospodarczej wiąże się z koniecznością rozliczania składek ZUS. Osoby, które dopiero zaczynają działalność, mogą jednak skorzystać z tzw. ulgi na start.',
            'Ulga pozwala przez określony czas nie podlegać obowiązkowym ubezpieczeniom społecznym. Nie oznacza to jednak całkowitego braku składek – w okresie korzystania z ulgi przedsiębiorca co do zasady nadal podlega ubezpieczeniu zdrowotnemu i opłaca składkę zdrowotną.',
            ['h2' => 'Kto może skorzystać z ulgi na start?'],
            'Z ulgi na start może skorzystać przedsiębiorca będący osobą fizyczną, jeżeli łącznie spełnia dwa warunki.',
            'Po pierwsze: podejmuje działalność gospodarczą po raz pierwszy albo podejmuje ją ponownie po upływie co najmniej 60 miesięcy od dnia jej ostatniego zawieszenia lub zakończenia.',
            'Po drugie: w ramach działalności gospodarczej nie wykonuje na rzecz byłego pracodawcy czynności, które wcześniej wykonywał dla niego jako pracownik w ramach stosunku pracy lub spółdzielczego stosunku pracy – w bieżącym albo poprzednim roku kalendarzowym.',
            ['box' => [
                'Przykładowo, jeżeli ktoś pracował na etacie jako grafik, a następnie zakłada JDG i zaczyna świadczyć dla tego samego pracodawcy usługi graficzne odpowiadające wcześniejszym obowiązkom pracowniczym, może nie spełniać warunków do skorzystania z ulgi.',
            ]],
            'Ograniczenie dotyczące wykonywania tych samych czynności nie znajduje zastosowania, jeżeli wcześniej były one wykonywane na podstawie umowy cywilnoprawnej, a nie w ramach stosunku pracy.',
            ['h2' => 'Jak długo można korzystać z ulgi?'],
            'Ulga na start przysługuje przez 6 miesięcy kalendarzowych. W tym okresie przedsiębiorca nie podlega obowiązkowym ubezpieczeniom społecznym z tytułu prowadzenia działalności.',
            'Bardzo istotne jest jednak to, jak liczyć te 6 miesięcy.',
            'Jeżeli działalność zostanie rozpoczęta pierwszego dnia miesiąca, ten miesiąc jest liczony jako pierwszy miesiąc ulgi.',
            'Jeżeli natomiast działalność zostanie rozpoczęta w trakcie miesiąca, miesiąc rozpoczęcia działalności nie jest wliczany do sześciomiesięcznego okresu. Okres ulgi rozpoczyna się wówczas od kolejnego miesiąca kalendarzowego.',
            ['box' => [
                'Przykład:',
                'Jeżeli JDG zostanie rozpoczęta 1 września, wrzesień jest pierwszym miesiącem ulgi, a sześć miesięcy upływa z końcem lutego.',
                'Jeżeli działalność zostanie rozpoczęta 5 września, wrzesień nie jest liczony do sześciu miesięcy. Pierwszym miesiącem ulgi jest październik, a okres ulgi kończy się z końcem marca.',
            ]],
            ['h2' => 'O czym jeszcze warto pamiętać?'],
            'Ulga na start dotyczy ubezpieczeń społecznych, a nie ubezpieczenia zdrowotnego. Oznacza to, że korzystający z ulgi co do zasady nadal opłaca składkę zdrowotną.',
            'Warto również pamiętać, że brak obowiązkowych ubezpieczeń społecznych oznacza brak ochrony wynikającej z tych ubezpieczeń.',
            'Podsumowując: jeżeli zakładasz JDG po raz pierwszy (albo wracasz do działalności po wymaganej przerwie) i nie świadczysz na rzecz byłego pracodawcy tych samych usług, które wykonywałeś u niego jako pracownik, możesz spełniać warunki do skorzystania z ulgi na start przez 6 miesięcy.',
            ['h2' => 'Ciekawostki z orzecznictwa'],
            ['box' => [
                'Wyrok Sądu Najwyższego z 12 lutego 2013 r., sygn. akt II UK 184/12',
                'Sprawa dotyczyła osoby, która była zatrudniona w kancelarii jako aplikant radcowski, a następnie – już jako radca prawny prowadzący własną działalność – świadczyła usługi prawne na rzecz tej samej kancelarii. Radca prawny chciał skorzystać z ulgi na start.',
                'Sąd Najwyższy w przedstawianej sprawie zwrócił uwagę, że nie można automatycznie uznać, że czynności wykonywane przez aplikanta radcowskiego są tożsame z czynnościami wykonywanymi później samodzielnie przez radcę prawnego. Aplikant działa bowiem pod kierunkiem i nadzorem, podczas gdy radca prawny wykonuje zawód samodzielnie.',
            ]],
            'Na podstawie orzecznictwa nasuwa się następujący wniosek: przy ocenie warunku dotyczącego wykonywania działalności na rzecz byłego pracodawcy istotne znaczenie może mieć nie tylko to, dla kogo przedsiębiorca świadczy usługi, ale przede wszystkim jaki był rzeczywisty zakres czynności wykonywanych wcześniej w ramach stosunku pracy.',
        ],
    ],
];
