<?php

set_error_handler(function (int $errno, string $errstr, ?string $errfile = null, ?int $errline) {
    $message = $errstr;

    if ($errfile !== null) {
        $message .= ' in ' . $errfile;
    }
    if ($errline !== null) {
        $message .= ' on line ' . $errline;
    }

    throw new RuntimeException($message);
});

set_exception_handler(function (Throwable $exception) {
    error_log('Uncaught ' . (string)$exception);

    header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal server error');

    $displayErrors = (bool)ini_get('display_errors');

    include(__DIR__ . '/pages/error.php');
});

defined('BASE_URL') or define('BASE_URL', (empty($_SERVER['HTTPS']) ? "http" : "https") . '://' . $_SERVER['HTTP_HOST'] . '/');

defined('APP_DIR') or define('APP_DIR', realpath(__DIR__));
defined('DATA_DIR') or define('DATA_DIR', realpath(__DIR__ . '/../data'));

session_start();
