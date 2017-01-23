<?php

namespace Mini\Controller;

use Mini\Model\Aliment;

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

    public function consulter_stocks()
    {
        $utilisateur = $this->utilisateur;

        $aliments = (new Aliment())->getAll();

        foreach ($aliments as $aliment){
            $aliment->substitut = $aliment->getSubstitution();
        }

        //TODO

        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/_templates/menu.php';
        require APP . 'view/aliments/consulter_stocks.php';
        require APP . 'view/_templates/footer.php';
    }
}
