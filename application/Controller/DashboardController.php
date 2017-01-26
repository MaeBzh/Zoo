<?php

namespace Mini\Controller;

use Mini\libs\RandomColor;
use Mini\Model\Aliment;
use Mini\Model\Animal;
use Mini\Model\Espece;
use Mini\Model\Mange;
use Mini\Model\Zone;

class DashboardController extends Controller
{

    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
     */
    public function index()
    {
        $utilisateur = $this->utilisateur;

        // load javascripts
        $scripts_src = [
            "https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.bundle.min.js",
            URL . "js/dashboard/dashboard.js"
        ];
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/_templates/menu.php';
        require APP . 'view/dashboard/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function getStocksAliments()
    {
        $aliments = (new Aliment())->getAll();

        $labels = [];
        $data = [];
        $backgroundColor = [];
        $stock_limite = [];

        $colors_already_generated = [];

        foreach ($aliments as $aliment) {
            $color = $this->generateRandomColor($colors_already_generated);
            $colors_already_generated[] = $color;

            $labels[] = $aliment->designation;
            $data[] = $aliment->quantite_dispo;
            $stock_limite[] = 100;

            $backgroundColor[] = $color;
        }

        header('Content-type: application/json');
        echo json_encode([
            "labels" => $labels,
            "datasets" => [
                [
                    "type" => "line",
                    "label" => "Stock limite",
                    "fill" => false,
                    "lineTension" => 0.1,
                    "backgroundColor" => "#FF0000",
                    "borderColor" => "#FF0000",
                    "pointBorderWidth" => 0,
                    "pointHoverRadius" => 0,
                    "pointHoverBorderWidth" => 0,
                    "pointRadius" => 0,
                    "pointHitRadius" => 0,
                    "data" => $stock_limite,
                    "spanGaps" => false
                ],
                [
                    "backgroundColor" => $backgroundColor,
                    "data" => $data,
                ]
            ]
        ]);
    }

    public function getNbAnimauxZones()
    {
        $zones = (new Zone())->getAll();

        $labels = [];
        $data = [];
        $backgroundColor = [];

        $colors_already_generated = [];

        foreach ($zones as $zone) {
            $color = $this->generateRandomColor($colors_already_generated);
            $colors_already_generated[] = $color;

            $labels[] = $zone->designation;
            $data[] = count((new Animal())->getByZone($zone->id));
            $backgroundColor[] = $color;
        }

        header('Content-type: application/json');
        echo json_encode([
            "labels" => $labels,
            "datasets" => [
                [
                    "backgroundColor" => $backgroundColor,
                    "data" => $data,
                    "label" => $labels,
                ]
            ]
        ]);

    }

    public function getNbAnimauxEspeces()
    {
        $especes = (new Espece())->getAll();

        $labels = [];
        $data = [];
        $backgroundColor = [];

        $colors_already_generated = [];

        foreach ($especes as $espece) {
            $color = $this->generateRandomColor($colors_already_generated);
            $colors_already_generated[] = $color;

            $labels[] = $espece->nom_vulgaire;
            $data[] = count((new Animal())->getByEspece($espece->id));
            $backgroundColor[] = $color;
        }

        header('Content-type: application/json');
        echo json_encode([
            "labels" => $labels,
            "datasets" => [
                [
                    "backgroundColor" => $backgroundColor,
                    "data" => $data,
                ]
            ]
        ]);

    }

    public function getAlimentsMangesJour()
    {
        $animaux = (new Animal())->getAll();

        $labels = [];
        $data = [];
        $backgroundColor = [];

        $colors_already_generated = [];

        $aliments_animaux = [];

        foreach ($animaux as $animal){
            $animal->mange = (new Mange())->getByAnimal($animal->id);
            foreach ($animal->mange as $mange){
                $mange->aliment = $mange->getAliment();

                $designation = $mange->aliment->designation;
                $quantite_voulue = $mange->quantite;

                if(array_key_exists($designation, $aliments_animaux)){
                    $aliments_animaux[$designation]["quantite_voulue"] += $quantite_voulue;
                } else {
                    $tmp["designation"] = $designation;
                    $tmp["quantite_voulue"] = $quantite_voulue;

                    $aliments_animaux[$designation] = $tmp;
                }
            }
        }

        $aliments = (new Aliment())->getAll();

        foreach ($aliments as $aliment){
            if(!array_key_exists($aliment->designation, $aliments_animaux)){
                $tmp["designation"] = $aliment->designation;
                $tmp["quantite_voulue"] = 0;

                $aliments_zone[$designation] = $tmp;
            }
        }

        foreach ($aliments_animaux as $aliment) {
            $color = $this->generateRandomColor($colors_already_generated);
            $colors_already_generated[] = $color;

            $labels[] = $aliment["designation"];
            $data[] = $aliment["quantite_voulue"];
            $backgroundColor[] = $color;
        }

        header('Content-type: application/json');
        echo json_encode([
            "labels" => $labels,
            "datasets" => [
                [
                    "backgroundColor" => $backgroundColor,
                    "data" => $data,
                    "label" => $labels,
                ]
            ]
        ]);

    }

    public function getRepasForSixLastMonth()
    {
        $especes = (new Espece())->getAll();

        $labels = [];
        $data = [];
        $backgroundColor = [];

        $colors_already_generated = [];

        foreach ($especes as $espece) {
            $color = $this->generateRandomColor($colors_already_generated);
            $colors_already_generated[] = $color;

            $labels[] = $espece->nom_vulgaire;
            $data[] = count((new Animal())->getByEspece($espece->id));
            $backgroundColor[] = $color;
        }

        header('Content-type: application/json');
        echo json_encode([
            "labels" => $labels,
            "datasets" => [
                [
                    "backgroundColor" => $backgroundColor,
                    "data" => $data,
                ]
            ]
        ]);

    }

    private function generateRandomColor($colors = [])
    {
        $color = RandomColor::one();
        if(in_array($color, $colors)){
            return $this->generateRandomColor($colors);
        } else {
            return $color;
        }

    }
}