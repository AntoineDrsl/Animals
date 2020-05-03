<?php

namespace App\Controller;

use App\Model\AnimalModel;
use App\Model\ProductModel;
use App\Model\ReservationModel;
use App\Model\ShoppingCartLineModel;
use App\Model\ShoppingCartModel;
use App\Model\UserModel;
use Core\Controller\Controller;
use Core\Model\DbInterface;

class AdminController extends Controller{
    
    
    /**
     * Constructeur
     */
    public function __construct()
    {
        $this->animalModel = new AnimalModel();
        $this->productModel = new ProductModel();
        $this->userModel = new UserModel();
        $this->reservationModel = new ReservationModel();
        $this->shoppingCartModel = new ShoppingCartModel();
        $this->shoppingCartLineModel = new ShoppingCartLineModel();
        $this->interface = new DbInterface();
    }


    /**
     * Route: admin
     * 
     * @return void
     */
    public function admin()
    {

        if(!$this->isAdmin()){
            $this->redirectToRoute('home');
        }

        $animals = $this->animalModel->findAll();
        $products = $this->productModel->findAll();

        $reservationUser = $this->reservationModel->findByInnerJoin('user', [
            "reservation" => "user_id",
            "user" => "id"
        ]);
        $reservationsAnimal = $this->reservationModel->findByInnerJoin('animal', [
            "reservation" => "animal_id",
            "animal" => "id"
        ]);

        $shoppingCarts = $this->shoppingCartModel->findAll();

        $cartProducts = [];
        foreach($shoppingCarts as $shoppingCart) {
            $userId = $shoppingCart->getUser();
            $user = $this->userModel->find($userId);

            $shoppingCartLines = $this->shoppingCartLineModel->findBy(['shoppingcart_id' => $shoppingCart->getId()]);

            foreach($shoppingCartLines as $shoppingCartLine) {
                $quantity = $shoppingCartLine->getQuantity();
                $cartProductId = $shoppingCartLine->getProduct();
                $cartProduct = $this->productModel->find($cartProductId);
                $cartProducts[] = ['product' => $cartProduct, 'quantity' => $quantity];
            } 
            $commands[] = ['command' => $shoppingCart, 'user' => $user, 'products' => $cartProducts];
            $cartProducts = [];
        }

        return $this->render('admin/admin', [
            'onPage' => '',
            'animals' => $animals,
            'products' => $products,
            'reservationUser' => $reservationUser,
            'reservationAnimal' => $reservationsAnimal,
            'shoppingCarts' => $shoppingCarts,
            'commands' => $commands
        ]);
    }

    /**
     * Route: changeState
     * 
     * @return void
     */
    public function changeState() {
        if($this->isAdmin() && $this->isConnected()) {

            if($_GET['id']) {

                if(!empty($_POST) && !empty($_POST['state'])) {

                    $this->interface->update('shoppingcart', $_POST, $_GET['id']);
                    return $this->redirectToRoute('admin');

                }

            }

        }

        return $this->redirectToRoute('home');
    }

}