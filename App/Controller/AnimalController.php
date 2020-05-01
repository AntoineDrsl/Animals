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

            if(!empty($_POST['name']) && !empty($_POST['type']) && !empty($_POST['race']) && !empty($_POST['size']) && !empty($_POST['weight']) && !empty($_POST['age']) && !empty($_FILES['image'])) {

                $folder = ROOT. '/public/assets/upload/imgAnimal/';
                $fileName = basename($_FILES['image']['name']);
                $size = 1000000;
                $fileSize = filesize($_FILES['image']['tmp_name']);
                $extensions = array('.png', '.gif', '.jpg', '.jpeg');
                $extension = strrchr($_FILES['image']['name'], '.');
                if(in_array($extension, $extensions)){

                    if($fileSize < $size){

                            if(move_uploaded_file($_FILES['image']['tmp_name'], $folder . $fileName )){
            
                                $_POST['image'] = $fileName;
            
                                $this->dbInterface->save($_POST, 'animal');
                                return $this->redirectToRoute('animals');
            
                            } else {
                                $error = "Echec de l'upload";
                            }

                    } else {
                        $error = 'Votre fichier ne peut pas dépasser ' . $size / 1000000 . 'Mo';
                    }
                    
                } else {
                    $error = 'Les extensions autorisées sont: ';
                    foreach($extensions as $value) {
                        $error .= $value . ', ';
                    };
                    $error = substr($error, 0, -2);
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
                'onPage' => 'animals'
            ]);
        }

        return $this->redirectToRoute('animals');

    }
}