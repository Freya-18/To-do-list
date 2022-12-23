<?php
class Utilisateur {
	protected $name;
	protected $id;
	protected $password;
	protected $IsAdmin;

	public function __construct ($name,  $password,  $IsAdmin=false, $id = -1){
		$this->id = $id;
		$this->name = $name;
		$this->password = $password;
		$this->IsAdmin = $IsAdmin;
	}

    public function get_id() : int {
        return $this->id;
    }

    public function get_name() : int {
        return $this->name;
    }

    public function get_password() : string {
        return $this->password;
    }
    public function get_IsAdmin() : bool {
    	return $this->IsAdmin;
    }

}
?>