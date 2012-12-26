<?php
session_start();
$pseudo = trim($_SESSION['pseudo']);
?>
<?php
include('../config.php');
$db = mysql_connect($hostBDD, $userBDD, $passwordBDD)  or die('Erreur de connexion '.mysql_error());
// sélection de la base  

    mysql_select_db($bdd ,$db)  or die('Erreur de selection '.mysql_error()); 
     
    // on écrit la requête sql 
    $sql = "SELECT * FROM $tableChat ORDER BY id DESC"; 
     
    // on insère les informations du formulaire dans la table 
  $res=mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error()); 
    // on affiche le résultat pour le visiteur 
    while ($data = mysql_fetch_array($res))
{
  $couleur = "black";
$pseudo_chat = $data['pseudo'];

  	$sql_2 = "SELECT level FROM $tableAccount where pseudo='$pseudo_chat'"; 
  $res_2=mysql_query($sql_2) or die('Erreur SQL !'.$sql_2.'<br>'.mysql_error()); 
  $data_2 = mysql_fetch_array($res_2);
  $sql_3 = "SELECT level FROM $tableAccount where pseudo='$pseudo'"; 
  $res_3=mysql_query($sql_3) or die('Erreur SQL !'.$sql_3.'<br>'.mysql_error()); 
  $data_3 = mysql_fetch_array($res_3);
  if($data_2['level'] == 1)
  {
  $couleur = "red";
  }
$message= $data['message'];
include('smiley.php');
$message = wordwrap($message, 50,"<br>",1);
if($data_3['level'] == 1)
{
	if($data['supr'] == 1)
	{
	echo('<div class="message">
	<div class="pseudo-heure">'.$data['heure'].' | '.$pseudo_chat.'</div>
	<div class="delete-message">
	<a href="chat/delete_msg_admin.php?id='.$data['id'].'">
	<img src="images/delete.png">
	</a>
	</div>
	<div class="contenu-message"><font color="green">'.$message.'</font></div>
</div>'); 	}
	else
	{
	echo('<div class="message">
	<div class="pseudo-heure">'.$data['heure'].' | '.$pseudo_chat.'</div>
	<div class="delete-message">
	<a href="chat/delete_msg_admin.php?id='.$data['id'].'">
	<img src="images/delete.png">
	</a>
	</div>
	<div class="contenu-message"><font color="green">'.$message.'</font></div>
</div>'); 	}
}
else if($pseudo_chat == $pseudo && $data['supr'] != '1')
{
	include('censure.php');

	echo('<div class="message">
	<div class="pseudo-heure">'.$data['heure'].' | '.$pseudo_chat.'</div>
	<div class="delete-message">
	<a href="chat/delete_msg_member.php?id='.$data['id'].'">
	<img src="images/delete.png">
	</a>
	</div>
	<div class="contenu-message">'.$message.'</div>
</div>'); }
else
{
include('censure.php');

	if($data['supr'] == 1)
	{
	echo('<div class="message">
	<div class="pseudo-heure">'.$data['heure'].' | '.$pseudo_chat.'</div>
	<div class="delete-message">
	<a href="chat/delete_msg_member.php?id='.$data['id'].'">
	<img src="images/delete.png">
	</a>
	</div>
	<div class="contenu-message">'.$message.'</div>
</div>'); 
	}
	else
	{
	echo('<div class="message">
	<div class="pseudo-heure">'.$data['heure'].' | '.$pseudo_chat.'</div>
	<div class="delete-message">
	<a href="chat/delete_msg_member.php?id='.$data['id'].'">
	<img src="images/delete.png">
	</a>
	</div>
	<div class="contenu-message"><font color="'.$couleur.'">'.$message.'</font></div>
</div>'); 

	}
}
}

    mysql_close($db);  // on ferme la connexion 
	
?>

  </body>
</html>