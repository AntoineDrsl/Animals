<?php

namespace App\Controller;

use App\Model\AnimalModel;
use Core\Controller\Controller;

class AnimalController extends Controller{
    
    
    /**
    * Route: presentationAnimals
    * 
    * @return void
    */
    
    public function presentationAnimals(){
        
        $animalModel = new AnimalModel();
        $animals = $animalModel->findAll();
        
        return $this->render('presentation/animals', [
            'onPage' => 'animals',
            'animals' => $animals
        ]);
            
    }

            
}