
<?php
include('studioID/session.php');
include('config.php');
$idview = $_GET['view'];
$messagevoir = mysql_query("select * from $tablemail where id='".$idview."'") or die ('Un erreur est survenue : <b>'.mysql_error()).'</b>';	//insertion dans la bdd
while($data = mysql_fetch_assoc($messagevoir))
	{
		$dest = $data['destinataire'];
		$sender = $data['sender'];
		$sujet = $data['sujet'];
		$mail = $data['mail'];
		$idmail = $data['id'];	
	}
	if(file_exists('users/profil/'.$sender.'.png'))
		{
			$imgprofil2 = 'users/profil/'.$sender.'.png';
		}
	else
		{
			$imgprofil2 = 'images/BG1.png';
		}
if(empty($sujet))
			{
				$sujet = 'Sans sujet';
			}
?>
<form name="formmail" action="index.php?site=mail" method="POST" >
<div class="barformmailhight">
	<a class="boutonbarremail" href="index.php?site=mail&page" title="Retour au mail"><img src="images/listemail.png"/></a>
	<a class="boutonbarremail" href="#" onClick="envoi();" title="Envoyer le mail"><img src="images/message.png"/></a>
	<div class="englobemenu">
	
</div>
	<label style="margin-left: 10px;" class="labelmsgbar">Destinataire</label><input readonly value="<?php echo $sender;?>" style="width: 188px; margin-top: 15px;"  type="text" name="dest" id="destinataire" placeholder="Pseudo du destinataire" required/>
	 <label class="labelmsgbar">Objet </label><input readonly value="<?php echo'RE : '.$sujet;?>" style="width: 250px;" class="inputsendform" type="text" placeholder="Objet du message..." name="objet" required/></div>
	<div id="zonescriptmail" contenteditable>

	</div>
<div class="barformmailbottom">
<a class="boutonbarremail" onclick="execCommand('bold',false,null)" href="#" ><font style="font-weight: bold; color: white;padding-top: 30px; font-size: 25px;">A</font></a>
<a class="boutonbarremail" onclick="execCommand('italic',false,null)" href="#" ><font style="font-style: italic; color: white;padding-top: 30px; font-size: 25px;">A</font></a>
<a class="boutonbarremail" onclick="execCommand('underline',false,null)" href="#" ><font style="text-decoration: underline;  color: white;padding-top: 30px; font-size: 25px;">A</font></a>
<a class="boutonbarremail" onclick="execCommand('justifyLeft',false, null)" href="#"><img src="images/left.png"/></a>
<a class="boutonbarremail" onclick="execCommand('justifyCenter',false, null)" href="#"><img src="images/center.png"/></a>
<a class="boutonbarremail" onclick="execCommand('justifyRight',false, null)" href="#"><img src="images/right.png"/></a>
<span class="boutonbarremail"><a onclick="execCommand('forecolor',false, 'black')" href="#"><img src="images/colorblack.png"/></a><a onclick="execCommand('forecolor',false, '007b00')" href="#"><img src="images/colorgreen.png"/></a><a onclick="execCommand('forecolor',false, 'red')" href="#"><img src="images/colorred.png"/></a><a onclick="execCommand('forecolor',false, '#ff5b00')" href="#"><img src="images/coloryellow.png"/><a onclick="execCommand('forecolor',false, 'blue')" href="#"><img src="images/colorblue.png"/></a></span>
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
	</script> 
</form>
