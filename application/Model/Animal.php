<?php

namespace Mini\Model;

use Mini\Core\Model;

class Animal extends Model
{
    public static $table = "animal";

    public static $sexe_enum = ['Mâle', 'Femelle'];
    public static $procede_identification_enum = ['Puce', 'Tatouage'];

    public $id ;
    public $nom;
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

    public function getEnumSexe()
    {
        $animal_table = Animal::$table;
        $sexe_column = "sexe";

        $query = self::$db->query("SHOW COLUMNS FROM $animal_table LIKE '$sexe_column'");
        $result = $query->fetch();

        return explode("','",preg_replace("/(enum|set)\('(.+?)'\)/","\\2", $result->Type));
    }


    public function getEnumIdentification()
    {
        $animal_table = Animal::$table;
        $identification_column = "procede_identification";

        $query = self::$db->query("SHOW COLUMNS FROM $animal_table LIKE '$identification_column'");
        $result = $query->fetch();

        return explode("','",preg_replace("/(enum|set)\('(.+?)'\)/","\\2", $result->Type));
    }

    public function insert(){
        $animal_table = self::$table;

        $query = self::$db->prepare("INSERT INTO $animal_table (nom, commentaire, sexe, date_naissance, date_arrivee, date_deces, procede_identification, numero, zone_id, espece_id) 
          VALUES (:nom, :commentaire, :sexe, :date_naissance, :date_arrivee, :date_deces, :procede_identification, :numero, :zone_id, :espece_id)");
        $parameters = array(
            ':nom' => $this->nom,
            ':sexe' => $this->sexe,
            ':commentaire' => $this->commentaire,
            ':date_naissance' => $this->date_naissance,
            ':date_arrivee' => $this->date_arrivee,
            ':date_deces' => $this->date_deces,
            ':procede_identification' => $this->procede_identification,
            ':numero' => $this->numero,
            ':zone_id' => $this->zone_id,
            ':espece_id' => $this->espece_id,
        );
        return $query->execute($parameters);
    }

    public function update(){
        $animal_table = self::$table;

        $query = self::$db->prepare("UPDATE $animal_table SET nom = :nom, commentaire = :commentaire, date_arrivee = :date_arrivee, date_naissance = :date_naissance, numero = :numero, procede_identification = :procede_identification, date_deces = :date_deces, zone_id = :zone_id, espece_id = :espece_id, sexe = :sexe
          WHERE id = :id");
        $parameters = array(
            ':id' => $this->id,
            ':nom' => $this->nom,
            ':sexe' => $this->sexe,
            ':commentaire' => $this->commentaire,
            ':date_naissance' => $this->date_naissance,
            ':date_arrivee' => $this->date_arrivee,
            ':date_deces' => $this->date_deces,
            ':procede_identification' => $this->procede_identification,
            ':numero' => $this->numero,
            ':zone_id' => $this->zone_id,
            ':espece_id' => $this->espece_id,
        );
        return $query->execute($parameters);
    }

}
