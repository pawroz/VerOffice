<?php
declare(strict_types=1);

const POSITION_LABELS = [
    'partner' => 'Partner',
    'of-counsel' => 'Of Counsel',
    'associate' => 'Associate',
];

const TYPE_LABELS = [
    'article' => 'Artykuł',
    'alert' => 'Alert prawny',
    'event' => 'Wydarzenie',
    'podcast' => 'Podcast',
];

const PL_MONTHS = [
    1 => 'stycznia', 2 => 'lutego', 3 => 'marca', 4 => 'kwietnia',
    5 => 'maja', 6 => 'czerwca', 7 => 'lipca', 8 => 'sierpnia',
    9 => 'września', 10 => 'października', 11 => 'listopada', 12 => 'grudnia',
];

function get_practice_areas(): array
{
    static $areas = null;
    if ($areas === null) {
        $areas = require __DIR__ . '/../data/practice-areas.php';
    }
    return $areas;
}

function get_practice_area(string $slug): ?array
{
    return get_practice_areas()[$slug] ?? null;
}

function get_offices(): array
{
    static $offices = null;
    if ($offices === null) {
        $offices = require __DIR__ . '/../data/offices.php';
    }
    return $offices;
}

function get_office(string $slug): ?array
{
    return get_offices()[$slug] ?? null;
}

function get_lawyers(): array
{
    static $lawyers = null;
    if ($lawyers === null) {
        $lawyers = require __DIR__ . '/../data/lawyers.php';
    }
    return $lawyers;
}

function get_lawyer(string $id): ?array
{
    foreach (get_lawyers() as $lawyer) {
        if ($lawyer['id'] === $id) {
            return $lawyer;
        }
    }
    return null;
}

function get_articles(): array
{
    static $articles = null;
    if ($articles === null) {
        $articles = require __DIR__ . '/../data/articles.php';
        usort($articles, static fn ($a, $b) => strcmp($b['date'], $a['date']));
    }
    return $articles;
}

function get_article(string $id): ?array
{
    foreach (get_articles() as $article) {
        if ($article['id'] === $id) {
            return $article;
        }
    }
    return null;
}

function get_stats(): array
{
    static $stats = null;
    if ($stats === null) {
        $stats = require __DIR__ . '/../data/stats.php';
    }
    return $stats;
}

function upcoming_events(): array
{
    $today = date('Y-m-d H:i');
    $events = array_filter(
        get_articles(),
        static fn ($a) => $a['type'] === 'event' && $a['event_date'] !== null && $a['event_date'] >= $today
    );
    usort($events, static fn ($a, $b) => strcmp($a['event_date'], $b['event_date']));
    return $events;
}

function position_label(string $position): string
{
    return POSITION_LABELS[$position] ?? $position;
}

function type_label(string $type): string
{
    return TYPE_LABELS[$type] ?? $type;
}

function format_date_pl(string $isoDate): string
{
    $timestamp = strtotime($isoDate);
    if ($timestamp === false) {
        return $isoDate;
    }
    $day = (int) date('j', $timestamp);
    $month = PL_MONTHS[(int) date('n', $timestamp)];
    $year = date('Y', $timestamp);
    return "{$day} {$month} {$year}";
}

function initials(string $name): string
{
    $clean = trim(str_replace(['[', ']'], '', $name));
    $parts = preg_split('/\s+/', $clean);
    $letters = array_map(static fn ($p) => mb_strtoupper(mb_substr($p, 0, 1)), $parts);
    return implode('', array_slice($letters, 0, 2));
}

function h(?string $value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}
