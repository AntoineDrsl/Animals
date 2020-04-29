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

        $error = '';

        if(!empty($_POST)){

            $folder = ROOT. '/App/upload/imgAnimal/';
            $fileName = basename($_FILES['image']['name']);
            $size = 100000;
            $fileSize = filesize($_FILES['image']['tmp_name']);
            $extensions = array('.png', '.gif', '.jpg', '.jpeg');
            $extension = strrchr($_FILES['image']['name'], '.');

            var_dump($_POST);

            if(!in_array($extension, $extensions)){
                $error = 'Choisi une meilleure extension ta cru qquoi';
            }

            if($fileSize > $size){
                $error = 'moins gros, gros';
            }

            if($error === ''){
                if(move_uploaded_file($_FILES['image']['tmp_name'], $folder . $fileName )){

                    $_POST['image'] = $folder . $fileName;

                    $this->dbInterface->save($_POST, 'animal');
                    return $this->redirectToRoute('animals');

                }

                else{
                    $error = "Echec de l'upload fraté";
                }
            }
            
        }
        
        return $this->render('animals/newAnimal',[
            'onPage' => 'newAnimal',
            'error' => $error
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