<?php
require __DIR__ . '/includes/functions.php';

$activeNav = 'zespol';
$pageTitle = 'Zespół — Kancelaria [Nazwa]';

$lawyers = get_lawyers();
$practiceAreas = get_practice_areas();
$offices = get_offices();

require __DIR__ . '/includes/header.php';
?>

<section>
  <div class="wrap">
    <div class="section-head reveal">
      <p class="eyebrow"><span class="mark">§</span> Zespół</p>
      <h2>Prawnicy kancelarii [Nazwa]</h2>
    </div>

    <form class="filters-bar" id="lawyer-filters" onsubmit="return false;">
      <div class="filter-field">
        <label for="f-practice">Obszar praktyki</label>
        <select id="f-practice" data-filter-key="practice" data-url-param="obszar">
          <option value="">Wszystkie</option>
          <?php foreach ($practiceAreas as $slug => $area): ?>
            <option value="<?= h($slug) ?>"><?= h($area['name']) ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="filter-field">
        <label for="f-office">Biuro</label>
        <select id="f-office" data-filter-key="office">
          <option value="">Wszystkie</option>
          <?php foreach ($offices as $slug => $office): ?>
            <option value="<?= h($slug) ?>"><?= h($office['name']) ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="filter-field">
        <label for="f-position">Stanowisko</label>
        <select id="f-position" data-filter-key="position">
          <option value="">Wszystkie</option>
          <?php foreach (POSITION_LABELS as $value => $label): ?>
            <option value="<?= h($value) ?>"><?= h($label) ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="filter-field">
        <label for="f-search">Szukaj po nazwisku</label>
        <input type="search" id="f-search" data-filter-key="name" placeholder="np. Kowalska">
      </div>
      <div class="filter-field">
        <label for="lawyer-sort">Sortuj</label>
        <select id="lawyer-sort">
          <option value="">Domyślnie</option>
          <option value="name" data-dir="asc">Alfabetycznie (A–Z)</option>
          <option value="joined" data-dir="asc">Staż — najdłuższy</option>
          <option value="joined" data-dir="desc">Staż — najkrótszy</option>
        </select>
      </div>
    </form>

    <div class="lawyer-grid" id="lawyer-grid">
      <?php foreach ($lawyers as $lawyer): ?>
        <?php require __DIR__ . '/includes/partials/lawyer-card.php'; ?>
      <?php endforeach; ?>
    </div>
    <p class="empty-state" id="lawyer-empty" hidden>Brak prawników spełniających wybrane kryteria.</p>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
