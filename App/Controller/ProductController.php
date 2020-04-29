<?php

namespace App\Controller;

use App\Model\ProductModel;
use Core\Controller\Controller;

class ProductController extends Controller{
    
    /**
    * Route: presentationProducts
    * 
    * @return void
    */
    public function presentationProducts(){
        
        $productModel = new ProductModel();
        $products = $productModel->findAll();
        
        return $this->render('presentation/products', [
            'onPage' => 'products',
            'products' => $products
        ]);
            
    }
            
}