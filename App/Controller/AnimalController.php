<?php

namespace App\Controller;

use App\Model\AnimalModel;
use Core\Controller\Controller;
use Core\Model\DbInterface;

class AnimalController extends Controller{
    
    /**
     * Constructeur
     */
    public function __construct()
    {
        $this->AnimalModel = new AnimalModel();
        $this->dbInterface = new DbInterface();
    }

    /**
    * Route: presentationAnimals
    * 
    * @return void
    */
    
    public function presentationAnimals(){
        
        $animals = $this->AnimalModel ->findAll();
        
        return $this->render('animals/animals', [
            'onPage' => 'animals',
            'animals' => $animals
        ]);
            
    }

    public function singleAnimal(){

        if(!empty($_GET["id"])){
            $animal = $this->AnimalModel->find($_GET['id']);
            
            return $this->render('animals/singleAnimal', [
                'onPage' => 'singleAnimal',
                'animal' => $animal
            ]);
        }

        return $this->redirectToRoute('animals');


    }

    public function newAnimal(){
        if(!empty($_POST)){
            $this->dbInterface->save($_POST, 'animal');
            return $this->redirectToRoute('animals');
        }
        
        return $this->render('animals/newAnimal',[
            'onPage' => 'newAnimal'
        ]);
    }

    public function deleteAnimal(){
        
        if(!empty($_GET["id"])){
            $this->dbInterface->delete('animal', $_GET['id']);
            return $this->redirectToRoute('animals');
        }

        return $this->redirectToRoute('animals');

    }

    public function editAnimal(){

        if(!empty($_POST)){

            if(!empty($_GET['id'])){

                $this->dbInterface->update('animal', $_POST, $_GET['id']);
                return $this->redirectToRoute('singleAnimal', $_GET['id']);

            }

        }
        if(!empty($_GET['id'])){
            $animal = $this->AnimalModel->find($_GET['id']);
            return $this->render('animals/editAnimal', [
                'animal' => $animal,
                'onPage' => 'editAnimal'
            ]);
        }

        return $this->redirectToRoute('animals');

    }
}