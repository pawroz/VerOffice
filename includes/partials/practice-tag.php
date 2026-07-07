<?php
/**
 * Renderuje tag obszaru praktyki z kolorem zgodnym z data/practice-areas.php.
 * Wymaga zmiennej $slug w zakresie wywołania.
 * @var string $slug
 */
$__area = get_practice_area($slug);
if ($__area === null) {
    return;
}
?>
<span class="tag <?= h($__area['class']) ?>"><?= h($__area['name']) ?></span>
