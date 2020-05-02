<?php

define('ROOT', dirname(__DIR__));
require ROOT . '/Core/App.php';
use Core\App;
use App\Routing\Routing;

App::load();

// Test
use Core\Model\Model;
use App\Test\Test;

$test = new Test();
$model = new Model();
// Fin de test

$routing = new Routing();
$routing->route();