<?php

namespace Mini\Controller;

class Controller
{
   public $utilisateur = null;

    public function __construct()
    {
        if(!empty($_SESSION['utilisateur'])){
            $this->utilisateur = unserialize($_SESSION['utilisateur']);
        }
    }
}
