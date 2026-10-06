<?php
declare(strict_types=1);
/** @var array $training */
[$__year, $__month, $__day] = explode('-', $training['date']);
?>
<div class="news-item">
  <div class="news-date">
    <div class="news-day"><?= h($__day) ?></div>
    <div class="news-month"><?= h(PL_MONTHS_SHORT[(int) $__month] . ' ' . $__year) ?></div>
  </div>
  <div>
    <div class="article-meta">
      <span class="article-meta-category"><?= h($training['format']) ?></span>
      <?php if (!empty($training['organizer'])): ?>
        <span class="article-meta-dot">·</span>
        <span class="article-meta-date"><?= h($training['organizer']) ?></span>
      <?php endif; ?>
    </div>
    <h4 class="news-title"><?= h($training['title']) ?></h4>
    <p class="media-desc"><?= h($training['description']) ?></p>
    <?php if (!empty($training['url'])): ?>
      <a href="<?= h($training['url']) ?>" class="link-arrow link-arrow--brown" target="_blank" rel="noopener">Zobacz wydarzenie →</a>
    <?php endif; ?>
  </div>
</div>
