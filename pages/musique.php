<?php include('studioID/session.php');?>
<div id="app_bar_menu">
	<h1 class="app_bar_titre">Weexa Musique</h1>
</div>
<?php
if(isset($_GET['page']))
 {
  switch($_GET['page'])
    {
	case 1:
		$include2='musiqueaccueil.php';
		$include3='musicsearch.php';
		$title='Recherchez';
		break;
	case 2:
		$include2='musiqueaccueil.php';
		$include3='allpart.php';
		$title='Toutes les partitions';
		break;
	case 3:
		$include2='parteditor.php';
		$title='Editeur de partition';
		break;
	 case 4:
		$include2='musiqueaccueil.php';
		$include3='fichepart.php';
		$title= 'Fiche '.$_GET['namepart'];
		break;
	 case 5:
		$include2='musiqueaccueil.php';
		$include3='mypart.php';
		$title= 'Mes partitions';
		break;
	default:
		$include2='musiqueaccueil.php';
		$title='Musique';
		break;
    }
	include $include2;
 }
 else
  {
   echo '<meta http-equiv="refresh" content="0; URL=index.php?site=musique&page">';
  }
?>
