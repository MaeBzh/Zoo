<?php

namespace Mini\Model;

use Mini\Core\Model;

class Aliment extends Model
{
    public static $table = "aliment";

    public $id ;
    public $designation ;
    public $substitution ;
    public $quantite_dispo ;


    public function getSubstitution(){
        return (new Aliment())->getById($this->substitution);
    }

    public function getAll(){
        $aliment_table = Aliment::$table;

        $query = self::$db->prepare("SELECT * FROM $aliment_table");

        $query->execute();
        return $query->fetchAll(\PDO::FETCH_CLASS, Aliment::class);
    }

    public function getById($id){
        $aliment_table = self::$table;

        $query = self::$db->prepare("SELECT * FROM $aliment_table WHERE id = :id LIMIT 1");
        $parameters = array(
            ':id' => $id
        );
        $query->execute($parameters);
        return $query->fetchObject(Aliment::class);
    }

    public function update(){
        $aliment_table = self::$table;

        $query = self::$db->prepare("UPDATE $aliment_table SET quantite_dispo = :quantite_dispo, designation = :designation, substitution = :substitution WHERE id = :id");
        $parameters = array(
            ':id' => $this->id,
            ':quantite_dispo' => $this->quantite_dispo,
            ':designation' => $this->designation,
            ':substitution' => $this->substitution
        );
        return $query->execute($parameters);
    }
}
