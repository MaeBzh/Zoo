<?php

namespace Mini\Model;

use Mini\Core\Model;

class Utilisateur extends Model
{
    public static $table = 'utilisateur';

    public static $type_enum_responsable = 'responsable_zone';
    public static $type_enum_secretaire = 'secretaire';
    public static $type_enum_magasinier = 'magasinier';

    public $id ;
    public $nom ;
    public $prenom ;
    public $identifiant ;
    public $password ;
    public $type ;

    /**
     * Retourne l'utilisateur correspondant à l'identifiant et au mot de passe sinon false
     *
     * @return Utilisateur | false
     */
    public function checkLogin(){
        $utilisateur_table = self::$table;

        $query = self::$db->prepare("SELECT * FROM $utilisateur_table WHERE identifiant = :identifiant AND password = :password LIMIT 1");
        $query->execute([
            ':identifiant' => $this->identifiant,
            ':password' => $this->password
        ]);
        return $query->fetchObject(self::class);
    }

    public function getResponsables()
    {
        $responsables_table = self::$table;

        $query = self::$db->prepare("SELECT * FROM $responsables_table WHERE type = :type");
        $parameters = [
          ":type" => self::$type_enum_responsable
        ];
        $query->execute($parameters);

        // On récupère une collection d'objet grace à PDO::FTECH_OBJ de la classe Zone
        return $query->fetchAll(\PDO::FETCH_CLASS, self::class);
    }

    public function getSecretaires()
    {
        $responsables_table = self::$table;

        $query = self::$db->prepare("SELECT * FROM $responsables_table WHERE type = :type");
        $parameters = [
            ":type" => self::$type_enum_secretaire
        ];
        $query->execute($parameters);

        // On récupère une collection d'objet grace à PDO::FTECH_OBJ de la classe Zone
        return $query->fetchAll(\PDO::FETCH_CLASS, self::class);
    }

    public function getMagasiniers()
    {
        $responsables_table = self::$table;

        $query = self::$db->prepare("SELECT * FROM $responsables_table WHERE type = :type");
        $parameters = [
            ":type" => self::$type_enum_magasinier
        ];
        $query->execute($parameters);

        // On récupère une collection d'objet grace à PDO::FTECH_OBJ de la classe Zone
        return $query->fetchAll(\PDO::FETCH_CLASS, self::class);
    }

    public function getById($id){
        $utilisateur_table = self::$table;

        $query = self::$db->prepare("SELECT * FROM $utilisateur_table WHERE id = :id LIMIT 1");
        $parameters = array(
            ':id' => $id
        );
        $query->execute($parameters);
        return $query->fetchObject(Utilisateur::class);
    }
}
