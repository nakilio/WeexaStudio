<?php include('studioID/session.php');?>
<form name="formmail" action="index.php?site=mail&page" method="POST" >
<div class="barformmailhight">
	<a class="boutonbarremail" href="index.php?site=mail&page" title="Retour au mail"><img src="images/listemail.png"/></a>
	<a class="boutonbarremail" href="#" onClick="envoi();" title="Envoyer le mail"><img src="images/message.png"/></a>
	<div class="englobemenu">
	<a class="boutonbarremail" href="#" title="ajouter un destinataire"><img src="images/addpseudo.png"/></a>
				<div id="sousmenu">
				<?php
						if (!empty($contact))
							{
								$donnee=explode(", ",$contact); //chaines séparées par une virgule
  								$boucle=0;
 								 while ($boucle < sizeof($donnee))
									 {
    										$db = mysql_connect($hostBDD, $userBDD, $passwordBDD)  or die('Erreur de connexion '.mysql_error()); 
										$sql = "select * from $tableAccount where pseudo='".$donnee[$boucle]."'";
										$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
										while($data = mysql_fetch_assoc($req))
											{
												$prenom = $data['prenom'];
												$nom = $data['nom'];
											}
										echo '<div><a href="#" onclick="addpseudo(\''.$donnee[$boucle].'\')" >'.$prenom.' '.$nom.'</a></div>';
    										$boucle++;
									  }
							}
?>
				</div>
</div>
	<label style="margin-left: 10px;" class="labelmsgbar">Destinataire</label><input value="<?php if(isset($_GET['pseudo'])){echo $_GET['pseudo'];}?>"style="width: 188px; margin-top: 15px;"  type="text" name="dest" id="destinataire" placeholder="Pseudo du destinataire" required/>
	 <label class="labelmsgbar">Objet </label><input style="width: 250px;" class="inputsendform" type="text" placeholder="Objet du message..." name="objet" required/></div>
	<div id="zonescriptmail" contenteditable>

	</div>
<div class="barformmailbottom">
<a style="text-decoration: none;" class="boutonbarremail" onclick="execCommand('bold',false,null)" href="#" ><font style="font-weight: bold; color: white;padding-top: 30px; font-size: 25px;">A</font></a>
<a style="text-decoration: none;" class="boutonbarremail" onclick="execCommand('italic',false,null)" href="#" ><font style="font-style: italic; color: white;padding-top: 30px; font-size: 25px;">A</font></a>
<a class="boutonbarremail" onclick="execCommand('underline',false,null)" href="#" ><font style="text-decoration: underline;  color: white;padding-top: 30px; font-size: 25px;">A</font></a>
<a class="boutonbarremail" onclick="execCommand('justifyLeft',false, null)" href="#"><img src="images/left.png"/></a>
<a class="boutonbarremail" onclick="execCommand('justifyCenter',false, null)" href="#"><img src="images/center.png"/></a>
<a class="boutonbarremail" onclick="execCommand('justifyRight',false, null)" href="#"><img src="images/right.png"/></a>
<span class="boutonbarremail"><a onclick="execCommand('forecolor',false, 'black')" href="#"><img src="images/colorblack.png"/></a><a onclick="execCommand('forecolor',false, '007b00')" href="#"><img src="images/colorgreen.png"/></a><a onclick="execCommand('forecolor',false, 'red')" href="#"><img src="images/colorred.png"/></a><a onclick="execCommand('forecolor',false, '#ff5b00')" href="#"><img src="images/coloryellow.png"/><a onclick="execCommand('forecolor',false, 'blue')" href="#"><img src="images/colorblue.png"/></a></span>
<a class="boutonbarremail" style="text-decoration: none;" onclick="execCommand('increaseFontSize',false, '-')" href="#"><font style="font-weight: bold; color: white;padding-top: 30px; font-size: 25px;">A +</font></a>
<a class="boutonbarremail" style="text-decoration: none;" onclick="execCommand('decreaseFontSize',false, '-')" href="#"><font style="font-weight: bold; color: white;padding-top: 30px; font-size: 25px;">A -</font></a>
	<div class="englobemenu">
	<a class="boutonbarremail" href="#" title="ajouter un destinataire"><font style="font-weight: bold; color: white;padding-top: 30px; font-size: 25px;">Smiley</font></a>
				<div id="sousmenu2">
				<?php
				$dir_nom = 'images/smiley/'; // dossier listé (pour lister le répertoir courant : $dir_nom = '.'  --> ('point')
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

if(!empty($dossier)) {
	sort($dossier); // pour le tri croissant, rsort() pour le tri décroissant
	echo "\t\t<ul>\n";
		foreach($dossier as $lien){
			echo "\t\t\t<li><a href=\"$dir_nom/$lien \">$lien</a></li>\n";
		}
	echo "\t\t</ul>";
}

if(!empty($fichier)){
	sort($fichier);// pour le tri croissant, rsort() pour le tri décroissa, nt
		foreach($fichier as $lien) {

echo '<a href="#" onclick="execCommand("insertHTML", true, "<img src='.$dir_nom.$lien.'/><img src="'.$dir_nom.'/'.$lien.'"/></a>';

		}
 }
?>
				</div>
</div>
</div>
<input type="hidden" name="msginput" value=""/>

<script>

	function envoi() 
		{
			var div = document.getElementById('zonescriptmail');
			var msg = div.innerHTML;
    			document.formmail.msginput.value= msg;
    			if (confirm("Le mail va être envoyé ! ")) 
				{
    					document.formmail.submit();
				}
    		}
	function addpseudo(valuepseudo)
		{
			document.formmail.dest.value= valuepseudo;
		}
	function openMenu(menuid)
		{
			var menu = document.getElementById(menuid);
			menu.style.display='block';
		}
		
		function closeMenu(menuid)
		{
			var menu = menuid;
			menu.style.display='none';
		}
	</script> 
</form>

</br></br></br></br></br></br></br></br></br></br></br>