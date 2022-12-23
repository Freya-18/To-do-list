<?php
class ModelUser {
	public function isUser() : bool{
    	if(isset($_SESSION['id']) && isset($_SESSION['role']) && ($_SESSION['role'] == 'user' || $_SESSION['role'] == 'admin')) {
    		return true;
    	}
    	else {
    		return false;
    	}
    }
	
    public function logIn($mdp, $loginform) {
    	global $dir, $views;
    	$utilisateur_gw= new UtilisateurGateway();
		$mdp = filter_var($mdp, FILTER_SANITIZE_STRING);
        $loginform = filter_var($loginform, FILTER_SANITIZE_STRING);
        if (!isset($loginform)||$loginform=="") {
            $dataVueEreur[] ="pas de login'";
            throw new Exception('pas de login');
        }
        if (!isset($mdp)||$mdp=="") {
            $dataVueEreur[] ="pas de mot de passe ";
            throw new Exception('pas de mot de passe');
        }       
        $user = $utilisateur_gw->findByName($loginform);
		if ($user !=NULL){
			$mdpDataBase=$user->get_password();
            if(password_verify(1234, $mdpDataBase)) {
				$_SESSION['role'] = 'user';
    			$_SESSION['id'] = $user->get_id();	
				return true;
    		}
			else{			
				$errorMessageConnexion = 'Le mot de passe est incorrecte';	
            } 	
		}else{
            $errorMessageConnexion = "L'utilisateur n''existe pas";
            require($dir.$views['connexion']);
			exit();
        }   
		return false;       
    }

    public function logout() {
    	session_unset();
    	session_destroy();
    	$_SESSION = array();
    }
    public function deleteAccount() {
    	$listGateway = new ListGateway();
    	$userGateway = new UtilisateurGateway();
    	$user = $userGateway->findByName(filter_var($_SESSION['name'], FILTER_SANITIZE_STRING));
  		$listGateway->removeAllList($user);
  		$userGateway->deleteUser($user);
    }
    public function register(String $name, String $password) : bool{
    	global $dir, $view;
    	$userGateway = new Usergateway();
    	$name = filter_var($name, FILTER_SANITIZE_STRING);
    	$password = filter_var($password, FILTER_SANITIZE_STRING);
    	if($userGateway->getByName($name) == NULL) {
    		$newUser = new Utilisateur(password_hash($password, PASSWORD_DEFAULT));
    		$user_gw->addUser($newUser);
    		$_SESSION['name'] = $newUser->getName();
    		$_SESSION['role'] = 'user';
    		return true;
    	}
    	else {
    		$messageErrorRegistration = 'Le nom est déjà utilisé';
    		require($dir.$vues['Accueil']); 
    	}
    }
}

?> 
