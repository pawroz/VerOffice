<?php
require __DIR__ . '/includes/functions.php';

$activeNav = 'insights';
$pageTitle = 'Insights — Kancelaria [Nazwa]';

$allArticles = get_articles();
$featuredArticle = null;
foreach ($allArticles as $article) {
    if ($article['featured']) {
        $featuredArticle = $article;
        break;
    }
}
$featuredArticle = $featuredArticle ?? $allArticles[0];
$gridArticles = array_values(array_filter($allArticles, static fn ($a) => $a['id'] !== $featuredArticle['id']));

$practiceAreas = get_practice_areas();
$events = upcoming_events();

// Archiwum: unikalne lata/miesiące obecne w treściach, do nawigacji po datach.
$archive = [];
foreach ($allArticles as $a) {
    $ts = strtotime($a['date']);
    $year = (int) date('Y', $ts);
    $month = (int) date('n', $ts);
    $archive[$year][$month] = true;
}
krsort($archive);
foreach ($archive as $year => $months) {
    krsort($archive[$year]);
}

require __DIR__ . '/includes/header.php';
?>

<section>
  <div class="wrap">
    <div class="section-head reveal">
      <p class="eyebrow"><span class="mark">§</span> Insights</p>
      <h2>Wiedza i aktualności</h2>
    </div>

    <div class="insights-hero reveal">
      <div class="photo-placeholder">[zdjęcie / grafika artykułu]</div>
      <div>
        <?php $article = $featuredArticle; ?>
        <p class="article-kicker">
          <?= h(mb_strtoupper(type_label($article['type']))) ?>
          <?php $slug = $article['practice_area']; require __DIR__ . '/includes/partials/practice-tag.php'; ?>
        </p>
        <p class="article-date"><?= h(format_date_pl($article['date'])) ?></p>
        <h2><a href="artykul.php?id=<?= h($article['id']) ?>" style="text-decoration:none;color:inherit;"><?= h($article['title']) ?></a></h2>
        <p><?= h($article['excerpt']) ?></p>
        <a href="artykul.php?id=<?= h($article['id']) ?>" class="card-link-label">Czytaj dalej →</a>
      </div>
    </div>

    <div class="archive-nav" id="archive-nav">
      <?php foreach ($archive as $year => $months): ?>
        <button type="button" data-year="<?= h((string) $year) ?>" data-month=""><?= h((string) $year) ?></button>
        <?php foreach (array_keys($months) as $month): ?>
          <button type="button" data-year="<?= h((string) $year) ?>" data-month="<?= h((string) $month) ?>"><?= h(PL_MONTHS[$month]) ?> <?= h((string) $year) ?></button>
        <?php endforeach; ?>
      <?php endforeach; ?>
    </div>

    <form class="filters-bar" id="insights-filters" onsubmit="return false;">
      <div class="filter-field">
        <label for="f-area">Obszar praktyki</label>
        <select id="f-area" data-filter-key="practice">
          <option value="">Wszystkie</option>
          <?php foreach ($practiceAreas as $slug => $area): ?>
            <option value="<?= h($slug) ?>"><?= h($area['name']) ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="filter-field">
        <label for="f-type">Typ treści</label>
        <select id="f-type" data-filter-key="type">
          <option value="">Wszystkie</option>
          <?php foreach (TYPE_LABELS as $value => $label): ?>
            <option value="<?= h($value) ?>"><?= h($label) ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="filter-field">
        <label for="f-from">Od daty</label>
        <input type="date" id="f-from" data-filter-key="from">
      </div>
      <div class="filter-field">
        <label for="f-to">Do daty</label>
        <input type="date" id="f-to" data-filter-key="to">
      </div>
    </form>

    <div class="insights-grid" id="insights-grid">
      <?php foreach ($gridArticles as $article): ?>
        <?php require __DIR__ . '/includes/partials/article-card.php'; ?>
      <?php endforeach; ?>
    </div>
    <p class="empty-state" id="insights-empty" hidden>Brak wpisów spełniających wybrane kryteria.</p>
  </div>
</section>

<?php if (!empty($events)): ?>
<section id="wydarzenia">
  <div class="wrap">
    <div class="section-head reveal">
      <p class="eyebrow"><span class="mark">§</span> Wydarzenia</p>
      <h2>Nadchodzące wydarzenia</h2>
    </div>
    <div class="events-list reveal">
      <?php foreach ($events as $event): ?>
        <div class="event-item">
          <span class="event-date"><?= h(format_date_pl($event['event_date'])) ?></span>
          <div>
            <h4><?= h($event['title']) ?></h4>
            <p><?= h($event['excerpt']) ?></p>
            <a href="index.php?event=<?= h($event['id']) ?>#asystent" class="card-link-label">Zgłoś zainteresowanie →</a>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
