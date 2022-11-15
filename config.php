<?php
	require_once 'Connection.php';

	$dsn = 'mysql:host=localhost;dbname=dblabrette;';
	$user = "labrette"; // A remplacer par vos identifiants
	$password="bdd2a"; // A remplacer par vos identifiants

	try {		
		$con = new Connection($dsn, $user, $password);
	} catch (PDOException $e){
		echo $e -> getMessage();
	}

	$offset = 2; 