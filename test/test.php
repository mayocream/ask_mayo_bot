<?php

define('ROOT_PATH', dirname(__FILE__) . '/../');

// Dependencies
require ROOT_PATH . '/vendor/autoload.php';
// Config
$dotenv = new Dotenv\Dotenv(ROOT_PATH, 'config');
$dotenv->load();
// Functions
require ROOT_PATH . '/inc/functions.php';

$text = getenv('HELP_TEXT_TEMPLATE');
$render_text = render($text, [
	'\n' => "\n",
	'"' => ''
]);

echo $render_text;