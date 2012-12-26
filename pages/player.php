<!--</br></br></br></br>


<audio id="lecteur" ontimeupdate="update()">
	<source id="source" src="http://people.xiph.org/~giles/2012/opus/ehren-paper_lights-64.opus"/>
	<source id="source" src="son/pop.ogg"/>
</audio>

<div id="corplecteur">
<div id="lentillepiste">
Paper Lights
</div>
<div class="partiedroitelecteur">
</div>
<div class="partiecontrolslecteur">
<button id="boutonplaycontrollecteur" onclick="playlecteur()" ></button>
<button id="boutonstopcontrollecteur" onclick="stoplecteur()" ></button>
<span id="button">0:00</span>
<span id="timeline_t-b" onclick="clickProgress('lecteur',  event)"><span id="remaining" style="width:0%; height: 4px;"></span></span>

</div>
	</div>
</div>
<script>
function changeProgressValue()
{
var newWidth = document.getElementById('input').value;
if(newWidth=='')
{
document.getElementById('remaining').style.width="0%";
}
document.getElementById('remaining').style.width=Math.round(newWidth)+"%";
}
var boutonPlay = document.getElementById('boutonplaycontrollecteur');
boutonPlay.onMouseOver.style.background='#333 url("images/playhover.png")';

function formatTime(time2) {
    var hours = Math.floor(time2 / 3600);
    var mins  = Math.floor((time2 % 3600) / 60);
    var secs  = Math.floor(time2 % 60);
	
    if (secs < 10) {
        secs = "0" + secs;
    }
	
    if (hours) {
        if (mins < 10) {
            mins = "0" + mins;
        }
		
        return hours + ":" + mins + ":" + secs; // hh:mm:ss
    } else {
        return mins + ":" + secs; // mm:ss
    }
}


function playlecteur()
{
var player = document.getElementById('lecteur');
var boutonPlay = document.getElementById('boutonplaycontrollecteur');

player.play();
boutonPlay.setAttribute('onclick','pauselecteur()');
boutonPlay.setAttribute('id','boutonppausecontrollecteur');
}


function pauselecteur()
{
var player = document.getElementById('lecteur');
var boutonPlay = document.getElementById('boutonpausecontrollecteur');

player.pause();
boutonPlay.setAttribute('onclick','playlecteur()');
boutonPlay.setAttribute('id','boutonpplaycontrollecteur');
}


function stoplecteur()
{
var player = document.getElementById('lecteur');
var boutonPlay = document.getElementById('boutonplaycontrollecteur');
boutonPlay.setAttribute('onclick','playlecteur()');
boutonPlay.setAttribute('id','boutonpplaycontrollecteur');
player.pause();
player.currentTime = 0;
}




function update() {
	var player = document.getElementById('lecteur');
	var timaff = document.getElementById('button')
    var duration = player.duration;    // Durée totale
    var time     = player.currentTime; // Temps écoulé
	var tempsaff = formatTime(player.currentTime);
    var fraction = time / duration;
	timaff.textContent = tempsaff;
    var percent  = Math.round((time / duration) * 100);
	document.getElementById('input').value = percent;
	changeProgressValue()
}

function getMousePosition(event) {
    if (event.pageX) {
        return {
            x: event.pageX,
            y: event.pageY
        };
    } else {
        return { 
            x: event.clientX + document.body.scrollLeft + document.documentElement.scrollLeft, 
            y: event.clientY + document.body.scrollTop  + document.documentElement.scrollTop
        };
    }
}
function getPosition(element){
    var top = 0, left = 0;
    
    while (element) {
        left   += element.offsetLeft;
        top    += element.offsetTop;
        element = element.offsetParent;
    }
    
    return { x: left, y: top };
}
function clickProgress(idPlayer, event) {
	var control = document.getElementById('remaining');
    var parent = getPosition(control);    // La position absolue de la progressBar
    var target = getMousePosition(event); // L'endroit de la progressBar où on a cliqué
    var player = document.querySelector('#' + idPlayer);
  
    var x = target.x - parent.x; 
    var wrapperWidth = document.querySelector('#progressBarControl').offsetWidth;
    
    var percent = Math.ceil((x / wrapperWidth) * 100);    
    var duration = player.duration;
    
    player.currentTime = (duration * percent) / 100;
}
</script>

<body>
<input type="hidden" onchange="changeProgressValue()" id="input" value=""/>
</body>-->
</br></br></br></br>


<audio id="lecteur" ontimeupdate="update()">
	<!--<source id="source" src="http://people.xiph.org/~giles/2012/opus/ehren-paper_lights-64.opus"/>-->
	<!--<source id="source" src="son/pop.ogg"/>-->
	<source id="source" src="son/kalimba.opus"/>

	</audio>

<div id="corplecteur">
<div id="lentillepiste">
Paper Lights
</div>
<div class="partiedroitelecteur">
<div id="boutonloopmusique" onclick="setloop()"><img src="images/loop.png"/></div>
<div id="boutondedroitemusique" onclick=""><img src="images/downloadmusique.png"/></div>
<div id="boutondedroitemusique" onclick=""><img src="images/loop.png"/></div>
</div>
<div class="partiecontrolslecteur">
<button id="boutonplaycontrollecteur" class="boutonplay" onclick="playlecteur()" ></button>
<button id="boutonstop" onclick="stoplecteur()" ></button>
<span id="button">0:00</span>
<span id="timeline_t-b"><span id="remaining" style="width:0%; height: 4px;"></span></span>

</div>
	</div>
</div>
<script>
function changeProgressValue()
{
var newWidth = document.getElementById('input').value;
if(newWidth=='')
{
document.getElementById('remaining').style.width="0%";
}
document.getElementById('remaining').style.width=Math.round(newWidth)+"%";
}
var boutonPlay = document.getElementById('boutonplaycontrollecteur');
boutonPlay.onMouseOver.style.background='#333 url("images/playhover.png")';

function formatTime(time2) {
    var hours = Math.floor(time2 / 3600);
    var mins  = Math.floor((time2 % 3600) / 60);
    var secs  = Math.floor(time2 % 60);
	
    if (secs < 10) {
        secs = "0" + secs;
    }
	
    if (hours) {
        if (mins < 10) {
            mins = "0" + mins;
        }
		
        return hours + ":" + mins + ":" + secs; // hh:mm:ss
    } else {
        return mins + ":" + secs; // mm:ss
    }
}
function playlecteur()
{
var player = document.getElementById('lecteur');
var boutonPlay = document.getElementById('boutonplaycontrollecteur');
boutonPlay.setAttribute('class','boutonpause');
player.play();
boutonPlay.setAttribute('onclick','pauselecteur()');
}
function pauselecteur()
{
var player = document.getElementById('lecteur');
var boutonPlay = document.getElementById('boutonplaycontrollecteur');
boutonPlay.setAttribute('class','boutonplay');
player.pause();
boutonPlay.setAttribute('onclick','playlecteur()');
}
function stoplecteur()
{
var player = document.getElementById('lecteur');
var boutonPlay = document.getElementById('boutonplaycontrollecteur');
boutonPlay.setAttribute('class','boutonplay');
boutonPlay.setAttribute('onclick','playlecteur()');
player.pause();
player.currentTime = 0;
}
function setloop()
{
var player = document.getElementById('lecteur');
var boutonloop = document.getElementById('boutonloopmusique');
player.setAttribute('loop','true');
boutonloop.style.background="#444";
boutonloop.setAttribute('onclick','unsetloop()');
}
function unsetloop()
{
var player = document.getElementById('lecteur');
var boutonloop = document.getElementById('boutonloopmusique');
player.removeAttribute("loop");
boutonloop.style.background="";
boutonloop.setAttribute('onclick','setloop()');
}
function update() {
	var player = document.getElementById('lecteur');
	var timaff = document.getElementById('button')
    var duration = player.duration;    // Durée totale
    var time     = player.currentTime; // Temps écoulé
	var tempsaff = formatTime(player.currentTime);
    var fraction = time / duration;
	timaff.textContent = tempsaff;
    var percent  = Math.round((time / duration) * 100);
	document.getElementById('input').value = percent;
	changeProgressValue()
}
</script>

<body>
<input type="hidden" onchange="changeProgressValue()" id="input" value=""/>
</body>