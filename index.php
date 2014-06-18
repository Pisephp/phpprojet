<?php

/* Projet PHP
Florence
Pierre
Adrien */



// On demarre les sessions
@session_start();




// On inclue les fichier utile au jeu et on demarres les classes associés
include('systeme/sql.php'); // Configurations SQL
//include ('systeme/functions.php'); // Fonctions diverses




if ( isset($_SESSION['idjoueur']) && eregi('[0-9]', $_SESSION['idjoueur']) ) // Si la session est defini et quelle contient un id valide (= chiffre de 0 a 9)
{
	$userid = $_SESSION['idjoueur'];
	$userrow = $sql->select('SELECT * FROM phpsim_users WHERE id="'.$userid.'" ');
}
else // Si la session est vide alord on redirige pour se conecter
{
	die('<script>location="login/connexion_form.php";</script>');
}

//ceci est un test de refressh

?>