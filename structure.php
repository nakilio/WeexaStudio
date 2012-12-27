<!DOCTYPE html>
<html>
    <head>
        <title>Weexa Studio | <?php echo ($title); ?> </title>
		<link rel="icon" type="image/x-icon" href="favicon.ico" />
		<link rel="stylesheet" href="css/styles.css" />
		<meta name="owner" content="Weexa Studio">
		<meta charset="UTF-8">
			<script>
				function affichagemenu()
				{
					var menu=document.getElementById('menu');
						menuapp=document.getElementById('menuapp');
					menu.style.display='block';
					menuapp.style.background='#333';
				}
				function deaffichagemenu()
				{
					var menu=document.getElementById('menu');
					menu.style.display='none';
					menuapp.style.background='#5e5d5d';
				}
				

function gradient(id, level)
{
	var box = document.getElementById(id);
	box.style.opacity = level;
	box.style.MozOpacity = level;
	box.style.KhtmlOpacity = level;
	box.style.filter = "alpha(opacity=" + level * 100 + ")";
	box.style.display="block";
	return;
}


function fadein(id) 
{
	var level = 0;
	while(level <= 1)
	{
		setTimeout( "gradient('" + id + "'," + level + ")", (level* 1000) + 10);
		level += 0.01;
	}
}


// Open the lightbox


function openbox(formtitle, fadin)
{
  var box = document.getElementById('box'); 
  document.getElementById('shadowing').style.display='block';

  var btitle = document.getElementById('boxtitle');
  btitle.innerHTML = formtitle;
  
  if(fadin)
  {
	 gradient("box", 0);
	 fadein("box");
  }
  else
  { 	
    box.style.display='block';
  }  	
}


// Close the lightbox

function closebox()
{
   document.getElementById('box').style.display='none';
   document.getElementById('shadowing').style.display='none';
}

</script>
    </head>
   <body>
	<nav>
		<ul>
			<li><img src="images/logo.png" alt="logo"/></li>
			<li id="menuapp"><a href="#" onMouseOver="affichagemenu()" onMouseOut="deaffichagemenu()"><img src="images/flechemenubas.png" alt="menu"/></a></li>
			<div id="menu" onMouseOver="affichagemenu()" onMouseOut="deaffichagemenu()"><a href="index.php"><div class="item"><img src="images/thumb-1.gif"/></br>Accueil</div></a><a href="index.php?site=musique&page"><div class="item" ><img src="images/thumb-3.png"/></br>MusicWorks</div></a><a href="index.php?site=software"><div class="item" ><img src="images/thumb-4.gif"/></br>CodeMaker</div></a><a href="index.php?site=photo"><div class="item" ><img src="images/weexaphotologo.png"/></br>Photo</div></a><a href="index.php?site=enplus"><div class="item" ><img src="images/thumb-5.png"/></div></a></div>
		</ul>
				<div class="button_group"><?php 
				if(isset($_SESSION['pseudo']))
				{
				include('studioID/infos_user.php');
				if($imgprofil == 1)
				{
					$imgprofil = 'users/profil/'.$_SESSION['pseudo'].'.png';
				}
				else
				{
				$imgprofil = 'images/profildefault.png';
				}
				echo'<a href="#" onclick="openbox(\'Photo de profil\', 0)"><img src="'.$imgprofil.'" id="profil"></a><a class="btn_left_nolink">'.$prenom.' '.$nom.'</a><a class="btn_center" href="index.php?site=mail&page"><div class="nombremessage">'.$nbsmsg.'</div><img src="images/mail.png"/></a><a class="btn_center" href="index.php?site=settings"><img src="images/settings.png"/></a><a class="btn_right" href="index.php?site=logout"><img src="images/logout.png"/></a>';
				}
				else
				{
				echo'<a class="btn_left" href="index.php?site=register"><img src="images/inscription.png"/></a><a class="btn_right" href="index.php?site=login"><img src="images/login.png"/></a>';
				}
				?>
				</div>

		
	</nav>
	<div id="shadowing" onclick="closebox()"></div>
<div id="box">
  <span id="boxtitle"></span>
	<?php echo'<img src="'.$imgprofil.'" style="float: right; max-width: 100px;"/></a>';?>
	<div class="formphotoprofil">
<form method="POST" enctype="multipart/form-data" >
	<h4>Photo de profil</h4>
     <input type="hidden" name="MAX_FILE_SIZE" value="1000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000">
     <input type="file" name="image"><br /><br />
     <input class="submit" type="submit" value="OK"/>
	
</form>
<?php

if(isset($_FILES['image']))
{
$dir = "users/profil/";
$fichier = basename($_FILES['image']['name']);
$extensions = array('.jpg', '.png', '.JPG', '.PNG', '.GIF', '.gif', '.ico', '.ICO'); //extensions autorisées
$extension = strrchr($_FILES['image']['name'], '.'); 
$handle=opendir($dir);
$projectsListIgnore = array ('.','..');
$projectContents = '';
$taille_maxi = 100000000;
$taille = filesize($_FILES['image']['tmp_name']);
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
		if(move_uploaded_file($_FILES['image']['tmp_name'], $dir . $_SESSION['pseudo'].'.png')) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
		{
		$db = mysql_connect($hostBDD, $userBDD, $passwordBDD)  or die('Erreur de connexion '.mysql_error());
		mysql_select_db($bdd ,$db)  or die('Erreur de selection '.mysql_error());
		mysql_query('UPDATE '.$tableAccount.' SET imgprofil="1" WHERE id="'.$id.'"')or die('Erreur de connexion '.mysql_error());
		mysql_close($db);
		echo '<meta http-equiv="Refresh" content="0;url=">';
		}
		else{ echo 'Echec de l\'upload !';}
	}
	else
	{
		echo $erreur;
	}
}
}
if(isset($_POST['delphoto']))
{
	$db = mysql_connect($hostBDD, $userBDD, $passwordBDD)  or die('Erreur de connexion '.mysql_error());
	mysql_select_db($bdd ,$db)  or die('Erreur de selection '.mysql_error());
	mysql_query('UPDATE '.$tableAccount.' SET imgprofil="0" WHERE id="'.$id.'"')or die('Erreur de connexion '.mysql_error());
		echo '<meta http-equiv="refresh" content="0; URL=">';
	mysql_close($db);
}
?>
<form method="POST" enctype="multipart/form-data" name="delprofil">
<input type="hidden" name="delphoto" value="del"/>
 <input id="buttonrouge" type="button" onclick="ok2()" value="Supprimer mon image de profil"/>
</form>
<script type="text/javascript">
function ok2()
{
	if (confirm("Votre images de profil sera supprimée")) 
	{
		 document.delprofil.submit();
	}
}
</script>
	</div>
	</div>

</div>
	<?php include($include); ?>
    </body>
</html>