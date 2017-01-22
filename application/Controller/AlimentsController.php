<?php

namespace Mini\Controller;

class AlimentsController extends Controller
{

    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
     */
    public function index()
    {
        $utilisateur = $this->utilisateur;
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/_templates/menu.php';
        require APP . 'view/aliments/index.php';
        require APP . 'view/_templates/footer.php';
    }
}
