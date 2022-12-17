<?php
class ModelUser {
	public function isUser() : bool{
    	if(isset($_SESSION['name']) && isset($_SESSION['role']) && ($_SESSION['role'] == 'user' || $_SESSION['role'] == 'admin')) {
    		$role = filter_var($_SESSION['role'], FILTER_SANITIZE_STRING);
    		return true;
    	}
    	else {
    		return false;
    	}
    }
	
    public function logIn( String $password, String $name) {
    	global $dir, $view;
    	$userGateway = new Usergateway();
    	$password = filter_var($password, FILTER_SANITIZE_STRING);
    	$name = filter_var($name, FILTER_SANITIZE_STRING);
    	if($userGateway->getByName($name) == NULL){
    		if(!password_verify($password, $userGateway->getByName($name)->getPassword())) {
    			$messageerrorConnection = 'Le mot de passe est incorrecte';
    			require($dir.$vues['account']);
    		}
    		else{
    			$messageerrorConnection = 'Le nom est incorrecte';
    			require($dir.$vues['account']);
    		}
    		return false;
    	}
    	else {
    		if($userGateway->getByName($name)->getIsAdmin()) {
    			$modelAdmin = new ModelAdmin();
    			$modelAdmin->logIn($userGateway->getByName($name));

    		} else {
    			$_SESSION['role'] = 'user';
    			$_SESSION['name'] = userGateway()->getByName($name)->getName();
    		}
    		return true;
    	}

    }
    public function logout() {
    	session_unset();
    	session_destroy();
    	$_SESSION = array();
    }
    public function deleteAccount() {
    	$listGateway = new ListGateway();
    	$userGateway = new Usergateway();
    	$user = $userGateway->getByName(filter_var($_SESSION['name'], FILTER_SANITIZE_STRING));
  		$listGateway->removeAllList($user);
  		$userGateway->deleteUser($user);

    }
    public function register(String $name, String $password) : bool{
    	global $dir, $view;
    	$userGateway = new Usergateway();
    	$name = filter_var($name, FILTER_SANITIZE_STRING);
    	$password = filter_var($password, FILTER_SANITIZE_STRING);
    	if($userGateway->getByName($name) == NULL) {
    		$newUser = new Utilisateur(hashPaswword($password, PASSWORD_DEFAULT));
    		$user_gw->addUser($newUser);
    		$_SESSION['name'] = $newUser->getName();
    		$_SESSION['role'] = 'user';
    		return true;
    	}
    	else {
    		$messageErrorRegistration = 'Le nom est déjà utilisé';
    		require($dir.$vues['account']); 
    	}

    }


}

?> 
