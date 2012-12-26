  <!--[if IE]>
            <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

<link rel="icon" type="image/x-icon" href="favicon.ico" />
<?php
session_start();
include("config.php");
include("FGL/FGL.php");

 if(isset($_GET['site']))
 {
  $page = $_GET['site'];
  if (file_exists('pages/'.$page.'.php'))
  {
   $include = ('pages/'.$page.'.php');
   $title=ucwords($page);
   $overflow=false;
   if($page == "photo")
   {
    if(isset($_GET['i']))
    {
     $image = $_GET['i'];
    }
   }
  }
 }
 else
  {
   $include='accueil.php';
   $title='Accueil';
  }
//Inclusion de la page
include ('config.php');
include('structure.php');

?>
<!--<![endif]-->
