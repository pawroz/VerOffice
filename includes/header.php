<?php
declare(strict_types=1);
require_once __DIR__ . '/config.php';

$pageTitle = $pageTitle ?? SITE_TITLE;
$pageDescription = $pageDescription ?? SITE_DESCRIPTION;
?>
<!DOCTYPE html>
<html lang="pl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= h($pageTitle) ?></title>
<meta name="description" content="<?= h($pageDescription) ?>">
<link rel="canonical" href="<?= h(SITE_URL) ?>/">

<meta property="og:type" content="website">
<meta property="og:locale" content="pl_PL">
<meta property="og:title" content="<?= h($pageTitle) ?>">
<meta property="og:description" content="<?= h($pageDescription) ?>">
<meta property="og:url" content="<?= h(SITE_URL) ?>/">

<link rel="preload" href="assets/fonts/cormorant-garamond-latin.woff2" as="font" type="font/woff2" crossorigin>
<link rel="preload" href="assets/fonts/inter-latin.woff2" as="font" type="font/woff2" crossorigin>
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<header class="site-header">
  <div class="navwrap">
    <button type="button" class="brand" data-scroll-to="home">
      <span class="brand-mark">WL</span>
      <span class="brand-divider"></span>
      <span class="brand-text">
        <span class="brand-name"><?= h(FIRM_LAWYER_NAME) ?></span>
        <span class="brand-tagline">KANCELARIA PRAWNA</span>
      </span>
    </button>
    <nav class="nav-links">
      <a href="#home" class="nav-link" data-nav data-active="home" data-scroll-to="home">Strona Główna</a>
      <a href="#about" class="nav-link" data-nav data-active="about" data-scroll-to="about">O Mnie</a>
      <a href="#spec" class="nav-link" data-nav data-active="spec" data-scroll-to="spec">Specjalizacje</a>
      <a href="#spec" class="nav-link" data-nav data-active="none" data-scroll-to="spec">Usługi</a>
      <a href="#media" class="nav-link" data-nav data-active="media" data-scroll-to="media">Blog</a>
      <a href="#media" class="nav-link" data-nav data-active="none" data-scroll-to="media">Aktualności</a>
      <a href="#contact" class="nav-link" data-nav data-active="contact" data-scroll-to="contact">Kontakt</a>
    </nav>
    <a href="#contact" class="nav-cta" data-scroll-to="contact">Umów Spotkanie</a>
    <button type="button" class="burger" id="burgerBtn" aria-label="Otwórz menu">
      <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"><path d="M4 7h16M4 12h16M4 17h16"></path></svg>
    </button>
  </div>
</header>
