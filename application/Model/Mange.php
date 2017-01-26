<?php

namespace Mini\Model;

use Mini\Core\Model;

class Mange extends Model
{
    public static $table = "mange";

    public $aliment_id ;
    public $animal_id ;
    public $quantite ;

    public function getAnimal(){
        return (new Animal())->getById($this->animal_id);
    }

    public function getAliment(){
        return (new Aliment())->getById($this->aliment_id);
    }

    public function getByAnimal($animal_id){
        $mange_table = self::$table;

        $query = self::$db->prepare("SELECT * FROM $mange_table WHERE animal_id = :animal_id");
        $parameters = array(
            ':animal_id' => $animal_id
        );
        $query->execute($parameters);
        return $query->fetchAll(\PDO::FETCH_CLASS, self::class);
    }

    public function getByAliment($aliment_id){
        $mange_table = self::$table;

        $query = self::$db->prepare("SELECT * FROM $mange_table WHERE aliment_id = :aliment_id");
        $parameters = array(
            ':aliment_id' => $aliment_id
        );
        $query->execute($parameters);
        return $query->fetchAll(\PDO::FETCH_CLASS, self::class);
    }

    public function getAll(){
        $mange_table = self::$table;

        $query = self::$db->prepare("SELECT * FROM $mange_table");

        $query->execute();
        return $query->fetchAll(\PDO::FETCH_CLASS, self::class);
    }
}
