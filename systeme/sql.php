<?php
// fichier de connexion � la base de donn�es MySql
$serveur = "mysql6.000webhost.com";
$base = "a7914950_pise"; //La mienne c'est php_prof
$user = "a7914950_pise";
$pass = "Pise2014*";


/* connexion � la base de donn�es */
$connexion = new mysqli($serveur, $user, $pass, $base);

/*
utilisation de la propri�t� connect_error
qui renvoie un message d'erreur si la connexion �choue
*/
if ($connexion->connect_error) {
    die('Erreur de connexion ('.$connexion->connect_errno.')'. $connexion->connect_error);
}
else {
	//echo $connexion->host_info;
}
?>