<?php
	$db = mysql_connect($hostBDD, $userBDD, $passwordBDD)  or die('Erreur de connexion '.mysql_error());
	mysql_select_db($bdd ,$db)  or die('Erreur de selection '.mysql_error()); 
	$sql = "select * from $tableAccount where pseudo='".$_SESSION['pseudo']."'";
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($data = mysql_fetch_assoc($req))
	{
		$nom = $data['nom'];
		$prenom = $data['prenom'];
		$contact = $data['contact'];
		$password = md5($data['password']);
		$password_md5 = $data['password'];
		$mail = $data['mail'];	
		$id = $data['ID'];
		$imgprofil = $data['imgprofil'];
		$pseudo = $_SESSION['pseudo'];
	}
        $sql2 = "SELECT COUNT(*) NBR_ENTREE FROM $tablemail WHERE destinataire='".$pseudo."'";
	$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error());
    $row=mysql_fetch_object($req2);

$nbsmsg = $row->NBR_ENTREE;
if($nbsmsg=='0')
{
$nbsmsg = null;
}
?>
