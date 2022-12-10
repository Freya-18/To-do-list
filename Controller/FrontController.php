<?php

    class FrontControleur {
        function __construct() {
            global $rep, $vues;
            
            $listeAction_User= array('connecter', 'deconnecter', 'ajouter', 'supprimer');
            $listeAction_Vistor= array('connecter', 'deconnecter');
            $dVueErreur = array();

            try {
                $isUser = new Utilsateur();

                if(isset($_REQUEST['action']) && !empty($_REQUEST['action'])) {
                    $action = $_REQUEST['action'];
                }
                
                if(in_array($action, $listeAction_User)) {
                    if(!$isUser->isUser()) {
                        require('vues/connexion.php');
                    } else {
                        $user = new UserControleur();
                    }
                } else {
                    $user = new VisitorController();
                }
            }
            catch(PDOException $e) {
                $dVueErreur[] = "Erreur base de données !";
                require ($rep.$vues['erreur']);
            }
            catch(Exception $e) {
                $dVueErreur[] = "Erreur générale !";
                require ($rep.$vues['erreur']);
            }
        }
    }

?>
class FrontController {

function __construct() {
    global $rep,$vues; // nécessaire pour utiliser variables globales
    session_start();
    //on initialise un tableau d'erreur
    $dVueEreur = array ();
    try{
    $action=$_REQUEST['action'];
    switch($action) {
    //pas d'action, on initialise 1er appel
    case NULL:
        require(__DIR__.'/../Vues/Accueil.php');
        break;

    case "validationFormulaire":
        $this->ValidationFormulaire($dVueEreur);
        break;
        //mauvaise action
        default:
        $dVueEreur[] = "Erreur d'appel php";
        require ($rep.$vues['erreur.php']);
        break;
        }
        } catch (PDOException $e)
        {
        //si erreur BD, pas le cas ici
        $dVueEreur[] = "Erreur inattendue!!! ";
        require ($rep.$vues['erreur']);
        }
        catch (Exception $e2)
        {
        $dVueEreur[] = "Erreur inattendue!!! ";
        require ($rep.$vues['erreur']);
        }
//fin
exit(0);
}//fin constructeur 

function ValidationFormulaire(array $dVueEreur) {
    global $rep,$vues;
    //si exception, ca remonte !!!
    $mailAdress=$_POST['email-address']; // email-address = adresse mail du champ texte dans le formulaire
    $mdp=$_POST['password'];
    Validation::val_form($nom,$mdp);
    $model = new Visiteur();
    $data=$model->get_data(); // plusieurs getter => array?
    $dVue = array (
    'mailAdress' => $mailAdress,
    'mdp' => $mdp,
    'data' => $data,
    );
    require ($rep.$vues['Vues/form']);
}

function Reinit(){
    $dataVue = array();
    //utilisation d’une vue pour afficher
    require(__DIR__.'/../Vues/Accueil.php');
}
}
?>
