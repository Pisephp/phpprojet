<!-- Changement de pass -->
<?php

include('../systeme/sql.php');
include('../systeme/fonctions.php');

// Si le formulaire a été envoyé
if(!empty($_POST['mail']) )
{ // debut if mail envoyé
	$mail= $_POST["mail"];

$nbMail = select1("SELECT COUNT(id) FROM users WHERE mail='" . $mail . "' LIMIT 1");
if ($nbMail < 1) // Dans le cas ou aucune ligne n'a été renvoyé
{
// On dit qu'il y a une erreur
echo  "<p>l'email ".$_POST['mail']." n'existe pas dans notre base de données.</p>";


} 
elseif ($nbMail ==1)// Dans le cas ou une ligne a été renvoyé, on traite la demande
{ // debut traitement mail

    $nouveaupass = rand(1111111111, 9999999999); // On crée un pass aleatoire
    $nouveaupass2 = md5($nouveaupass); // On crypte le pass en Md5 pour qu'il soit crypté dans la base.
    
    // On enregistre le nouveau pass dans la base de données
   update("UPDATE users SET pass='" . $nouveaupass2 . "' WHERE mail='" . $mail . "'");

// On recupere le login du joueur 
$login = select1("SELECT nom FROM users WHERE mail='" . $mail . "' ");

// On met en place les valeur pour le mail
$destinataire = $_POST["mail"]; // Destinataire du mail
$titre = 'Caraibes 1730 - Votre nouveau mot de passe'; // Le titre du mail
// Le message du mail
$message = '
Une opération de récupération de votre mot de passe à été lancée sur Caraibes 1730.
Votre mot de passe a donc été changé, voici vos nouveaux identifiants :

Nom d\'utilisateur : '.$login.'

Mot de passe : '.$nouveaupass.'

Nous vous conseillons vivement de changer votre mot de passe dans votre profil.



A Bientot sur Caraibes 1730 Bonne journée ;)
';

// On envoye le mail
mail($destinataire, $titre, $message);

echo "<p>Votre nouveau mot de pass a bien été envoyé sur votre email ".$mail."

<br>
<br>

Pensez a chercher dans vos couriez indesirable ...

<br>
<br>

Si vous ne recever pas l'email dans les 24h, ré-éssayer.
<br>Si le probleme persiste, contactez l'administrateur</p>";


} // fin else traitement mail



} // fin if form envoyé
else // Si le formulaire n'a pas été envoyé
{ 
echo "Votre mot de passe etant crypté dans notre base de données, 
<br>il est impossible de le recuperer, il va donc être changé si vous accepter

<br>
<br>

Merci d'entrer votre adresse email.
<br>
<br>
<form method='post' action='nouveaupass.php'>
<input type='text' name='mail' size='50' value=''>
<br>
<input type='submit' value='Continuer'>
</form>";
}

?>
