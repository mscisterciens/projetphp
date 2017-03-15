<?php
	$serveur="localhost";
	$utilisateur="";
	$motdepasse="";
	$base="";
	// connexion à la base
	$idcom=new mysqli ($serveur,$utilisateur, $motdepasse, $base);

	//règle le problème d'encodage des caractères de la base
	if (function_exists('mysqli_set_charset'))
	{
		mysqli_set_charset($idcom, 'utf8');
	}
	else
	{
		mysqli_query($idcom, 'SET NAMES utf8');
	}
?>
