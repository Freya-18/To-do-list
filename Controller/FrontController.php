<?php

    class FrontController {
        function __construct() {
            global $dir,$views,$dsn,$user,$password, $con, $errors;
            session_start();
            $listeAction_User= array('logOut','deleteAccount', 'pageListePrivee');
            $listeAction_Vistor= array('connexion', 'ajouterListe', 'ajouterTache', 'supprimerTache', 'supprimerListe', 'pageConnexion', 'retourAccueil', 'cocherCheckbox', 'decocherCheckbox', 'logIn');
            $dVueErreur = array();
            try {
                $con = new Connexion($dsn, $user, $password);

                $User = new ModelUser();

                $action = null;

                if(isset($_REQUEST['action']) && !empty($_REQUEST['action'])) {
                    $action = $_REQUEST['action'];
                }
                
                if(in_array($action, $listeAction_User)) {
                    $user = new UtilisateurController($this, $action);
                } else if(in_array($action, $listeAction_Vistor)){
                    $user = new VisiteurController($this, $action);
                }else{
                    $this->initialisation();
                }                 
            }
            catch(PDOException $e) {
                $dVueErreur[] = "Erreur base de données !";
                require($dir.$views['error']);             
            }
            catch(Exception $e) {
                $dVueErreur[] = "Erreur générale !";
                require($dir.$views['error']);            
            }          
        }

        // Methode en rajoutant les listes public, mais nous n'y sommes pas arrivées
        // public function initialisation(){
        //     $tabListe = [];
        //     global $dir, $views;
        //     $liste_gw_= new ListGateway();
        //     $tache_gw = new TacheGateway();
        //     $utilisateur_gw = new UtilisateurGateway();
        //     if(isset($_SESSION['role'])){
        //         if($_SESSION['role']=='user'){
        //             $tabListe = $liste_gw_->allListe($_SESSION['id']);
        //             var_dump($_SESSION['id']);
        //         }if ($_SESSION['role']==''){
        //             $tabListe = $liste_gw_->allListe(-1);
        //         }
        //     }else{
        //         $tabListe = $liste_gw_->allListe(-1);
        //     }
        //     foreach ($tabListe as $t){
        //         $taches[$t->get_id()] = $tache_gw->allTache($t->get_id());
        //    }
        //     require($dir.$views['accueil']);
        // }

        public function initialisation(){
            $tabListe = [];
            global $dir, $views;
            $liste_gw_= new ListGateway();
            $tache_gw = new TacheGateway();
            $tabListe = $liste_gw_->allListePublic();
            foreach ($tabListe as $t){
                $taches[$t->get_id()] = $tache_gw->allTache($t->get_id());
           }
            require($dir.$views['accueil']);
        }


    }

?>

