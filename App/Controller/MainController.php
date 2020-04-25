<?php

namespace App\Controller;

use Core\Controller\Controller;

class MainController extends Controller
{
    public function home()
    {
        return $this->render('main/home');
    }
}