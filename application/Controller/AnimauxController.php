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

    public function formulaire_ajout()
    {
        $utilisateur = $this->utilisateur;

        $especes = (new Espece())->getAll();
        $zones = (new Zone())->getAll();

        $sexes = (new Animal())->getEnumSexe();
        $procedes_identification = (new Animal())->getEnumIdentification();

        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/_templates/menu.php';
        require APP . 'view/animaux/formulaire_ajout.php';
        require APP . 'view/_templates/footer.php';
    }

    public function post_formulaire_ajout()
    {
        $utilisateur = $this->utilisateur;

        $nom = $_POST['nom'];
        $sexe = $_POST['sexe'];
        $date_naissance = $_POST['date_naissance'];
        $date_arrivee = $_POST['date_arrivee'];
        $date_deces = $_POST['date_deces'];
        $procede_identification = $_POST['procede_identification'];
        $numero = $_POST['numero'];
        $espece = $_POST['espece'];
        $zone = $_POST['zone'];

        $animal = new Animal();
        $animal->nom = $nom;
        $animal->sexe = $sexe;
        $animal->date_naissance = (!empty($date_naissance))? $date_naissance : null;
        $animal->date_arrivee = (!empty($date_arrivee))? $date_arrivee : null;
        $animal->date_deces = (!empty($date_deces))? $date_deces : null;
        $animal->procede_identification = $procede_identification;
        $animal->numero = $numero;
        $animal->espece_id = $espece;
        $animal->zone_id = $zone;

        $animal->insert(); 

        $location = URL . "animaux";

        header("Location: $location");

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
