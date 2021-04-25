<?php

$urlMap = [
    '/' => '/home.php',
    '/login' => '/login.php',
    '/logout' => '/logout.php',
    '/tasks' => '/tasks.php',
    '/info' => '/info.php'
];


$pathInfo = $_SERVER['PATH_INFO'] ?? '/';
if (isset($urlMap[$pathInfo])) {
    require PAGES_DIR . $urlMap[$pathInfo];
} else {
    http_response_code(404);
    require PAGES_DIR . '/404.php';
    exit;
}
