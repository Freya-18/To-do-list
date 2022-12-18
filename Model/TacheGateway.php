<?php

class TacheGateway extends Tache {
    private $con; 
    public function __construct() { 
        global $con;
        $this->con = $con; 
    }
  
  public function allTache($id): array{
        $Tache= array();
        $query='SELECT * FROM Tache WHERE liste=:liste';
        $this->con->executeQuery($query, array(
            ':liste'=> array($id ,PDO::PARAM_INT)));
        $results=$this->con-> getResults();    
        foreach( $results as $values){
            $Tache[] = new Tache($values['nom'], $values['liste'], $values['id']);
        }
        return $Tache;
    }
    
    public function addTache($tache) {
        $query = "INSERT INTO Tache (nom, liste) VALUES(:nom, :liste);";
        $this->con->executeQuery($query, array(
            ':nom' => array($tache->get_nom(), PDO::PARAM_STR), 
            ':liste' => array($tache->get_liste(), PDO::PARAM_STR)));
    }

    public function removeTask($idTache) {
        $query = "DELETE FROM Tache WHERE id=:id;";
        $this->con->executeQuery($query, array(
            ':id' => array($idTache, PDO::PARAM_INT)));
    }
}