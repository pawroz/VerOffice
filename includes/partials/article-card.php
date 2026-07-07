<?php
/**
 * Karta artykułu/wpisu Insights używana na stronie głównej i w insights.php.
 * Wymaga zmiennej $article (rekord z data/articles.php) w zakresie wywołania.
 * @var array $article
 */
$__area = get_practice_area($article['practice_area']);
$__author = get_lawyer($article['author_id']);
$__date = strtotime($article['date']);
?>
<article
  class="article-card <?= h($__area['class']) ?>"
  data-practice="<?= h($article['practice_area']) ?>"
  data-type="<?= h($article['type']) ?>"
  data-date="<?= h($article['date']) ?>"
  data-year="<?= h(date('Y', $__date)) ?>"
  data-month="<?= h(date('n', $__date)) ?>"
>
  <div class="article-card-body">
    <a href="artykul.php?id=<?= h($article['id']) ?>" class="article-card-link">
      <p class="article-kicker">
        <?= h(mb_strtoupper(type_label($article['type']))) ?>
        <span class="tag <?= h($__area['class']) ?>"><?= h($__area['name']) ?></span>
      </p>
      <p class="article-date"><?= h(format_date_pl($article['date'])) ?></p>
      <h3><?= h($article['title']) ?></h3>
      <p class="article-excerpt"><?= h($article['excerpt']) ?></p>
    </a>
    <?php if ($__author): ?>
      <p class="article-author">Autor: <a href="prawnik.php?id=<?= h($__author['id']) ?>"><?= h($__author['name']) ?></a></p>
    <?php endif; ?>
  </div>
</article>
