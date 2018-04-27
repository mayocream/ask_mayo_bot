<?php

function render($template, Array $array) {
	$text = $template;
	foreach ($array as $search => $replace) {
		$text = str_replace($search, $replace, $text);
	}
	return $text;
}