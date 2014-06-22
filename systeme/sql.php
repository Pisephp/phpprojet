<?php
// fichier de connexion à la base de données MySql
//Connexion à la base du site. à decommenter avant upload
/*
$serveur = "mysql6.000webhost.com";
$base = "a7914950_pise"; 
$user = "a7914950_pise";
$pass = "Pise2014*";
*/
//Connexion à la base easyPhP. à passer en commentaire avant upload
/*
$serveur = "localhost";
$base = "projetPHP"; 
$user = "root";
$pass = "";
*/
/* connexion à la base de données */
$connexion = new mysqli($serveur, $user, $pass, $base);
/*
utilisation de la propriété connect_error
qui renvoie un message d'erreur si la connexion échoue
*/
if ( $connexion->connect_error) {
    die('Erreur de connexion : ' . $connexion->connect_error);
}
$connexion->set_charset("utf8");



?>