<?php

define('ROOT', dirname(__DIR__));

require ROOT . '/Core/App.php';
use Core\App;
use App\Routing\Routing;

App::load();

$router = new Routing();
$router->route();