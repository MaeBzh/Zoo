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
        $famille_table = Famille::$table;

        $query = self::$db->prepare("SELECT * FROM $famille_table WHERE id = :famille_id LIMIT 1");
        $parameters = array(
            ':famille_id' => $this->famille_id
        );
        $query->execute($parameters);
        return $query->fetchObject(Famille::class);
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
}
