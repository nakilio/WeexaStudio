<?php
if(isset($_GET['img']))
{
    $img = $_GET['img'];
	$extension=strrchr($img,'.');
	if (!empty($img))
	{
		if(!file_exists("weexaphoto/images/".$img))
		{
			echo'Image inexistante';
		}
		else
		{
			switch($extension)
			{
				default:echo "Oups petit probleme . Veuillez contacter le support .";break;
				case ".jpg": header("Content-type: image/jpeg");$image = imagecreatefromjpeg("weexaphoto/images/".$img);imagejpeg($image);break;
				case ".png": header("Content-type: image/png");$image = imagecreatefrompng("weexaphoto/images/".$img);imagepng($image);break;
				case ".gif": header("Content-type: image/gif");$image = imagecreatefromgif("weexaphoto/images/".$img);imagegif($image);break;
				case ".bmp": header("Content-type: image/bmp");$image = imagecreatefromwbmp("weexaphoto/images/".$img);imagewbmp($image);break;
				case ".JPG": header("Content-type: image/jpeg");$image = imagecreatefromjpeg("weexaphoto/images/".$img);imagejpeg($image);break;
				case ".PNG": header("Content-type: image/png");$image = imagecreatefrompng("weexaphoto/images/".$img);imagepng($image);break;
				case ".GIF": header("Content-type: image/gif");$image = imagecreatefromgif("weexaphoto/images/".$img);imagegif($image);break;
				case ".BMP": header("Content-type: image/bmp");$image = imagecreatefromwbmp("weexaphoto/images/".$img);imagewbmp($image);break;
				case ".SVG": echo'<img src="weexaphoto/images/'.$img.'.'.$extension.'"/>';
			}
		}
	}
}
?>