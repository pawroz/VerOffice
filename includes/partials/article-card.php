<?php
declare(strict_types=1);
/** @var array $article */
$__href = '/blog/' . rawurlencode($article['slug']);
?>
<div class="media-item">
  <a href="<?= h($__href) ?>" class="media-thumb" tabindex="-1" aria-hidden="true"><?= render_article_image($article) ?></a>
  <div>
    <div class="article-meta">
      <span class="article-meta-category"><?= h($article['category']) ?></span>
      <span class="article-meta-dot">·</span>
      <span class="article-meta-date"><?= h(format_date_pl($article['date'])) ?></span>
    </div>
    <h4 class="media-title"><a href="<?= h($__href) ?>" class="media-title-link"><?= h($article['title']) ?></a></h4>
    <p class="media-desc"><?= h($article['excerpt']) ?></p>
    <a href="<?= h($__href) ?>" class="link-arrow link-arrow--brown">Czytaj więcej →</a>
  </div>
</div>
