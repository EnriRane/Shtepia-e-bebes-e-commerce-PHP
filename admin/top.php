<?php
require ('connection.inc.php');
require ('function.inc.php');
error_reporting(0);
if (isset($_SESSION['ADMIN_LOGIN']) && $_SESSION['ADMIN_LOGIN']!='') {
   # code...
}else{
   header('location:login.php');
     die(); 
}
     


?>


<!doctype html>
<html class="no-js" lang="">
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Faqja e pronarit</title>
      <link rel="shortcut icon" type="image/x-icon" href="./images/logoDyqani.png"/>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="assets/css/normalize.css">
      <link rel="stylesheet" href="assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="assets/css/font-awesome.min.css">
      <link rel="stylesheet" href="assets/css/themify-icons.css">
      <link rel="stylesheet" href="assets/css/pe-icon-7-filled.css">
      <link rel="stylesheet" href="assets/css/flag-icon.min.css">
      <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
      <link rel="stylesheet" href="assets/css/style.css">
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
      
   </head>
   <body>
      <aside id="left-panel" class="left-panel">
         <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
               <ul class="nav navbar-nav">
                  <li class="menu-title">Menu</li>
                  <li class="menu-item-has-children dropdown">
                     <a href="categories.php" > Kategoria kryesore</a>                 
                  </li>
                      <li class="menu-item-has-children dropdown">
                     <a href="sub_categories.php" > Nen kategorite</a>                  
                  </li>
                  <li class="menu-item-has-children dropdown">
                     <a href="product.php" > Produktet</a>                  
                  </li>
                  <li class="menu-item-has-children dropdown">
                     <a href="banner.php" > Faqja kryesore e klienit</a>                  
                  </li>
				      <li class="menu-item-has-children dropdown">
                     <a href="order_master.php" > Porosite</a>                  
                  </li>
                  <li class="menu-item-has-children dropdown">
                     <a href="users.php" > Klientet e rregjistruar</a>                  
                  </li>
                  <li class="menu-item-has-children dropdown">
                     <a href="coupon_master.php" > Kuponi</a>                  
                  </li>
                  <li class="menu-item-has-children dropdown">
                     <a href="contact_us.php" > Na kontako</a>                  
                  </li>
               </ul>
            </div>
         </nav>
      </aside>
      <div id="right-panel" class="right-panel">
         <header id="header" class="header">
            <div class="top-left">
               <div class="navbar-header">
                  <a class="navbar-brand" href="index.php"><b>SHTEPIA E BEBES</b></a><!-- <img src="images/logo.png" alt="Logo"> -->
                  <a class="navbar-brand hidden" href="index.php"><img src="images/logo2.png" alt="Logo"></a>
                  <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
               </div>
            </div>
            <div class="top-right">
               <div class="header-menu">
                  <div class="user-area dropdown float-right">
                     <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Miresevjen Visi</a>
                     <div class="user-menu dropdown-menu">
                        <a class="nav-link" href="logout.php"><i class="fa fa-power-off"></i>Logout</a>
                     </div>
                  </div>
               </div>
            </div>
         </header>