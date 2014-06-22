<?php
//

/*
  ______               _   _                   _____  _    _ _____  
 |  ____|             | | (_)                 |  __ \| |  | |  __ \ 
 | |__ ___  _ __   ___| |_ _  ___  _ __  ___  | |__) | |__| | |__) |
 |  __/ _ \| '_ \ / __| __| |/ _ \| '_ \/ __| |  ___/|  __  |  ___/ 
 | | | (_) | | | | (__| |_| | (_) | | | \__ \ | |    | |  | | |     
 |_|  \___/|_| |_|\___|\__|_|\___/|_| |_|___/ |_|    |_|  |_|_|     
                                                                    
 */                                                                                                                                    
// Fonctions utilisées pour éviter les injections dans les requetes SQL. Permet de nettoyer les inputs d'eventuels caractères pas nets

//Fonction select qui renvoie un tableau (quand plusieurs réponses possibles)
    function select($requete)
    {
      include ("sql.php");
       //On supprime les balises html
        $requete = strip_tags($requete);
        $resultat = $connexion->query($requete) or die('ERREUR SQL - REQUÊTE :'.htmlentities($requete).'');  //htmlentities permet d'afficher les caractères pséciaux au format html
		//on range les resultats de la requete dans un tableau
        $tab = $resultat->fetch_assoc();
       //on renvoie le tableau
        return $tab;
    }
//Fonction select qui renvoie un seul champ (le premier renvoyé par la requete s'il y a plusieurs réponses à la requete)
    function select1($requete)
    {
      include ("sql.php");
     //On supprime les balises html
        $requete = strip_tags($requete);
        $resultat = $connexion->query($requete) or die('ERREUR SQL - REQUÊTE :'.htmlentities($requete).' '.mysql_error().'');  //htmlentities permet d'afficher les caractères pséciaux au format html
 
     //on range les résultats dans un tableau
       $tab =  $resultat->fetch_assoc();
     // $tab = mysql_fetch_array($resultat,MYSQL_BOTH);
      //Et on ne renvoie que la premièr eligne du tableau. '@' permet de ne pas afficher le message d'erreur en cas de ligne vide
        @$ligne = $tab['0'];

        return $ligne;
    }
//Fonction d'update. Ne renvoie rien.
    function update($requete)
    {
      include ("sql.php");
     //On supprime les balises html
        $requete = strip_tags($requete);
        $connexion->query($requete) or die('ERREUR SQL - REQUÊTE :'.htmlentities($requete).'');  //htmlentities permet d'afficher les caractères pséciaux au format html

    }
//Fonction query2, fait la même chose que la fonction query() de PHP mais en supprimant les balises. Au cas ou on ai besoin de faire une requete qui ne soit ni un update, ni un select.
 //Ne fait aucun traitement de ce qui est renvoyé.
        function querySafe($requete)
    {
      include ("sql.php");
     //On supprime les balises html
        $requete = strip_tags($requete);
        $resultat = $connexion->query($requete) or die('ERREUR SQL - REQUÊTE :'.htmlentities($requete).'');  //htmlentities permet d'afficher les caractères pséciaux au format html
        return $resultat;
    }

    ?>