<form name="formmail" action="index.php?site=mail" method="POST" >
<div class="barformmailhight">
<h1 style="text-shadow: 0 0 20px grey; color: white; height: 40px; padding:15px;">Editeur de texte</h1>
</div>
	<div id="zonescriptmail" contenteditable>

	</div>
<div class="barformmailbottom">
<a class="boutonbarremail" onclick="execCommand('bold',false,null)" href="#" ><font style="font-weight: bold; color: white;padding-top: 30px; font-size: 25px;">B</font></a>
<a class="boutonbarremail" onclick="execCommand('italic',false,null)" href="#" ><font style="font-style: italic; color: white;padding-top: 30px; font-size: 25px;">I</font></a>
<a class="boutonbarremail" onclick="execCommand('underline',false,null)" href="#" ><font style="text-decoration: underline;  color: white;padding-top: 30px; font-size: 25px;">S</font></a>
<a class="boutonbarremail" onclick="execCommand('strikeThrough',false, null)" href="#"><font style="text-decoration: line-through; color: white;padding-top: 30px; font-size: 25px;">L</font></a>
<a class="boutonbarremail" onclick="execCommand('justifyLeft',false, null)" href="#"><img src="images/left.png"/></a>
<a class="boutonbarremail" onclick="execCommand('justifyCenter',false, null)" href="#"><img src="images/center.png"/></a>
<a class="boutonbarremail" onclick="execCommand('justifyRight',false, null)" href="#"><img src="images/right.png"/></a>
<a class="boutonbarremail" onclick="execCommand('increaseFontSize',false, '-')" href="#"><font style="font-weight: bold; color: white;padding-top: 30px; font-size: 25px;">A +</font></a>
<a class="boutonbarremail" onclick="execCommand('decreaseFontSize',false, '-')" href="#"><font style="font-weight: bold; color: white;padding-top: 30px; font-size: 25px;">A -</font></a>

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
