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
            

    public function newProduct(){


        $error = '';

        if(!empty($_POST)){

            $folder = ROOT. '/App/upload/imgProduct/';
            $fileName = basename($_FILES['image']['name']);
            $size = 100000;
            $fileSize = filesize($_FILES['image']['tmp_name']);
            $extensions = array('.png', '.gif', '.jpg', '.jpeg');
            $extension = strrchr($_FILES['image']['name'], '.');

            if(!in_array($extension, $extensions)){
                $error = 'Choisi une meilleure extension ta cru qquoi';
            }

            if($fileSize > $size){
                $error = 'moins gros, gros';
            }

            if($error === ''){
                if(move_uploaded_file($_FILES['image']['tmp_name'], $folder . $fileName )){

                    $_POST['image'] = $fileName;

                    $this->dbInterface->save($_POST, 'product');
                    return $this->redirectToRoute('products');

                }

                else{
                    $error = "Echec de l'upload fraté";
                }
            }
        }
    
        $this->render('products/newProduct', [
            'onPage' => 'newProduct',
            'error' => $error
        ]);

    }

    public function editProduct(){
        if(!empty($_POST)){

            if(!empty($_GET['id'])){
                $this->dbInterface->update('product', $_POST, $_GET['id']);
                $this->redirectToRoute('products');
            }
        }

        if(!empty($_GET['id'])){
            $product = $this->ProductModel->find($_GET['id']);
            return $this->render('products/editProduct', [
                "product" => $product,
                "onPage" => "editProduct"
            ]);
        }

        $this->redirectToRoute('products');
    }

    public function deleteProduct(){
        if(!empty($_GET['id'])){
            $this->dbInterface->delete('product', $_GET['id']);
            return $this->redirectToRoute('products');
        }

        return $this->redirectToRoute('singleProducts', $_GET['id']);
    }
}