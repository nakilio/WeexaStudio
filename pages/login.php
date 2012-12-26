<div class="formulairelog">
<?php

if(isset($_SESSION['pseudo'])) 
{
echo '<div class="formulairelog"><div class="bad">Erreur : Action impossible</div><fieldset><img src="images/studioID.png" class="logostudioID" alt="logo studio ID"/></br>Vous &ecirc;tes d&eacute;j&agrave; connect&eacute;</br></br></br><a id="bouton" href="index.php">Accueil</a></br></br></br></fieldset></div>';
}
else
{
     if(isset($_POST["pseudo"],$_POST["password"]))
     {
	extract($_POST);
		$db = mysql_connect($hostBDD, $userBDD, $passwordBDD)  or die('Erreur de connexion '.mysql_error());
		mysql_select_db($bdd ,$db)  or die('Erreur de selection '.mysql_error()); 
	$sql = "select password from $tableAccount where pseudo='".$pseudo."'";
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	$data = mysql_fetch_assoc($req);
    $_POST['numberrows'] = 'select count(*) from 5828_sql.utilisateurs';
	if($data['password'] != md5($password))
	{
		echo '<div class="bad">Mauvais pseudo ou password. Merci de recommencer</div>';
	}
	
	else
	{
		//session_start();
		$_SESSION['pseudo'] = $pseudo;
		if(!file_exists("users/".$pseudo."/"))
		{
		mkdir("users/".$pseudo."/",0777,true);
		mkdir("users/".$pseudo."/photo/",0777,true);
		mkdir("users/".$pseudo."/partition/",0777,true);
		}
		echo '<div class="reussi">Connexion reussi !</div>';
		echo '<meta http-equiv="refresh" content="1; URL=index.php">';

	}    
}
 if(!isset($_POST["pseudo"],$_POST["password"]))
     {
			echo '<div class="normal">Veuillez vous connecter pour acc&eacute;der &agrave; nos diff&eacute;rentes applications</div>';
	 }
echo '<form method="POST">
<fieldset>
	<img src="images/studioID.png" class="logostudioID" alt="logo studio ID"/>
    <h1>Connexion</h1>
    <input type="text" name="pseudo" placeholder="Pseudo..." required="required"/>
    <br /><br />
   <input type="password" name="password" placeholder="Mot de passe..." required="required"/>
    <br /><br />
	<input class="submit" type="submit" value="OK" required="required"/></br></br><div onclick="" class="bouton_FB"/></div>
	<p>Vous n\'avez pas de compte ? <a href="index.php?site=register">Inscrivez-vous</a></p>
</fieldset>
</form>';
}
?>
</div>
