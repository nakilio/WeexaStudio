<?php
$produit[1] = 'drum';
$produit[2] = 'stickers';
$produit[3] = 'don';
if(isset($_POST['drum']))
{
$quantite[1] = $_POST['drum'];
}
else
{
$quantite[1] = '0';
}
if(isset($_POST['stickers']))
{
$quantite[2] = $_POST['stickers'];
}
else
{
$quantite[2] = '0';
}
if(isset($_POST['donate']))
{
$quantite[3] = $_POST['donate'];
}
else
{
$quantite[3] = '0';
}
echo $produit[1].' : '.$quantite[1].', '.$produit[2].' : '.$quantite[2].', '.$produit[3].' : '.$quantite[3];
echo '</br>Retour au Store...';
echo '<meta http-equiv="refresh" content="3; URL=index.php?site=store">';

?>
