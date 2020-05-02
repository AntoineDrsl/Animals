<?php

namespace App\Controller;

use App\Model\AnimalModel;
use App\Model\ProductModel;
use App\Model\UserModel;
use Core\Controller\Controller;
use Core\Model\DbInterface;

class MainController extends Controller
{
    /**
     * Route: home
     * 
     * @return void
     */
    public function home()
    {
        $errorMessage = '';

        if(!empty($_POST)) {
            if(!empty($_POST['amount'])) {

                $this->isConnected();

                $userModel = new UserModel();
                $user = $userModel->findOneBy(["id" => $_SESSION["id"]]);
                $_POST['user_id'] = $user->getId();

                $date = new \DateTime();
                $_POST['datetime'] = $date->format('Y-m-d H:i:s');

                if(!empty($_POST['user_id']) && !empty($_POST['datetime'])) {
                    $dbInterface = new DbInterface();
                    $dbInterface->save($_POST, 'donation');
                    return $this->redirectToRoute('home');
                }

            } else {
                $errorMessage = "Veuillez remplir tous les champs";
            }
        }
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