<?php 

namespace App\Routing;

use Core\Router\Router;
use App\Controller\MainController;

class Routing extends Router
{
    /**
     * Controller
     * 
     * @var MainController
     */
    public $mainController;

    /**
     * Constructeur
     */
    public function __construct()
    {
        $this->mainController = new MainController;
    }

    /**
     * Diriger le user sur la bonne route
     * 
     * @return void
     */
    public function route()
    {
        if($this->onPage('home') || $this->pageNotDefined()) {
            $this->mainController->home();
        }
    }

}