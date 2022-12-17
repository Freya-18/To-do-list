<?php

class UtilisateurGateway extends UserController{
	private $con;           

	function __construct() {
		global $con;
        $this->con = $con; 
	}
	
	public function adduser($user){
		$query = "INSERT INTO User (name, email, password) VALUES (:name, :email, :password)";
		$this->con->executeQuery($query, array(
			':name' => array($user->get_name(), PDO::PARAM_STR), 
			':email' => array($user->get_email(), PDO::PARAM_STR), 
			':password' => array($user->get_password(), PDO::PARAM_STR)));

	}

	public function deleteUser($user) {
    	$query = "DELETE FROM User WHERE id = :id;"; 
        $this->con->executeQuery($query, array(':id' => array($user->getId(), PDO::PARAM_INT)));
    }

    public function findAllUser() {
        $query = "SELECT * FROM User"; 
        $this->con->executeQuery($query);
        foreach ($this->con->getResults() as $row) {
            $users[] = new Utilisateur($row['name'], $row['email'], $row['password'], $row['IsAdmin']);
        }
        return $users;
    }

    public function findById($id) {
        $query = "SELECT * FROM User WHERE id=:id"; 
        $this->con->executeQuery($query, array(
			':id' => array($id, PDO::PARAM_INT)));
        $user = $this->con->getResults();
        if(count($user) != 0) {
            return new Utilisateur($user[0]['name'], $user[0]['email'], $user[0]['password'], $user[0]['IsAdmin']);
        }
        return NULL;
    }

    public function findByName($name) {
        $query = 'SELECT * FROM User WHERE name =:name'; 
        $this->con->executeQuery($query, array(
			':name' => array($name, PDO::PARAM_STR) ));
        $user = $this->con->getResults();
        if(count($user) != 0) {
            return new Utilisateur($user[0]['name'], $user[0]['email'], $user[0]['password'], $user[0]['IsAdmin']);
        }
        return NULL;      
    }
}

?>
