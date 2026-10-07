<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/functions.php';

$articles = get_articles();

$pageTitle = 'Blog prawniczy — ' . FIRM_LAWYER_NAME . ' | ' . FIRM_LABEL;
$pageDescription = 'Artykuły i porady prawne — ' . FIRM_LAWYER_NAME . ' ' . FIRM_LABEL . '. Prawo cywilne, gospodarcze, nieruchomości, pracy i transportowe.';
$canonicalUrl = SITE_URL . '/blog';
$isHome = false;
$activeStaticNav = 'blog';

require __DIR__ . '/includes/header.php';
?>

<section class="blog-hero">
  <div class="blog-hero-wrap">
    <h1 class="section-title section-title--on-dark" data-reveal>Blog prawniczy</h1>
    <div class="divider-gold" data-reveal></div>
    <p class="blog-hero-lead" data-reveal data-reveal-delay="80">Praktyczne artykuły i porady prawne dla przedsiębiorców – umowy, nieruchomości, inwestycje i transport.</p>
  </div>
</section>

<section class="blog-list">
  <div class="blog-list-wrap">
    <?php foreach ($articles as $article): ?>
      <?php require __DIR__ . '/includes/partials/article-card.php'; ?>
    <?php endforeach; ?>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
