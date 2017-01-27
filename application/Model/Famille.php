<?php

namespace Mini\Model;

use Mini\Core\Model;

class Famille extends Model
{
    public static $table = "famille";

    public $id ;
    public $code ;
    public $designation ;


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
        $famille_table = self::$table;

        $query = self::$db->prepare("INSERT INTO $famille_table (code, designation) 
          VALUES (:code, :designation)");
        $parameters = array(
            ':code' => $this->code,
            ':designation' => $this->designation

        );
        return $query->execute($parameters);
    }

    public function update(){
        $famille_table = self::$table;

        $query = self::$db->prepare("UPDATE $famille_table SET designation = :designation, code = :code
          WHERE id = :id");
        $parameters = array(
            ':id' => $this->id,
            ':designation' => $this->designation,
            ':code' => $this->code
        );

        return $query->execute($parameters);
    }

    public function delete(){
        $famille_table = self::$table;

        $query = self::$db->prepare("DELETE FROM $famille_table WHERE id = :id");
        $parameters = array(
            ':id' => $this->id
        );

        return $query->execute($parameters);
    }
}
