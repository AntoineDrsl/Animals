<?php 

namespace App\Routing;

use Core\Router\Router;
use App\Controller\MainController;
use App\Controller\PresentationController;

class Routing extends Router
{
    /**
     * Controller
     * 
     * @var MainController
     */
    public $mainController;


    /**
     * Controller
     * 
     * @var PresentationController
     */
    public $presentationController;

    /**
     * Constructeur
     */
    public function __construct()
    {
        $this->mainController = new MainController;
        $this->presentationController = new PresentationController;
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
        
        else if($this->onPage('animals') || $this->pageNotDefined()){
            $this->presentationController->presentationAnimals();
        }
    }

}