<?php

namespace Mini\Controller;

use Mini\Model\Aliment;

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
            URL."js/dashboard/dashboard.js"
        ];
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/_templates/menu.php';
        require APP . 'view/dashboard/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function getStocksAliment()
    {
        $aliments = (new Aliment())->getAll();

        $labels = [];
        $data = [];
        $backgroundColor = [];

        foreach ($aliments as $aliment) {
            $labels[] = $aliment->designation;
            $data[] = $aliment->quantite_dispo;
            $backgroundColor[] = sprintf('#%06X', mt_rand(0, 0xFFFFFF));
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
}
