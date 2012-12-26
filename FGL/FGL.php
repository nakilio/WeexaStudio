<?php
//------------------------------------------------------------------------------------------- //-/
//     API File Générator Language (FGL)                                             //---/
//     créé par Weexa Studio                                                               //------/
//     Licence Creative Commons Attribution -                             //--------/
//     Pas d’Utilisation Commerciale - Partage dans                 //-----------/
//     les Mêmes Conditions 3.0 non transposé.                    //--------------/
//--------------------------------------------------------------------------- //-----------------/


function randomName($caractlong)
{
$i = 0;
while($i < $caractlong) {
		$characts    = 'abcdefghijklmnpqrstuvwxyz';
        //$characts   .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';	
		$characts   .= '1234567890'; 
        $chiffre = substr($characts,rand()%(strlen($characts)),1);  // On génère le captcha aléatoire
        $chiffres[$i] = $chiffre;
        $i++;
}
$nombre = null;
// On explore le tableau $chiffres afin d'y afficher toutes les entrées qui s'y trouvent
foreach ($chiffres as $caractere) {
        $nombre .= $caractere;
}
return $nombre;
}
function ZIParchiver($archivename, $file)
{
  // appel de la classe
    require_once('zip.php');
    $filename = $file;
    $content = $file;
    // contenu du fichier
    $fp = fopen ($filename, 'r');
    $content = fread($fp, filesize($filename));
    fclose ($fp);
    
    // création d'un objet 'zipfile'
    $zip = new zipfile();
    // ajout du fichier dans cet objet
    $zip->addfile($content, $filename);
    // production de l'archive' Zip
    $archive = $zip->file();
    
    // entêtes HTTP
    header('Content-Type: application/x-zip');
    // force le téléchargement
    header('Content-Disposition: inline; filename='.$archivename.'.zip');
    
    // envoi du fichier au navigateur
    echo $archive;
}
function writeIn($file, $mode, $contenufile)
{
$monfichier = fopen($file, $mode);
fputs($monfichier, $contenufile);
fclose($monfichier);
}
function HashPassword($password, $key)
{
}
