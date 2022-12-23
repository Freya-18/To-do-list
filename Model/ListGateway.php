<?php

class ListGateway extends Liste {
    private $con; 

    public function __construct() { 
        global $con;
        $this->con = $con; 
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
        $this->con->executeQuery($query);
        $results=$this->con-> getResults();    
        foreach( $results as $values){
            $ListePrivee[] = new Liste($values['nom'], $values['id'], $values['privee']);
        }
        return $ListePrivee;
    }

    public function addList(Liste $liste){
        $query = "INSERT INTO Liste(nom) VALUES (:nom);"; 
        $this->con->executeQuery($query, array(
            ':nom' => array($liste->get_nom(), PDO::PARAM_STR)));
   } 

   public function removeList($liste){
    $query = "DELETE FROM Liste WHERE id=:id;"; 
    $this->con->executeQuery($query, array(
        ':id' => array($liste, PDO::PARAM_INT)));
    }
}
