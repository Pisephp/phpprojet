<?php

// On demarre les sessions
session_start();

include('systeme/sql.php'); // Configurations SQL

if ($_POST["nom"] != '' && $_POST['pass'] != '' ) // Dans le cas ou le joueur a posté un nom et un pass
{
    $pass_md5 = md5($_POST['pass']); // On crypte le pass en md5 parce qu'on est un peu parano chez pise
	
    $query = $sql->query("SELECT id FROM users WHERE nom='" . $_POST['nom'] . "' AND pass='" . $pass_md5 . "' LIMIT 1");
	
    if (mysql_num_rows($query) != 1) // Dans le cas ou ce n'est pas des identifiants valide
	{
        die("Pseudo ou mot de passe invalide, veuillez vous relogguer avec vos bons identifiants.");
    }
    $row = mysql_fetch_array($query); // Dans le as ou les identifiants sont valide, on recupere les infos du joueur
	
	$_SESSION['idjoueur'] = $row['id']; // On recupere l'id du joueur dans une session
	
	die('<script>location="../index.php"</script>'); // on redirige sur l'index du jeu
	
}



?>