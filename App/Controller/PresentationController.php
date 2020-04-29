<?php

namespace App\Controller;

use App\Model\AnimalModel;
use App\Model\ProductModel;
use Core\Controller\Controller;

class PresentationController extends Controller{
    
    
    /**
    * Route: presentationAnimals
    * 
    * @return void
    */
    
    public function presentationAnimals(){
        
        $animalModel = new AnimalModel();
        $animals = $animalModel->findAll();
        
        return $this->render('presentation/animals', [
            'animals' => $animals
            ]);
            
        }
        
        /**
        * Route: presentationProducts
        * 
        * @return void
        */
        public function presentationProducts(){
            
            $productModel = new ProductModel();
            $products = $productModel->findAll();
            
            return $this->render('presentation/products', [
                'products' => $products
                ]);
                
            }
            
        }