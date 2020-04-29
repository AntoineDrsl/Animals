<?php 

namespace App\Routing;

use Core\Router\Router;
use App\Controller\MainController;
use App\Controller\AnimalController;
use App\Controller\ProductController;

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
     * @var AnimalController
     */
    public $animalController;
    
    /**
     * Controller
     * 
     * @var ProductController
     */
    public $productController;

    /**
     * Constructeur
     */
    public function __construct()
    {
        $this->mainController = new MainController;
        $this->animalController = new AnimalController();
        $this->productController = new ProductController();
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
            $this->animalController->presentationAnimals();
        }

        else if($this->onPage('products') || $this->pageNotDefined()){
            $this->productController->presentationProducts();
        }
    }

}