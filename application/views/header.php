<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Instaaplikasi</title>
</head>  

<header>
  <link href="<?php echo base_url(); ?>/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800&display=swap" rel="stylesheet">
  <link href="<?php echo base_url(); ?>/assets/css/grayscale.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Caveat+Brush&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Nanum+Brush+Script&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</header>  

<body id="page-top">

  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="<?php echo base_url(); ?>index.php/UserController/" style="font-size: 33px;">Instaaplikasi 
        <i class="fa fa-headphones navbar-brand js-scroll-trigge" style="font-size: 40px;transform: rotate(-15deg);"></i>
      </a> 
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <?php  
          if ($this->session->userdata('username') != ''){
            // show nothing
          }else{
            echo "<li class='nav-item'>";
            echo  "<a class='nav-link js-scroll-trigger' href='/Instaaplikasi/index.php/UserController/LoginButton'>Login</a>";
            echo "</li>";
          }
      
          if ($this->session->userdata('username') != ''){
            // show nothing
          } else {
            echo "<li class='nav-item'>";
            echo  "<a class='nav-link js-scroll-trigger' href='/Instaaplikasi/index.php/UserController/SignInButton'>Signup</a>";
            echo "</li>";
          }
          
          if ($this->session->userdata('username') != ''){
            echo "<li class='nav-item'>";
            echo  "<a class='nav-link js-scroll-trigger' href='/Instaaplikasi/index.php/UserController/UserDashboardButton'>Dashboard</a>";
            echo "</li>";
          } else {
            // show nothing
          }
           
          if ($this->session->userdata('username') != ''){
            echo "<li class='nav-item'>";
            echo "<a class='nav-link js-scroll-trigger' href='/Instaaplikasi/index.php/UserController/Logout' class='d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm' style='background-color: rgba(75, 166, 177, 0.61);'><i class='fa fa-sign-out fa-sm text-white-50'></i> Logout </a>";
            echo "</li>";
          } else {
            // show nothing
          }
          ?>
        </ul>
      </div>
    </div>
  </nav>
  