<?php

namespace App\Controller;

use Core\Controller\Controller;

class AdminController extends Controller{

    /**
     * Route: admin
     * 
     * @return void
     */
    public function admin()
    {
        return $this->render('admin/admin', [
            'onPage' => ''
        ]);
    }

}