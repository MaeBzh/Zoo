<?php

namespace Mini\Controller;

use Mini\Model\Utilisateur;
use Mini\Model\Zone;

class ZoneController extends Controller
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
        require APP . 'view/zone/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function consulter_zones()
    {
        $utilisateur = $this->utilisateur;

        $zones = (new Zone())->getAll();

        foreach ($zones as $zone) {
            $zone->responsable = $zone->getResponsable();
        }

        require APP . 'view/_templates/header.php';
        require APP . 'view/_templates/modal.php';
        require APP . 'view/_templates/menu.php';
        require APP . 'view/zone/consulter_zones.php';
        require APP . 'view/_templates/footer.php';
    }

    public function formulaire_ajout()
    {
        $utilisateur = $this->utilisateur;

        $responsables = (new Utilisateur())->getResponsables();


        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/_templates/menu.php';
        require APP . 'view/zone/formulaire_ajout.php';
        require APP . 'view/_templates/footer.php';
    }

    public function post_formulaire_ajout()
    {
        $utilisateur = $this->utilisateur;

        $designation = $_POST['designation'];
        $responsable_id = $_POST['responsable'];

        $zone = new Zone();
        $zone->designation = $designation;
        $zone->responsable_id = $responsable_id;

        $zone->insert();

        $location = URL . "zone";

        header("Location: $location");

    }

    public function post_formulaire_suppression(){

        $utilisateur = $this->utilisateur;

        $id = $_POST['id'];

        $zone = new Zone();
        $zone->id = $id;

        $zone->delete();

        $location = URL . "zone/consulter_zones";
        header("Location: $location");
    }

    public function formulaire_edition(){

        $utilisateur = $this->utilisateur;

        $id = $_GET['id'];

        $zone = (new Zone())->getById($id);
        $responsables = (new Utilisateur())->getResponsables();
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/_templates/menu.php';
        require APP . 'view/zone/formulaire_edition.php';
        require APP . 'view/_templates/footer.php';

    }

    public function post_formulaire_edition(){

        $utilisateur = $this->utilisateur;

        $id = $_POST['id'];
        $designation = $_POST['designation'];
        $responsable_id = $_POST['responsable'];

        $zone = new Zone();
        $zone->id = $id;
        $zone->designation = $designation;
        $zone->responsable_id = $responsable_id;

        $zone->update();

        $location = URL . "zone/consulter_zones";

        header("Location: $location");

    }
}
