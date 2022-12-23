<?php
class UtilisateurController {

	private FrontController $fc;

	public function __construct($fc, $action) {
		global $dir,$views, $errors; 

        $this->fc = $fc;

		$dVueErreur = array();

		$userModel = new ModelUser();

		if($userModel->isUser() == false){
			require($dir.$views['connexion']);
		}

		try {		
			$action = $_REQUEST['action'];
			
			switch($action) {
				case NULL:
					echo "Pas d'action User";
					break;
				case 'pageListePrivee':
					$this->initialisation();
					break;
				case 'logOut' :
					$this->logOut();
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

	public function deleteAccount() {
		$modelUser = new ModelUser();
		$modelUser->deleteAccount();
		$this->fc->initialisation();
	}

	public function initialisation(){
		global $dir, $views;
		$liste_gw_= new ListGateway();
		$tache_gw = new TacheGateway();
		$tabListe = $liste_gw_->allListePrivee();
		foreach ($tabListe as $t){
			$taches[$t->get_id()] = $tache_gw->allTache($t->get_id());
		}
		require($dir.$views['accueil']);	
	}
}
?>
