<?php

namespace Mini\Controller;

use Mini\Model\Animal;
use Mini\Model\Espece;
use Mini\Model\Zone;


class AnimauxController extends Controller
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
        require APP . 'view/animaux/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function afficher_zones()
    {
        $utilisateur = $this->utilisateur;

        $zones = (new Zone())->getAll();

        require APP . 'view/_templates/header.php';
        require APP . 'view/_templates/modal.php';
        require APP . 'view/_templates/menu.php';
        require APP . 'view/animaux/afficher_zones.php';
        require APP . 'view/_templates/footer.php';
    }

    public function consulter_liste_animaux_par_zone()
    {
        $utilisateur = $this->utilisateur;

        $id = $_GET['id'];
        $zone = (new Zone())->getById($id);
        $animaux = (new Animal())->getByZone($id);


            // load views
            require APP . 'view/_templates/header.php';
            require APP . 'view/_templates/menu.php';
            require APP . 'view/animaux/consulter_liste_animaux_par_zone.php';
            require APP . 'view/_templates/footer.php';
    }

    public function afficher_especes()
    {
        $utilisateur = $this->utilisateur;

        $especes = (new Espece())->getAll();

        require APP . 'view/_templates/header.php';
        require APP . 'view/_templates/modal.php';
        require APP . 'view/_templates/menu.php';
        require APP . 'view/animaux/afficher_especes.php';
        require APP . 'view/_templates/footer.php';
    }

    public function consulter_liste_animaux_par_espece()
    {
        $utilisateur = $this->utilisateur;

        $id = $_GET['id'];
        $espece = (new Espece())->getById($id);
        $animaux = (new Animal())->getByEspece($id);


        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/_templates/menu.php';
        require APP . 'view/animaux/consulter_liste_animaux_par_espece.php';
        require APP . 'view/_templates/footer.php';
    }
}
