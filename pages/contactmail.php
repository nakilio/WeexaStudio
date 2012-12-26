<?php include('studioID/session.php');?>
<?php
include('config.php');
?>
<div class="barformmailhight">
	<a class="boutonbarremail" href="index.php?site=mail&page" title="Retour au mail"><img src="images/listemail.png"/></a>
<h2 style="text-shadow: 0 0 20px grey; color: white; height: 40px; padding:15px;">Gestionnaire de contact</h2>

</div>
<div class="tablemailblock">

<div class="searchmusicform">	
	<h2 style="text-shadow: 0 0 20px #333; color: #333; height: 40px; padding:15px;">Ajouter un contact</h2>
		<form method="post"><input  type="text" placeholder="Pseudo du contact..." name="addcontact" required/> <input type="submit" value="Valider"/></form>
</div>
<div class="zonecartevisite">		
<?php
if (!empty($contact))
	{
		$donnee=explode(", ",$contact); //chaines séparées par une virgule
  		$boucle='1';
 		while ($boucle < sizeof($donnee))
			 {
				
				$db = mysql_connect($hostBDD, $userBDD, $passwordBDD)  or die('Erreur de connexion '.mysql_error()); 
				$sql = "select * from $tableAccount where pseudo='".$donnee[$boucle]."'";
				$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
				while($data = mysql_fetch_assoc($req))
					{
						$prenom = $data['prenom'];
						$nom = $data['nom'];
						$imgprofil = $data['imgprofil'];
					}

				if($imgprofil == 1)
					{
  						$imgprofil = 'users/profil/'.$donnee[$boucle].'.png';
					}
				else
					{
						$imgprofil = 'images/BG3.png';
					}
					
				echo '<div class="cartevisite">
						<img class="profilcarte" src="'.$imgprofil.'"/>
						<div class="cartename">'.$prenom.' '.$nom.'</div>
						<div class="cartepseudo">'.$donnee[$boucle].'</div>
						<div class="barrecartevisitebas"><a class="contactlink" href="index.php?site=mail&page=4&delcontact='.$donnee[$boucle].'" title="Supprimer le contact"><img src="images/been.png"/></a><a class="contactlink" href="index.php?site=mail&page=1&pseudo='.$donnee[$boucle].'" title="Envoyer un mail à ce contact"><img src="images/send.png"/></a></div>
				      </div>';
    				$boucle++;
			 }
	}
echo '</div>	</div>';
if(isset($_GET['delcontact']))
{
	
	$contactmodifie = preg_replace('#, '.$_GET['delcontact'].'#', '', $contact);;
	$db = mysql_connect($hostBDD, $userBDD, $passwordBDD)  or die('Erreur de connexion '.mysql_error());
	mysql_select_db($bdd ,$db)  or die('Erreur de selection '.mysql_error());
	mysql_query('UPDATE '.$tableAccount.' SET contact="'.$contactmodifie.'" WHERE pseudo="'.$pseudo.'"')or die('Erreur de connexion '.mysql_error());
	mysql_close($db);
	echo '<meta http-equiv="refresh" content="0; URL=index.php?site=mail&page=4">';
}
if(isset($_POST['addcontact']))
{
$db = mysql_connect($hostBDD, $userBDD, $passwordBDD)  or die('Erreur de connexion '.mysql_error()); 
				$sql = "select * from $tableAccount where pseudo='".$_POST['addcontact']."'";
				$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());

$testresult = mysql_fetch_assoc($req);
if(!empty($testresult))
{
if (!empty($contact))
							{
		$addcontact = $_POST['addcontact'];
		mysql_query('UPDATE '.$tableAccount.' SET contact="'.$contact.', '.$addcontact.'" WHERE id="'.$id.'"')or die('Erreur de connexion '.mysql_error());
		echo '<meta http-equiv="Refresh" content="0;url=index.php?site=mail&page=4">';
							}
			else
						{
mysql_query('UPDATE '.$tableAccount.' SET contact="'.$_POST['addcontact'].'" WHERE id="'.$id.'"')or die('Erreur de connexion '.mysql_error());
		echo '<meta http-equiv="Refresh" content="0;url=index.php?site=mail&page=4">';
						}
}
else
{
echo'<script>alert("Pseudo inexistant, veuillez ressayer avec une autre orthographe");</script>';
}	
}
?>
<div class="barformmailbottom"></div>
