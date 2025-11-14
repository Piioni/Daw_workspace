<?php

// Define VIEW_DIR constant once
const VIEW_DIR = __DIR__.'/../src/view';

use JetBrains\PhpStorm\NoReturn;

#[NoReturn]
function dd($data): void
{
    echo '<pre>';
    var_dump($data);
    echo '</pre>';
    die();
}

function isUrl(string $url): bool
{
    return filter_var($url, FILTER_VALIDATE_URL) !== false;
}

function isCurrentUrl($url): bool
{
    return $_SERVER['REQUEST_URI'] === $url;
}