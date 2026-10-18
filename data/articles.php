<?php
declare(strict_types=1);

/**
 * Artykuły bloga (sortowane po dacie, od najnowszych).
 *
 * 'image' (opcjonalnie) — ścieżka w assets/img bez rozszerzenia; muszą istnieć
 *     wersje .webp i .jpg (1200×675). Brak = placeholder.
 * 'body' — lista bloków: string = akapit, ['h2' => '...'] = śródtytuł,
 *     ['list' => ['...', ...]] = lista wypunktowana,
 *     ['box' => ['...', ...]] = wyróżniona ramka (przykład, orzeczenie, ważny termin).
 */
return [
    [
        'slug' => 'nowe-przepisy-o-cyberbezpieczenstwie-ksc',
        'title' => 'Nowe przepisy o cyberbezpieczeństwie już obowiązują. Czy Twoja firma musi się dostosować?',
        'excerpt' => 'Nowelizacja ustawy o krajowym systemie cyberbezpieczeństwa: kogo obejmuje, jakie terminy obowiązują i jakie kary grożą podmiotom kluczowym i ważnym.',
        'category' => 'Prawo przedsiębiorców',
        'date' => '2026-10-18',
        'image' => 'blog/cyberbezpieczenstwo-ksc',
        'imageAlt' => 'Tarcza z kłódką połączona z siecią — ilustracja przepisów o cyberbezpieczeństwie',
        'body' => [
            '3 kwietnia 2026 r. weszła w życie nowelizacja ustawy o krajowym systemie cyberbezpieczeństwa (KSC), wdrażająca do polskiego prawa unijną dyrektywę NIS2. Przepisy nakładają nowe obowiązki na firmy, które spełniają definicję podmiotu kluczowego lub podmiotu ważnego.',
            'Takie podmioty muszą przede wszystkim wpisać się do wykazu prowadzonego za pośrednictwem systemu S46 oraz wdrożyć system zarządzania bezpieczeństwem informacji (SZBI).',
            ['box' => [
                'Dla podmiotów, które spełniały kryteria już w dniu wejścia w życie nowelizacji, termin na wpis do wykazu upłynął 3 października 2026 r. Jeżeli Twoja firma podlega ustawie, a wpisu jeszcze nie dokonała, warto zrobić to niezwłocznie.',
            ]],
            ['h2' => 'Kogo dotyczą nowe przepisy?'],
            'Ustawa obejmuje podmioty działające w określonych sektorach gospodarki, m.in. transportu, energetyki, ochrony zdrowia i infrastruktury cyfrowej.',
            'O tym, czy firma podlega regulacji, decydują przede wszystkim dwa kryteria:',
            ['list' => [
                'rodzaj prowadzonej działalności,',
                'wielkość przedsiębiorstwa.',
            ]],
            'Co do zasady kryterium wielkości dotyczy przedsiębiorstw średnich i dużych. W określonych przypadkach znaczenie mogą mieć także dane przedsiębiorstw powiązanych i partnerskich.',
            'Sama wielkość firmy nie przesądza jednak o objęciu ustawą. Trzeba również sprawdzić, czy prowadzona działalność mieści się w sektorach i kategoriach wskazanych w załącznikach do ustawy – przy czym liczy się działalność faktycznie wykonywana, a nie tylko wpisana do rejestru.',
            ['h2' => 'Podmiot kluczowy czy podmiot ważny?'],
            'Przepisy rozróżniają dwie kategorie: podmioty kluczowe i podmioty ważne. O kwalifikacji decyduje rodzaj działalności oraz spełnienie odpowiednich kryteriów wielkości.',
            'Rozróżnienie to ma praktyczne znaczenie – od niego zależy zakres obowiązków w zakresie cyberbezpieczeństwa oraz sposób sprawowania nadzoru.',
            ['h2' => 'Jakie terminy należy uwzględnić?'],
            'Przepisy przewidują konkretne terminy na dopełnienie formalności i dostosowanie działalności do nowych wymogów:',
            ['list' => [
                '6 miesięcy na wpis do wykazu – termin liczony od dnia spełnienia przesłanek kwalifikujących podmiot jako kluczowy lub ważny. Dla podmiotów, które spełniały te przesłanki już w dniu wejścia w życie nowelizacji, termin ten upłynął 3 października 2026 r.',
                '12 miesięcy na realizację obowiązków ustawowych – liczonych od dnia spełnienia przesłanek uznania za podmiot kluczowy lub ważny.',
                '24 miesiące na pierwszy audyt – w przypadku podmiotów kluczowych, liczone od dnia spełnienia przesłanek kwalifikacyjnych.',
            ]],
            'Nie warto odkładać weryfikacji na ostatnią chwilę. Najpierw trzeba ustalić, czy firma w ogóle podlega ustawie, a następnie określić, jakie obowiązki i terminy dotyczą jej w konkretnym przypadku.',
            ['h2' => 'Jakie kary grożą za naruszenie przepisów?'],
            'Ustawa przewiduje dotkliwe sankcje finansowe. Maksymalna kara może wynieść:',
            ['list' => [
                'dla podmiotu kluczowego – do 10 mln euro lub 2% rocznych przychodów z działalności gospodarczej, przy czym zastosowanie ma wyższa kwota; kara nie może być jednak niższa niż 20 000 zł;',
                'dla podmiotu ważnego – do 7 mln euro lub 1,4% rocznych przychodów z działalności gospodarczej; kara nie może być niższa niż 15 000 zł.',
            ]],
            'W szczególnych przypadkach – gdy naruszenie powoduje poważne zagrożenie dla bezpieczeństwa państwa, życia lub zdrowia ludzi albo ryzyko poważnych szkód majątkowych lub zakłóceń w świadczeniu usług – kara może sięgnąć nawet 100 mln zł.',
            ['h2' => 'Czy Twoja firma podlega ustawie?'],
            'Jeśli nie masz pewności, czy Twoja firma spełnia kryteria podmiotu kluczowego lub ważnego, zapraszam do kontaktu – przeanalizuję Twoją działalność i wskażę, jakie obowiązki i terminy Cię dotyczą.',
        ],
    ],
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
