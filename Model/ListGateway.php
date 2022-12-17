<?php

class ListGateway extends Liste {
    private $con; 

    public function __construct() { 
        global $con;
        $this->con = $con; 
    }

    public function insert(Liste $l): int { 
        $query='INSERT INTO Liste VALUES (:id,:nom,:privee)'; 
        $con->executeQuery($query, array(
            ':id' => array($l->id,PDO::PARAM_INT ),
            ':nom' => array($l->nom,PDO::PARAM_STR),
            ':privee'=> array($l->priveePDO::PARAM_BOOL)));
        // return $this->con->lastInsertId();
    }

    public function delete(Liste $l) : int {
        $query='DELETE FROM ListePublic WHERE id=:id AND nom=:nom';
        $con->executeQuery($query, array(
            ':id' => array($l->id,PDO::PARAM_INT),
            ':nom' => array($l->nom,PDO::PARAM_STR)));
    }

    public function allListePublic() : array{
        $ListePublic = [];
        $query='SELECT * FROM Liste WHERE privee IS NOT NULL';
        $this->con->executeQuery($query);
        $results=$this->con-> getResults();    
        foreach( $results as $values){
            $ListePublic[] = new Liste($values['nom'], $values['id'], $values['privee']);
        }
        return $ListePublic;
    }

    public function allListePrivee() : array{
        $privee = 0;
        $ListePrivee = array();
        $query='SELECT * FROM Liste WHERE privee IS NULL';
        $con->executeQuery($query);
        $results=$con-> getResults();    
        foreach( $results as $values){
            $ListePrivee[] = new Liste($values['nom'], $values['id'], $values['privee']);
        }
        return $ListePrivee;
    }

    public function addList($liste){
        $query = "INSERT INTO Liste (nom) VALUES (:nom);"; 
        $this->con->executeQuery($query, array(
            ':nom' => array($liste>get_nom(), PDO::PARAM_STR)));
   } 

   public function removeList($liste){
    $query = "DELETE FROM Liste (id) VALUES (:id);"; 
    $this->con->executeQuery($query, array(
        ':id' => array($liste>get_id(), PDO::PARAM_STR)));
    } 
}
