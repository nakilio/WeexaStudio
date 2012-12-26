
<?php
if(!isset($_SESSION['pseudo']))
 {
  echo'<div class="formulairelog"><fieldset><img src="images/studioID.png" class="logostudioID" alt="logo studio ID"/></br>Pour utiliser ce service vous devez vous connecter !</br></br></br><a id="bouton" href="index.php?site=login">Connexion</a><a id="bouton" href="index.php?site=register">Inscription</a></br></br></br></fieldset></div>';
  exit();
}
?>