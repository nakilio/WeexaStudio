<div class="formulairelog">
<?php
	if(isset($_POST['pseudo'], $_POST['password'],$_POST['captcha'], $_POST['passverif'], $_POST['email'], $_POST['nom'] , $_POST['prenom'])and $_POST['pseudo']!='')
{
        include("config.php");
$db = mysql_connect($hostBDD, $userBDD, $passwordBDD)  or die('Erreur de connexion '.mysql_error());
mysql_select_db($bdd ,$db)  or die('Erreur de selection '.mysql_error()); 
function formulaires($valeur)
	{
	$valeur=trim(htmlspecialchars(addslashes($valeur)));
	return $valeur;
	}
$email=formulaires($_POST['email']);
$pseudo=formulaires($_POST['pseudo']);
$password=formulaires($_POST['password']);
$passverif=formulaires($_POST['passverif']);
$nom = formulaires($_POST['nom']);
$prenom = formulaires($_POST['prenom']);
$captcha= 'aaa';
$mention=formulaires($_POST['mention']);
//formulaires($_POST['captcha']));
//// VERIFICATIONS BANALES ////
	if(!$password || !$passverif || strlen($password) < 5)
	{
		$erreur = '<div class="bad">Votre mot de passe ou sa confirmation est inexisant ou votre mot de passe fait moins de 5 carractères</div>';
		echo $erreur;
		exit;
	}
	if($password!=$passverif)
	{
		$erreur = '<div class="bad">Votre mot de passe n\'est pas le meme que sa confirmation</div>';
		echo $erreur;
			exit;
	}
	if(!$pseudo || strlen($pseudo) > 15)
	{
		$erreur = '<div class="bad">Votre pseudo est inexisant ou fait plus de 15 carractères</div>';
		echo $erreur;
			exit;
	}
	if(!$nom)
   	{
		$erreur = '<div class="bad">Votre nom est innexistant</div>';
		echo $erreur;
			exit;
   	}
	if(!$prenom)
   	{
		$erreur = '<div class="bad">Votre prenom est innexistant</div>';
		echo $erreur;
			exit;
   	}
	if(!$email)
   	{
		$erreur = '<div class="bad">Votre e-mail est innexistant</div>';
		echo $erreur;
			exit;
   	}
	if(!$captcha)
   	{
		$erreur = '<div class="bad">Votre captcha est innexistant</div>';
		echo $erreur;
			exit;
   	}
	
//// VERIFICATIONS DES EXISTANCES ////
$reponse_mail=mysql_query("SELECT mail FROM $tableAccount WHERE mail='$email'") or die ('Erreur 1 : '.mysql_error());	//verification si e-mail existe déjà
$count_mail=mysql_num_rows($reponse_mail);
if($count_mail == 1)
	{
	$erreur = '<div class="bad">Cet e-mail existe déjà</div>';
	echo $erreur;
		exit;
	}
$reponse_pseudo=mysql_query("SELECT pseudo FROM $tableAccount WHERE pseudo='$pseudo'") or die ('Erreur 2 : '.mysql_error());	//verification si pseudo existe déjà
$count_pseudo=mysql_num_rows($reponse_pseudo);
if($count_pseudo == 1)
	{
	$erreur =  '<div class="bad">Ce pseudo existe déjà</div>';
	exit;
	}
$time = date('d/m/Y');

		$password=md5($password);		//Codage du mot de passe
mysql_query("INSERT INTO $tableAccount VALUES ('$pseudo', '$password', '$email', '$prenom', '$nom', 'weexateam, remicaillot, knarfal', '0', '0', '$time','','')") or die ('Un erreur est survenue lors de votre inscription'.mysql_error());	//insertion dans la bdd
$erreur = '<div class="reussi">Inscription reussi !<a href="index.php?site=login">Identifiez vous !</a></div>';
	mysql_close($db);
if(isset($erreur))
{
echo $erreur;
}
}
?>
<?php
if(!isset($_POST["pseudo"],$_POST["password"]))
     {
			echo '<div class="normal">Inscription &agrave; Studio ID</div>';
	 }
echo '
<form action="" method="POST">
<fieldset>
	<img src="images/studioID.png" class="logostudioID" alt="logo studio ID"/>
	<h1>Inscription</h1>
	<p>Vous &ecirc;tes d&eacute;j&agrave; inscrit ? <a href="index.php?site=login">Connectez-vous</a></p>
	<label for="pseudo">Pseudo</label><input tabindex="1" type="text" name="pseudo" required="required"/><br /><br /><br />
	<label for="password1">Mot de passe</label><input tabindex="2" type="password" name="password" required="required"/><br /><br />
	<label for="password2">Confirmation</label><input tabindex="3" type="password" name="passverif" required="required"/><br /><br />
	<label for="email">E-Mail</label><input tabindex="4" type="text" name="email" required="required"/><br /><br />
	<br /><br />
    <label for="prenom"></a>Pr&eacute;nom</label><input tabindex="5" type="text" name="prenom" required="required"/><br /><br />
	<label for="nom"></a>Nom</label><input tabindex="6" type="text" name="nom" required="required"/><br /><br />
	<img class="captcha" alt="Le code de v&eacute;rification a rencontrer un probl&egrave;me, veuillez le signaler" src="captcha/verif_code_gen.php" alt="Code de vérification" /></br ></br >
    <label for="captcha">Code																																					</label><input tabindex="7" type="text" name="captcha" required="required"/><br /><br />
    <br /><br />
	<input type="checkbox" name="condition" value="ok" required/>J\'ai lu et j\'accepte <a href="index.php?site=condition">les conditions d\'utilisations</a></br></br>
    <input class="submit" type="submit" value="OK" required="required" tabindex="8"/>
</fieldset>
</form>';
?>

</div>