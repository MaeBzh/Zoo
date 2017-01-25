<?php

namespace Mini\Controller;

use Mini\Model\Aliment;
use Mini\Model\Repas;
use Mini\Model\Zone;

class RepasController extends Controller
{
    /**
     * Affiche les actions possible
     */
    public function index()
    {
        $utilisateur = $this->utilisateur;
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/_templates/menu.php';
        require APP . 'view/repas/index.php';
        require APP . 'view/_templates/footer.php';
    }

    /**
     * Affiche dans un tableau tous les repas
     */
    public function consulter_fiches()
    {
        $utilisateur = $this->utilisateur;

//        if(!empty($_GET['date_debut_interval'])) {
//            $date_debut_interval = $_GET['date_debut_interval'];
//        } else {
//            $date_debut_interval = null;
//        }
//
//        if(!empty($_GET['date_fin_interval'])) {
//            $date_fin_interval = $_GET['date_fin_interval'];
//        } else {
//            $date_fin_interval = null;
//        }


//        $liste_repas = (new Repas())->getAll($date_debut_interval, $date_fin_interval);
               $liste_repas = (new Repas())->getAll();

        // Pour chaque repas recupérer on va completer l'objet avec des objet de chaque clé etrangère
        // Il sera plus lisible de lire le nom et prenom du responsable que son responsable_id
        // Chaque modification de $repas impacte directement la collection $liste_repas
        foreach ($liste_repas as $repas){
            $repas->responsable = $repas->getResponsable();
            $repas->aliment = $repas->getAliment();
            $repas->zone = $repas->getZone();
        }

        /* à partir d'ici nous avons ceci :
        Array $liste_repas = [
            [0] => Repas {
                $responsable_id : int,
                $zone_id : int,
                $aliment_id : int,
                $quantite : int,
                $date_repas : string,
                $responsable : Responsable { $id, ... },
                $aliment : Aliment [ $id, ... },
                $zone : Zone { $id, ... }
            },
            [1] => Repas { ... },
            [...]
        ]
        */

        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/_templates/menu.php';
        require APP . 'view/repas/consulter_fiches.php';
        require APP . 'view/_templates/footer.php';
    }

    /**
     * Affiche le formulaire pour ajouter un repas
     */
    public function formulaire_ajout()
    {
        $utilisateur = $this->utilisateur;

        $zones = (new Zone())->getAll();
        $aliments = (new Aliment())->getAll();

        // load javascripts
        $scripts_src = [
            URL."js/repas/formulaire_ajout.js"
        ];
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/_templates/menu.php';
        require APP . 'view/repas/formulaire_ajout.php';
        require APP . 'view/_templates/footer.php';
    }

    /**
     * Traite les informations envoyées depuis le formulaire d'ajout
     */
    public function post_formulaire_ajout()
    {
        $utilisateur = $this->utilisateur;

        $aliment_id = $_POST['aliment'];
        $quantite = $_POST['quantite'];
        $zone_id = $_POST['zone'];
        $date_repas = date("Y-m-d H:i:s");
        $responsable_id = $utilisateur->id;

        for ($i=0; $i<count($aliment_id); $i++) {
            $repas = new Repas();
            $repas->quantite = $quantite[$i];
            $repas->aliment_id = $aliment_id[$i];
            $repas->date_repas = $date_repas;
            $repas->zone_id = $zone_id;
            $repas->responsable_id = $responsable_id;

            $repas->insert();
        }

        $location = URL."repas";

        header("Location: $location");

    }

    /**
     * Affiche le formulaire pour editer un repas
     */
    public function formulaire_edition()
    {
        $utilisateur = $this->utilisateur;

        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/_templates/menu.php';
        require APP . 'view/repas/index.php';
        require APP . 'view/_templates/footer.php';
    }

    /**
     * Traite les informations envoyées depuis le formulaire d'edition
     */
    public function post_formulaire_edition()
    {
        $utilisateur = $this->utilisateur;
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/_templates/menu.php';
        require APP . 'view/repas/index.php';
        require APP . 'view/_templates/footer.php';
    }

    /**
     * Affiche le formulaire pour supprimer un repas
     */
    public function formulaire_suppression(){

    }

    /**
     * Traite les informations envoyées depuis le formulaire de suppression
     */
    public function post_formulaire_suppression(){

    }
}
