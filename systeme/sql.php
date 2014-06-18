<?php
// fichier de connexion à la base de données MySql
$serveur = "mysql6.000webhost.com";
$base = "a7914950_pise"; //La mienne c'est php_prof
$user = "a7914950_pise";
$pass = "Pise2014*";


/* connexion à la base de données */
$connexion = new mysqli($serveur, $user, $pass, $base);

/*
utilisation de la propriété connect_error
qui renvoie un message d'erreur si la connexion échoue
*/
if ($connexion->connect_error) {
    die('Erreur de connexion ('.$connexion->connect_errno.')'. $connexion->connect_error);
}
else {
	//echo $connexion->host_info;
}
?>