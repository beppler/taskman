<?php
declare(strict_types=1);

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT']);

session_start();

$urlMap = [
    '/' => 'home.php',
    '/login' => 'login.php',
    '/logout' => 'logout.php',
    '/tasks' => 'tasks.php',
    '/info' => 'info.php'
];


$pathInfo = $_SERVER['PATH_INFO'] ?? '/';
if (isset($urlMap[$pathInfo])) {
    require __DIR__ . '/../pages/' . $urlMap[$pathInfo];
} else {
    http_response_code(404);
    require __DIR__ . '/../pages/404.php';
    exit;
}
