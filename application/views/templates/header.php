<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/css/styles.css') ?>">

  </head>
  <body>
    <div id="container">
      <nav id="navBar" class="navbar navbar-expand-lg navbar-dark nav-position border-bottom">
        <a class="navbar-brand  nav-design" href="<?php echo base_url(); ?>">BUDGETit</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
          <span class="navbar-toggler-icon"></span>
        </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link  nav-design" href="<?php echo base_url(); ?>">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-design" href="#">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-design" href="#">Contact</a>
          </li>
          <?php echo (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) ? '
              <li class="nav-item">
                <a class="nav-link nav-design" href="'. base_url() .'app/index">Home</a>
              </li>'
            : '' ?>
        </ul>
        <ul class="navbar-nav ml-auto">

        <?php echo (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == false) || !isset($_SESSION['logged_in']) ? '
            <li class="nav-item">
              <a class="nav-link nav-design" href="'. base_url() .'register">Register</a>
            </li>'
          : '' ?>
        <?php echo (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == false) || !isset($_SESSION['logged_in']) ? '
            <li class="nav-item">
              <a class="nav-link nav-design" href="'. base_url().'login">Log in</a>
            </li>'
          : '' ?>
        <?php echo (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) ? '
              <li class="nav-item">
                <a class="nav-link nav-design" href="'.base_url().'logout">Log out</a>
              </li>'
          : ''?>
        </ul>
      </div>
    </nav>
