<?php

class AdminController {

	private FrontController $fc;

	public function __construct($fc, $action) {
		global $dir, $views, $errors;

		$this->fc = $fc;

		$modelAdmin = new ModelAdmin();
		if($modelAdmin->isAdmin() == FALSE) {
			require($dir.$views['connexion']);
			exit(0);
		}

	try{
		switch ($action) {
			case NULL :
				echo "Pas d'action Admin";
				break;
			case "supprimerTache" :
				$this->removeTask();
				break;
			case "supprimerListe" :
				$this->removeList();
				break;
			case "supprimerUtilisateur"
				$this->removeUser();
				break;
			default :
				throw new Exception("Erreur, l'action demandée n'existe pas");
				break;
			}
		}
		catch(PDOException $e){
			$dVueEreur[] = "Erreur inattendue!!! ";
            require ($dir.$views['error']);

		}
		catch (Exception $e2){
			echo $e2 -> getMessage();
		}

	}
	public function removeList() {
        $liste_gw = new ListGateway();
        $liste_gw->removeList($_REQUEST['suppression']);
        $this->fc->initialisation();

	}
	public function removeUser() {
		$listGateway = new ListGateway();
		$userGateway = new UserGateway();
		$user = $userGateway->findByName(filter_var($_SESSION['name'], FILTER_SANITIZE_STRING));
		if($user->get_IsAdmin()){
				throw new Exception("Vous ne pouvez pas supprimer un Administrateur");
		}
		else{
			$listGateway->removeAllList($user);
  			$userGateway->deleteUser($user);
			$this->fc->initialisation()
		}
	}
	public function removeTask() {
		$tache_gw = new TacheGateway();
        $tache_gw->removeTask($_REQUEST['idTache']);
        $this->fc->initialisation();

	}
}