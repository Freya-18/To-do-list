<?php
	require_once 'Connexion.php';

	$dsn = 'mysql:host=localhost;dbname=dblabrette;';
	$user = "labrette"; // A remplacer par vos identifiants
	$password="bdd2a"; // A remplacer par vos identifiants

	try {		
		$con = new Connexion($dsn, $user, $password);
	} catch (PDOException $e){
		echo $e -> getMessage();
	}

	$offset = 2;  

	//Vues
	$vues['erreur']='vues/erreur.php';
	$vues['form']='vues/form.php';
	$vues['index']='vues/index.php';
	