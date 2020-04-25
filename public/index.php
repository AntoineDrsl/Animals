<?php

define('ROOT', dirname(__DIR__));

require ROOT . '/Core/App.php';
use Core\App;

App::load();

require ROOT . "/App/Router/Router.php";