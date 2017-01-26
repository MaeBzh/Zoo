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

    public function getFamille(){
        $famille_table = self::$table;

        $query = self::$db->prepare("SELECT * FROM $famille_table WHERE id = :famille_id LIMIT 1");
        $parameters = array(
            ':famille_id' => $this->famille_id
        );
        $query->execute($parameters);
        return $query->fetchObject(Famille::class);
    }

    public function getEnumMenace()
    {
        $espece_table = self::$table;
        $menace_column = "espece_menacee";

        $query = self::$db->query("SHOW COLUMNS FROM $espece_table LIKE '$menace_column'");
        $result = $query->fetch();

        return explode("','",preg_replace("/(enum|set)\('(.+?)'\)/","\\2", $result->Type));
    }

    public function getAll(){
        $table = self::$table;

        $query = self::$db->prepare("SELECT * FROM $table");

        $query->execute();
        return $query->fetchAll(\PDO::FETCH_CLASS, self::class);
    }

    public function getById($id){
        $table = self::$table;

        $query = self::$db->prepare("SELECT * FROM $table WHERE id = :id LIMIT 1");
        $parameters = array(
            ':id' => $id
        );
        $query->execute($parameters);
        return $query->fetchObject(self::class);
    }



    public function insert(){
        $espece_table = self::$table;

        $query = self::$db->prepare("INSERT INTO $espece_table (nom_vulgaire, nom_scientifique, nbre_individus_vivants, espece_menacee, famille_id) 
          VALUES (:nom_vulgaire, :nom_scientifique, :nbre_individus_vivants, :espece_menacee, :famille_id)");
        $parameters = array(
            ':nom_vulgaire' => $this->nom_vulgaire,
            ':nom_scientifique' => $this->nom_scientifique,
            ':nbre_individus_vivants' => $this->nbre_individus_vivants,
            ':espece_menacee' => $this->espece_menacee,
            ':famille_id' => $this->famille_id,

        );

        return $query->execute($parameters);
    }
}
