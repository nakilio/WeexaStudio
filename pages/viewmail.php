<?php include('studioID/session.php');?>
<?php
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
</br></br></br></br>
<div class="mailblock">
				<a class="boutonbarremail" href="index.php?site=mail&page" title="Retour au mail"><img src="images/listemail.png"/></a>
				<a class="boutonbarremail" href="index.php?site=mail&page=3&view=<?php echo $idmail;?>" title="Répondre au mail"><img src="images/repondremail.png"/></a>
				<a class="boutonbarremail" href="index.php?site=mail&page&id=<?php echo $idmail; ?>" title="Supprimer le mail"><img src="images/delmail.png"/></a>
				<label class="labelviewmail">Sujet : <?php echo $sujet; ?></label>
				<div class="signature">
					<img title="<?php echo $sender;?>" src="<?php echo $imgprofil2; ?>"/>
				</div></br></br>
				<div class="message">
					<?php echo $mail; ?>
				</div>
			</div>

			
</br>


