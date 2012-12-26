<script>
var newscontent = document.getElementById('newscontent');
var requeteAJAX = new XMLHttpRequest();
requeteAJAX.open('GET', 'news.xml',false);
requeteAJAX.send(null);
newscontent.innerHTML(requeteAJAX.responseText);
function updatenews()
{
var newscontent = document.getElementById('newscontent');
var requeteAJAX = new XMLHttpRequest();
requeteAJAX.open('GET', 'news.xml',false);
requeteAJAX.send(null);
newscontent.innerHTML(requeteAJAX.responseText);
}
</script>
<div class="accueil">
<?php
if(isset($_SESSION['pseudo']))
{
				
echo'<img style="float: left; width: 100px; border: 1px solid #5e5d5d; border-radius: 3px; background: grey; padding: 5px;" src="'.$imgprofil.'"/><h1 style=" margin-top: 40px;">Bonjour <i>'.$prenom.' '.$nom.'</i> !</h1></br>';
}
?>

<link href="themes/3/js-image-slider.css" rel="stylesheet" type="text/css" />
    <script src="themes/3/js-image-slider.js" type="text/javascript"></script>
    <link href="generic.css" rel="stylesheet" type="text/css" />
    <div id="sliderFrame">
        <div id="slider">
	    <img src="images/carrouselWS.png" />
            <img src="images/carrouselID.png" />
            <img src="images/carrouselWM.png"/><!-- add alt="#htmlcaption3" to have a caption on your slider-->
            <img src="images/carrouselWSoft.png" />
        </div>
        <!--thumbnails-->
        <div id="thumbs">
            <div class="thumb"><img src="images/thumb-1.gif" /></div>
            <div class="thumb"><img src="images/thumb-2.gif" /></div>
            <div class="thumb"><img src="images/thumb-3.gif" /></div>
            <div class="thumb"><img src="images/thumb-4.gif" /></div>
        </div>
        <div id="htmlcaption3" style="display: none;">
            <div style="width:190px;height:240px;display:inline-block;background:white url(images/caption3.png) no-repeat 0 0;border-radius:4px;"></div>
        </div>
        <div id="htmlcaption4" style="display: none;">
            <div style="width:190px;height:240px;display:inline-block;background:white url(images/caption4.gif) no-repeat 0 0;border-radius:4px;"></div>
        </div>
    </div>
<div style=" margin-top: 10px; margin-left: auto; margin-right: auto; text-align: center; width:800px;">
<iframe src="https://www.facebook.com/plugins/like.php?href=https://www.facebook.com/TheWeexaTeam?ref=ts&fref=ts"
        scrolling="no" frameborder="0"
        style="border:none;"></iframe>
</div>
</div>
</div>
</div>
</br></br></br></br>