 <?php
include('studioID/session.php');
?>
<div class="formulairelog">
<div class="normal">Uploadez vos images facilement et partagez-les sur Facebook, Twitter, Forum...</div>
<fieldset>


<h1>Weexa Photo</h1></br></br>	
<form method="POST" action="index.php?site=photo" enctype="multipart/form-data" >
     <!-- On limite le fichier à 100Mo -->
     <input type="file" name="imageweexaphoto"><br><br>
     <input class="submit" type="submit" value="OK"/>
</form>
</fieldset>
</div>
<div id="panelWphoto">
	
<?php
if (!empty($_GET['i']))
{
$image = $_GET['i'];
	if(!file_exists("users/".$pseudo."/photo/"))
	{
		echo'Image inexistante';
	}
	else
	{
	$dir = "users/".$pseudo."/photo/";
	$sitedirimage = "http://weexa.mtxserv.fr/users/".$pseudo."/photo/";
	$siteimage = "http://weexa.mtxserv.fr/index.php?site=photo&i=";
	$siteMiniature = "http://weexa.mtxserv.fr/users/".$pseudo."/photo/";
	$url = "http://weexa.mtxserv.fr/Visioneuse%20de%20Photo.php?img=users/".$pseudo."/photo/".$image;
	$t = explode(".", $dir.$image); 
	$ext = $t[count($t)-1]; 
	list($width, $height) = getimagesize($dir.$image);
	$size = $width. " x " .$height. " pixels";
	$title=urlencode('WeexaPhoto : '.$image);
    $urlShare=urlencode($url);
    $summaryFB=urlencode('Image heberger par le service Weexa Photo de Weexa Studio .');
    $miniatureFB=urlencode($siteMiniature.$image);
      echo '
	  
	<div class="socialbar">
		<a id="bouton" href="pages/photo_dl.php?download='.$image.'&dir=users/'.$pseudo.'/photo/">Download</a>
		<div class="socialbutton">
			<a onClick="window.open(\'http://twitter.com/share?url='.$urlShare.'&via=WeexaStudio\', \'sharer\', \'toolbar=0,status=0,width=548,height=325\');" target="_parent" href="javascript: void(0)"><img src="images/ico-twitter.png"/></a>
			<a onClick="window.open(\'http://www.facebook.com/sharer.php?s=100&amp;p[title]='.$title.'&amp;p[summary]='.$summaryFB.'&amp;p[url]='.$urlShare.'&amp;&p[images][0]='.$miniatureFB.'\', \'sharer\', \'toolbar=0,status=0,width=548,height=325\');" target="_parent" href="javascript: void(0)"><img src="images/ico-facebook.png"/></a>
		</div>
		<input readonly="readonly" type="text" value="' . $url . '" size="60"/>
	</div>
	<div class="zoneaffphoto">
		<img alt="WeexaImages" class="img" src="users/'.$pseudo.'/photo/'.$image.'">
	</div>';
	
	}
	}
?>
<h1>Vos Photos</h1>
<?php
	echo'<div id="affimageaccount" style="text-align: left;">';
$dir_nom = 'users/'.$pseudo.'/photo/'; // dossier listé (pour lister le répertoir courant : $dir_nom = '.'  --> ('point')
$dir = opendir($dir_nom) or die('Erreur de listage : le répertoire n\'existe pas'); // on ouvre le contenu du dossier courant
$fichier= array(); // on déclare le tableau contenant le nom des fichiers
$dossier= array(); // on déclare le tableau contenant le nom des dossiers

while($element = readdir($dir)) {
	if($element != '.' && $element != '..') {
		if (!is_dir($dir_nom.'/'.$element)) {$fichier[] = $element;}
		else {$dossier[] = $element;}
	}
}

closedir($dir);


if(!empty($fichier)){
	sort($fichier);// pour le tri croissant, rsort() pour le tri décroissa, nt
		foreach($fichier as $lien) {

echo '<a href="index.php?site=photo&i='.$lien.'#panelWphoto"><img style="max-width: 150px;max-height: 150px; margin: 10px; " src="'.$dir_nom.'/'.$lien.'"/></a><a class="delimages" href="index.php?site=photo&deli='.$lien.'"><img src="images/delete.png"/></a>';

		}
 }


?>
</div></div></br></br></br></br></br>
<?php
if (isset($_FILES['imageweexaphoto']))
{
$dir = "users/".$pseudo."/photo/";
$fichier = basename($_FILES['imageweexaphoto']['name']);
$extensions = array('.gif','.ico','.bmp','.jpg', '.png', '.GIF','.ICO','.BMP','.JPG', '.PNG', '.svg', '.SVG');
$extension = strrchr($_FILES['imageweexaphoto']['name'], '.'); 
$handle=opendir($dir);
$projectsListIgnore = array ('.','..');
$projectContents = '';
$taille_maxi = 10000000000000000000000000000000000000000000000000000000;
$taille = filesize($_FILES['imageweexaphoto']['tmp_name']);
  $n = explode("/", $dir.$fichier); 
  $name2 = $n[count($n)-1];
  $position = strpos($name2, ".");
  $name = substr($fichier, 0, $position);
  $t = explode(".", $dir.$fichier); 
  $randchar = rand(5, 15);

   $randname = randomName($randchar);
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
		if(move_uploaded_file($_FILES['imageweexaphoto']['tmp_name'], $dir . $randname.$extension)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
		{
		echo '<meta http-equiv="Refresh" content="0;url=index.php?site=photo&i='.$randname.$extension.'">';
		}
		else{ echo 'Echec de l\'upload !';}
	}
	else
	{
		echo $erreur;
	}
}
}
?>
<?php
if(isset($_GET['deli']))
{
unlink("users/".$pseudo."/photo/".$_GET['deli']);
echo '<meta http-equiv="Refresh" content="0;url=index.php?site=photo#affimageaccount">';
}
?>