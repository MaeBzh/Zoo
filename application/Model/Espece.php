<?php

namespace Mini\Model;

use Mini\Core\Model;

class Espece extends Model
{
    public static $table = "espece";

    public $id ;
    public $nom_scientifique ;
    public $nom_vulgaire ;
    public $nbre_individus_vivants ;
    public $espece_menacee ;
    public $famille_id ;

    /**
     * Retourne une instance Utilisateur correspondant à responsable_id de l'objet courant
     * @return Utilisateur
     */
    public function getFamille(){
        $famille_table = Famille::$table;

        $query = self::$db->prepare("SELECT * FROM :famille_table WHERE id = :famille_id LIMIT 1");
        $parameters = array(
            ':famille_table' => $famille_table,
            ':famille_id' => $this->famille_id
        );
        $query->execute($parameters);
        return $query->fetchObject(Famille::class);
    }
}
