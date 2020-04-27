<?php

namespace App\Controller;

use App\Model\AnimalModel;
use Core\Controller\Controller;

class MainController extends Controller
{
    /**
     * Route: home
     * 
     * @return void
     */
    public function home()
    {
        $model = new AnimalModel();
        $animals = $model->findAll();

        return $this->render('main/home', [
            'animals' => $animals
        ]);
    }
}