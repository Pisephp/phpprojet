
<?php
//Forumlaire d'inscription
echo"
<p>Pour vous inscrire, merci de remplir le formulaire suivant : </p>


<form method='post' action='inscription.php'>

<table>
	<tr>
		<td>
			Pseudo : 
		</td>
		<td>
			<input type='text' name='nom' value='' size=\"30\" 
					id=\"login\"> 
					
		</td>
	</tr>
	<tr>
		<td>
			Avatar : 
		</td>
		<td>
			<input type='text' name='avatar' size=\"30\" value=''> - Facultatif
		</td>
	</tr>
	<tr>
		<td>
			Adresse email : 
		</td>
		<td>
			<input type='text' size=\"30\" name='mail' value=''
					id=\"mailto\" >

		</td>
	</tr>
	<tr>
		<td>
			Mot de passe : 
		</td>
		<td>
			<input type='password' size=\"30\" name='pass1' >
		</td>
	</tr>
	<tr>
		<td>
			Répétez le mot de passe : 
		</td>
		<td>
			<input type='password' size=\"30\" name='pass2'>
		</td>
	</tr>
	
</table>

<input type='submit' value='Inscription'>

</form>
";
?>