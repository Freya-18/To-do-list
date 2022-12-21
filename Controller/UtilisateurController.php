<?php
class UtilisateurController {

	private FrontController $fc;

	public function __construct($fc, $action) {
		global $dir,$views, $errors; 

        $this->fc = $fc;

		$dVueErreur = array();

		$userModel = new ModelUser();

		if(!$userModel->isUser()){
		}

		try {		
			$action = $_REQUEST['action'];
			
			switch($action) {
				case NULL:
					echo "Pas d'action User";
					break;
				case 'logOut' :
					$this->logOut();
					break;
				case 'logIn' :
					$this->logIn();
					break;
				case 'deleteAccount' :
					$this->this->deleteAccount();
					break;
				default:
					throw new Exception("La page n'éxiste pas !!");
					break;
			}
		}
		catch(PDOException $e) {
			$dVueErreur[] =	"Erreur base de données !";
			require ($dir.$views['error']);
		}
		catch(Exception $e2) {
			$dVueErreur[] =	"Erreur générale !";
			require ($dir.$views['error']);
		}
	}
	public function logOut() {
		$modelUser =  new ModelUser();
		$modelUser->logOut();
		$this->fc->initialisation();
	}

	public function logIn() {
		$modelUser =  new ModelUser();
		if ($modelUser->logIn( $_REQUEST['password'], $_REQUEST['login'])){
			$this->fc->initialisation();
		}else{
			require($dir.$views['connexion']);
		}
		
	}

	public function deleteAccount() {
		$modelUser = new ModelUser();
		$modelUser->deleteAccount();
		$this->fc->initialisation();
	}

}
?>