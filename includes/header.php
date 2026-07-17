<?php
declare(strict_types=1);
require_once __DIR__ . '/config.php';

$pageTitle = $pageTitle ?? SITE_TITLE;
$pageDescription = $pageDescription ?? SITE_DESCRIPTION;
$canonicalUrl = $canonicalUrl ?? SITE_URL . '/';

// Set $isHome = false and $activeStaticNav before including this file from
// any page that isn't index.php, so nav links point back to the homepage
// sections (/#id) instead of same-page anchors (#id).
$isHome = $isHome ?? true;
$homePrefix = $isHome ? '' : '/';
$activeStaticNav = $activeStaticNav ?? null;
$ogType = $ogType ?? 'website';
?>
<!DOCTYPE html>
<html lang="pl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= h($pageTitle) ?></title>
<meta name="description" content="<?= h($pageDescription) ?>">
<link rel="canonical" href="<?= h($canonicalUrl) ?>">

<meta property="og:type" content="<?= h($ogType) ?>">
<meta property="og:locale" content="pl_PL">
<meta property="og:title" content="<?= h($pageTitle) ?>">
<meta property="og:description" content="<?= h($pageDescription) ?>">
<meta property="og:url" content="<?= h($canonicalUrl) ?>">

<link rel="preload" href="/assets/fonts/cormorant-garamond-latin.woff2" as="font" type="font/woff2" crossorigin>
<link rel="preload" href="/assets/fonts/inter-latin.woff2" as="font" type="font/woff2" crossorigin>
<link rel="stylesheet" href="/assets/css/style.css">
<?= $extraHead ?? '' ?>
</head>
<body>

<header class="site-header">
  <div class="navwrap">
    <a href="/" class="brand"<?= $isHome ? ' data-scroll-to="home"' : '' ?>>
      <span class="brand-mark">WL</span>
      <span class="brand-divider"></span>
      <span class="brand-text">
        <span class="brand-name"><?= h(FIRM_LAWYER_NAME) ?></span>
        <span class="brand-tagline">KANCELARIA PRAWNA</span>
      </span>
    </a>
    <nav class="nav-links">
      <a href="/" class="nav-link" data-nav data-active="home"<?= $isHome ? ' data-scroll-to="home"' : '' ?>>Strona Główna</a>
      <a href="<?= h($homePrefix) ?>#about" class="nav-link" data-nav data-active="about" data-scroll-to="about">O Mnie</a>
      <a href="<?= h($homePrefix) ?>#spec" class="nav-link" data-nav data-active="spec" data-scroll-to="spec">Specjalizacje</a>
      <a href="<?= h($homePrefix) ?>#spec" class="nav-link" data-nav data-active="none" data-scroll-to="spec">Usługi</a>
      <a href="/blog" class="nav-link<?= $activeStaticNav === 'blog' ? ' is-active' : '' ?>">Blog</a>
      <a href="<?= h($homePrefix) ?>#media" class="nav-link" data-nav data-active="media" data-scroll-to="media">Aktualności</a>
      <a href="<?= h($homePrefix) ?>#contact" class="nav-link" data-nav data-active="contact" data-scroll-to="contact">Kontakt</a>
    </nav>
    <a href="<?= h($homePrefix) ?>#contact" class="nav-cta" data-scroll-to="contact">Umów Spotkanie</a>
    <button type="button" class="burger" id="burgerBtn" aria-label="Otwórz menu">
      <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"><path d="M4 7h16M4 12h16M4 17h16"></path></svg>
    </button>
  </div>
</header>
