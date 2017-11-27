<?php
session_start();
?>
	<!doctype html>
	<html lang="en">

	<head>
		<meta charset="utf-8" />
		<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
		<link rel="icon" type="image/png" href="assets/img/favicon.png">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<title>Resume Search Module</title>
		<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
		<meta name="viewport" content="width=device-width" />
		<link href="../bootstrap3/css/bootstrap.css" rel="stylesheet" />
		<link href="../bootstrap3/css/font-awesome.css" rel="stylesheet" />
		<link href="../gsdk.css" rel="stylesheet" />
		<link href="../assets/css/demo.css" rel="stylesheet" />
		<link href="../assets/css/style.css" rel="stylesheet" />
		<link href="../style.css" rel="stylesheet" />
		<!--     Font Awesome     -->
	</head>

	<body>
		<style type="text/css">
			.navbar-transparent {
				background-color: #177198;
			}
		</style>
		<div id="navbar-full">
			<div id="navbar">
				<!--    
        navbar-default can be changed with navbar-ct-blue navbar-ct-azzure navbar-ct-red navbar-ct-green navbar-ct-orange  
        -->
				<nav class="navbar navbar-ct-blue navbar-transparent navbar-fixed-top" role="navigation">
					<div class="container">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button> <a class="navbar-brand" href="#">About</a> </div>
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav">
								<li class="active"><a href="../">Home</a></li>
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
							<form class="navbar-form navbar-left navbar-search-form" role="search" method="post">
								<ul class="nav navbar-nav"> </ul>
								<div class="form-group">
									<input type="text" value="" class="form-control" name="search" placeholder="Search our Blog..."> </div>
							</form>
							<ul class="nav navbar-nav navbar-right">
                   
                    
                    <li><a href="../company/" class="btn btn-round btn-default">New Company Registration</a></li>
               </ul>
          
						</div>
						<!-- /.navbar-collapse -->
					</div>
					<!-- /.container-fluid -->
				</nav>
				<div id="myCarousel" class="carousel slide" data-ride="carousel">
					<!-- Indicators -->
					<ol class="carousel-indicators">
						<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
						<li data-target="#myCarousel" data-slide-to="1"></li>
						<li data-target="#myCarousel" data-slide-to="2"></li>
					</ol>
					<div class="carousel-inner" role="listbox">
						<div class="item active"> <img class="first-slide" src="../assets/img/abt1.jpg" alt="First slide">
							<div class="container">
								<div class="carousel-caption">
									<h1>Get Hired </h1> </div>
							</div>
						</div>
						<div class="item"> <img class="second-slide img-responsive" src="../assets/img/abt2.jpg" alt="Second slide">
							<div class="container">
								<div class="carousel-caption">
									<h1>Employ</h1> </div>
							</div>
						</div>
						<div class="item"> <img class="third-slide" src="../assets/img/abt3.jpg" alt="Third slide">
							<div class="container">
								<div class="carousel-caption">
									<h1>Almost Instantly</h1> </div>
							</div>
						</div>
					</div>
					<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a>
					<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next"> <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> <span class="sr-only">Next</span> </a>
				</div>
				<!-- /.carousel -->
			</div>
			<!--  end navbar -->
		</div>
		<!-- end menu-dropdown -->
		<div class="main">
			<div class="container tim-container" style="max-width:800px; padding-top:80px">
				<h1 class="text-center">About<br><small class="subtitle">A brief Summary of Our Goals and Objectives</smal  l></h1>
				<div class="jumbotron">
					
					<p>This is one of the largest job search networks for college students and recent graduates. Today, much of this hiring is done offline, and the focus of this business is to convert the existing offline activities and build on the potential of online campus hiring. The site is exclusively targeted at entry-level hiring. It maintains the largest database of colleges and students across various courses in India and facilitates handshakes between relevant employers and prospective students.</p>
					<p>With an in-depth understanding of the entry-level job market and a proven and successful track record in the recruitment industry, the site is well-equipped to market the graduate effectively to potential employers. For fresh graduates, it offers help in building the perfect CV, tips on personal grooming, and advice on how to present oneself to the perspective employer.</p>
					<p>For the recruiters, the site is the perfect platform to reach a huge database of talented, entry-level employees plus showcase their companies to the graduate community through a wide range of recruitment solutions. It makes the entry-level hiring process easier and quicker for organizations by ensuring that they reach deserving candidates even in remote corners of the country.</p>

				</div>
			</div>
			<div class="space"></div>
			<footer>
				<p class="pull-right"><a href="#" class="btn-primary btn btn-round">Back to top</a></p>
				<p>&copy; 2017 Company, Inc &middot; <a href="Privacy/">Privacy</a> &middot; <a href="Terms/">Terms</a></p>
			</footer>
			<!-- end container -->
		</div>
		<!-- end main -->
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