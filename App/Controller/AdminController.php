<?php

namespace App\Controller;

use App\Model\AnimalModel;
use App\Model\CommandModel;
use App\Model\ProductModel;
use App\Model\ReservationModel;
use Core\Controller\Controller;

class AdminController extends Controller{
    
    
    /**
     * Constructeur
     */
    public function __construct()
    {
        $this->animalModel = new AnimalModel();
        $this->productModel = new ProductModel();
        $this->reservationModel = new ReservationModel();
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


        return $this->render('admin/admin', [
            'onPage' => '',
            'animals' => $animals,
            'products' => $products,
            'reservationUser' => $reservationUser,
            'reservationAnimal' => $reservationsAnimal
        ]);
    }

}