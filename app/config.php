<?php

defined('BASE_URL') or define('BASE_URL', (empty($_SERVER['HTTPS']) ? "http" : "https") . '://' . $_SERVER['HTTP_HOST'] . '/');
defined('APP_DIR') or define('APP_DIR', realpath(__DIR__));

session_start();
