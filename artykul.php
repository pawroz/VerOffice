<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/functions.php';

$slug = $_GET['slug'] ?? '';
$article = is_string($slug) ? get_article($slug) : null;

$isHome = false;
$activeStaticNav = 'blog';

if (!$article) {
    http_response_code(404);
    $pageTitle = 'Nie znaleziono artykułu | ' . FIRM_LABEL . ' ' . FIRM_LAWYER_NAME;
    $pageDescription = SITE_DESCRIPTION;
    $canonicalUrl = SITE_URL . '/blog';
    require __DIR__ . '/includes/header.php';
    ?>
    <section class="article-notfound">
      <div class="article-notfound-wrap">
        <h1 class="section-title">Nie znaleziono artykułu</h1>
        <div class="divider-gold"></div>
        <p class="about-bio">Szukany artykuł nie istnieje albo został przeniesiony.</p>
        <a href="/blog" class="btn-outline">← Wróć do bloga</a>
      </div>
    </section>
    <?php
    require __DIR__ . '/includes/footer.php';
    exit;
}

$pageTitle = $article['title'] . ' | Blog ' . FIRM_LABEL . ' ' . FIRM_LAWYER_NAME;
$pageDescription = $article['excerpt'];
$canonicalUrl = SITE_URL . '/blog/' . rawurlencode($article['slug']);
$ogType = 'article';

$jsonLd = [
    '@context' => 'https://schema.org',
    '@type' => 'Article',
    'headline' => $article['title'],
    'description' => $article['excerpt'],
    'datePublished' => $article['date'],
    'author' => ['@type' => 'Person', 'name' => FIRM_LAWYER_NAME],
    'publisher' => ['@type' => 'Organization', 'name' => FIRM_LABEL . ' ' . FIRM_LAWYER_NAME],
    'mainEntityOfPage' => $canonicalUrl,
];
$jsonLdEncoded = str_replace('</', '<\/', json_encode($jsonLd, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
$extraHead = '<script type="application/ld+json">' . $jsonLdEncoded . '</script>';

require __DIR__ . '/includes/header.php';
?>

<section class="article">
  <div class="article-wrap">
    <a href="/blog" class="link-underline">← Wróć do bloga</a>

    <div class="article-meta article-meta--lg" data-reveal>
      <span class="article-meta-category"><?= h($article['category']) ?></span>
      <span class="article-meta-dot">·</span>
      <span class="article-meta-date"><?= h(format_date_pl($article['date'])) ?></span>
    </div>
    <h1 class="article-title" data-reveal><?= h($article['title']) ?></h1>
    <p class="article-author" data-reveal>Autor: <?= h(FIRM_LAWYER_NAME) ?></p>

    <div class="article-thumb" data-reveal data-reveal-delay="80">
      <div class="img-placeholder" role="img" aria-label="Zdjęcie ilustracyjne artykułu">miniatura</div>
    </div>

    <div class="article-body" data-reveal data-reveal-delay="120">
      <?php foreach ($article['body'] as $paragraph): ?>
        <p><?= h($paragraph) ?></p>
      <?php endforeach; ?>
    </div>

    <a href="/blog" class="btn-outline">← Wróć do bloga</a>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
