<?php

namespace Mini\Model;

use Mini\Core\Model;
use PDO;

class Repas extends Model
{
    public static $table = "repas";

    public $responsable_id;
    public $zone_id;
    public $aliment_id;
    public $quantite;
    public $date_repas;

    /**
     * Retourne une instance Utilisateur correspondant à responsable_id de l'objet courant
     * @return Utilisateur
     */
    public function getResponsable()
    {
        $utilisateur = new Utilisateur();
        return $utilisateur->getById($this->responsable_id);
    }

    /**
     * Retourne une instance Zone correspondant à zone_id de l'objet courant
     * @return Zone
     */
    public function getZone()
    {
        return (new Zone)->getById($this->zone_id);
    }

    /**
     * Retourne une instance Aliment correspondant à aliment_id de l'objet courant
     * @return Aliment
     */
    public function getAliment()
    {
        // Appelle la methdde getById de la classe Aliment
        return (new Aliment())->getById($this->aliment_id);
    }

    /**
     * Retourne une collection de Repas
     * @param null | string $date_debut_interval
     * @param null | string $date_fin_interval
     * @return array
     */
    public function getAll($date_debut_interval = null, $date_fin_interval = null)
    {
        $repas_table = self::$table;

        $query_str = "SELECT * FROM $repas_table";

        // Si on a $date_debut_interval ET $date_fin_interval non vide et non null
        if (!empty($date_debut_interval) and !empty($date_fin_interval)) {
            // On complete la requete sql avec un WHERE qui comprend les deux dates
            $query_str .= " WHERE date_repas >= $date_debut_interval AND date_repas <= $date_fin_interval";
        // Sinon Si on a que $date_debut_interval non vide et non null
        } elseif (!empty($date_debut_interval) and empty($date_fin_interval)) {
            // On complete la requete sql avec un WHERE qui comprend uniquement la date de fin
            $query_str .= " WHERE date_repas >= $date_debut_interval";
        // Sinon Si on a que $date_fin_interval non vide et non null
        } elseif (empty($date_debut_interval) and !empty($date_fin_interval)) {
            $query_str .= " WHERE date_repas <= $date_fin_interval";
        }

        // On complete la requete pour trier les repas par date
        $query_str .= " ORDER BY date_repas";

        $query = self::$db->prepare($query_str);

        $query->execute();

        // On récupère une collection d'objet grace à PDO::FTECH_OBJ de la classe Repas
        return $query->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    /**
     * Insere les valeurs de l'objet courant en base
     * @return bool
     */
    public function insert(){
        $repas_table = Repas::$table;

        $query = self::$db->prepare("INSERT INTO $repas_table (responsable_id, aliment_id, zone_id, date_repas, quantite) 
          VALUES (:responsable_id, :aliment_id, :zone_id, :date_repas, :quantite)");
        $parameters = array(
            ':responsable_id' => $this->responsable_id,
            ':aliment_id' => $this->aliment_id,
            ':zone_id' => $this->zone_id,
            ':date_repas' => $this->date_repas,
            ':quantite' => $this->quantite,
        );
        return $query->execute($parameters);
    }

    /**
     * Met à jour les valeurs de l'objet courant en base
     * @return bool
     */
    public function update(){
        $repas_table = self::$table;

        $query = self::$db->prepare("UPDATE $repas_table SET date_repas = :date_repas, quantite = :quantite
          WHERE responsable_id = :responsable_id, aliment_id = :aliment_id, zone_id = :zone_id");
        $parameters = array(
            ':responsable_id' => $this->responsable_id,
            ':aliment_id' => $this->aliment_id,
            ':zone_id' => $this->zone_id,
            ':date_repas' => $this->date_repas,
            ':quantite' => $this->quantite,
        );
        return $query->execute($parameters);
    }

    /**
     * Supprime l'objet courant en base
     * @return bool
     */
    public function delete(){
        $repas_table = self::$table;

        $query = self::$db->prepare("DELETE FROM $repas_table WHERE responsable_id = :responsable_id, aliment_id = :aliment_id, zone_id = :zone_id");
        $parameters = array(
            ':responsable_id' => $this->responsable_id,
            ':aliment_id' => $this->aliment_id,
            ':zone_id' => $this->zone_id
        );
        return $query->execute($parameters);
    }

}
