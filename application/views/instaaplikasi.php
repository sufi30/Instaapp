<!DOCTYPE html>
<html>
<head>

  <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
  <title>Instaaplikasi</title>
</head>
<body >
  <header class="masthead">
    <div class="container d-flex h-100 align-items-center">
      <div class="mx-auto text-center">
        <h1 class="mx-auto my-0 text-uppercase" style="font-size: 6.5rem;font-family: 'Caveat Brush',cursive;font-weight: 600;">feast to the beat</h1>
        <h2 class="text-white-50 mx-auto mt-2 mb-5"></h2>
        <div class="container">
          <div class="row">
            <div class="col-md-10 col-lg-8 mx-auto text-center">
              <form class="form-inline d-flex" action="/Instaaplikasi/index.php/UserController/SignInButton" method="POST">
                <button type="submit" class="btn btn-primary mx-auto" style="font-size: 31px;font-family: Raleway;font-weight: 600;background-color: #fb12b18c;padding: 13px 22px;">Join Us</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>

  <section id="about" class="about-section text-center">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h2 class="text-white mb-4">The Social Network For Music Enthusiasts</h2>
          <p class="text-white-50">Souncrave is a global music social network connecting independent  music enthusiasts. You can see to your friends' music posts and share your discoveries with them, too. You can find the people who like the same favourite genre of yours, by simply searching by Genre.</p>
        </div>
      </div>
      <img src="<?php echo base_url(); ?>/assets/img/sydney.png" class="img-fluid" alt="">
    </div>
  </section>

  <section id="projects" class="projects-section bg-light">
    <div class="container">
      <div class="row align-items-center no-gutters mb-4 mb-lg-5">
        <div class="col-xl-8 col-lg-7">
          <img class="img-fluid mb-3 mb-lg-0" src="<?php echo base_url(); ?>/assets/img/bg-masthead-9.jpg" alt="">
        </div>
        <div class="col-xl-4 col-lg-5">
          <div class="featured-text text-center text-lg-left">
            <h4>Party with music</h4>
            <p class="text-black-50 mb-0">Rock & Roll with people through favourite Music Genre.</p>
          </div>
        </div>
      </div>

      <div class="row align-items-center no-gutters mb-4 mb-lg-5">
        <div class="col-xl-4 col-lg-5">
          <div class="featured-text text-center text-lg-left">
            <h4>Do you crave for sound?</h4>
            <p class="text-black-50 mb-0">Speak out what you like most about music.</p>
          </div>
        </div>
        <div class="col-xl-8 col-lg-7">
          <img class="img-fluid mb-3 mb-lg-0" src="<?php echo base_url(); ?>/assets/img/hero4.jpg" alt="">
        </div>
      </div>
    </div>
  </section>

  <section id="signup" class="signup-section">
    <div class="container">
      <div class="row">
        <div class="col-md-10 col-lg-8 mx-auto text-center">
          <h2 class="text-white mb-5">Join with us today !</h2>
          <form class="form-inline d-flex" action="/Instaaplikasi/index.php/UserController/SignInButton" method="POST">
            <button type="submit" class="btn btn-primary mx-auto">Register</button>
          </form>
        </div>
      </div>
    </div>
  </section>

  <section class="contact-section bg-black">
    <div class="container">
      <div class="row">
        <div class="col-md-4 mb-3 mb-md-0">
          <div class="card py-4 h-100">
            <div class="card-body text-center">
              <!-- <i class="fas fa-map-marked-alt text-primary mb-2"></i> -->
              <h4 class="text-uppercase m-0">Address</h4>
              <hr class="my-4">
              <div class="small text-black-50">Informatics Institute of Technology, Sri Lanka</div>
            </div>
          </div>
        </div>

        <div class="col-md-4 mb-3 mb-md-0">
          <div class="card py-4 h-100">
            <div class="card-body text-center">
              <h4 class="text-uppercase m-0">Email</h4>
              <hr class="my-4">
              <div class="small text-black-50">
                <a href="#">bilal.rifas@gmail.com</a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-4 mb-3 mb-md-0">
          <div class="card py-4 h-100">
            <div class="card-body text-center">
              <h4 class="text-uppercase m-0">Phone</h4>
              <hr class="my-4">
              <div class="small text-black-50">+94 (77) 539-7996</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> 

<div class="container">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10"></div>
        <div class="col-md-1"></div>
    </div>
</div>

</body>
</html>
