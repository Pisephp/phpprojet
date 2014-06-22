<?php
session_start();
include ('../systeme/fonctions.php');

$verif = select("SELECT valide FROM users WHERE id='" . $_GET["id"] . "' LIMIT 1");

    if ($_GET["validecode"] == $verif['valide']) // On regarde si le code donnée et bien le code de SQL
    {
        // On passe la code de validation a 1 pour valider le joueur
       update("UPDATE users SET valide='1' WHERE id='" . $_GET["id"] . "'");
        
        // Si l'action s'est derouler avec succes, on connecte le joueur
        $_SESSION['idjoueur'] = $_GET["id"] ; // On créer la session
        header('location: ../index.php'); // On redirige 
        die();
    } 
    else // Le code est incorect
    {
       echo"<p>code incorrect</p>";
       echo var_dump($verif);
       echo $id;
    }


?>