<?php
include('studioID/session.php');
include('studioID/infos_user.php');
include('config.php');
$counter=mysql_query("SELECT COUNT(*) NBR_ENTREE FROM $tablemail WHERE destinataire='".$pseudo."'");

// Récupère la seule ligne du jeu d'enregistrements
$row=mysql_fetch_object($counter);
$nbsmsg = $row->NBR_ENTREE;
$i = '0';
echo '<div class="barformmailhight">
	<a class="boutonbarremail" href="index.php?site=mail&page=1" title="Ecrire un mail"><img src="images/newmail.png"/></a>
	<a class="boutonbarremail" href="index.php?site=mail&page=4" title="Gerer ses contacts"><img src="images/gestcontact.png"/></a>
<h1 style="text-shadow: 0 0 20px grey; color: white; height: 40px; padding:15px;">Messages</h1>
</div>
<div class="tablemailblock">
<div class="zonecartevisite">
<table class="tablemail">
<tr><td>Sujet</td><td>Envoyeur</td><td>Date</td><td>Supprimer</td></tr>';
while($i != $nbsmsg)
{
$messagerecu = mysql_query("select * from $tablemail where destinataire='".$pseudo."'") or die ('Un erreur est survenue : <b>'.mysql_error()).'</b>';	//insertion dans la bdd
while($data = mysql_fetch_assoc($messagerecu))
	{
		$dest = $data['destinataire'];
		$sender = $data['sender'];
		$sujet = $data['sujet'];
		$mail = $data['mail'];
		$date = $data['date'];
		$read = $data['read'];	
		$idmail = $data['id'];	
		if(empty($sujet))
			{
				$sujet = 'Sans sujet';
			}
		echo '
<tr class="entetetab">
	<td>
		<a href="index.php?site=mail&page=2&view='.$idmail.'">'.$sujet.'</a>
	</td>
	<td>'.$sender.'</td>
	<td> '.$date.'</td>
	<td>
		<a href="index.php?site=mail&page&id='.$idmail.'">Supprimer</a>
	</td>
</tr>';	
$i++;
}
}

if($nbsmsg=='0')
{
echo '<div style="border-bottom: 1px solid #333; padding-top: 10px; padding-bottom: 10px; background: yellow; color: #333;">Aucun message</div>';
}
echo '</table></div>';
echo'</div>';
?>
<?php

if(isset($_GET['id']))
{
	$id = $_GET['id'];
	mysql_query("DELETE FROM `$tablemail` WHERE id=".$id);
	echo '<meta http-equiv="refresh" content="0; URL=index.php?site=mail&page">';
}

?>
<?php
if(isset($_POST['dest']))
{
$nomjour = date('w');
$numjour = date('j');
$nummois = date('n');
$annee = date('Y');
$heure = date('G');
$minute = date('i');
$seconde = date('s');
switch ($nomjour)
{
	case 0:
		$jour = 'Dimanche';
	case 1:
		$jour = 'Lundi';
	case 2:
		$jour = 'Mardi';
	case 3:
		$jour = 'Mercredi';
	case 4:
		$jour = 'Jeudi';
	case 5:
		$jour = 'Vendredi';
	case 6:
		$jour = 'Samedi';
}
switch ($nummois)
{
	case 1:
		$mois = 'Janvier';
	case 2:
		$mois = 'Février';
	case 3:
		$mois = 'Mars';
	case 4:
		$mois = 'Avril';
	case 5:
		$mois = 'Mai';
	case 6:
		$mois= 'Juin';
	case 7:
		$mois = 'Juillet';
	case 8:
		$mois = 'Août';
	case 9:
		$mois = 'Septembre';
	case 10:
		$mois = 'Octobre';
	case 11:
		$mois = 'Novembre';
	case 12:
		$mois = 'Décembre';
}
$time = $jour.' '.$numjour.' '.$mois.' '.$annee.' &agrave; '.$heure.' : '.$minute.' : '.$seconde;
$dest = $_POST['dest'];
$obj = $_POST['objet'];
$msg = $_POST['msginput'];
mysql_query("INSERT INTO $tablemail VALUES ('$dest', '$pseudo', '$obj', '$msg', '$time','0', '')") or die ('Un erreur est survenue lors de votre inscription'.mysql_error());	//insertion dans la bdd
	mysql_close($db);
echo '<meta http-equiv="refresh" content="0; URL=index.php?site=mail&page">';
}
if(isset($_GET['id']))
{
	$id = $_GET['id'];
	mysql_query("DELETE FROM `$tablemail` WHERE id=".$id);
	echo '<meta http-equiv="Refresh" content="0; URL=index.php?site=mail&page=">';
}
?>

