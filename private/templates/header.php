<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Diaquino Fortmeier, MD1A">
    <meta name="description" content="Check here the status of your favorite writer, and discover new ones!">
    <title>WriterStatus</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
    <link rel="stylesheet" href="<?php echo url_to('/css/head.css')?>">
    <link rel="stylesheet" href="<?php if ($currentPage == 'home') {
      echo url_to('/css/homepage.css');
    } elseif ($currentPage == 'agenda') {
      echo url_to('/css/agenda.css');
    } elseif ($currentPage == 'news') {
      echo url_to('/css/news.css');
    } elseif ($currentPage == 'search') {
      echo url_to('/css/search.css');
    } elseif ($currentPage == 'login') {
      echo url_to('/css/login.css');
    } elseif ($currentPage == 'register') {
      echo url_to('/css/register.css');
    } elseif ($currentPage == 'profile') {
      echo url_to('/css/profile.css');
    } elseif ($currentPage == 'about_us') {
      echo url_to('/css/about-us.css');
    }?>">

  <style>
   @import url('https://fonts.googleapis.com/css?family=Ubuntu&display=swap');
  </style>
</head>
<body>
<div class="topnav">
  <a href="<?php url_nav(); ?>/" <?php if ($currentPage == 'home'): ?> class="active" <?php endif ?>>
   <img class="text text-logo" src="../public/img/logo.png" alt="logo">
   <i style='font-size:24px' class='fas icon'>&#xf015;</i>
  </a>
  <a href="<?php url_nav(); ?>/agenda" <?php if ($currentPage == 'agenda'): ?> class="active" <?php endif ?>>
   <p class="text">Agenda</p>
   <i style='font-size:24px' class='fas icon'>&#xf073;</i>
  </a>
  <a href="<?php url_nav(); ?>/news" <?php if ($currentPage == 'news'): ?> class="active" <?php endif ?>>
   <p class="text">News</p>
   <i style='font-size:24px' class='fas icon'>&#xf0a1;</i>
  </a>
  <a href="<?php url_nav(); ?>/search" <?php if ($currentPage == 'search'): ?> class="active" <?php endif ?>>
   <p class="text">Search</p>
   <i style='font-size:24px' class='fas icon'>&#xf002;</i>
  </a>
  <a href="<?php url_nav(); ?>/register" class="registerNav">
   <p class="text">Sign-up</p>
  </a>
  <a href="<?php url_nav(); ?>/login" <?php if ($currentPage == 'login'): ?> class="active loginNav" <?php endif ?> class="loginNav">
   <p class="text">Log-in</p>
   <i style='font-size:24px' class='fas icon'>&#xf2bd;</i>
  </a>
</div>
</body>
