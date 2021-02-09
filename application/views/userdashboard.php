<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Instaaplikasi</title>

  <link rel="<?php echo base_url(); ?>/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="<?php echo base_url(); ?>/assets/css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <style>
    .btn-change.btn-primary:hover {
      color: #fff;
      background-color: #00ceffe8 !important;
      border-color: #40bff7 !important;
    }
    .form-div {
      margin-top: 100px;
      border: 1px solid #e0e0e0;
    }
    #profileDisplay {
      display: block;
      height: 190px;
      width: 92%;
      margin: 0px auto;
      border-radius: 50%;
    }
    .img-placeholder {
      width: 33%;
      color: white;
      height: 100%;
      background: black;
      opacity: .7;
      height: 210px;
      border-radius: 50%;
      z-index: 2;
      position: absolute;
      left: 50%;
      transform: translateX(-50%);
      display: none;
    }
    .img-placeholder h4 {
      margin-top: 40%;
      color: white;
    }
    .img-div:hover .img-placeholder {
      display: block;
      cursor: pointer;
    }
    a:hover {
      text-decoration: none;  
    }
  </style>
</head>

<body id="page-top">
  <div id="wrapper">

    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar" style="background-image:linear-gradient(180deg,#960b68 10%,#03113a 100%);">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url(); ?>index.php/UserController/">
        <div class="sidebar-brand-text mx-3" style="text-transform: none !important;font-size: 1.2rem !important;margin-left: 0rem!important;">Instaaplikasi</div>
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fa fa-headphones"></i>
        </div>
      </a>

      <hr class="sidebar-divider my-0">

      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url(); ?>index.php/UserController/UserDashboardButton">
          <i class="fa fa-fw fa-tachometer-alt"></i>
          <span>MY PROFILE</span>
        </a>
      </li>

      <hr class="sidebar-divider">

      <div class="sidebar-heading">
        User Detail
      </div>

      <li class="nav-item">
        <span class="nav-link" >
          <span class="img-div">
            <?php $base = $this->config->base_url(); ?>
            <img src="<?php echo  $base.'/assets/images/' .$this->session->userdata('avatar'); ?>" id="profileDisplay" width="90" height="90" alt="">
          </span>
        </span>
      </li> 

      <li class="nav-item">
        <span class="nav-link" >
          <center>
            <?php echo "<a href='".$base."index.php/UserController/ShowPublicProfile'>"; ?> 
            <span class="public-button" style="box-shadow: 1px 6px 13px 1px #232222;background-color: #1a5f82;border-radius: 21px;padding: 6px 10px;text-decoration: none;color: white;" >VIEW AS PUBLIC</span>
            </a>
          </center>
        </span>
      </li>
  
      <li class="nav-item">
        <span class="nav-link" >
          <i class="fa fa-fw fa-user"></i>
          <span><?php echo $this->session->userdata('fullname'); ?></span>
          </span>
      </li>

      <li class="nav-item">
        <span class="nav-link" >
          <i class="fa fa-fw fa-envelope"></i>
          <span><?php echo $this->session->userdata('email'); ?></span>
        </span>
      </li>

      <li class="nav-item">
        <span class="nav-link" >
          <i class="fa fa-fw fa-music"></i>
          <span style="text-align: right;">Favourite genre: </span></br>
          <span style="float: left;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <?php 
          $genreArray = $this->session->userdata('genres'); 
          echo $genreArray; 
          ?>
          </span>
        </span>
      </li>
      <hr class="sidebar-divider">

      <li class="nav-item">
        <span class="nav-link" >
          <i class="fa fa-fw fa-users"></i>
          Following : 
          <?php 
          echo count($whoUserFollows); 
          ?>
        </span>
      </li>

      <li class="nav-item">
        <span class="nav-link" >
          <i class="fa fa-fw fa-puzzle-piece"></i>
          Followers :
           <?php 
          echo count($showfollowers); 
          ?>
        </span>
      </li>

      <br>
      <div class="sidebar-heading">
        Explore
      </div>

      <li class="nav-item">
        <a class="nav-link" href="#posts" >
          <i class="fa fa-fw fa-quote-left "></i>
          <span>Posts Wall  </span><br>
        </a>
      </li>

      <center>
        <a href="/Instaaplikasi/index.php/UserController/ShowEditProfile" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm btn-change" style="background-color: #2895b7;border-color: #3495b7;"><i class="fa fa-pencil fa-sm text-white-50"></i> Edit Profile </a>
      </center>
      <br>
      
      <center>
        <a href="/Instaaplikasi/index.php/UserController/Logout" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm btn-change" style="background-color: #2895b7;border-color: #3495b7;"><i class="fa fa-sign-out fa-sm text-white-50"></i> Logout </a>
      </center>
      <br>
      <hr class="sidebar-divider d-none d-md-block">
    </ul>
    
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow" style="background-color: #86467b!important;">
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <ul class="navbar-nav ml-auto" >
            <span >
              <a class="nav-link" href="<?php echo base_url(); ?>index.php/UserController/UserDashboardButton" style="color:white">
              Home</a>
            </span>
          </ul>  
          <ul class="navbar-nav ml-auto">
            <span >
            <a class="nav-link" href="<?php echo base_url(); ?>index.php/FollowerController/ShowFollowing" style="color:white">
              Following</a>
            </span>
          </ul>  
          <ul class="navbar-nav ml-auto">
            <span>
            <a class="nav-link" href="<?php echo base_url(); ?>index.php/FollowerController/ShowFollowers" style="color:white">
              Followers</a>
            </span>
          </ul>

          <ul class="navbar-nav ml-auto">
            <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="/Instaaplikasi/index.php/UserController/SearchGenre" method="POST">
              <div class="input-group">
                <input type="text" name="search" class="form-control bg-light border-0 small" placeholder="Search for favourite genre..." aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                  <button class="btn btn-primary btn-change" style="background-color: #3495b7;border-color: #3495b7;" type="submit">
                    <i class="fa fa-search fa-sm"></i>
                  </button>
                </div>
              </div>
            </form>
          </ul>

          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown no-arrow">
              <span class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small" style="color:white !important;"><?php echo $this->session->userdata('username'); ?></span>
               <img class="img-profile rounded-circle" src="<?php echo  $base.'/assets/images/' .$this->session->userdata('avatar'); ?>">
              </span>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <li class="nav-item dropdown no-arrow">
              <span class="nav-link dropdown-toggle" id="userDropdown" role="button" >
                <a href="/Instaaplikasi/index.php/UserController/Logout" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm btn-change" style="background-color: #3495b7;border-color: #3495b7;"><i class="fa fa-sign-out fa-sm text-white-50"></i> Logout </a>
              </span>
            </li>
          </ul>
        </nav>
        <div class="container-fluid">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
          </div>
          
          <div class="row">
            <div class="col-xl-12 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2" style="border-left: .25rem solid #3495b7!important;">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1" style="font-size:1.8rem;text-align:center;color: #3495b7!important;">Write a post <i class="fa fa-pencil fa-1x text-gray-300" ></i> </div>
                      <br>
                      <form class="form-signin" action="/Instaaplikasi/index.php/PostController/AddPost" method="POST">
                        <div class="form-label-group">
                          <label for="title">Write a nice title</label>
                      <input type="text" class="form-control" id="title" name="title" placeholder="title" required="">
                        </div>
                        <br>
                         <div class="form-label-group">
                           <label for="content">Write what you think</label>
                          <input type="text" name="newpost" id="inputPassword" class="form-control" placeholder="I'm thinking of..." required="" style="height: calc(1.5em + 2.75rem + 18px) !important;">
                        </div>
                        <br>
                        <br>
                       <center><button class="col-xl-4 btn btn-lg btn-primary btn-block text-uppercase btn-change" type="submit" style="background-color: #3495b7;border-color: #3495b7;">Submit Post</button><center>
                      </form>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          <div class="container-fluid">
          <h1 id="posts" class="h3 mb-2 text-gray-800" style="text-align:center;">Posts Wall</h1>
          <p class="mb-4" style="text-align:center;">These are your posts and following people's post.</p>

          <div class="row">
            <div class="col-xl-12 col-md-6 mb-4" id ="myDIV" style="text-align:center;">
              
              <i class="fa fa-refresh" style="font-size:25px; color: #4abfd4;"></i> 
              <h3 style="font-size: 0.65rem;">Scroll here to load new posts  &nbsp; </h3>
            </div>
          </div>  

          <div class="row">
          <?php
          if (count($postFound) > 0) {
            $counter = 1;
            foreach ($postFound as $m) {
              $followerid = $m->getUserId();
              $userid = $this->session->userdata('userid');
              if (in_array($followerid, $whoUserFollows) || $followerid == $userid){ 
                 echo "<div class='col-xl-8 col-md-6 mb-4' style='    margin-left: 165px;'>";
                 echo " <div class='card border-left-primary shadow h-100 py-2' style='padding-top: 0rem!important;border-left: .25rem solid #3495b7 !important; '>";
                 echo " <div class='card-body'>";
                 echo "  <div class='row no-gutters align-items-center'>";
                 echo "  <div class='col mr-2'>";
                 echo "  <i class='fa fa-quote-left fa-1x text-gray-300' style='color: #3495b7 !important;'></i> <div class='h5 mb-0 font-weight-bold text-gray-800' style='color: #3495b7 !important;'>".$m->getTitle()."</div>";
                 echo " <br>";
                 $content = $m->getContent();
                 $regex_images = '~https?://\S+?(?:png|gif|jpe?g)~';
                 $regex_links = '~(?<!src=\')https?://\S+\b~';
                 $content = preg_replace($regex_images, "<br><center><hr class='sidebar-divider d-none d-md-block' style='width: 100%;'><img id='myImg' style='height:400px;width:400px;' src='\\0'><hr class='sidebar-divider d-none d-md-block' style='width:100%;'></center>", $content);
                $content = preg_replace($regex_links, "<a  target='_blank' href='\\0'>\\0</a>", $content);
                 echo "   <div class='text-xs font-weight-bold text-primary text-uppercase mb-1' style='color: #595b68!important;font-size: 1.0rem;'>".$content."</div>";
                 echo " <br>";
                 echo "   <div class='h5 mb-0 font-weight-bold text-gray-800' style='text-align: right;'>"."Posted By : ";
                 $username = $m->getUser();
                 $currentusername = $this->session->userdata('username');
                 if ($username != $currentusername){
                   echo $username;
                 } else {
                   echo "You";
                 }
                 echo "</div>";
                 $timeinseconds = $m->getTimestamp();
                 $timeformat  = getdate($timeinseconds);
                 echo " <br>";
                 echo "   <div class='h5 mb-0 font-weight-bold text-gray-800' style='color:#797b7d !important;text-align: right;font-size: 13px;'>"."Posted at : ".date("jS o F h:i:s a", $timeinseconds)."</div>";
                 echo " </div>";
                 echo "   </div>";
                 echo "   </div>";
                 echo "   </div>";
                 echo "   </div>";
                 $counter++;
            }else{
              //show nothing
            }
           }
          } else {
              echo "No posts found";
          }
          ?>  
          <br>
        </div>
      </div>

      <!-- Footer -->
      <footer class="sticky-footer bg-white" style="    padding: 2rem 25rem;">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span></span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
  </div>

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fa fa-angle-up"></i>
  </a>

  <script>
  document.getElementById("myDIV").addEventListener("wheel", myFunction);
  function myFunction() {
    location.reload();
  }
  </script>

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url(); ?>/assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url(); ?>/assets/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="<?php echo base_url(); ?>/assets/js/sb-admin-2.min.js"></script>
  <script src="<?php echo base_url(); ?>/assets/vendor/chart.js/Chart.min.js"></script>
  <script src="<?php echo base_url(); ?>/assets/js/demo/chart-area-demo.js"></script>
  <script src="<?php echo base_url(); ?>/assets/js/demo/chart-pie-demo.js"></script>
  <script src="<?php echo base_url(); ?>/assets/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url(); ?>/assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="<?php echo base_url(); ?>/assets/js/demo/datatables-demo.js"></script>

</body>
</html>
