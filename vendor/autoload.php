<?php 

require_once realpath(__DIR__.'/../src/Autoloader.php');


\JanKlod\Autoloader::instance([
	'json'  => realpath(__DIR__.'/../autoloader.json'), // full path file for autoloading
	'base_path' => dirname(__DIR__) // base_path it's document root for autoload classes
]);