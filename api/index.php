<?php

require(dirname(__DIR__) . "/vendor/autoload.php");
require(dirname(__DIR__) . "/config/config.php");

$url = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

Router::rotear($url, $method, $config);