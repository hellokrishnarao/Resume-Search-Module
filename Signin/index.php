<?php
	session_start();
	require_once '../config/dbconnect.php';
	
	// it will never let you open index(login) page if session is set
	if (isset($_SESSION['userId'])) {
		header("Location: ../profile");
		exit;
	}
	
	$error = false;
	
	if( isset($_POST['submit']) ) {	
		
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
		} else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
			$error = true;
			$emailError = "Please enter valid email address.";
		}
		
		if(empty($password)){
			$error = true;
			$passwordError = "Please enter your password.";
		}
		//Fix remember me here
		/*if(isset($_POST['remember']))
		{
			$remember = 12;
		}*/
		// if there's no error, continue to login
		$errorAuth= "";
		
		if (!$error) {
			
			$password = hash('sha256', $password); // password hashing using SHA256
		
			$query = "SELECT  `id`, `email`, `password` FROM `registration` WHERE email='$email'";
			$result = mysqli_query($app, $query);
			$result = mysqli_fetch_assoc($result);
			$Email = $result['email'];
			$Password = $result['password'];
			$id = $result['id'];
			if (isset($Email)) {

				if ($email = $Email  && $password == $Password ) 
				{
					$timeOfEntry =time();
					$query = "call UpdateTime('$id','$timeOfEntry')";
					$res = mysqli_query($app, $query);
					$_SESSION['userId'] = $result['id'];	 
					
					header("Location: ../profile");
				}
				else{
					$errorAuth = "Invalid Email or Password";
				}
			}
				
		}
		
	}
?>
<!DOCTYPE html>
<html>

<head>
	<title>Login</title>
	<script src="http://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
	<link rel="icon" type="../image/png" href="../assets/img/favicon.png">
	<link href="../bootstrap3/css/bootstrap.css" rel="stylesheet" />
	<link href="../bootstrap3/css/font-awesome.css" rel="stylesheet" />
	<link href="../assets/css/gsdk.css" rel="stylesheet" />
	<link href="../assets/css/demo.css" rel="stylesheet" />
	<link href="../assets/css/style.css" rel="stylesheet" /> 
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src='https://www.google.com/recaptcha/api.js'></script>
</head>

<body>
	<style type="text/css">
		.come-down {
			margin-top: 85px;
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
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button> <a class="navbar-brand" href="../">Home</a> </div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li class="active"><a href="../about">About</a></li>
					<li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Menu<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="">Blog</a></li>
							<li class="divider"></li>
							<li><a href="Feedback/">Feedback</a></li>
							<li><a href="FAQ/">FAQ</a></li>
							<li><a href="contact/">Contact us</a></li>
						</ul>
					</li>
					<li> <a href="javascript:void(0);" data-toggle="search" class="hidden-xs"><i class="fa fa-search"></i></a> </li>
				</ul>
				<form class="navbar-form navbar-left navbar-search-form" role="search">
					<ul class="nav navbar-nav"> </ul>
					<div class="form-group">
						<input type="text" value="" class="form-control" placeholder="Search. our Blog.."> </div>
				</form>
				<!---<ul class="nav navbar-nav navbar-right">
                    <li><a href="Register/">Register</a></li>
                    
                    <li><a href="Signin/" class="btn btn-round btn-default">Sign in</a></li>
               </ul>
              -->
			</div>
			<!-- /.navbar-collapse -->
		</div>
		<!-- /.container-fluid -->
	</nav>
	<div class="container come-down">
		<div class="card card-container">
			<p id="profile-name" class="profile-name-card" style="font-size: 1.5em; margin-bottom: 15px;">Applicant Login</p>
			<form class="form-signin" method="post" action=""> <span id="reauth-email" class="reauth-email"></span>
				<input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email address" required autofocus>
				<div class="errorDiv"><?php echo $emailError; ?></div>
				<input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
				<div class="errorDiv"><?php echo $passwordError;?></div>
				<div id="remember" class="checkbox">
					<label><input type="checkbox" name="remember" value="1"> Remember me </label>
				</div>
				
				<div style="color: red"><?php echo $errorAuth; ?></div>
				
				<button class="btn btn-lg btn-primary btn-block btn-signin butn" name="submit" type="submit">Sign in</button>
				<!-- <div class="g-recaptcha" data-sitekey="6LfHWjkUAAAAAERDG4d_HgDp8djCoicail0kSV7b"></div> -->
			</form>
			<!-- /form --><a href="#" class="forgot-password">
                Forgot the password?
            </a> </div>
		<!-- /card-container -->
	</div>
	<!-- /container -->
	<script src="../jquery/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="../assets/js/jquery-ui-1.10.4.custom.min.js" type="text/javascript"></script>
	<script src="../bootstrap3/js/bootstrap.js" type="text/javascript"></script>
	<script src="../assets/js/gsdk-checkbox.js"></script>
	<script src="../assets/js/gsdk-radio.js"></script>
	<script src="../assets/js/gsdk-bootstrapswitch.js"></script>
	<script src="../assets/js/get-shit-done.js"></script>
	<script src="../assets/js/custom.js"></script>
	<link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Grand+Hotel' rel='stylesheet' type='text/css'> </body>

</html>