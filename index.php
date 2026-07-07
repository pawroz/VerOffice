<?php
require __DIR__ . '/includes/functions.php';

$activeNav = '';
$pageTitle = 'Kancelaria [Nazwa] — Prawo korporacyjne, spory i nieruchomości';

$stats = get_stats();
$practiceAreas = get_practice_areas();
$featuredLawyers = array_values(array_filter(get_lawyers(), static fn ($l) => $l['featured']));
$allArticles = get_articles();
$featuredArticle = null;
foreach ($allArticles as $article) {
    if ($article['featured']) {
        $featuredArticle = $article;
        break;
    }
}
$featuredArticle = $featuredArticle ?? $allArticles[0];
$moreArticles = array_slice(array_values(array_filter(
    $allArticles,
    static fn ($a) => $a['id'] !== $featuredArticle['id']
)), 0, 3);
$offices = get_offices();

require __DIR__ . '/includes/header.php';
?>

<!-- HERO -->
<section class="hero" id="top">
  <div class="wrap hero-grid">
    <div class="reveal">
      <p class="eyebrow"><span class="mark">§</span> Kancelaria [Nazwa]</p>
      <h1>Opisz swoją sprawę, <em>a my skierujemy Cię do właściwego prawnika.</em></h1>
      <p class="lead">Doradzamy przy transakcjach, sporach i bieżącej obsłudze firm oraz osób prywatnych. Zawsze wiesz, komu powierzasz swój problem.</p>
      <div class="cta-row">
        <a href="#asystent" class="btn btn-primary">Umów konsultację</a>
        <a href="#praktyki" class="btn btn-ghost">Obszary praktyki</a>
      </div>
    </div>
    <dl class="hero-meta reveal">
      <dt>Siedziba</dt>
      <dd>Warszawa · Kraków · Wrocław</dd>
      <dt>Od roku</dt>
      <dd>[19XX]</dd>
      <dt>Specjalizacje</dt>
      <dd>M&amp;A · Spory i arbitraż<br>Bankowość · Nieruchomości</dd>
    </dl>
  </div>
</section>

<!-- STATYSTYKI DOROBKU -->
<section class="stats-section">
  <div class="wrap">
    <div class="stats reveal">
      <?php foreach ($stats as $stat): ?>
        <div class="stat">
          <div class="figure"><?= h($stat['value']) ?></div>
          <div class="label"><?= h($stat['label']) ?></div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- OBSZARY PRAKTYKI -->
<section id="praktyki">
  <div class="wrap">
    <div class="section-head reveal">
      <p class="eyebrow"><span class="mark">§</span> Obszary praktyki</p>
      <h2>W czym pomagamy</h2>
    </div>
    <div class="practice-grid">
      <?php foreach ($practiceAreas as $slug => $area): ?>
        <a href="zespol.php?obszar=<?= h($slug) ?>" class="practice-card <?= h($area['class']) ?> reveal">
          <h3><?= h($area['name']) ?></h3>
          <p><?= h($area['desc']) ?></p>
          <span class="card-link-label">Zobacz zespół →</span>
        </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- WYRÓŻNIENI PRAWNICY -->
<section id="zespol">
  <div class="wrap">
    <div class="section-head reveal">
      <p class="eyebrow"><span class="mark">§</span> Zespół</p>
      <h2>Wyróżnieni prawnicy</h2>
    </div>
    <div class="lawyer-grid reveal">
      <?php foreach ($featuredLawyers as $lawyer): ?>
        <?php require __DIR__ . '/includes/partials/lawyer-card.php'; ?>
      <?php endforeach; ?>
    </div>
    <div class="section-foot reveal">
      <a href="zespol.php" class="btn btn-ghost">Cały zespół →</a>
    </div>
  </div>
</section>

<!-- INSIGHTS -->
<section id="insights">
  <div class="wrap">
    <div class="section-head reveal">
      <p class="eyebrow"><span class="mark">§</span> Insights</p>
      <h2>Wiedza i aktualności</h2>
    </div>
    <div class="insights-hero reveal">
      <div class="photo-placeholder">[zdjęcie / grafika artykułu]</div>
      <div class="article-card-body" style="padding:0;">
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
    <div class="insights-grid reveal">
      <?php foreach ($moreArticles as $article): ?>
        <?php require __DIR__ . '/includes/partials/article-card.php'; ?>
      <?php endforeach; ?>
    </div>
    <div class="section-foot reveal">
      <a href="insights.php" class="btn btn-ghost">Wszystkie insights →</a>
    </div>
  </div>
</section>

<!-- PANEL ZAUFANIA -->
<section id="zaufanie">
  <div class="wrap">
    <div class="section-head reveal">
      <p class="eyebrow"><span class="mark">§</span> Zaufanie</p>
      <h2>Doceniani przez klientów i branżę</h2>
    </div>
    <div class="trust-panel reveal">
      <div class="trust-logos">
        <span class="trust-logo">[Ranking Chambers Europe]</span>
        <span class="trust-logo">[Ranking Legal 500]</span>
        <span class="trust-logo">[Ranking Rzeczpospolita]</span>
        <span class="trust-logo">[Who's Who Legal]</span>
      </div>
      <div class="trust-quote">
        <blockquote>„[Zespół wykazał się rzetelnością i precyzją w prowadzeniu naszej transakcji od pierwszego dnia.]"</blockquote>
        <cite>[Imię Nazwisko], [Stanowisko, Nazwa Klienta]</cite>
      </div>
    </div>
  </div>
</section>

<!-- ASYSTENT ZGŁOSZEŃ -->
<section id="asystent" class="intake-section">
  <div class="wrap">
    <div class="section-head reveal">
      <p class="eyebrow"><span class="mark">§</span> Asystent zgłoszeń</p>
      <h2>Porozmawiajmy o Twojej sprawie</h2>
    </div>
    <div class="intake-grid reveal">
      <div>
        <?php require __DIR__ . '/includes/partials/intake-form.php'; ?>
      </div>
      <div>
        <dl class="contact-list offices-list">
          <?php foreach ($offices as $office): ?>
            <dt><?= h($office['name']) ?></dt>
            <dd><?= h($office['address']) ?></dd>
            <dd><a href="tel:<?= h(preg_replace('/[^+\d]/', '', $office['phone'])) ?>"><?= h($office['phone']) ?></a></dd>
          <?php endforeach; ?>
        </dl>
        <p class="offices-note">Konsultacje odbywają się po wcześniejszym umówieniu terminu. W pilnych sprawach prosimy o kontakt telefoniczny z wybranym biurem.</p>
      </div>
    </div>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
