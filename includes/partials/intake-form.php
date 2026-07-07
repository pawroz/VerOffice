<?php
/**
 * Formularz asystenta zgłoszeń — tylko UI. Zapisuje zgłoszenie do storage/intake-log.jsonl
 * przez submit-intake.php, bez żadnego wywołania modelu językowego (decyzja produktowa v1).
 */
$__contextLawyer = isset($_GET['prawnik']) ? get_lawyer((string) $_GET['prawnik']) : null;
$__contextEvent = isset($_GET['event']) ? get_article((string) $_GET['event']) : null;
$__contextNote = '';
if ($__contextLawyer !== null) {
    $__contextNote = 'W związku z profilem ' . $__contextLawyer['name'] . ': ';
} elseif ($__contextEvent !== null) {
    $__contextNote = 'W związku z wydarzeniem „' . $__contextEvent['title'] . '": ';
}
$__intakeStatus = $_GET['intake'] ?? null;
?>
<?php if ($__intakeStatus === 'ok'): ?>
  <div class="form-notice success">Dziękujemy za zgłoszenie. Odpowiedni zespół skontaktuje się z Tobą wkrótce.</div>
<?php elseif ($__intakeStatus === 'error'): ?>
  <div class="form-notice error">Zgłoszenie nie zostało wysłane — sprawdź, czy wszystkie wymagane pola są wypełnione, i spróbuj ponownie.</div>
<?php endif; ?>

<p class="disclaimer">
  Kontakt przez formularz nie tworzy relacji klient–prawnik i nie jest objęty tajemnicą adwokacką
  do czasu formalnego przyjęcia sprawy przez kancelarię. Opis sprawy służy wyłącznie skierowaniu
  zgłoszenia do właściwego zespołu — zanim ktokolwiek się z Tobą skontaktuje, zgłoszenie zawsze
  weryfikuje prawnik.
</p>

<form action="submit-intake.php" method="post" novalidate>
  <?php if ($__contextLawyer !== null): ?>
    <input type="hidden" name="context" value="<?= h($__contextLawyer['id']) ?>">
  <?php elseif ($__contextEvent !== null): ?>
    <input type="hidden" name="context" value="<?= h($__contextEvent['id']) ?>">
  <?php endif; ?>

  <div class="form-field">
    <label for="intake-name">Imię i nazwisko</label>
    <input type="text" id="intake-name" name="name" autocomplete="name">
  </div>

  <div class="form-field">
    <label for="intake-email">E-mail *</label>
    <input type="email" id="intake-email" name="email" required autocomplete="email">
  </div>

  <div class="form-field">
    <label for="intake-phone">Telefon</label>
    <input type="tel" id="intake-phone" name="phone" autocomplete="tel">
  </div>

  <div class="form-field">
    <label for="intake-area">Obszar praktyki</label>
    <select id="intake-area" name="practice_area">
      <option value="">Nie jestem pewien/pewna</option>
      <?php foreach (get_practice_areas() as $slug => $area): ?>
        <option value="<?= h($slug) ?>"><?= h($area['name']) ?></option>
      <?php endforeach; ?>
    </select>
  </div>

  <div class="form-field">
    <label for="intake-description">Opisz swoją sprawę *</label>
    <textarea id="intake-description" name="description" required minlength="20"
      placeholder="<?= h($__contextNote) ?>Opisz w kilku zdaniach, czego dotyczy Twoja sprawa..."></textarea>
  </div>

  <label class="form-checkbox">
    <input type="checkbox" name="consent" required>
    <span>Zapoznałem/am się z zastrzeżeniem powyżej.</span>
  </label>

  <div class="honeypot-field" aria-hidden="true">
    <label for="intake-website">Strona WWW</label>
    <input type="text" id="intake-website" name="website" tabindex="-1" autocomplete="off">
  </div>

  <button type="submit" class="btn btn-primary">Wyślij zgłoszenie</button>
</form>
