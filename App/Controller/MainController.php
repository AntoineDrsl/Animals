<?php

namespace App\Controller;

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
        return $this->render('main/home');
    }
}