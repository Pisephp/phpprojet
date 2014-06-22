<?php
session_start();
include ('../systeme/fonctions.php');


// Avatar par default pour les joueurs n'en ayant pas choisi
$avatar_par_default = "../img/coincoin.gif";








	$erreur = ''; // Permet de prevenir le joueur d'une erreu

	if (empty($_POST['nom']) || empty($_POST['mail']) || empty($_POST["pass1"]) 
		 || empty($_POST["pass2"])  ) 
	{
		$erreur .= '<font color="red" size="+2">Merci de remplir toutes les données obligatoires pour vous inscrire</font></br>';
	}
	else // Dans le cas ou toutes les données sont rempli
	{ // debut else toute les données sont rempli
		if ($_POST["pass1"] != $_POST["pass2"]) 
		{
		$erreur .= '<font color="red" size="+2">Les mots de passe ne sont pas identiques</font></br>';
		}
		//Vérifie qu'il y a bien une @ dans l'adresse mail
		@$verifmail = explode('@', $_POST['mail']);
		
		if (empty($verifmail[0]) ) 
		{
		$erreur .= '<font color="red" size="+2">L\'adresse e-mail est invalide</font></br>';
		}
		//Vérifie que le nom n'est pas déjà utilisé
		$usernameverif = select('SELECT count(nom) FROM users WHERE nom="' . $_POST["nom"] . '" ');
		if ($usernameverif[0] > 0) 
		{
			$erreur .= '<font color="red" size="+2">Ce pseudo est deja utilisé, veuillez en choisir un autre</font></br>';
			echo $usernameverif[0];
		}
		//vérifie que l'adresse email n'est pas déjà utilisée
		$mailconnu = select('SELECT mail FROM users WHERE mail="' . $_POST["mail"] . '" ');
		if($mailconnu  > 0) 
		{
			$erreur .= '<font color="red" size="+2">Cette adresse email déjà utilisée. Veuillez en choisir une autre</font></br>';
		}

		

	} // fin else toute les données sont rempli


	if($erreur != '') // Dans le cas ou on trouve des erreurs
	{ 	
echo $erreur;
	} 
	else // Dans le cas ou il ny a pas d'erreur
	{ 

// On crée un code pour la demande de confirmation par mail
	
	$verifcode = '';
	for ($i = 0; $i < 50; $i++) 
		{
	     $verifcode .= chr(rand(65, 90));
		}

		$nom = $_POST["nom"];
		$pass = md5($_POST["pass1"]);
		$mail = $_POST["mail"];


		// On verfie si le joueurs a voulu un avatar, sinon on lui en atribut un par default
		if(@!empty($_POST["avatar"]))
		{
			$avatar = $_POST["avatar"];
		}
		else // ben dommage il en a pas choisi, alors on lui en attribut un par default
		{
			$avatar = $avatar_par_default;
		}

		


		// ajouter les données du joueur a sql
		$query = "INSERT INTO users SET 
												nom='" . $nom . "', 
												pass='" . $pass . "', 
												mail='" . $mail . "', 
												valide='" . $verifcode . "', 
												avatar='".$avatar."', 
												time='".time()."'
						";
						
		update($query);
		// On réqupère l'id du joueur qu'on viens de creer
		$id = select("SELECT id FROM users WHERE mail='" . $mail . "'");



	

			mail($mail, 
			    
			 "Caraibes 1730 - Terminez votre inscription", "Vous ou une autre personne s'est inscrite sur Caraibes 1730.

			Si vous n'êtes pas cette personne, ignorez ce message, vous ne recevrez aucun autre email de notre part.

			Si vous êtes la personne qui s'est inscrite, vous pouvez terminer votre inscription en cliquant sur le lien suivant ou en le copiant dans la barre d'adresse de votre navigateur.

			http://caraibes1730.comyr.com/login/validation.php?id=" . $id['id'] . "&validecode=" . $verifcode . "

			A bientot sur Caraibes 1730 !");


echo"<p>Votre inscription s'est déroulée avec succès. 
<br>
Toutefois, elle requiert une validation par mail de votre part. 
<br>
Vous allez recevoir un mail contenant la marche à suivre pour terminer votre inscription.</p>";




		// On appelle la fonction permettant de créer une base automatiquement pour le joueurs
		// On recupere les infos du joueur qu'on vient de créer avant

		$userrow = select("SELECT * FROM users WHERE id='" . $id . "'");

		// Attibue aléatoirement une base de départ au joueur
		/* to be coded later
			include('../systeme/choixbasedepart.php');
			choixbasedepart() ;
		
*/

	} // fin else aucune erreur

?>