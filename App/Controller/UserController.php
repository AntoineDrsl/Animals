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
        $this->isNotConnected();

        $errorMessage = '';

        if(!empty($_POST)) {

            if (!empty($_POST) && !empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['email']) && !empty($_POST['telephone']) && !empty($_POST['address']) && !empty($_POST['city']) && !empty($_POST['postalCode']) && !empty($_POST['password']) && !empty($_POST['repeatPassword'])) {

                if(!$this->model->findOneBy(['email' => $_POST['email']])) {
                
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

        }

        return $this->render('user/signup', [
            'onPage' => '',
            'errorMessage' => $errorMessage
        ]);
    }

    /**
     * Route: login
     * 
     * @return void
     */
    public function login()
    {
        $this->isNotConnected();

        $errorMessage = '';
        if(!empty($_POST)) {
            if(!empty($_POST['email']) && !empty($_POST['password'])) {

                $user = $this->model->findOneBy(['email' => $_POST['email']]);
                if($user) {

                    $isConnected = $this->encoder->passwordVerify($_POST['password'], $user->getPassword());
                    var_dump($isConnected);
                    if($isConnected) {
                        $user->setPassword('');
                        $_SESSION['user'] = $user;
                        return $this->redirectToRoute('home');
                    } else {
                        $errorMessage = "Mot de passe incorrect";
                    }

                } else {
                    $errorMessage = "Cette adresse email n'existe pas";
                }

            } else {
                $errorMessage = "Veuillez remplir tous les champs";
            }
        }

        return $this->render('user/login', [
            'onPage' => '',
            'errorMessage' => $errorMessage
        ]);
    }

    /**
     * Route: logout
     * 
     * @return void
     */
    public function logout()
    {
        $this->isConnected();

        session_destroy();
        return $this->redirectToRoute('login');
    }
}