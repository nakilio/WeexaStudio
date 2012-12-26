<?php	
if(isset($_GET['download']))
{
	$file = $_GET["download"];
	$dir = $_GET['dir'];//chemin du dossier ou ce trouve l'image
	$image = $dir.$file;
//detection du format
	switch(strrchr(basename($file), ".")) {
	case ".png": $type = "image/png"; break;
	case ".gif": $type = "image/gif"; break;
	case ".jpg": $type = "image/jpeg"; break;
	case ".ico": $type = "image/ico"; break;
	case ".bmp": $type = "image/bitmap"; break;
	default: $type = "application/octet-stream"; break;
	}
 //creation et téléchargement du fichier
	header("Content-disposition: attachment; filename=$file"); 
	header("Content-Type: application/force-download"); 
	header("Content-Transfer-Encoding: $type\n");
	header("Content-Length: ".filesize($dir . $file)); 
	header("Pragma: no-cache"); 
	header("Cache-Control: must-revalidate, post-check=0, pre-check=0, public"); 
	header("Expires: 0"); 
	readfile($dir . $file); 
}
?>
