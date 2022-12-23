<?php
class Utilisateur {
	protected string $name;
	protected int $id;
	protected string $email;
	protected string $password;
	protected bool $IsAdmin;

	public function __construct (string $name, string $email, string $password, bool $IsAdmin=false, int $id = -1){
		$this->id = $id;
		$this->name = $name;
		$this->email = $email;
		$this->password = $password;
		$this->IsAdmin = $IsAdmin;
	}

    public function get_id() : int {
        return $this->id;
    }

    public function get_name() : int {
        return $this->name;
    }

    public function get_email() : int {
        return $this->email;
    }

    public function get_password() : int {
        return $this->password;
    }
    public function get_IsAdmin() : bool {
    	return $this->IsAdmin;
    }

}
?>