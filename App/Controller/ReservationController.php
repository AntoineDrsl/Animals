<?php

namespace App\Controller;

use App\Model\AnimalModel;
use App\Model\UserModel;
use Core\Controller\Controller;
use Core\Model\DbInterface;
use DateTime;

class ReservationController extends Controller{
    
    /**
     * Constructeur
     */
    public function __construct()
    {
        $this->AnimalModel = new AnimalModel();
        $this->dbInterface = new DbInterface();
        $this->UserModel = new UserModel();
    }

    /**
    * Route: bookAnimal
    * 
    * @return void
    */


    public function bookAnimal(){
        
        $errorMessage = '';

        if(!empty($_POST)){

            if(!empty($_POST['rendezvous'])) {

                if(!empty($_GET['id'])){

                    $user = $this->UserModel->findOneBy(["id" => $_SESSION["id"]]);

                    $_POST['user_id'] = $user->getId();

                    $date = new DateTime();
                    $_POST['datetime'] = $date->format('Y-m-d H:i:s');

                    $_POST['animal_id'] = $_GET['id'];
        
                    if(!empty($_POST['user_id']) && !empty($_POST['animal_id']) && !empty($_POST['rendezvous']) && !empty($_POST['datetime'])){
                        $this->dbInterface->save($_POST, 'reservation');
                        return $this->redirectToRoute('singleAnimal', $_GET['id']);
                    }
                } else {
                    $errorMessage = "Un problème est survenu. Veuillez réessayer";
                }

            } else {
                $errorMessage = "Veuillez remplir tous les champs";
            }
           
        }

        if(!empty($_GET['id'])){
            $animal = $this->AnimalModel->find($_GET['id']);
            
            if(!$animal){

                return $this->redirectToRoute('home');
                
            }
            
            return $this->render('animals/bookAnimal', [
                'animal' => $animal,
                'onPage' => 'bookAnimal'
            ]);
        }

        return $this->redirectToRoute('home');
        

    }


}