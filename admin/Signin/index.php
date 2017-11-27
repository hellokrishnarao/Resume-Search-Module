<?php
  ob_start();
  session_start();
  require_once '../config/dbconnect.php';
  
  // it will never let you open index(login) page if session is set
  if ( isset($_SESSION['adminId']) ) {
    header("Location: ../ ");
    exit;
  }
  
  $error = false;
  
  if(isset($_POST['submit']) ) { 
    
    // prevent sql injections/ clear user invalid inputs
    $email = trim($_POST['email']);
    $email = strip_tags($email);
    $email = htmlspecialchars($email);
    
    $password = trim($_POST['password']);
    $password = strip_tags($password);
    $password = htmlspecialchars($password);

    
    // prevent sql injections / clear user invalid inputs
    
    if(empty($email)){
      $error = true;
      $emailError = "Please enter your email address.";
    } 
    else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
      $error = true;
      $emailError = "Please enter valid email address.";
    }
    
 

    // if there's no error, continue to login
    if (!$error) 
    {
        
        //$password = hash('sha256', $pass); // password hashing using SHA256
        $query = "SELECT `admin_id`, `password`, `email` FROM `admin` WHERE  email='$email'";
        $result = mysqli_query($comp, $query);
        $result = mysqli_fetch_assoc($result);

        if ($result) 
        {
          $Email = $result['email'];
          $Password = $result['password'];  
          $Id = $result['admin_id'];
          
          if ($email == $Email && $password==$Password) 
          {
            $_SESSION['adminId'] = $Id;
            header("Location: ../");

          }
         
        }
        else 
        {
          $error =true;
          $invalid = "Invalid Email or Password";
        }
      
        
    }
    
  }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>

    <script
              src="http://code.jquery.com/jquery-3.2.1.min.js"
              integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
              crossorigin="anonymous"></script>

     <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
     <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
     <link rel="stylesheet" type="text/css" href="style.css">  
      <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png">
  <link rel="icon" type="../../image/png" href="../../assets/img/favicon.png">  

    <link href="../../bootstrap3/css/bootstrap.css" rel="stylesheet" />
    <link href="../../bootstrap3/css/font-awesome.css" rel="stylesheet" />
    
  <link href="../../assets/css/gsdk.css" rel="stylesheet" />   
    <link href="../../assets/css/demo.css" rel="stylesheet" /> 
    <link href="../../assets/css/style.css" rel="stylesheet" /> 
   
        
</head>
<body>
  <style type="text/css">
  .come-down{
    margin-top: 85px;
  }
  footer{
    color: white;
  }
.nav-back {
        background-color: #538685;
      }
      
  </style>
    <!--    
        navbar-default can be changed with navbar-ct-blue navbar-ct-azzure navbar-ct-red navbar-ct-green navbar-ct-orange  
        -->
        <nav class="navbar navbar-ct-blue navbar-transparent navbar-fixed-top nav-back" role="navigation">
       
          <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">

              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="../../">Home</a>
            </div>
        
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">
                <li class="active"><a href="../../about">About</a></li>
                <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">Menu<b class="caret"></b></a>
                      <ul class="dropdown-menu">
                        <li><a href="">Blog</a></li>
                        <li class="divider"></li>
                        <li><a href="Feedback/">Feedback</a></li>
                        <li><a href="FAQ/">FAQ</a></li>
                        <li><a href="contact/">Contact us</a></li>
                      </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" data-toggle="search" class="hidden-xs"><i class="fa fa-search"></i></a>
                </li>
              </ul>
               <form class="navbar-form navbar-left navbar-search-form" role="search">                  
                <ul class="nav navbar-nav">
                                </ul> 
                <div class="form-group">
                      <input type="text" value="" class="form-control" placeholder="Search our Blog...">
                </div>
                    
              </form>
              <!---<ul class="nav navbar-nav navbar-right">
                    <li><a href="Register/">Register</a></li>
                    
                    <li><a href="Signin/" class="btn btn-round btn-default">Sign in</a></li>
               </ul>
              -->
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>

    <div class="container come-down">
        <div class="card card-container">
          
            <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
           
            <p id="profile-name" class="profile-name-card" style="font-size: 1.5em; margin-bottom: 15px;">Company Admin Login</p>
           
            <form class="form-signin" action="#" role="form" method="post">
                <span id="reauth-email" class="reauth-email"></span>
                <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocus>
                <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" >
                <div id="remember" class="checkbox">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>
                <div style="color: red"><?php echo $invalid; ?></div>
                <button class="btn btn-lg  btn-primary btn-block btn-signin butn" name="submit" type="submit">Sign in</button>
            </form><!-- /form -->
            <a href="#" class="forgot-password">
                Forgot the password?
            </a>
        </div><!-- /card-container -->

    </div><!-- /container -->

   
<script type="text/javascript">
  $( document ).ready(function() {
    // DOM ready

    // Test data
    /*
     * To test the script you should discomment the function
     * testLocalStorageData and refresh the page. The function
     * will load some test data and the loadProfile
     * will do the changes in the UI
     */
    // testLocalStorageData();
    // Load profile if it exits
    loadProfile();
});

/**
 * Function that gets the data of the profile in case
 * thar it has already saved in localstorage. Only the
 * UI will be update in case that all data is available
 *
 * A not existing key in localstorage return null
 *
 */
function getLocalProfile(callback){
    var profileImgSrc      = localStorage.getItem("PROFILE_IMG_SRC");
    var profileName        = localStorage.getItem("PROFILE_NAME");
    var profileReAuthEmail = localStorage.getItem("PROFILE_REAUTH_EMAIL");

    if(profileName !== null
            && profileReAuthEmail !== null
            && profileImgSrc !== null) {
        callback(profileImgSrc, profileName, profileReAuthEmail);
    }
}

/**
 * Main function that load the profile if exists
 * in localstorage
 */
function loadProfile() {
    if(!supportsHTML5Storage()) { return false; }
    // we have to provide to the callback the basic
    // information to set the profile
    getLocalProfile(function(profileImgSrc, profileName, profileReAuthEmail) {
        //changes in the UI
        $("#profile-img").attr("src",profileImgSrc);
        $("#profile-name").html(profileName);
        $("#reauth-email").html(profileReAuthEmail);
        $("#inputEmail").hide();
        $("#remember").hide();
    });
}

/**
 * function that checks if the browser supports HTML5
 * local storage
 *
 * @returns {boolean}
 */
function supportsHTML5Storage() {
    try {
        return 'localStorage' in window && window['localStorage'] !== null;
    } catch (e) {
        return false;
    }
}

/**
 * Test data. This data will be safe by the web app
 * in the first successful login of a auth user.
 * To Test the scripts, delete the localstorage data
 * and comment this call.
 *
 * @returns {boolean}
 */
function testLocalStorageData() {
    if(!supportsHTML5Storage()) { return false; }
    localStorage.setItem("PROFILE_IMG_SRC", "//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" );
    localStorage.setItem("PROFILE_NAME", "César Izquierdo Tello");
    localStorage.setItem("PROFILE_REAUTH_EMAIL", "oneaccount@gmail.com");
}

</script>

  <script src="../../jquery/jquery-1.10.2.js" type="text/javascript"></script>
  <script src="../../assets/js/jquery-ui-1.10.4.custom.min.js" type="text/javascript"></script>

  <script src="../../bootstrap3/js/bootstrap.js" type="text/javascript"></script>
  <script src="../../assets/js/gsdk-checkbox.js"></script>
  <script src="../../assets/js/gsdk-radio.js"></script>
  <script src="../../assets/js/gsdk-bootstrapswitch.js"></script>
  <script src="../../assets/js/get-shit-done.js"></script>
  
    <script src="../../assets/js/custom.js"></script>
  
  <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Grand+Hotel' rel='stylesheet' type='text/css'>
</body>
</html>