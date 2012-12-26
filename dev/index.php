<!DOCTYPE html>
<html>
    <head>
        <title>Weexa Studio | Developer Zone</title>
		<link rel="icon" type="image/x-icon" href="favicon.ico" />
		<link rel="stylesheet" href="style/style.css" />
		<meta name="owner" content="Weexa Studio">
		<meta charset="UTF-8">
			<script>
				function affichagemenu()
				{
					var menu=document.getElementById('menu');
						menuapp=document.getElementById('menuapp');
					menu.style.display='block';
					menuapp.style.background='#333';
				}
				function deaffichagemenu()
				{
					var menu=document.getElementById('menu');
					menu.style.display='none';
					menuapp.style.background='#5e5d5d';
				}
				

function gradient(id, level)
{
	var box = document.getElementById(id);
	box.style.opacity = level;
	box.style.MozOpacity = level;
	box.style.KhtmlOpacity = level;
	box.style.filter = "alpha(opacity=" + level * 100 + ")";
	box.style.display="block";
	return;
}


function fadein(id) 
{
	var level = 0;
	while(level <= 1)
	{
		setTimeout( "gradient('" + id + "'," + level + ")", (level* 1000) + 10);
		level += 0.01;
	}
}


// Open the lightbox


function openbox(formtitle, fadin)
{
  var box = document.getElementById('box'); 
  document.getElementById('shadowing').style.display='block';

  var btitle = document.getElementById('boxtitle');
  btitle.innerHTML = formtitle;
  
  if(fadin)
  {
	 gradient("box", 0);
	 fadein("box");
  }
  else
  { 	
    box.style.display='block';
  }  	
}


// Close the lightbox

function closebox()
{
   document.getElementById('box').style.display='none';
   document.getElementById('shadowing').style.display='none';
}

</script>
    </head>
   <body>
	<nav>
		<ul>
			<li><img src="images/logo.png" alt="logo"/></li>
			<li id="menuapp"><a href="#" onMouseOver="affichagemenu()" onMouseOut="deaffichagemenu()"><img src="images/flechemenubas.png" alt="menu"/></a></li>
			<div id="menu" onMouseOver="affichagemenu()" onMouseOut="deaffichagemenu()"><a href="index.php"><div class="item">Nos API et Framework</div></a></div>
		</ul>
						</div>

		
	</nav>