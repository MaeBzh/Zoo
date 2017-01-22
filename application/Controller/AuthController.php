<?php

namespace Mini\Controller;

use Mini\Model\Utilisateur;

class AuthController extends Controller
{

    public function login()
    {

        if(!empty($this->utilisateur)){
        $location = URL."dashboard";
        header("Location: $location");
    }
        if(!empty($_GET['erreur'])){
            $erreur = true;
        } else{
            $erreur = false;
        }

        if(!empty($_GET['identifiant'])){
            $identifiant = $_GET['identifiant'];
        } else {
            $identifiant = "";
        }

        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/_templates/menu.php';
        require APP . 'view/auth/login.php';
        require APP . 'view/_templates/footer.php';
    }

    public function post_login(){
        $identifiant = $_POST['identifiant'];
        $password = $_POST['password'];

        $auth = new Utilisateur();
        $auth->identifiant = $identifiant;
        $auth->password = $password;
        $utilisateur = $auth->checkLogin();

        if($utilisateur != false){
            $_SESSION['utilisateur'] = serialize($utilisateur);
            $location = URL."dashboard";
        } else {
            $location = URL."auth/login?identifiant=$identifiant&erreur=true";
        }

        header("Location: $location");
    }


    public function post_logout()
    {
        unset($_SESSION['utilisateur']);
        session_destroy();

        $location = URL."auth/login";
        header("Location: $location");
    }
}
