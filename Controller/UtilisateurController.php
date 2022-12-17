<?php
class UtilisateurController {

	private $frontController;

	public function __construct($front) {
		global $dir, $vues;
		$this->frontController = $front;
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
				case 'ajouterListe' :
					$this->ajouterListe();
					break;
				case 'supprimerListe' :
					$this->supprimerListe();
					break;
				case 'ajouterTache' :
					$this->ajouterTache();
					break;
				case 'supprimerTache' :
					$this->supprimerTache(); 
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
			require ($dir.$vues['erreur']);
		}
		catch(Exception $e) {
			$dVueErreur[] =	"Erreur générale !";
			require ($dir.$vues['erreur']);
		}
	}
	public function ajouterListe(){
		global $dir, $vues;
		$userGateway = new UserGateway();
		$listGateway = new ListGateway();
		$list =  new liste(strip_tags($_REQUEST['name']), $this->userGateway->getUserById()->getId());
		$listGateway->insert($list);
	}
	public function supprimerListe() {
		$taskGateway = new TacheGateway(); //mettre un sécurité pour chercher si la liste existe bien dans la bdd;
		$listGateway->delete($_REQUEST['id']);

	}
	public function ajouterTache(){
		$taskGateway = new TacheGateway();
		$task = new Tache($_REQUEST['id_liste'], strip_tags($_REQUEST['nomEntrerTache']));
		$taskGateway->addTask($task);
		$this->frontController->initialisation();
	}

	public function supprimerTache() {
        $tache = new TacheGateway();
        $tache_gw->removeTask($_REQUEST['id']);
        $this->frontController->initialisation();
    } 

	public function logOut() {
		$modelUser =  new ModelUser();
		$modelUser->logOut();
		$this->frontController->initialisation();
	}

	public function logIn() {
		$modelUser =  new ModelUser();
		$modelUser->logIn();
		$this->frontController->initialisation();
	}

	public function deleteAccount() {
		$modelUser = new ModelUser();
		$modelUser->deleteAccount();
		$this->frontController->initialisation();
	}

}
?>