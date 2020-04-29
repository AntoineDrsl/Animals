<?php

namespace App\Controller;

use App\Model\ProductModel;
use Core\Controller\Controller;
use Core\Model\DbInterface;

class ProductController extends Controller{  
    /**
     * Constructeur
     */
    public function __construct()
    {
        $this->ProductModel = new ProductModel();
        $this->dbInterface = new DbInterface();
    }
    
    /**
    * Route: presentationProducts
    * 
    * @return void
    */
    public function presentationProducts(){
        
        $productModel = new ProductModel();
        $products = $productModel->findAll();
        
        return $this->render('products/products', [
            'onPage' => 'products',
            'products' => $products
        ]);
            
    }


    public function singleProduct(){
        
        if(!empty($_GET['id'])){
            $product = $this->ProductModel->find($_GET['id']);
            return $this->render('products/singleProduct', [
                'onPage' => 'singleProduct',
                'product' => $product
            ]);
        }

        $this->redirectToRoute('products');
    }
            
}