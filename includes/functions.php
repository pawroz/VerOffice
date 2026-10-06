<?php
declare(strict_types=1);
require_once __DIR__ . '/config.php';

const PL_MONTHS = [
    1 => 'stycznia', 'lutego', 'marca', 'kwietnia', 'maja', 'czerwca',
    'lipca', 'sierpnia', 'września', 'października', 'listopada', 'grudnia',
];

const PL_MONTHS_SHORT = [
    1 => 'STY', 'LUT', 'MAR', 'KWI', 'MAJ', 'CZE', 'LIP', 'SIE', 'WRZ', 'PAŹ', 'LIS', 'GRU',
];

function get_trainings_offer(): array
{
    static $data = null;
    return $data ??= require __DIR__ . '/../data/trainings.php';
}

function get_trainings(?int $limit = null): array
{
    $events = get_trainings_offer()['events'];
    usort($events, fn($a, $b) => strcmp($b['date'], $a['date']));
    return $limit === null ? $events : array_slice($events, 0, $limit);
}

// Liczba akapitów "O mnie" widocznych na stronie głównej (reszta na /o-mnie).
const ABOUT_LEAD_COUNT = 2;

function get_about_paragraphs(?int $limit = null): array
{
    $paragraphs = require __DIR__ . '/../data/about.php';
    return $limit === null ? $paragraphs : array_slice($paragraphs, 0, $limit);
}

function get_articles(): array
{
    static $articles = null;
    if ($articles === null) {
        $articles = require __DIR__ . '/../data/articles.php';
        usort($articles, fn($a, $b) => strcmp($b['date'], $a['date']));
    }
    return $articles;
}

function get_article(string $slug): ?array
{
    foreach (get_articles() as $article) {
        if ($article['slug'] === $slug) {
            return $article;
        }
    }
    return null;
}

function render_article_image(array $article, bool $lazy = true): string
{
    if (empty($article['image'])) {
        return '<div class="img-placeholder" role="img" aria-label="Miniatura artykułu: ' . h($article['title']) . '">miniatura</div>';
    }
    $base = '/assets/img/' . $article['image'];
    $alt = $article['imageAlt'] ?? $article['title'];
    $loading = $lazy ? ' loading="lazy"' : ' fetchpriority="high"';
    return '<picture>'
        . '<source srcset="' . h($base . '.webp') . '" type="image/webp">'
        . '<img src="' . h($base . '.jpg') . '" width="1200" height="675" alt="' . h($alt) . '"' . $loading . ' decoding="async">'
        . '</picture>';
}

function format_date_pl(string $isoDate): string
{
    [$year, $month, $day] = explode('-', $isoDate);
    return ((int) $day) . ' ' . PL_MONTHS[(int) $month] . ' ' . $year;
}
