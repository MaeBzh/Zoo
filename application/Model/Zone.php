<?php

namespace Mini\Model;

use Mini\Core\Model;

class Zone extends Model
{
    public static $table = "zone";

    public $id ;
    public $designation ;
    public $responsable_id ;

    /**
     * Retourne une instance Utilisateur correspondant à responsable_id de l'objet courant
     * @return Utilisateur
     */
    public function getResponsable()
    {
        return (new Utilisateur())->getById($this->responsable_id);
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
        $zone_table = self::$table;

        $query = self::$db->prepare("INSERT INTO $zone_table (responsable_id, designation) 
          VALUES (:responsable_id, :designation)");
        $parameters = array(
            ':responsable_id' => $this->responsable_id,
            ':designation' => $this->designation

        );
        return $query->execute($parameters);
    }

    public function update(){
        $zone_table = self::$table;

        $query = self::$db->prepare("UPDATE $zone_table SET responsable_id = :responsable_id, designation = :designation
          WHERE id = :id");
        $parameters = array(
            ':responsable_id' => $this->responsable_id,
            ':designation' => $this->designation,
            ':id' => $this->id
        );
        return $query->execute($parameters);
    }

    public function delete(){
        $zone_table = self::$table;

        $query = self::$db->prepare("DELETE FROM $zone_table WHERE id = :id");
        $parameters = array(
            ':id' => $this->id
        );

        return $query->execute($parameters);
    }
}
