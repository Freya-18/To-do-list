<?php

class UserController {
			function __construct() {
			global $rep, $vues;
			$dVueErreur = array();

			try {		
                $action = $_REQUEST['action'];
                
				switch($action) {
					case NULL:
						echo "Pas d'action User";
						break;
					case 'connecter' :
						$Utilisateur->connexion();
					default:
						echo "Action Admin reçue : $action";
						break;
				}
			}
			catch(PDOException $e) {
				$dVueErreur[] =	"Erreur base de données !";
				require ($rep.$vues['erreur']);
			}
			catch(Exception $e) {
				$dVueErreur[] =	"Erreur générale !";
				require ($rep.$vues['erreur']);
			}
		}
	
}
?>