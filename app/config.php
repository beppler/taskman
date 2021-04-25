<?php
defined('BASE_URL') or define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT']);

defined('APP_DIR') or define('APP_DIR', realpath(__DIR__));

defined('PAGES_DIR') or define('PAGES_DIR', realpath(APP_DIR . '/pages'));

session_start();
