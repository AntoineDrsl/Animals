<?php 

namespace App\Routing;

use Core\Router\Router;
use App\Controller\MainController;

class Routing extends Router
{
    public $mainController;

    public function __construct()
    {
        $this->mainController = new MainController;
    }

    public function route()
    {
        if($this->onPage('home') || $this->pageNotDefined()) {
            $this->mainController->home();
        }
    }

}