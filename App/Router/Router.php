<?php 

use App\COntroller\MainController;

$mainController = new MainController();

if((isset($_GET['page']) && $_GET['page'] == 'home') || (!isset($_GET['page']))) {

    $mainController->home();

}