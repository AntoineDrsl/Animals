<?php

namespace App\Controller;

use App\Model\AnimalModel;
use App\Model\UserModel;
use Core\Controller\Controller;
use Core\Model\DbInterface;
use DateTime;

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
    * Route: animals
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

    /**
    * Route: singleAnimal
    * 
    * @return void
    */
    public function singleAnimal(){

        if(!empty($_GET["id"])){
            $animal = $this->AnimalModel->find($_GET['id']);

            return $this->render('animals/singleAnimal', [
                'onPage' => 'animals',
                'animal' => $animal
            ]);
        }

        return $this->redirectToRoute('animals');


    }

    /**
    * Route: newAnimal
    * 
    * @return void
    */
    public function newAnimal(){

        if(!$this->isAdmin()){
            $this->redirectToRoute('home');
        } else {
            $error = '';

            if(!empty($_POST)){
    
                if(!empty($_POST['name']) && !empty($_POST['type']) && !empty($_POST['race']) && !empty($_POST['size']) && !empty($_POST['weight']) && !empty($_POST['age']) && !empty($_FILES['image'])) {
    
                    $folder = ROOT. '/public/assets/upload/imgAnimal/';
                    $result = $this->uploadFile($_FILES, $folder, 1000000, ['.png', '.gif', '.jpg', '.jpeg']);
                
                        if($result['status'] === 200) {
                            $_POST['image'] = $result['filename'];
    
                            $this->dbInterface->save($_POST, 'animal');
                            return $this->redirectToRoute('animals');
                        } else {
                            $error = $result['error'];
                        }
    
                } else {
                    $error = 'Veuillez remplir tous les champs';
                }
    
            }
            
            return $this->render('animals/newAnimal',[
                'onPage' => 'animals',
                'error' => $error
            ]);
        }

    }

    /**
    * Route: deleteAnimal
    * 
    * @return void
    */
    public function deleteAnimal(){
        
        if(!$this->isAdmin()){

            $this->redirectToRoute('home');

        } else {

            if(!empty($_GET["id"])){
                $this->dbInterface->delete('animal', $_GET['id']);
                return $this->redirectToRoute('animals');
            }
    
            return $this->redirectToRoute('animals');
        }

    }

    /**
    * Route: editAnimal
    * 
    * @return void
    */
    public function editAnimal(){

        if(!$this->isAdmin()){

            $this->redirectToRoute('home');

        } else {
            if(!empty($_POST)){

                if(!empty($_GET['id'])){
    
                    $this->dbInterface->update('animal', $_POST, $_GET['id']);
                    return $this->redirectToRoute('singleAnimal', $_GET['id']);
    
                }
    
            }
            if(!empty($_GET['id'])){
                $animal = $this->AnimalModel->find($_GET['id']);
    
                if(!$animal){
    
                    return $this->redirectToRoute('home');
                    
                }
    
                return $this->render('animals/editAnimal', [
                    'animal' => $animal,
                    'onPage' => 'animals'
                ]);
            }
    
            return $this->redirectToRoute('animals');
        }

    }

}