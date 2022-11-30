<?php

require_once("List.php");

class ListGateway extends Liste {
    private $con; 
    public function __construct(Connection $con) { 
        $this->con = $con; 
    }

    public function insert(ListePublic $l): int { 
        $id=1; 
        $nom='firstList';
        $query='INSERT INTO ListePublic VALUES (:id,:nom)'; 
        $con->executeQuery($query, array(
            ':id' => array($l->id,PDO::PARAM_STR ),
            ':nom' => array($l->nom,PDO::PARAM_STR)));
        return $this->con->lastInsertId();
    }

    public function delete(ListePublic $l) : int {
        $nom = $l->nom;
        $id = $l->id;
        $query='DELETE FROM ListePublic WHERE id=:id AND nom=!nom';
        $con->executeQuery($query, array(
            ':id' => array($l->id,PDO::PARAM_STR ),
            ':nom' => array($l->nom,PDO::PARAM_STR)));
    }

}
