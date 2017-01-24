<?php

namespace Mini\Model;

use Mini\Core\Model;

class Animal extends Model
{
    public static $table = "animal";

    public static $sexe_enum = ['Mâle', 'Femelle'];
    public static $procede_identification_enum = ['Puce', 'Tatouage'];

    public $id ;
    public $commentaire ;
    public $date_arrivee ;
    public $date_naissance ;
    public $sexe ;
    public $numero ;
    public $procede_identification ;
    public $date_deces ;
    public $zone_id ;
    public $espece_id ;



    /**
     * Retourne une instance Utilisateur correspondant à responsable_id de l'objet courant
     * @return Utilisateur
     */
    public function getZone(){
        return (new Zone())->getById($this->zone_id);
    }

    /**
     * Retourne une instance Animal correspondant à animal_id de l'objet courant
     * @return Animal
     */
    public function getEspece(){
        return (new Espece())->getById($this->espece_id);
    }

    public function getAll(){
        $animal_table = Animal::$table;

        $query = self::$db->prepare("SELECT * FROM $animal_table");
        $query->execute();
        return $query->fetchAll(\PDO::FETCH_CLASS, Aliment::class);
    }


    public function getById($id){
        $animal_table = Animal::$table;

        $query = self::$db->prepare("SELECT * FROM $animal_table WHERE id = :id");
        $parameters = array(
            ":id" => $id
        );
        $query->execute($parameters);
        return $query->fetchObject(Aliment::class);
    }

    public function getByZone($zone_id){
        $animal_table = Animal::$table;

        $query = self::$db->prepare("SELECT * FROM $animal_table  WHERE zone_id = :id");
        $parameters = array(
            ":id" => $zone_id
        );
        $query->execute($parameters);
        return $query->fetchAll(\PDO::FETCH_CLASS, Animal::class);

    }

    public function getByEspece($espece_id){
        $animal_table = Animal::$table;

        $query = self::$db->prepare("SELECT * FROM $animal_table  WHERE espece_id = :id");
        $parameters = array(
            ":id" => $espece_id
        );
        $query->execute($parameters);
        return $query->fetchAll(\PDO::FETCH_CLASS, Animal::class);

    }
}
