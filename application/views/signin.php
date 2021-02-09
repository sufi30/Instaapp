<head>

  <style>
    :root {
      --input-padding-x: 1.5rem;
      --input-padding-y: .75rem;
    }
    body {
      background: #007bff;
      background: linear-gradient(to right, #e6d2cf, #ff6739);
    }
    .card-signin {
      border: 0;
      border-radius: 1rem;
      box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.64);
      background-color: #908e8e63;
    }
    .card-signin .card-title {
      margin-bottom: 2rem;
      font-weight: 700;
      font-size: 2.5rem;
      font-family: raleway;
      color:#ffffff;
    }
    .card-signin .card-body {
      padding: 2rem;
    }
    .form-signin {
      width: 100%;
    }
    .form-signin .btn {
      font-size: 80%;
      border-radius: 5rem;
      letter-spacing: .1rem;
      font-weight: bold;
      padding: 1rem;
      transition: all 0.2s;
    }
    .form-label-group {
      position: relative;
      margin-bottom: 1rem;
    }
    .form-label-group input {
      height: auto;
      border-radius: 2rem;
    }
    .form-label-group>input,
    .form-label-group>label {
      padding: var(--input-padding-y) var(--input-padding-x);
    }
    .form-label-group>label {
      position: absolute;
      top: 0;
      left: 0;
      display: block;
      width: 100%;
      margin-bottom: 0;
      /* Override default `<label>` margin */
      line-height: 1.5;
      color: #495057;
      border: 1px solid transparent;
      border-radius: .25rem;
      transition: all .1s ease-in-out;
    }
    .form-label-group input::-webkit-input-placeholder {
      color: transparent;
    }
    .form-label-group input:-ms-input-placeholder {
      color: transparent;
    }
    .form-label-group input::-ms-input-placeholder {
      color: transparent;
    }
    .form-label-group input::-moz-placeholder {
      color: transparent;
    }
    .form-label-group input::placeholder {
      color: transparent;
    }
    .form-label-group input:not(:placeholder-shown) {
      padding-top: calc(var(--input-padding-y) + var(--input-padding-y) * (2 / 3));
      padding-bottom: calc(var(--input-padding-y) / 3);
    }
    .form-label-group input:not(:placeholder-shown)~label {
      padding-top: calc(var(--input-padding-y) / 3);
      padding-bottom: calc(var(--input-padding-y) / 3);
      font-size: 12px;
      color: #777;
    }
    /* Fallback for Edge*/
    @supports (-ms-ime-align: auto) {
      .form-label-group>label {
        display: none;
      }
      .form-label-group input::-ms-input-placeholder {
        color: #777;
      }
    }
    /* Fallback for IE*/
    @media all and (-ms-high-contrast: none),
    (-ms-high-contrast: active) {
      .form-label-group>label {
        display: none;
      }
      .form-label-group input:-ms-input-placeholder {
        color: #777;
      }
    }
  </style>
</head>
<body>    

<header class="masthead">
  <div class="container d-flex h-100 align-items-center" style="height: 115%!important;">
    <div class="container">
      <div class="row">
        <div class="col-md-10 col-lg-8 mx-auto text-center">
          <div class="card card-signin my-5">
            <div class="card-body">
              <h5 class="card-title text-center">Register</h5>
              <form name="form" class="form-signin" action="/Instaaplikasi/index.php/UserController/SigninUser" method="POST">

                <div class="form-label-group">
                  <input type="text" name="username" id="inputUserame" class="form-control" placeholder="Username" required autofocus>
                  <label for="inputUserame">Username</label>
                  <p style="font-size: 9px;color: white;padding: 5px 0px;">* Username should contain only 10 characters.</p>
                </div>
                <center>
                  <h2 style="color: white;background-color: #d24444;padding: 0px 5px;"><?php echo $this->session->flashdata('errorusername'); ?>
                  </h2>
                </center>

                <div class="form-label-group">
                  <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required>
                  <label for="inputEmail">Email address</label>
                </div>
                <center>
                  <h2 style="color: white;background-color: #d24444;padding: 0px 5px;"><?php echo $this->session->flashdata('erroremail'); ?>
                  </h2>
                </center>
                <hr>

                <div class="form-label-group">
                  <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
                  <label for="inputPassword">Password</label>
                  <p style="font-size: 9px;color: white;padding: 5px 0px;">* Your password must contain at least 10 characters, 1 number, 1 capital letter & 1 lowercase letter.</p>
                </div>
              
                <div class="form-label-group">
                  <input type="password" name="passwordConfirm" id="inputConfirmPassword" class="form-control" placeholder="Password" required>
                  <label for="inputConfirmPassword">Confirm password</label>
                </div>
                <center><h2 style="color: white;background-color: #d24444;padding: 0px 5px;"><?php echo $this->session->flashdata('errorpassword'); ?></h2>
                </center>
                <br>
                <center>
                  <button class="col-lg-6 btn btn-lg btn-primary btn-block text-uppercase" type="submit">Register</button>
                </center>
                <a class="d-block text-center mt-2 small" href="/Instaaplikasi/index.php/UserController/LoginButton"><b>Login</a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>   
  </div>
</header>

</body>
