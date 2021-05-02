<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <!--IE Compatibility modes-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--Mobile first-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Dashboard</title>
    
    <meta name="description" content="Free Admin Template Based On Twitter Bootstrap 3.x">
    <meta name="author" content="">
    
    <meta name="msapplication-TileColor" content="#5bc0de" />
    <meta name="msapplication-TileImage" content="assets/img/metis-tile.png" />
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php  echo base_url();?>assets/lib/bootstrap/css/bootstrap.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php  echo base_url();?>assets/lib/font-awesome/css/font-awesome.css">
    
    <!-- Metis core stylesheet -->
    <link rel="stylesheet" href="<?php  echo base_url();?>assets/css/main.css">
    
    <!-- metisMenu stylesheet -->
    <link rel="stylesheet" href="<?php  echo base_url();?>assets/lib/metismenu/metisMenu.css">
    
    <!-- onoffcanvas stylesheet -->
    <link rel="stylesheet" href="<?php  echo base_url();?>assets/lib/onoffcanvas/onoffcanvas.css">
    
    <!-- animate.css stylesheet -->
    <link rel="stylesheet" href="<?php  echo base_url();?>assets/lib/animate.css/animate.css">


        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.5/fullcalendar.min.css">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

    <!--For Development Only. Not required -->
    <!-- <script>
        less = {
            env: "development",
            relativeUrls: false,
            rootpath: "/assets/"
        };
    </script> -->
    <link rel="stylesheet" href="<?php  echo base_url();?>assets/css/style-switcher.css">
    <link rel="stylesheet/less" type="text/css" href="<?php  echo base_url();?>assets/less/theme.less">
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/less.js/2.7.1/less.js"></script> -->
<?php 
// header("Set-Cookie:  path=/; ".$_SERVER['HTTP_HOST']."; HttpOnly; SameSite=None; Secure");
header("Set-Cookie: key4=value; path=/; domain=http://localhost/deenkar/; HttpOnly; Secure; SameSite=Strict");
?>
  </head>

       <body class="login">

<div class="form-signin">
<div class="text-center">
  <img src="<?php  echo base_url();?>assets/img/logo.png" alt="Metis Logo">
</div>
<hr>
<div class="tab-content">
    <input type="hidden" value="<?php  echo base_url();?>">

  <div id="login" class="tab-pane active">
      <form action="" method="post">
          <p class="text-muted text-center" id="usernamepassword"> 
              Enter your username and password
          </p>
          <div id="login_error">
             
          </div>
          <input type="text" placeholder="Username" id="Username" name="Username"class="form-control top">
          <input type="password" placeholder="Password" id="Password" name="Password" class="form-control bottom">
          <div class="checkbox">
    <label>
      <input type="checkbox"> Remember Me
      
    </label>
  </div>
          <button class="btn btn-lg btn-primary btn-block" type="button" onclick="userlogin()">Sign in</button>
      </form>
  </div>
  <div id="forgot" class="tab-pane">
      <form action="index.html">
          <p class="text-muted text-center">Enter your valid e-mail</p>
          <input type="email" placeholder="mail@domain.com" class="form-control">
          <br>
          <button class="btn btn-lg btn-danger btn-block" type="submit">Recover Password</button>
      </form>
  </div>
  <div id="signup" class="tab-pane">
      <form >
          <input type="text" placeholder="Mobile No" id="mobileno" class="form-control top">
          <input type="hidden" id="base_url" value="<?php  echo base_url();?>">
          <br>
          <input type="text" placeholder="Username" id="reg_username"class="form-control top">
          <br>
          <!-- <input type="email" placeholder="mail@domain.com" class="form-control middle"> -->
          <input type="password" placeholder="Password" id="reg_password"class="form-control middle">
          <br>
          <!-- <input type="password" placeholder="re-password" class="form-control bottom"> -->
          <button class="btn btn-lg btn-success btn-block" type="submit" onclick="registeruser()">Register</button>
      </form>
  </div>
</div>
<hr>
<div class="text-center">
  <ul class="list-inline">
      <li><a class="text-muted" href="" data-toggle="tab" onclick="googleLogin()">Login with Google</a></li>
      <!-- <li><a class="text-muted" href="#forgot" data-toggle="tab">Forgot Password</a></li> -->
      <li><a class="text-muted" href="#signup" data-toggle="tab">Signup</a></li>
  </ul>
</div>
</div>


<!--jQuery -->
<script src="<?php  echo base_url();?>assets/lib/jquery/jquery.js"></script>
<script src="<?php  echo base_url();?>assets/js/userlogin.js"></script>
<script src="<?php  echo base_url();?>assets/js/jquery.js"></script>

<!--Bootstrap -->
<script src="<?php  echo base_url();?>assets/lib/bootstrap/js/bootstrap.js"></script>
<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js"></script>

<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->
<script src="https://www.gstatic.com/firebasejs/8.3.2/firebase-analytics.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.3.2/firebase-auth.js"></script>

<script>
  // Your web app's Firebase configuration
  // For Firebase JS SDK v7.20.0 and later, measurementId is optional
  var firebaseConfig = {
    apiKey: "AIzaSyAbuzIPlR2jTi4RpFqhxxol75vdvG9-cvg",
    authDomain: "firbaseapp-bc6cd.firebaseapp.com",
    projectId: "firbaseapp-bc6cd",
    storageBucket: "firbaseapp-bc6cd.appspot.com",
    messagingSenderId: "389022624121",
    appId: "1:389022624121:web:012b21c9c8a0c9cdaba7a8",
    measurementId: "G-NFMBS5746R"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
  firebase.analytics();
  ///////////// login with google //////////////////
  function googleLogin(){
    var provider = new firebase.auth.GoogleAuthProvider();
    firebase.auth()
        .signInWithPopup(provider)
        .then((result) => {
            /** @type {firebase.auth.OAuthCredential} */
            var credential = result.credential;
debugger
            // This gives you a Google Access Token. You can use it to access the Google API.
            var token = credential.accessToken;
            // The signed-in user info.
            var user = result.user;
            // ...
        }).catch((error) => {
            // Handle Errors here.
            var errorCode = error.code;
            var errorMessage = error.message;
            // The email of the user's account used.
            var email = error.email;
            // The firebase.auth.AuthCredential type that was used.
            var credential = error.credential;
            // ...
        });
  }
  //////////// login with google //////////////////
</script>
<script type="text/javascript">
  (function($) {
      $(document).ready(function() {
          $('.list-inline li > a').click(function() {
              var activeForm = $(this).attr('href') + ' > form';
              //console.log(activeForm);
              $(activeForm).addClass('animated fadeIn');
              //set timer to 1 seconds, after that, unload the animate animation
              setTimeout(function() {
                  $(activeForm).removeClass('animated fadeIn');
              }, 1000);
          });
      });
  })(jQuery);
</script>
</body>
</html>
