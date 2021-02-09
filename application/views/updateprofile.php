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
.form-div {
  margin-top: 100px;
  border: 1px solid #e0e0e0;
}
#profileDisplay {
    display: block;
    height: 210px;
    width: 33%;
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
.multiselect {
        width: 200px;
    }
    .selectBox {
        position: relative;
    }
    .selectBox select {
        width: 100%;
        font-weight: bold;
    }
    .overSelect {
        position: absolute;
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;
    }
    #checkboxes {
        display: none;
        border: 1px #dadada solid;
    }
    #checkboxes label {
        display: block;
    }
    #checkboxes label:hover {
        background-color: #1e90ff;
    }
    .genre-content {

        background: rgba(0, 0, 0, 0.3);
        color: #fff;
        text-shadow: 0 1px 0 rgba(0, 0, 0, 0.4);
    }

</style>
</head>
<body>    

 <header class="masthead">
  <div class="container d-flex h-100 align-items-center" style="height: 115%!important;">
    <div class="container">
      <div class="row">
        <div class="col-md-10 col-lg-8 mx-auto text-center">
          <div class="card card-signin my-5" style="margin-top: 20rem!important;">
            <div class="card-body">
              <h5 class="card-title text-center">Update Profile</h5>
              <form name="form" class="form-signin" action="/Instaaplikasi/index.php/UserController/UpdateProfile" method="POST" enctype="multipart/form-data">
                <div class="form-group text-center " style="position: relative;">
                  <span class="img-div">
                    <div class="text-center img-placeholder" onClick="triggerClick()">
                      <h4>Update image</h4>
                    </div>
                    <img src="<?php echo base_url(); ?>/assets/images/avatar.jpg" onClick="triggerClick()" id="profileDisplay" style="background-color: white;">
                  </span>

                  <input type="file" name="profileImage" onChange="displayImage(this)" id="profileImage" class="form-control" style="display: none;" required autofocus>
                  <label style="color:white;">Profile Image</label>
                </div>
                <div class="form-label-group">
                  <input type="text" name="fullname" id="inputUserame" class="form-control" placeholder="Username" required autofocus>
                  <label for="inputUserame">Fullname</label>
                </div>

                <div class="form-label-group">
                  <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email" required autofocus>
                  <label for="inputEmail">Email Address</label>
                </div>
                <label for="inputGenre" style="color:white;">Your Favourite Genres</label>
              
                <center>
                  <div class="form-label-group">
                    <div class="multiselect">
                      <div class="selectBox" onclick="showCheckboxes()">
                        <select name="genresDefault"  class="form-control" placeholder="Select genre" required autofocus>
                          <option>Select Genres</option>
                        </select>
                        <div class="overSelect"></div>
                      </div>
                      <div id="checkboxes" class="genre-content" style="display: none;float: left;text-align: left;padding: 11px 56px;margin-bottom: 20px;">
                        <label><input type="checkbox" name="genres[]" value="Rock">Rock</label>
                        <label><input type="checkbox" name="genres[]" value="Jazz">Jazz</label>
                        <label><input type="checkbox" name="genres[]" value="Folk">Folk</label>
                        <label><input type="checkbox" name="genres[]" value="Hiphop">Hiphop</label>
                        <label><input type="checkbox" name="genres[]" value="Classical">Classical</label>
                      </div>
                    </div>
                </center>
                <hr>
                <center>
                  <button class="col-lg-6 btn btn-lg btn-primary btn-block text-uppercase" type="submit">Update Profile</button>
                </center>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>   
  </div>
</header>
<div class="space-div" style="height:235px;background: linear-gradient(to bottom,rgb(22, 22, 22) 0,rgb(22, 22, 22) 75%,#161616 100%);"></div>

<script type="text/javascript">
  function triggerClick(e) {
    document.querySelector('#profileImage').click();
  }
  function displayImage(e) {
    if (e.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e){
        document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
      }
      reader.readAsDataURL(e.files[0]);
    }
  }

  var expanded = false;
  function showCheckboxes() {
    var checkboxes = document.getElementById("checkboxes");
    if (!expanded) {
      checkboxes.style.display = "block";
      expanded = true;
    } else {
      checkboxes.style.display = "none";
      expanded = false;
    }
  }
</script>
</body>
