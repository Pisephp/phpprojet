<?php
//Formulaire de connexion

echo "
<p>Pour vous logguer, merci d'indiquer votre pseudo et votre mot de passe.</p>

<br>
<br>

<form method='post' action='login.php'>
<table>
	<tr>
		<td>
			Pseudo :
		</td>
		<td>
			<input type='text' name='nom'>
		</td>
	</tr>
	<tr>
		<td>
			Mot de passe : 
		</td>
		<td>
			<input type='password' name='pass'>
		</td>
	</tr>
</table>

<input type='submit' value='Connection'>
</form>


<font size='-2'>
<a href='inscription_form.php'>Inscription</a>

<a href='nouveaupass.php'>Mot de passe oublié ?</a>
</font>

<br>
<br>
";
?>