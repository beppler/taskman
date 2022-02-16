<?php

class Router {

    private static $urlMap = [
        '/' => '/pages/home.php',
        '/login' => '/pages/login.php',
        '/logout' => '/pages/logout.php',
        '/tasks' => '/pages/tasks.php',
        '/info' => '/pages/info.php'
    ];

    public static function execute(string $pathInfo): void {
        $route = self::$urlMap[$pathInfo] ?? null;
        if (isset($route)) {
            require(APP_DIR . $route);
        } else {
            http_response_code(404);
            require(APP_DIR . '/pages/404.php');
        }
    }
}
