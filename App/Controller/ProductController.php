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

        $products = $this->ProductModel->findAll();
        
        return $this->render('products/products', [
            'onPage' => 'products',
            'products' => $products
        ]);
            
    }


    public function singleProduct(){
        
        if(!empty($_GET['id'])){

            $errorMessage = '';
            
            if($this->isConnected()) {
                if(!empty($_POST)) {
                    if(!empty($_POST['quantity'])) {

                        $_SESSION['cart'][] = ['id' => $_GET['id'], 'quantity' => $_POST['quantity']];
                        return $this->redirectToRoute('products');

                    } else {
                        $errorMessage = "Veuillez entrer une quantité";
                    }
                }
            }

            $product = $this->ProductModel->find($_GET['id']);

            if(!$product){
                return $this->redirectToRoute('home');
            }

            return $this->render('products/singleProduct', [
                'onPage' => 'products',
                'product' => $product,
                'errorMessage' => $errorMessage
            ]);

        }

        $this->redirectToRoute('products');
    }
            

    public function newProduct(){

        if(!$this->isAdmin()){
            $this->redirectToRoute('home');
        } else {
            
            $error = '';

            if(!empty($_POST)){

                if(!empty($_POST['name']) && !empty($_POST['type_animal']) && !empty($_POST['stock']) && !empty($_POST['price']) && !empty($_FILES['image'])) {

                    $folder = ROOT. '/public/assets/upload/imgProduct/';
                    $result = $this->uploadFile($_FILES, $folder, 1000000, ['.png', '.gif', '.jpg', '.jpeg']);
                
                        if($result['status'] === 200) {
                            $_POST['image'] = $result['filename'];

                            $this->dbInterface->save($_POST, 'product');
                            return $this->redirectToRoute('products');
                        } else {
                            $error = $result['error'];
                        }

                } else {
                    $error = 'Veuillez remplir tous les champs';
                }

            }
        
            $this->render('products/newProduct', [
                'onPage' => 'products',
                'error' => $error
            ]);
        
        }

    }

    public function editProduct(){
        if(!$this->isAdmin()){
            $this->redirectToRoute('home');
        } else {

            if(!empty($_POST)){

                if(!empty($_GET['id'])){
                    $this->dbInterface->update('product', $_POST, $_GET['id']);
                    $this->redirectToRoute('products');
                }
            }

            if(!empty($_GET['id'])){
                $product = $this->ProductModel->find($_GET['id']);

                if(!$product){

                    return $this->redirectToRoute('home');
                    
                }

                return $this->render('products/editProduct', [
                    "product" => $product,
                    "onPage" => "products"
                ]);
            }

            $this->redirectToRoute('products');

        }
    }

    public function deleteProduct(){
        if(!$this->isAdmin()){
            $this->redirectToRoute('home');
        } else {
            if(!empty($_GET['id'])){
                $this->dbInterface->delete('product', $_GET['id']);
                return $this->redirectToRoute('products');
            }

            return $this->redirectToRoute('singleProducts', $_GET['id']);
        }
    }

}