<?php

    class FrontController {
        function __construct() {
            global $dir,$views,$dsn,$user,$password, $con, $errors;
            
            $listeAction_User= array('logIn', 'logOut', 'deleteAccount');
            $listeAction_Vistor= array('ajouterListe', 'ajouterTache', 'supprimerTache', 'supprimerListe', 'pageConnexion', 'retourAccueil');
            $dVueErreur = array();
            try {
                $con = new Connexion($dsn, $user, $password);

                $User = new ModelUser();

                $action=null;

                if(isset($_REQUEST['action']) && !empty($_REQUEST['action'])) {
                    $action = $_REQUEST['action'];
                }
                
                if(in_array($action, $listeAction_User)) {
                    if(!$User->isUser()) {
                        require($dir.$views['connexion']);
                    } else {
                        $user = new UtilisateurController($this, $action);
                    }
                } else if(in_array($action, $listeAction_Vistor)){
                    echo "coucou, $action";
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

        public function initialisation(){
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

