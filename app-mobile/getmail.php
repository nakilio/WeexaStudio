<style>
body
{
margin: 0;
padding: 0;
font-family: ubuntu, Arial;
}
table
{
border-top: 1px solid #5e5d5d;
border-bottom: 1px solid #5e5d5d;
width: 100%;
text-align: center;
border-collapse: collapse;
}
table thead tr td
{
background: linear-gradient(#7c7c7c, #cecece);
color: #333;
height: 25px;
}
table tr td
{
background: #7c7c7c;
color: white;
font-weight: bold;
border-bottom: 1px solid #333;
height: 50px;
}
table tr td a
{
color: #
}
</style>
<table id="tablemail">
			<thead>
				<tr><td>sujet</td><td>envoyeur</td><td></td></tr>
			</thead>
<?php
$hostBDD = '127.0.0.1';
	$userBDD = 'root';
	$passwordBDD  = '';
    $bdd = 'WeexaStudio';
	// Base de donée
	
	/*$hostBDD = 'sql.mtxserv.fr';  
	$userBDD = 'w_5828';
	$passwordBDD  = 'sciences';
    $bdd = '5828_sql';*/
	

$tablemail = 'mail';
$pseudo = $_GET['user'];

$db = mysql_connect($hostBDD, $userBDD, $passwordBDD)  or die('Erreur de connexion '.mysql_error());
	mysql_select_db($bdd ,$db)  or die('Erreur de selection '.mysql_error()); 

$counter=mysql_query("SELECT COUNT(*) NBR_ENTREE FROM $tablemail WHERE destinataire='".$pseudo."'");

// Récupère la seule ligne du jeu d'enregistrements
$row=mysql_fetch_object($counter);
$nbsmsg = $row->NBR_ENTREE;
$i = '0';
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
		echo '<tr><td><a href="index.php?site=mail&page=2&view='.$idmail.'">'.$sujet.'</a></td><td>'.$sender.'</td><td><a href="http://localhost/WeexaStudio/app-mobile/delmail.php?id='.$idmail.'&user='.$pseudo.'"><img src="been.png"/></a></td></tr>';	
$i++;
}
}

if($nbsmsg=='0')
{
echo '<div style="text-align: center; border-bottom: 1px solid #333; padding-top: 10px; padding-bottom: 10px; background: yellow; color: #333;">Aucun message</div>';
}
echo '</table></div>';
echo'</div>';
?>
</table>
