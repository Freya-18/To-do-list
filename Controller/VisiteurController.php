<?php

class VisiteurController {

    private FrontController $fc;

    public function __construct($fc, $action) {
        global $dir,$views, $errors; 

        $this->fc = $fc;

        try{
            switch($action) {
                case NULL :
					$this->fc->initialisation();
					break;
                case "retourAccueil":
                    $this->fc->initialisation();
					break;
                case "ajouterTache" : 
                    $this->ajouterTache();
                    break;
                case "ajouterListe" :
                    $this->ajouterListe();
                    break;
                case "supprimerTache":
                    $this->supprimerTache();
                    break;
                case "pageConnexion":
                    require($dir.$views['connexion']);
                    break;
                case "supprimerListe" :
                    $this->supprimerListe();
                    break;
                case "logIn" :
                    $this->logIn();
                    break;
                case "connexion" :
                    require($dir.$views['connexion']);
                    break;
                case "cocherCheckbox ":
                    $this->checkbox();
					break;
                default :
                    throw new Exception ("Erreur, l'action demandée n'existe pas");
                    break;
                }
            }
            catch (PDOException $e)
            {
            //si erreur BD
            $dVueEreur[] = "Erreur inattendue!!! ";
            require ($dir.$views['error']);
            }
            catch (Exception $e2){
                echo $e2 -> getMessage();
            }           
    }
    
    public function ajouterListe() {
        $liste_gw= new ListGateway();
        $liste = new Liste(strip_tags($_REQUEST['nomEntrerListe']), $_SESSION['id'], 0);
        $liste_gw->addList($liste);
        $this->fc->initialisation();
    }

    public function ajouterTache(){
        $tache_gw = new TacheGateway();
        $tache = new Tache(strip_tags($_REQUEST['nomEntrerTache']), $_REQUEST['id_liste'],);
        $tache_gw->addTache($tache);
        $this->fc->initialisation();
    }

    public function supprimerTache() {
        $tache_gw = new TacheGateway();
        $tache_gw->removeTask($_REQUEST['idTache']);
        $this->fc->initialisation();
    } 

    public function supprimerListe() {
        $liste_gw = new ListGateway();
        $liste_gw->removeList($_REQUEST['suppression']);
        $this->fc->initialisation();
    } 

    public function checkbox(){
        $tache_gw = new TacheGateway();
        // tache_gw->updateTache($_REQUEST['idTache'], $_REQUEST[]);
        $this->fc->initialisation();
    }    

    public function logIn() {
        global $dir,$views;
		$modelUser =  new ModelUser();
		if ($modelUser->logIn($_REQUEST['password'], $_REQUEST['login'])){
            echo"coucou";
			$this->fc->initialisation();
            exit();
		}	
        require($dir.$views['connexion']);
	}

}
