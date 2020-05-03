<?php

namespace App\Controller;

use App\Entity\ShoppingCart;
use App\Entity\User;
use App\Model\ProductModel;
use App\Model\ShoppingCartModel;
use App\Model\UserModel;
use Core\Model\DbInterface;
use Core\Controller\Controller;
use Core\Manager\PasswordEncoderManager;

class UserController extends Controller
{
    /**
     * Constructeur
     */
    public function __construct()
    {
        $this->encoder = new PasswordEncoderManager();
        $this->interface = new DbInterface();
        $this->model = new UserModel();
        $this->user = new User();
        $this->ProductModel = new ProductModel();
        $this->ShoppingCartModel = new ShoppingCartModel();
    }

    /**
     * Route: signup
     * 
     * @return void
     */
    public function signup()
    {
        if(!$this->isNotConnected()) {
             return $this->redirectToRoute('home');
        } else {

            $errorMessage = '';

            if(!empty($_POST)) {

                if (!empty($_POST) && !empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['email']) && !empty($_POST['telephone']) && !empty($_POST['address']) && !empty($_POST['city']) && !empty($_POST['postalCode']) && !empty($_POST['password']) && !empty($_POST['repeatPassword'])) {

                    if(!$this->model->findOneBy(['email' => $_POST['email']])) {
                    
                        if($_POST['password'] === $_POST['repeatPassword']) {

                            $_POST['password'] = $this->encoder->passwordEncode($_POST['password']);
                            array_pop($_POST);
                            if($_POST['email'] === "admin@gmail.com") {
                                $_POST['role'] = 'ROLE_ADMIN';
                            } else { 
                                $_POST['role'] = 'ROLE_USER';
                            }
                            $this->interface->save($_POST, 'user');
                            return $this->redirectToRoute('home');

                        } else {
                            $errorMessage = "Les mots de passe sont différents";
                        }

                    } else {
                        $errorMessage = "Cette adresse email existe déjà";
                    }

                } else {
                    $errorMessage = "Veuillez remplir tous les champs";
                }

            }

            return $this->render('user/signup', [
                'onPage' => '',
                'errorMessage' => $errorMessage
            ]);
            
        }
    }

    /**
     * Route: login
     * 
     * @return void
     */
    public function login()
    {
        if(!$this->isNotConnected()) {
             return $this->redirectToRoute('home');
        } else {
            $errorMessage = '';
            if(!empty($_POST)) {
                if(!empty($_POST['email']) && !empty($_POST['password'])) {

                    $this->user = $this->model->findOneBy(['email' => $_POST['email']]);
                    
                    if($this->user) {
                        $isConnected = $this->encoder->passwordVerify($_POST['password'], $this->user->getPassword());

                        if($isConnected) {
                            $this->user->setPassword('');
                            $_SESSION['user'] = $this->user;
                            $_SESSION['id'] = $this->user->getId();
                            $_SESSION['role'] = $this->user->getRole();
                            $_SESSION['cart'] = [];
                            return $this->redirectToRoute('home');
                        } else {
                            $errorMessage = "Mot de passe incorrect";
                        }

                    } else {
                        $errorMessage = "Cette adresse email n'existe pas";
                    }

                } else {
                    $errorMessage = "Veuillez remplir tous les champs";
                }
            }
            
            return $this->render('user/login', [
                'onPage' => '',
                'errorMessage' => $errorMessage
            ]);
        }
    }

    /**
     * Route: logout
     * 
     * @return void
     */
    public function logout()
    {
        if(!$this->isConnected()) {
            return $this->redirectToRoute('home');
        } else {
            session_destroy();
            return $this->redirectToRoute('login');
        }
    }


    public function cart(){

        if(!$this->isConnected()) {
            return $this->redirectToRoute('login');
        } else {

            $totalAmount = 0;
            $productInCart = [];

            foreach($_SESSION['cart'] as $product){

                $quantity = $product['quantity'];
                $product = $this->ProductModel->find($product['id']);
                
                $productInCart[] = ['product' => $product, 'quantity' => $quantity];

                $totalAmount += $product->getPrice() * $quantity;
            }

            if(isset($_POST['submit'])) {
                $date = new \Datetime;

                $shoppingCart = [
                    'user_id' => $_SESSION['id'],
                    'total_amount' => $totalAmount,
                    'datetime' => $date->format('Y-m-d H:i:s'),
                    'state' => 2
                ];
                $this->interface->save($shoppingCart, 'shoppingcart');

                $createdShoppingCart = $this->ShoppingCartModel->findLast(1);
                foreach($productInCart as $product) {
                    $shoppingCartLine = [
                        'shoppingcart_id' => $createdShoppingCart[0]->getId(),
                        'product_id' => $product['product']->getId(),
                        'quantity' => $product['quantity'],
                        'amount' => $product['quantity'] * $product['product']->getPrice()
                    ];
                    $this->interface->save($shoppingCartLine, 'shoppingcart_line');
                }

                $_SESSION['cart'] = [];
                return $this->redirectToRoute('cart');
            }

            return $this->render('user/cart', [
                'onPage' => "cart",
                'productInCart' => $productInCart,
                'totalAmount' => $totalAmount
            ]);

        }

    }


    public function paiement(){

        if(!$this->isConnected()) {
            return $this->redirectToRoute('login');
        } else {

            if(!empty($_SESSION['cart'])){
                
                $productInCart = [];
                $montant = 0;
                foreach($_SESSION['cart'] as $value){
                    
                    $product = $this->ProductModel->find($value);
                    
                    $montant += $product->getPrice();
                    

                    array_push($productInCart, $product);
                    
                }
                if(!empty($_POST)){

                    $_POST['user_id'] = $_SESSION['id'];
                    
                    // $_POST['total_amount'] = $montant;
                    
                    $date = new \DateTime();
                    $_POST['datetime'] = $date->format('Y-m-d H:i:s');

                    $_POST['state'] = 2;
        
                    if(!empty($_POST['user_id']) && !empty($_POST['total_amount']) && !empty($_POST['datetime']) && !empty($_POST['state'])) {
                        $this->interface->save($_POST, 'shoppingcart');
                        $_SESSION['cart'] = [];
                        $this->redirectToRoute('confirm');
                    }


                }

                return $this->render('user/paiement', [
                    'onPage' => '',
                    'montant' => $montant
                ]);
            }

            $this->redirectToRoute('home');

        }

    }

    public function confirm(){
        return $this->render('user/confirm', [
            'onPage' => '',
        ]);
    }
}