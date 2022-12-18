<?php

class VisiteurController {

    private FrontController $fc;

    public function __construct($fc, $action) {
        global $dir,$views, $errors; 

        $this->fc = $fc;

        try{
            switch($action) {
                case NULL:
					$this->fc->initialisation();
					break;
                case "ajouterTache" : 
                    $this->ajouterTache();
                    break;
                case "ajouterListe" :
                    $this->ajouterListe();
                case "supprimerTache":
                    $this->supprimerTache();
                // case "supprimerListe" :
                //     $this->supprimerListe();
                default :
                    throw new Exception ("Erreur, l'action demandée n'existe pas");
                    break;
                }
            }
            catch (PDOException $e)
            {
                var_dump($e); 
            //si erreur BD, pas le cas ici
            $dVueEreur[] = "Erreur inattendue!!! ";
            require ($dir.$views['error']);
            }
            catch (Exception $e2){
                echo $e2 -> getMessage();
            }           
    }
    
    public function ajouterListe() {
        $liste_gw= new ListGateway();
        $liste = new Liste(strip_tags($_REQUEST['']));
        $liste_gw->addList($liste);
        $this->FrontController->initialisation();
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

    // public function supprimerListe() {
    //     $liste_gw = new ListGateway();
    //     $liste_gw->removeList($_REQUEST['suppression']);
    //     $this->fc->initialisation();
    // } 
    
}
