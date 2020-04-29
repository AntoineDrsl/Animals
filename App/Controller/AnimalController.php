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
        
        return $this->render('presentation/animals', [
            'onPage' => 'animals',
            'animals' => $animals
        ]);
            
    }

    public function singleAnimal(){

        $animal = $this->AnimalModel->find($_GET['id']);

        return $this->render('presentation/singleAnimal', [
            'onPage' => 'singleAnimal',
            'animal' => $animal
        ]);
    }

    public function newAnimal(){
        if(!empty($_POST)){
            $this->dbInterface->save($_POST, 'animal');
            return $this->redirectToRoute('animals');
        }
        
        return $this->render('presentation/newAnimal',[
            'onPage' => 'newAnimal'
        ]);
    }
}