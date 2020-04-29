<?php

namespace App\Controller;

use App\Model\AnimalModel;
use App\Model\ProductModel;
use Core\Controller\Controller;

class MainController extends Controller
{
    /**
     * Route: home
     * 
     * @return void
     */
    public function home()
    {
        $animalModel = new AnimalModel();
        $animals = $animalModel->findLast(5);
        
        $productModel = new ProductModel();
        $products = $productModel->findLast(5);

        return $this->render('main/home', [
            'onPage' => 'home',
            'animals' => $animals,
            'products' => $products
        ]);
    }
}