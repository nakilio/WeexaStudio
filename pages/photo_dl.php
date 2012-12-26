<?php

// on essaie de reconnaitre l'extension pour que le téléchargement corresponde au type de fichier afin d'éviter les erreurs de corruptions
$file = $_GET['download'];
$chemin = '../'.$_GET['dir'];
switch(strrchr(basename($file), ".")) {


case ".png": $type = "image/png"; break;
case ".gif": $type = "image/gif"; break;
case ".jpg": $type = "image/jpeg"; break;
case ".ico": $type = "image/jpeg"; break;
case ".bmp": $type = "image/jpeg"; break;
default: $type = "application/octet-stream"; break;

}

header("Content-disposition: attachment; filename=$file");
header("Content-Type: application/force-download");
header("Content-Transfer-Encoding: $type\n"); // Surtout ne pas enlever le \n
header("Content-Length: ".filesize($chemin . $file));
header("Pragma: no-cache");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0, public");
header("Expires: 0");
readfile($chemin . $file);
?>