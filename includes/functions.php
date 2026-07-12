<?php
declare(strict_types=1);
require_once __DIR__ . '/config.php';

const PL_MONTHS = [
    1 => 'stycznia', 'lutego', 'marca', 'kwietnia', 'maja', 'czerwca',
    'lipca', 'sierpnia', 'września', 'października', 'listopada', 'grudnia',
];

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

function format_date_pl(string $isoDate): string
{
    [$year, $month, $day] = explode('-', $isoDate);
    return ((int) $day) . ' ' . PL_MONTHS[(int) $month] . ' ' . $year;
}
