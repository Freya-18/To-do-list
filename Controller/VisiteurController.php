<?php

class VisiteurController {

    public function __construct() {
        global $dir,$views,$dsn,$user,$password, $action; 
        try{
            $con = new Connexion($dsn, $user, $password);

            $action=$_REQUEST['action'];

            switch($action) {
                //pas d'action, on initialise 1er appel
                case NULL:
                    $this->initialisation();
                    break;
                default :
                    throw new Exception ("Erreur, l'action demandée n'existe pas");
                    break;
                }
            }
        catch (PDOException $e)
            {
            //si erreur BD, pas le cas ici
            $dVueEreur[] = "Erreur inattendue!!! ";
            require ($dir.$views['error']);
            }
            catch (PDOException $e2){
                echo $e2 -> getMessage();
            }
    }

        public function initialisation(){
            global $dir, $views;
            $liste= new ListGateway();
            $tache = new TacheGateway();
            $tabListe = $liste->allListePublic();
            $tabTache = $tache->allTache($liste->id);
            require($dir.$views['accueil']);
        }
}
