<?php

class ListGateway extends Liste {
    private $con; 

    public function __construct() { 
        global $con;
        $this->con = $con; 
    }

    public function insert(Liste $l): int { 
        $query='INSERT INTO ListePublic VALUES (:id,:nom,:privee)'; 
        $con->executeQuery($query, array(
            ':id' => array($l->id,PDO::PARAM_STR ),
            ':nom' => array($l->nom,PDO::PARAM_STR),
            ':privee'=> array($l->priveePDO::PARAM_STR)));
        return $this->con->lastInsertId();
    }

    public function delete(Liste $l) : int {
        $query='DELETE FROM ListePublic WHERE id=:id AND nom=:nom';
        $con->executeQuery($query, array(
            ':id' => array($l->id,PDO::PARAM_STR ),
            ':nom' => array($l->nom,PDO::PARAM_STR)));
    }

    public function allListePublic() : array{
        $l->privee = 1;
        $ListePublic = array();
        $query='SELECT * FROM Liste WHERE privee=:privee';
        $con->executeQuery($query, array(
            ':privee'=> array($l->privee,PDO::PARAM_STR)));
        $results=$con-> getResults();    
        foreach( $results as $values){
            $ListePublic[] = $values;
        }
        return $ListePublic;
    }

    public function allListePrivee() : array{
        $l->privee = 0;
        $ListePrivee = array();
        $query='SELECT * FROM Liste WHERE privee=:privee';
        $con->executeQuery($query, array(
            ':privee'=> array($l->privee,PDO::PARAM_STR)));
        $results=$con-> getResults();    
        foreach( $results as $values){
            $ListePrivee[] = $values;
        }
        return $ListePrivee;
    }
}
