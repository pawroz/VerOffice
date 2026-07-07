<?php
require __DIR__ . '/includes/functions.php';

$article = get_article((string) ($_GET['id'] ?? ''));

if ($article === null) {
    http_response_code(404);
    $activeNav = 'insights';
    $pageTitle = 'Nie znaleziono — Kancelaria [Nazwa]';
    require __DIR__ . '/includes/header.php';
    ?>
    <section>
      <div class="wrap static-page">
        <h1>Nie znaleziono wpisu</h1>
        <p>Artykuł, którego szukasz, nie istnieje lub został przeniesiony.</p>
        <a href="insights.php" class="btn btn-ghost">Wróć do Insights →</a>
      </div>
    </section>
    <?php
    require __DIR__ . '/includes/footer.php';
    exit;
}

$activeNav = 'insights';
$pageTitle = $article['title'] . ' — Kancelaria [Nazwa]';
$author = get_lawyer($article['author_id']);
$area = get_practice_area($article['practice_area']);

$related = array_values(array_filter(
    get_articles(),
    static fn ($a) => $a['id'] !== $article['id'] && $a['practice_area'] === $article['practice_area']
));
$related = array_slice($related, 0, 3);

require __DIR__ . '/includes/header.php';
?>

<section>
  <div class="wrap article-page">
    <div class="article-header reveal">
      <p class="article-kicker">
        <?= h(mb_strtoupper(type_label($article['type']))) ?>
        <?php $slug = $article['practice_area']; require __DIR__ . '/includes/partials/practice-tag.php'; ?>
      </p>
      <p class="article-date"><?= h(format_date_pl($article['date'])) ?></p>
      <h1><?= h($article['title']) ?></h1>
      <?php if ($author): ?>
        <p class="article-author">Autor: <a href="prawnik.php?id=<?= h($author['id']) ?>"><?= h($author['name']) ?></a></p>
      <?php endif; ?>
    </div>

    <div class="article-body reveal">
      <?php foreach (explode("\n\n", $article['body']) as $paragraph): ?>
        <p><?= h($paragraph) ?></p>
      <?php endforeach; ?>
    </div>

    <?php if (!empty($related)): ?>
      <div class="related-articles reveal">
        <h2>Powiązane wpisy</h2>
        <div class="related-grid">
          <?php foreach ($related as $article): ?>
            <?php require __DIR__ . '/includes/partials/article-card.php'; ?>
          <?php endforeach; ?>
        </div>
      </div>
    <?php endif; ?>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
