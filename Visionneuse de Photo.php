<style>
body
{
background: url('images/photoview.jpg');
}
header
{
position: fixed;
top: 0px;
left: 0;
right:0;
height: 50px;
background: #5e5d5d;
color: white;
font-family: arial;
font-size: 25px;
}
header div
{
margin-top: 10px;
margin-left: 20px;
}
#content
{
margin-top: 60px;
margin-left: auto;
margin-right: auto;
text-align: center;
}
#content img
{
max-width: 95%;
}

</style>
<body>
<header>
<div>Visioneuse de photo</div>
</header>
<div id="content">
<?php 
$img = $_GET['img'];
	echo'<img src="'.$img.'"/>';?>
</div>
</body>