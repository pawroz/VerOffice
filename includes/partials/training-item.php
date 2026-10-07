<?php
declare(strict_types=1);
/**
 * @var array $training
 * @var bool  $trainingFull  true na /szkolenia — pokazuje 'details' zamiast 'description'
 */
$__parts = explode('-', $training['date']);
$__year = $__parts[0];
$__month = isset($__parts[1]) ? PL_MONTHS_SHORT[(int) $__parts[1]] : null;
$__day = $__parts[2] ?? null;
$__paragraphs = (!empty($trainingFull) && !empty($training['details']))
    ? $training['details']
    : [$training['description']];
?>
<div class="news-item">
  <div class="news-date">
    <?php if ($__day !== null): ?>
      <div class="news-day"><?= h($__day) ?></div>
      <div class="news-month"><?= h($__month . ' ' . $__year) ?></div>
    <?php elseif ($__month !== null): ?>
      <div class="news-day news-day--sm"><?= h($__month) ?></div>
      <div class="news-month"><?= h($__year) ?></div>
    <?php else: ?>
      <div class="news-day news-day--sm"><?= h($__year) ?></div>
    <?php endif; ?>
  </div>
  <div>
    <div class="article-meta">
      <span class="article-meta-category"><?= h($training['format']) ?></span>
    </div>
    <?php if (!empty($training['organizer'])): ?>
      <p class="training-organizer"><?= h($training['organizer']) ?></p>
    <?php endif; ?>
    <h4 class="news-title"><?= h($training['title']) ?></h4>
    <?php if (!empty($trainingFull) && !empty($training['image'])): ?>
      <picture class="training-photo">
        <source srcset="/assets/img/<?= h($training['image']) ?>.webp" type="image/webp">
        <img src="/assets/img/<?= h($training['image']) ?>.jpg" width="1200" height="800" alt="<?= h($training['imageAlt']) ?>" loading="lazy" decoding="async">
      </picture>
    <?php endif; ?>
    <?php foreach ($__paragraphs as $__paragraph): ?>
      <p class="media-desc"><?= h($__paragraph) ?></p>
    <?php endforeach; ?>
    <?php if (!empty($training['url'])): ?>
      <a href="<?= h($training['url']) ?>" class="link-arrow link-arrow--brown" target="_blank" rel="noopener">Zobacz wydarzenie →</a>
    <?php endif; ?>
  </div>
</div>
