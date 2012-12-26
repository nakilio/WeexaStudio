<?php
if(isset($_GET['id']))
{
	$id = $_GET['id'];
	include('config.php');
	$db = mysql_connect($hostBDD, $userBDD, $passwordBDD)  or die('Erreur de connexion '.mysql_error());
    mysql_select_db($bdd ,$db)  or die('Erreur de selection '.mysql_error()); 
	$sql = mysql_query("DELETE FROM `$tablemail` WHERE id=".$id);
	echo '<meta http-equiv="refresh" content="10; URL=index.php?site=mail">';
	
}
?>
