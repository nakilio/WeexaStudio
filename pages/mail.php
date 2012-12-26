<?php
include('studioID/session.php');
switch($_GET['page'])
{
	case 1 :
		include('pages/formsendmail.php');
		break;
	case 2 :
		include('pages/viewmail.php');
		break;
	case 3 :
		include('pages/repondremail.php');
		break;
	case 4 :
		include('pages/contactmail.php');
		break;
	default :
		include('pages/voirmail.php');
		break;
}
?>

