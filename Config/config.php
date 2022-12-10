<?php
	$dir=__DIR__.'/../';

	$dsn = 'mysql:host=localhost;dbname=dblabrette;';
	$user = "labrette"; 
	$password = "bdd2a"; 

	//Vues
	$views['error']='Vues/Erreur.php';
	$views['accueil']='Vues/Accueil.php';
	$views['connexion']='Vues/PageConnexion.php';

	//ini_set('display_errors', 'on');
	//error_reporting(E_ALL);

	//define('ROOT', str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']));
	//define('CONTROLLER', ROOT.'controllers/');
	//define('VIEW', ROOT.'views/');
	//define('MODEL', ROOT.'models/');

	//echo MODEL; EXIT;
	
?>