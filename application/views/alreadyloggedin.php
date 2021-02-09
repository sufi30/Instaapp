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

.masthead {
   background: linear-gradient(to bottom,#00aaf5 0,rgba(22,22,22,.7) 75%,#161616 100%),url(/Instaaplikasi//assets/img/bg-masthead.jpg) !important;
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

.btn-google {
  color: white;
  background-color: #ea4335;
}

.btn-facebook {
  color: white;
  background-color: #3b5998;
}

/* Fallback for Edge
-------------------------------------------------- */

@supports (-ms-ime-align: auto) {
  .form-label-group>label {
    display: none;
  }
  .form-label-group input::-ms-input-placeholder {
    color: #777;
  }
}

/* Fallback for IE
-------------------------------------------------- */

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

 <header class="masthead" >
    <div class="container d-flex h-100 align-items-center">
      <div class="container">
        <div class="row">
          <div class="col-md-10 col-lg-8 mx-auto text-center">
            <div class="card card-signin my-5">
            <div class="card-body">
              <h5 class="card-title text-center"><b>You're already logged in</h5>
                <a href="/Instaaplikasi/index.php/UserController/UserDashboardButton" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" style="background-color: #ec4848;"><i class="fa fa-address-card  fa-sm text-white-100" style="font-size: 1.875em;"></i> Go to Dashboard </a>
                <a href="/Instaaplikasi/index.php/UserController/Logout" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fa fa-sign-out  fa-sm text-white-100" style="font-size: 1.875em;"></i> Logout </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> 
</header>
</body>
</html>
