<?php
include('studioID/session.php');
include('studioID/infos_user.php');
include('config.php');
?>
<div class="formulairelog">
	<div class="normal">Panel de gestion du compte</div>
	<form class="formpanel" method="POST" action="">
	<fieldset>
		<input type="hidden" name="valid" value="gest"/>
		<img src="images/studioID.png" class="logostudioID" alt="logo studio ID"/>
		<br />
		<h4>
			Gestion du compte <?php echo $_SESSION['pseudo']; ?>
		</h4>
		<br />
		<label>
			Ancien mot de passe : 
		</label>
		<input type="password" name="password_old" placeholder="Password"/>
		<br /><br />
		<label>
			Nouveau mot de passe : 
		</label>
		<input type="password" name="password_new" placeholder="Password"/>
		<br /><br />
		<label>
			Confirmation : 
		</label>
		<input type="password" name="password_new_verif" placeholder="Password"/>
		<br /><br />
		<input type="submit"/>
	</form>
		<br /><br /><hr><br /><br />
	<form method="POST" name="del">
<h4>Suppression du compte</h4>
		<input type="hidden" name="del" value="del"/>
		<input id="buttonrouge" type="button" onclick="ok()" value="Supprimer mon compte"/>
	</form>
</fieldset>

<script type="text/javascript">
function ok()
{
	if (confirm("Le compte va être supprimé")) 
	{
		 document.del.submit();
	}
}
function ok2()
{
	if (confirm("Votre images de profil sera supprimée")) 
	{
		 document.delprofil.submit();
	}
}
</script>
<?php
if(isset($_POST['valid']))
{
$db = mysql_connect($hostBDD, $userBDD, $passwordBDD)  or die('Erreur de connexion '.mysql_error());
mysql_select_db($bdd ,$db)  or die('Erreur de selection '.mysql_error());
$password_ = $_POST['password_old'];
$password_new = $_POST['password_new'];
$password_new_verif = $_POST['password_new_verif'];

if($password_new != $password_new_verif)
{
echo $erreur = '<b class="bad">Votre nouveau mot de passe est different de la verification</b>';
exit;
}
else if(isset($password_) && isset($password_new) && isset($password_new_verif) && $password_ != "" && $password_new != "" && $password_new_verif != "" && $password_new == $password_new_verif)
{
if($password_ == $password)
{

mysql_query('UPDATE '.$tableAccount.' SET password="'.md5($password_new).'" WHERE id="'.$id.'"')or die('Erreur de connexion '.mysql_error());
	echo $erreur = '<b class="reussi">Les modifications on été enregistée</b>';
echo '<meta http-equiv="refresh" content="3; URL=index.php?site=panel">';
	exit;

}
exit;
}
else
{
mysql_query('UPDATE '.$tableAccount.' SET password="'.$password_md5.'" WHERE id="'.$id.'"')or die('Erreur de connexion '.mysql_error());
	echo $erreur = '<b class="reussi">Les modifications on été enregistée</b>';
echo '<meta http-equiv="refresh" content="3; URL=index.php?site=panel">';
	exit;
}
	mysql_close($db);
}
if(isset($_POST['del']))
{
	$db = mysql_connect($hostBDD, $userBDD, $passwordBDD)  or die('Erreur de connexion '.mysql_error());
	mysql_select_db($bdd ,$db)  or die('Erreur de selection '.mysql_error());
	mysql_query('delete from '.$tableAccount.' where id='.$id)or die('Erreur de connexion '.mysql_error());
	echo $erreur = '<b class="reussi">Compte supprimé, Au revoir...</b>';
		echo '<meta http-equiv="refresh" content="3; URL=index.php?site=logout">';
	mysql_close($db);
}
?>
<?php
if(isset($_POST['addcontact']))
{
			if (!empty($contact))
							{
		$addcontact = $_POST['addcontact'];
		mysql_query('UPDATE '.$tableAccount.' SET contact="'.$contact.', '.$addcontact.'" WHERE id="'.$id.'"')or die('Erreur de connexion '.mysql_error());
		echo '<meta http-equiv="Refresh" content="0;url=index.php">';
							}
			else
						{
mysql_query('UPDATE '.$tableAccount.' SET contact="'.$_POST['addcontact'].'" WHERE id="'.$id.'"')or die('Erreur de connexion '.mysql_error());
		echo '<meta http-equiv="Refresh" content="0;url=index.php">';
						}
	
}
?>
</div>