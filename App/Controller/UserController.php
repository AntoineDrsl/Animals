<?php

namespace App\Controller;

use App\Entity\User;
use App\Model\ProductModel;
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
    }

    /**
     * Route: signup
     * 
     * @return void
     */
    public function signup()
    {
        $this->isNotConnected();

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

    /**
     * Route: login
     * 
     * @return void
     */
    public function login()
    {
        $this->isNotConnected();

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

    /**
     * Route: logout
     * 
     * @return void
     */
    public function logout()
    {
        $this->isConnected();

        session_destroy();
        return $this->redirectToRoute('login');
    }


    public function cart(){

        $this->isConnected();

        $productInCart = [];
        foreach($_SESSION['cart'] as $value){
            
            $product = $this->ProductModel->find($value);
            
            array_push($productInCart, $product);
            
        }

        return $this->render('user/cart', [
            'onPage' => "cart",
            'productInCart' => $productInCart,


        ]);

    }


    public function paiement(){

        $this->isConnected();

        if(!empty($_SESSION['cart'])){
            
            $productInCart = [];
            $montant = 0;
            foreach($_SESSION['cart'] as $value){
                
                $product = $this->ProductModel->find($value);
                
                $montant += $product->getPrice();
                

                array_push($productInCart, $product);
                
            }
    
            var_dump($montant);

            return $this->render('user/paiement', [
                'onPage' => ''
            ]);
        }

        $this->redirectToRoute('home');

    }
}