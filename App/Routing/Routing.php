<?php 

namespace App\Routing;

use App\Controller\AdminController;
use Core\Router\Router;
use App\Controller\MainController;
use App\Controller\UserController;
use App\Controller\AnimalController;
use App\Controller\ProductController;

class Routing extends Router
{
    /**
     * Constructeur
     */
    public function __construct()
    {
        $this->mainController = new MainController;
        $this->animalController = new AnimalController();
        $this->productController = new ProductController();
        $this->userController = new UserController();
        $this->adminController = new AdminController();
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
        
        // ANIMAL SECTION
        else if($this->onPage('animals')){
            $this->animalController->presentationAnimals();
        }

        else if($this->onPage('singleAnimal')){
            $this->animalController->singleAnimal();
        }

        else if($this->onPage('newAnimal')){
            $this->animalController->newAnimal();
        }

        else if($this->onPage('removeAnimal')){
            $this->animalController->deleteAnimal();
        }

        else if($this->onPage('editAnimal')){
            $this->animalController->editAnimal();
        }


        // PRODUCT SECTION
        else if($this->onPage('products')){
            $this->productController->presentationProducts();
        }

        else if($this->onPage('singleProduct')){
            $this->productController->singleProduct();
        }

        else if($this->onPage('newProduct')){
            $this->productController->newProduct();
        }

        else if($this->onPage('editProduct')){
            $this->productController->editProduct();
        }

        else if($this->onPage('deleteProduct')){
            $this->productController->deleteProduct();
        }


        else if($this->onPage('signup')){
            $this->userController->signup();
        }

        else if($this->onPage('login')){
            $this->userController->login();
        }

        else if($this->onPage('logout')){
            $this->userController->logout();
        }

        else if($this->onPage('admin')){
            $this->adminController->admin();
        }

    }

}