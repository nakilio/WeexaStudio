<?php
if(isset($_GET['id']))
{
$hostBDD = '127.0.0.1';
	$userBDD = 'root';
	$passwordBDD  = '';
    $bdd = 'WeexaStudio';
	$tablemail = 'mail';
	$db = mysql_connect($hostBDD, $userBDD, $passwordBDD)  or die('Erreur de connexion '.mysql_error());
	mysql_select_db($bdd ,$db)  or die('Erreur de selection '.mysql_error()); 

	$id = $_GET['id'];
	$pseudo = $_GET['user'];
	mysql_query("DELETE FROM `$tablemail` WHERE id=".$id);
	echo '<meta http-equiv="refresh" content="0; URL=http://localhost/WeexaStudio/app-mobile/getmail.php?user='.$pseudo.'">';
}

