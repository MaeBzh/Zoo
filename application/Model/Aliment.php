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

    /**
     * Retourne une instance Aliment correspondant à responsable_id de l'objet courant
     * @return Utilisateur
     */
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
}
