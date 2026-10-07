<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/functions.php';

$pageTitle = 'Polityka prywatności (RODO) | ' . FIRM_LAWYER_NAME . ' ' . FIRM_LABEL;
$pageDescription = 'Informacje o przetwarzaniu danych osobowych — ' . FIRM_LAWYER_NAME . ' ' . FIRM_LABEL . '. Obowiązek informacyjny z art. 13 RODO.';
$canonicalUrl = SITE_URL . '/polityka-prywatnosci';
$isHome = false;
$activeStaticNav = null;

// Brakujące dane rejestrowe są widoczne jako znacznik do uzupełnienia, a nie
// cicho pomijane — polityka bez nich jest niekompletna.
$legalName = FIRM_LEGAL_NAME !== '' ? FIRM_LEGAL_NAME : '[pełna nazwa działalności — do uzupełnienia]';
$nip = FIRM_NIP !== '' ? FIRM_NIP : '[NIP — do uzupełnienia]';
$email = '<a href="mailto:' . h(FIRM_EMAIL) . '">' . h(FIRM_EMAIL) . '</a>';

require __DIR__ . '/includes/header.php';
?>

<section class="article">
  <div class="article-wrap">
    <a href="/" class="link-underline">← Strona główna</a>

    <h1 class="article-title legal-title" data-reveal>Polityka prywatności (RODO)</h1>
    <p class="article-author" data-reveal>Informacje o przetwarzaniu danych osobowych · aktualizacja: <?= h(format_date_pl(PRIVACY_POLICY_UPDATED)) ?></p>

    <div class="article-body legal-body" data-reveal data-reveal-delay="80">
      <p>W związku z korzystaniem ze strony internetowej, kontaktem za pośrednictwem formularza kontaktowego, poczty elektronicznej lub innych dostępnych form kontaktu, realizując obowiązek informacyjny wynikający z art. 13 ust. 1 i 2 Rozporządzenia Parlamentu Europejskiego i Rady (UE) 2016/679 z dnia 27 kwietnia 2016 r. („RODO”), informuję, że:</p>

      <h2>1. Administrator danych osobowych</h2>
      <p>Administratorem Pani/Pana danych osobowych jest <?= h(FIRM_LAWYER_NAME) ?> prowadząca działalność gospodarczą pod firmą <?= h($legalName) ?>, z siedzibą pod adresem: <?= h(FIRM_ADDRESS_LINE1) ?>, <?= h(FIRM_ADDRESS_LINE2) ?>, NIP: <?= h($nip) ?>.</p>
      <p>Kontakt z Administratorem jest możliwy za pośrednictwem adresu e-mail: <?= $email ?>.</p>

      <h2>2. Inspektor ochrony danych</h2>
      <p>Administrator nie powołał inspektora ochrony danych osobowych, ponieważ nie jest do tego zobowiązany na podstawie obowiązujących przepisów.</p>
      <p>W sprawach związanych z przetwarzaniem danych osobowych można kontaktować się z Administratorem za pośrednictwem adresu e-mail: <?= $email ?>.</p>

      <h2>3. Zakres przetwarzanych danych</h2>
      <p>W przypadku kontaktu przez formularz kontaktowy Administrator przetwarza podane w nim dane: imię i nazwisko, adres e-mail oraz treść wiadomości. W przypadku kontaktu e-mailowego lub telefonicznego przetwarzane są dane przekazane w tej korespondencji, a w przypadku zawarcia umowy — dane niezbędne do jej zawarcia, wykonania i rozliczenia.</p>

      <h2>4. Cele i podstawy prawne przetwarzania danych osobowych</h2>
      <p>Pani/Pana dane osobowe mogą być przetwarzane w następujących celach:</p>
      <ul>
        <li>udzielenia odpowiedzi na przesłane zapytanie oraz prowadzenia korespondencji – na podstawie art. 6 ust. 1 lit. f RODO, tj. prawnie uzasadnionego interesu Administratora polegającego na prowadzeniu komunikacji z osobami kontaktującymi się z Administratorem;</li>
        <li>podjęcia działań na żądanie osoby, której dane dotyczą, przed zawarciem umowy oraz zawarcia i wykonania umowy o świadczenie usług prawnych – na podstawie art. 6 ust. 1 lit. b RODO;</li>
        <li>realizacji obowiązków prawnych ciążących na Administratorze, w szczególności obowiązków podatkowych i rachunkowych – na podstawie art. 6 ust. 1 lit. c RODO;</li>
        <li>ustalenia, dochodzenia lub obrony przed roszczeniami – na podstawie art. 6 ust. 1 lit. f RODO, tj. prawnie uzasadnionego interesu Administratora;</li>
        <li>prowadzenia bieżącej działalności zawodowej i gospodarczej, w tym zapewnienia bezpieczeństwa informacji oraz obsługi strony internetowej – na podstawie art. 6 ust. 1 lit. f RODO;</li>
        <li>prowadzenia działań marketingowych, jeżeli podstawą ich prowadzenia będzie zgoda – na podstawie art. 6 ust. 1 lit. a RODO.</li>
      </ul>

      <h2>5. Prawnie uzasadnione interesy Administratora</h2>
      <p>W przypadkach, w których podstawą przetwarzania danych osobowych jest art. 6 ust. 1 lit. f RODO, prawnie uzasadnionym interesem Administratora jest w szczególności prowadzenie działalności zawodowej i gospodarczej, komunikacja z osobami kontaktującymi się z Administratorem, ochrona przed roszczeniami oraz dochodzenie przysługujących Administratorowi roszczeń.</p>

      <h2>6. Odbiorcy danych osobowych</h2>
      <p>Pani/Pana dane osobowe mogą być przekazywane:</p>
      <ul>
        <li>osobom upoważnionym przez Administratora do przetwarzania danych osobowych;</li>
        <li>podmiotom świadczącym na rzecz Administratora usługi informatyczne, hostingowe, pocztowe, księgowe lub inne usługi niezbędne do prowadzenia działalności;</li>
        <li>podmiotom świadczącym usługi związane z obsługą i utrzymaniem strony internetowej;</li>
        <li>podmiotom, z którymi Administrator współpracuje przy realizacji usług prawnych, jeżeli jest to niezbędne do realizacji zlecenia i odbywa się zgodnie z obowiązującymi przepisami;</li>
        <li>podmiotom uprawnionym do otrzymania danych na podstawie przepisów prawa.</li>
      </ul>
      <p>Dane osobowe nie będą przekazywane do państw trzecich ani organizacji międzynarodowych, chyba że będzie to wynikało z korzystania przez Administratora z usług dostawcy, który zapewnia zgodność takiego przekazania z RODO. Dotyczy to w szczególności usług poczty elektronicznej Google, w związku z którymi dane mogą być przekazywane do Stanów Zjednoczonych na podstawie decyzji Komisji Europejskiej stwierdzającej odpowiedni stopień ochrony (EU-US Data Privacy Framework) lub standardowych klauzul umownych zatwierdzonych przez Komisję Europejską.</p>

      <h2>7. Okres przechowywania danych osobowych</h2>
      <p>Pani/Pana dane osobowe będą przechowywane:</p>
      <ul>
        <li>przez okres niezbędny do udzielenia odpowiedzi na zapytanie i prowadzenia korespondencji;</li>
        <li>w przypadku zawarcia umowy – przez okres niezbędny do jej wykonania, a następnie przez okres wymagany przepisami prawa, w szczególności przepisami podatkowymi i rachunkowymi;</li>
        <li>w przypadku danych przetwarzanych w celu ustalenia, dochodzenia lub obrony przed roszczeniami – przez okres odpowiadający terminom przedawnienia tych roszczeń;</li>
        <li>w przypadku przetwarzania danych na podstawie zgody – do czasu jej wycofania, przy czym wycofanie zgody nie wpływa na zgodność z prawem przetwarzania dokonanego przed jej wycofaniem.</li>
      </ul>

      <h2>8. Prawa osoby, której dane dotyczą</h2>
      <p>Przysługuje Pani/Panu prawo do:</p>
      <ul>
        <li>dostępu do swoich danych osobowych;</li>
        <li>sprostowania danych osobowych;</li>
        <li>usunięcia danych osobowych, w przypadkach przewidzianych przez RODO;</li>
        <li>ograniczenia przetwarzania danych osobowych;</li>
        <li>przenoszenia danych osobowych, jeżeli ma to zastosowanie;</li>
        <li>wniesienia sprzeciwu wobec przetwarzania danych osobowych opartego na art. 6 ust. 1 lit. e lub f RODO;</li>
        <li>cofnięcia zgody na przetwarzanie danych osobowych w dowolnym momencie, jeżeli przetwarzanie odbywa się na podstawie zgody.</li>
      </ul>
      <p>W celu realizacji swoich praw można skontaktować się z Administratorem pod adresem e-mail: <?= $email ?>.</p>
      <p>Przysługuje Pani/Panu również prawo wniesienia skargi do Prezesa Urzędu Ochrony Danych Osobowych (ul. Stawki 2, 00-193 Warszawa), jeżeli uzna Pani/Pan, że przetwarzanie danych osobowych narusza przepisy RODO.</p>

      <h2>9. Dobrowolność podania danych</h2>
      <p>Podanie danych osobowych jest co do zasady dobrowolne, jednak może być niezbędne do udzielenia odpowiedzi na zapytanie, podjęcia działań przed zawarciem umowy lub zawarcia i wykonania umowy.</p>
      <p>Niepodanie danych niezbędnych do realizacji określonego celu może skutkować brakiem możliwości udzielenia odpowiedzi, podjęcia współpracy lub wykonania usługi.</p>

      <h2>10. Zautomatyzowane podejmowanie decyzji i profilowanie</h2>
      <p>Pani/Pana dane osobowe nie będą wykorzystywane do podejmowania decyzji opartych wyłącznie na zautomatyzowanym przetwarzaniu, w tym profilowaniu, które wywoływałyby wobec Pani/Pana skutki prawne lub w podobny sposób istotnie wpływały na Panią/Pana.</p>

      <h2>11. Tajemnica zawodowa</h2>
      <p>Informacje przekazane Administratorowi w związku z udzielaniem pomocy prawnej objęte są tajemnicą zawodową, której zachowanie wynika z przepisów ustawy o radcach prawnych oraz zasad etyki zawodowej. Realizacja niektórych praw opisanych w pkt 8 może podlegać ograniczeniom w zakresie, w jakim prowadziłaby do naruszenia tej tajemnicy.</p>

      <h2>12. Pliki cookies i dane techniczne</h2>
      <p>Strona nie wykorzystuje plików cookies ani narzędzi analitycznych, reklamowych lub śledzących. Czcionki i inne zasoby strony są ładowane bezpośrednio z serwera strony, bez udziału zewnętrznych dostawców.</p>
      <p>Podczas korzystania ze strony serwer, na którym jest ona utrzymywana, automatycznie zapisuje w logach dane techniczne, takie jak adres IP, data i godzina zapytania, adres odwiedzanej podstrony oraz informacje o przeglądarce. Dane te są przetwarzane w celu zapewnienia bezpieczeństwa i prawidłowego działania strony – na podstawie art. 6 ust. 1 lit. f RODO – i nie są wykorzystywane do identyfikowania użytkowników.</p>

      <h2>13. Zmiany polityki prywatności</h2>
      <p>Administrator może aktualizować niniejsze informacje, w szczególności w razie zmiany przepisów lub sposobu przetwarzania danych. Aktualna wersja jest zawsze dostępna na tej stronie, wraz z datą ostatniej aktualizacji.</p>
    </div>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
