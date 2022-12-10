<?php

class UtilisateurGateway extends UserController{
	private $con;           //tester avec PDO en typage de $con

	function __construct() {
		global $con;
        $this->con = $con; 
	}

	function FindByName(string $name) : array {
		$query = "SELECT * FROM Utilisateur WHERE name='$name'";
		$stmt = $this->con->executeQuery($query);
		$result = $this->con->getResults();
		$Utilisateur = array();
		foreach($result as $row){
			$a = new Utilisateur($row['id'], $row['name'], $row['email'], $row['password'], $row['IsAdmin']);
			array_push($Utilisateur, $a);
		}
		return $Utilisateur;
	}
    
	function FindAllUser() : array {
		$query = "SELECT * FROM Utilisateur;";
		$stmt = $this->con->executeQuery($query);
		$Utilisateur = array();
		foreach($result as $row){
			$a = new Utilisateur($row['id'], $row['name'], $row['email'], $row['password'], $row['IsAdmin']);
			array_push($Utilisateur, $a);
		}
		return $Utilisateur;
	}
}

?>

