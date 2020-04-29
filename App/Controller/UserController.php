<?php

namespace App\Controller;

use App\Model\UserModel;
use Core\Model\DbInterface;
use Core\Controller\Controller;
use Core\Manager\PasswordEncoderManager;

class UserController extends Controller
{
    /**
     * Constructeur
     */
    public function __construct()
    {
        $this->encoder = new PasswordEncoderManager();
        $this->interface = new DbInterface();
        $this->model = new UserModel();
    }

    /**
     * Route: signup
     * 
     * @return void
     */
    public function signup()
    {
        $errorMessage = null;

        if (!empty($_POST) && !empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['email']) && !empty($_POST['telephone']) && !empty($_POST['address']) && !empty($_POST['city']) && !empty($_POST['postalCode']) && !empty($_POST['password']) && !empty($_POST['repeatPassword'])) {

            if(!$this->model->findBy('email', $_POST['email'])) {
            
                if($_POST['password'] === $_POST['repeatPassword']) {

                    $_POST['password'] = $this->encoder->passwordEncode($_POST['password']);
                    array_pop($_POST);
                    if($_POST['email'] === "admin@gmail.com") {
                        $_POST['role'] = 'ROLE_ADMIN';
                    } else { 
                        $_POST['role'] = 'ROLE_USER';
                    }
                    $this->interface->save($_POST, 'user');
                    // return $this->redirectToRoute('home');

                } else {
                    $errorMessage = "Les mots de passe sont différents";
                }

            } else {
                $errorMessage = "Cette adresse email existe déjà";
            }

        } else {
            $errorMessage = "Veuillez remplir tous les champs";
        }

        return $this->render('user/signup', [
            'onPage' => '',
            'errorMessage' => $errorMessage
        ]);
    }
}