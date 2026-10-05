<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/functions.php';

$aboutParagraphs = get_about_paragraphs();

$pageTitle = 'O mnie — ' . FIRM_LAWYER_NAME . ' | ' . FIRM_LABEL . ' w Kaliszu';
$pageDescription = FIRM_LAWYER_NAME . ' — magister prawa, aplikantka radcowska. Obsługa prawna przedsiębiorców, nieruchomości i procesy inwestycyjne, prawo transportowe i spedycyjne.';
$canonicalUrl = SITE_URL . '/o-mnie';
$ogType = 'profile';
$isHome = false;
$activeStaticNav = 'about';

$jsonLd = [
    '@context' => 'https://schema.org',
    '@type' => 'ProfilePage',
    'url' => $canonicalUrl,
    'mainEntity' => [
        '@type' => 'Person',
        'name' => FIRM_LAWYER_NAME,
        'image' => SITE_URL . '/assets/img/weronika-lesna-o-mnie-1024.jpg',
        'worksFor' => ['@type' => 'Organization', 'name' => FIRM_LABEL . ' ' . FIRM_LAWYER_NAME],
        'alumniOf' => [
            ['@type' => 'CollegeOrUniversity', 'name' => 'Uniwersytet im. Adama Mickiewicza w Poznaniu'],
            ['@type' => 'CollegeOrUniversity', 'name' => 'Uniwersytet SWPS'],
            ['@type' => 'CollegeOrUniversity', 'name' => 'Szkoła Główna Handlowa w Warszawie'],
        ],
    ],
];
$jsonLdEncoded = str_replace('</', '<\/', json_encode($jsonLd, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
$extraHead = '<script type="application/ld+json">' . $jsonLdEncoded . '</script>';

require __DIR__ . '/includes/header.php';
?>

<section class="about-page">
  <div class="about-page-wrap">
    <div class="about-page-text" data-reveal>
      <a href="/" class="link-underline">← Strona główna</a>
      <h1 class="section-title about-page-title">O mnie</h1>
      <div class="divider-gold"></div>
      <div class="about-bio about-text about-text--justify">
        <?php foreach ($aboutParagraphs as $paragraph): ?>
          <p><?= h($paragraph) ?></p>
        <?php endforeach; ?>
      </div>
      <a href="/#contact" class="btn-outline">Umów konsultację</a>
    </div>
    <div class="about-page-photo" data-reveal data-reveal-delay="90">
      <picture>
        <source type="image/webp" srcset="/assets/img/weronika-lesna-o-mnie.webp 720w, /assets/img/weronika-lesna-o-mnie-1024.webp 1024w" sizes="(max-width: 1024px) min(460px, 100vw), 580px">
        <img src="/assets/img/weronika-lesna-o-mnie-1024.jpg" srcset="/assets/img/weronika-lesna-o-mnie.jpg 720w, /assets/img/weronika-lesna-o-mnie-1024.jpg 1024w" sizes="(max-width: 1024px) min(460px, 100vw), 580px" width="1024" height="1536" alt="<?= h(FIRM_LAWYER_NAME) ?> — prawnik, obsługa prawna przedsiębiorców" fetchpriority="high" decoding="async">
      </picture>
    </div>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
