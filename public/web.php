<?php

define('ROOT_PATH', dirname(__FILE__) . '/../');

// Dependencies
require ROOT_PATH . '/vendor/autoload.php';
// Config
$dotenv = new Dotenv\Dotenv(ROOT_PATH, 'config');
$dotenv->load();
// Functions
require ROOT_PATH . '/inc/functions.php';
// Storage
\phpFastCache\CacheManager::setDefaultConfig([
    "path" => ROOT_PATH . '/storage',
]);
// App
$app = new \Bot\Core;

$app->run();

echo "Ask Mayo Anything v2";