<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/functions.php';

$offer = get_trainings_offer();
$trainings = get_trainings();
$trainingFull = true;

$pageTitle = 'Szkolenia prawne dla firm — ' . FIRM_LAWYER_NAME . ' | ' . FIRM_LABEL . ' w Kaliszu';
$pageDescription = 'Szkolenia prawne dla firm, zespołów pracowników i wydarzeń branżowych: ' . mb_strtolower(implode(', ', $offer['topics'])) . '. Praktycznie i zrozumiale.';
$canonicalUrl = SITE_URL . '/szkolenia';
$isHome = false;
$activeStaticNav = 'trainings';

require __DIR__ . '/includes/header.php';
?>

<section class="blog-hero">
  <div class="blog-hero-wrap">
    <h1 class="section-title section-title--on-dark" data-reveal>Szkolenia</h1>
    <div class="divider-gold" data-reveal></div>
    <p class="blog-hero-lead" data-reveal data-reveal-delay="80"><?= h($offer['lead']) ?></p>
  </div>
</section>

<section class="trainings-page">
  <div class="trainings-page-wrap<?= $trainings ? '' : ' trainings-page-wrap--single' ?>">
    <div data-reveal>
      <h2 class="trainings-heading">Tematyka</h2>
      <ul class="dash-list">
        <?php foreach ($offer['topics'] as $topic): ?>
          <li><?= h($topic) ?></li>
        <?php endforeach; ?>
      </ul>
      <p class="trainings-text"><?= h($offer['topicsNote']) ?></p>

      <h2 class="trainings-heading">Dla kogo</h2>
      <ul class="dash-list">
        <?php foreach ($offer['audiences'] as $audience): ?>
          <li><?= h($audience) ?></li>
        <?php endforeach; ?>
      </ul>

      <h2 class="trainings-heading">Podejście</h2>
      <p class="trainings-text"><?= h($offer['approach']) ?></p>

      <div class="article-box trainings-cta">
        <p><?= h($offer['cta']) ?></p>
        <button type="button" class="btn btn-gold" data-open-contact>Zapytaj o szkolenie</button>
      </div>
    </div>

    <?php if ($trainings): ?>
      <div data-reveal data-reveal-delay="100">
        <h2 class="trainings-heading">Zrealizowane szkolenia i wystąpienia</h2>
        <?php foreach ($trainings as $training): ?>
          <?php require __DIR__ . '/includes/partials/training-item.php'; ?>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
