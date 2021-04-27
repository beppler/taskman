<?php
declare(strict_types=1);

require_once(realpath(__DIR__ . '/../app/config.php'));

require_once(realpath(__DIR__ . '/../app/bootstrap.php'));

require_once(APP_DIR . '/routes.php');

$title = 'Task Manager';

$pathInfo = $_SERVER['PATH_INFO'] ?? '/';
if (isset($urlMap[$pathInfo])) {
    require(APP_DIR . $urlMap[$pathInfo]);
} else {
    http_response_code(404);
    require(APP_DIR . '/pages/404.php');
    exit;
}