<?php
/**
 * Karta prawnika używana na stronie głównej i w zespol.php.
 * Wymaga zmiennej $lawyer (rekord z data/lawyers.php) w zakresie wywołania.
 * @var array $lawyer
 */
$__office = get_office($lawyer['office']);
$__mainArea = get_practice_area($lawyer['practice_areas'][0]);
?>
<article
  class="lawyer-card <?= h($__mainArea['class']) ?>"
  data-practice="<?= h(implode(' ', $lawyer['practice_areas'])) ?>"
  data-office="<?= h($lawyer['office']) ?>"
  data-position="<?= h($lawyer['position']) ?>"
  data-name="<?= h(mb_strtolower(str_replace(['[', ']'], '', $lawyer['name']))) ?>"
  data-joined="<?= h((string) $lawyer['joined_year']) ?>"
>
  <a href="prawnik.php?id=<?= h($lawyer['id']) ?>" class="lawyer-card-link">
    <div class="avatar-initials"><?= h(initials($lawyer['name'])) ?></div>
    <h3><?= h($lawyer['name']) ?></h3>
    <p class="lawyer-meta"><?= h(position_label($lawyer['position'])) ?> · <?= h($__office['name']) ?></p>
    <div class="tag-row">
      <?php foreach ($lawyer['practice_areas'] as $slug): ?>
        <?php require __DIR__ . '/practice-tag.php'; ?>
      <?php endforeach; ?>
    </div>
    <span class="card-link-label">Zobacz profil →</span>
  </a>
</article>
