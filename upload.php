<?php
if(isset($_POST['form']))
{
if(isset($_POST['form']))
{
$dir = "users/profil/";
$fichier = basename($_POST['form']['name']);
$extensions = array('.jpg', '.png', '.JPG', '.PNG', '.GIF', '.gif'); //extensions autorisées
$extension = strrchr($_POST['form']['name'], '.'); 
$handle=opendir($dir);
$projectsListIgnore = array ('.','..');
$projectContents = '';
$taille_maxi = 100000000;
$taille = filesize($_POST['form']['tmp_name']);
  $n = explode("/", $dir.$fichier); 
  $name2 = $n[count($n)-1];
  $position = strpos($name2, ".");
  $name = substr($fichier, 0, $position);
  $t = explode(".", $dir.$fichier); 
  $randchar = rand(5, 15);
  function random_str($nbr)
  {
    $randname = "";
    $chaine = "abcdefghijklmnpqrstuvwxy0123456789";
    srand((double)microtime()*1000);

    for($i=0; $i<$nbr; $i++) {
        $randname .= $chaine[rand()%strlen($chaine)];
    }

    return $randname;
  }
   $randname = random_str($randchar);
if (!is_dir($fichier) && !in_array($fichier,$projectsListIgnore) && $fichier != "index.php") 
{		
	if(!in_array($extension, $extensions))
	{
		$erreur = 'Ce type de fichier n\'est pas accepter';
	}
	if($taille>$taille_maxi)
	{
		$erreur = 'Le fichier est trop gros...';
	}
	if(!isset($erreur)){
		if(move_uploaded_file($_POST['form']['tmp_name'], $dir . $_SESSION['pseudo'].'.png')) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
		{
		$db = mysql_connect($hostBDD, $userBDD, $passwordBDD)  or die('Erreur de connexion '.mysql_error());
		mysql_select_db($bdd ,$db)  or die('Erreur de selection '.mysql_error());
		mysql_query('UPDATE '.$tableAccount.' SET imgprofil="1" WHERE id="'.$id.'"')or die('Erreur de connexion '.mysql_error());
		mysql_close($db);
		echo '<meta http-equiv="Refresh" content="0;url=index.php">';
		}
		else{ echo 'Echec de l\'upload !';}
	}
	else
	{
		echo $erreur;
	}
}
}
}
?>

