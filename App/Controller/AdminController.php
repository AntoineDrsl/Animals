<?php

namespace App\Controller;

use App\Model\AnimalModel;
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

        $animals = $this->animalModel->findAll();
        $products = $this->productModel->findAll();
        $reservations = $this->reservationModel->findAll();
        


        return $this->render('admin/admin', [
            'onPage' => '',
            'animals' => $animals,
            'products' => $products,
            'reservations' => $reservations,
        ]);
    }

}