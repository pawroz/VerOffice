<?php
/** @var string $pageTitle */
/** @var string $activeNav */
$pageTitle = $pageTitle ?? 'Kancelaria [Nazwa]';
$activeNav = $activeNav ?? '';

$navItems = [
    'zespol' => ['href' => 'zespol.php', 'label' => 'Zespół'],
    'praktyki' => ['href' => 'index.php#praktyki', 'label' => 'Obszary praktyki'],
    'insights' => ['href' => 'insights.php', 'label' => 'Insights'],
    'o-nas' => ['href' => 'o-nas.php', 'label' => 'O nas'],
    'kariera' => ['href' => 'kariera.php', 'label' => 'Kariera'],
];
?>
<!DOCTYPE html>
<html lang="pl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= h($pageTitle) ?></title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,400;9..144,500;9..144,600&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="assets/style.css">
</head>
<body>

<header>
  <nav class="nav">
    <a href="index.php" class="brand">Kancelaria <span>[Nazwa]</span></a>
    <div class="nav-right">
      <ul class="nav-links">
        <?php foreach ($navItems as $key => $item): ?>
          <li><a href="<?= h($item['href']) ?>" class="<?= $activeNav === $key ? 'active' : '' ?>"><?= h($item['label']) ?></a></li>
        <?php endforeach; ?>
      </ul>
      <a href="index.php#asystent" class="btn btn-primary nav-cta">Skontaktuj się</a>
      <button class="nav-toggle" aria-label="Menu" aria-expanded="false">≡</button>
    </div>
  </nav>
</header>

<main>
