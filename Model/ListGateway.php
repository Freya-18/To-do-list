<?php

class ListGateway extends Liste {
    private $con; 

    public function __construct() { 
        global $con;
        $this->con = $con; 
    }

    public function allListe($proprietaire) : array{
        $Liste = [];
        if($proprietaire==-1){
             // c'est une liste public
             $query='SELECT * FROM Liste WHERE proprietaire=:id AND privee=1';
             $this->con->executeQuery($query, array( 
                 ':id' => array($proprietaire, PDO::PARAM_INT)));
             $results=$this->con-> getResults();  
             foreach( $results as $values){
                 $Liste[] = new Liste($values['nom'], $values['id'], $values['proprietaire'], $values['privee']);
             }
             return $Liste;
        }else{
            // c'est une liste privee
            $query='SELECT * FROM Liste WHERE proprietaire=:id AND privee=0';
            $this->con->executeQuery($query, array(
                ':id' => array($proprietaire, PDO::PARAM_INT)));
            $results=$this->con-> getResults();    
            foreach( $results as $values){
                $Liste[] = new Liste($values['nom'], $values['id'], $values['proprietaire'], $values['privee']);
            }
            return $Liste;
        }     
    }

    // public function allListePublic() : array{
    //     $Liste = [];
    //     $query='SELECT * FROM Liste WHERE privee=1';
    //     $this->con->executeQuery($query);
    //     $results=$this->con-> getResults();    
    //     foreach( $results as $values){
    //         $Liste[] = new Liste($values['nom'], $values['id'], $values['proprietaire'], $values['privee']);
    //     }
    //     return $Liste;
    //     }      

    public function addList(Liste $liste){
        if($liste->get_proprietaire()==-1){
            // c'est une liste public
            $query = "INSERT INTO Liste(nom) VALUES (:nom);"; 
            $this->con->executeQuery($query, array(
                ':nom' => array($liste->get_nom(), PDO::PARAM_STR)));
        }else{
            $query = "INSERT INTO Liste(nom, proprietaire) VALUES (:nom, :proprietaire, :privee);"; 
            $this->con->executeQuery($query, array(
                ':nom' => array($liste->get_nom(), PDO::PARAM_STR),
                ':prorietaire' => array($liste->get_proprietaire(), PDO::PARAM_INT),
                ':privee' =>  array($liste->get_privee(), PDO::PARAM_INT)));
        }
   } 

   public function removeList($idListe){
    $query = "DELETE FROM Liste WHERE id=:id;"; 
    $this->con->executeQuery($query, array(
        ':id' => array($idListe, PDO::PARAM_INT)));
    }
}
