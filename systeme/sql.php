<?php
// fichier de connexion � la base de donn�es MySql
//Connexion � la base du site. � decommenter avant upload
/*
$serveur = "mysql6.000webhost.com";
$base = "a7914950_pise"; 
$user = "a7914950_pise";
$pass = "Pise2014*";
*/
//Connexion � la base easyPhP. � passer en commentaire avant upload
/*
$serveur = "localhost";
$base = "projetPHP"; 
$user = "root";
$pass = "";
*/
/* connexion � la base de donn�es */
$connexion = new mysqli($serveur, $user, $pass, $base);
/*
utilisation de la propri�t� connect_error
qui renvoie un message d'erreur si la connexion �choue
*/
if ( $connexion->connect_error) {
    die('Erreur de connexion : ' . $connexion->connect_error);
}
$connexion->set_charset("utf8");



?>