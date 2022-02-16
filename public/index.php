<?php
declare(strict_types=1);

require_once(__DIR__ . '/../app/bootstrap.php');

require_once(APP_DIR . '/database.php');

require_once(APP_DIR . '/router.php');

$database = new Database(DATA_DIR);

$database->initialize();

$title = 'Task Manager';

$pathInfo = $_SERVER['PATH_INFO'] ?? '/';

Router->execute($pathInfo);
