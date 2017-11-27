<?php 
     session_start();
    require_once '../config/dbconnect.php';
    if (!isset($_SESSION['userId'])) 
    {
        header("Location: ../Signin/");
    }
    // User id to be used to pass queries
    $id = $_SESSION['userId'];
    
    $query = "SELECT * FROM registration WHERE id='$id'";
    $result = mysqli_query($app, $query);
    $result = mysqli_fetch_assoc($result);
    
    // Retrive all the user information

    $name = $result['name'];
    $email = $result['email'];
    $dob = $result['dob'];
    $address = $result['address'];
    $mobile = $result['mobile'];
    $gender = $result['gender'];
    $profileImg = $result['profile'];
    $fb = $result['fb'];
    $git = $result['github'];
    $linkedin = $result['linkedin'];

    $query = "SELECT * FROM resume WHERE appid='$id'";
    $result = mysqli_query($app, $query);
    $result = mysqli_fetch_assoc($result);

    $education = $result['education'];
    $work = $result['work_experience'];
    $nontechskills = $result['extra_skills'];
    $description = $result['description'];

?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Profile</title>
        <script src="http://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
        <link rel="apple-touch-icon" sizes="76x76" href="..assets/img/apple-icon.png">
        <link rel="icon" type="../image/png" href="../assets/img/favicon.png">
        <link rel="stylesheet" type="text/css" href="style.css">
        <link href="../bootstrap3/css/bootstrap.css" rel="stylesheet" />
        <link href="../bootstrap3/css/font-awesome.css" rel="stylesheet" />
        <link href="../assets/css/gsdk.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="profile.css"> </head>

    <body>
        <style type="text/css">
            html {
                font-family: 'Open Sans', Arial, Helvetica, Sans-serif, Verdana, Tahoma;
                background-image: linear-gradient(rgb(83, 223, 245), rgb(173, 131, 198));
            }
            
            body {
                background-image: linear-gradient(rgb(83, 223, 245), rgb(173, 131, 198));
            }
            
            .nav-back {
                background-color: #57cdee;
            }
        </style>
        <nav class="navbar navbar-ct-blue navbar-transparent navbar-fixed-top nav-back" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button> <a class="navbar-brand" href="#">Profile</a> </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="../Settings">Settings</a></li>
                        <li><a href="logout.php">Logout</a></li>
                        <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Menu<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="../">Home</a></li>
                                <li><a href="../Settings/">Settings</a></li>
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
                            <input type="text" value="" name="search" class="form-control" placeholder="Search our Blog..."> </div>
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
        <div class="card card-container" style=" margin-top: 120px">
            <div>
                <div class="container full">
                    <div class="row">
                        <h1 style="color:#383737">Welcome, <?php echo $name; ?></h1>
                        <!-- Contenedor -->
                        <ul id="accordion" class="accordion">
                            <li>
                                <div class="col col_4 iamgurdeep-pic"> <img class="img-responsive iamgurdeeposahan" alt="<?php echo $name; ?>" src="images/sruchi.jpg"> </div>
                                <div class="">
                                    <h3><?php echo $name; ?><small><i class="fa fa-map-marker"></i></small></h3> </div>
                            </li>
                            <li class="">
                                <!---default open-->
                                <div class="link"><i class="fa fa-globe"></i>About<i class="fa fa-chevron-down"></i></div>
                                <ul class="submenu">
                                    <li><a href="#">Date of Birth : <?php echo $dob ;?></a></li>
                                    <li><a href="#">Address : <?php echo $address ;?></a></li>
                                    <li><a href="mailto:<?php echo $email ;?>">Email : <?php echo $email ;?></a></li>
                                    <li><a href="#">Phone : <?php echo $mobile ;?></a></li>
                                </ul>
                            </li>
                            <li class="">
                                <div class="link"><i class="fa fa-code"></i>Professional Skills<i class="fa fa-chevron-down"></i></div>
                                <ul class="submenu"> 
                                    <a href="#">
                                        <?php
                                        $sql = "SELECT * FROM skills WHERE app_id='$id'";
                                        $result = mysqli_query($app, $sql);
                                        if (mysqli_num_rows($result) ==0) 
                                        {
                                             echo "<span class=\"tags\">Update Skills in Settings </span>";
                                        }else 
                                        {
                                            while ($row = mysqli_fetch_assoc($result))
                                            {
                                                echo "   <span class=\"tags\">".$row['skill']."</span>   ";
                                            }
                                            
                                        } 

                                        ?>   
                                    </a> 
                                </ul>
                            </li>
                            <li class="">
                                <div class="link"><i class="fa fa-facebook"></i>Social Media<i class="fa fa-chevron-down"></i></div>
                                <ul class="submenu">
                                    <li>
                                        <a href="<?php echo $fb ;?>" target="_blank" class="fa fa-facebook"></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo $git ;?>" target="_blank" class="fa fa-github"></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo $linkedin ;?>" target="_blank" class="fa fa-linkedin"></a>
                                    </li>
                                </ul>
                            </li>
                            <li class="">
                                <div class="link"><i class="fa  fa fa-briefcase"></i>Professional Info <i class="fa fa-chevron-down"></i></div>
                                <ul class="submenu">
                                    <li><a href="#">Education: <?php echo $education ;?></a></li>
                                    <li><a href="#">Work Experience : <?php echo $work ;?></a></li>
                                    <li><a href="#">Description : <?php echo $description ;?></a></li>
                                    <li><a href="#">Non-Tech Skills: <?php echo $nontechskills ;?></a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <script src="../jquery/jquery-1.10.2.js" type="text/javascript"></script>
        <script src="../assets/js/jquery-ui-1.10.4.custom.min.js" type="text/javascript"></script>
        <script src="../bootstrap3/js/bootstrap.js" type="text/javascript"></script>
        <script src="../assets/js/gsdk-checkbox.js"></script>
        <script src="../assets/js/gsdk-radio.js"></script>
        <script src="../assets/js/gsdk-bootstrapswitch.js"></script>
        <script src="../assets/js/get-shit-done.js"></script>
        <script src="../assets/js/custom.js"></script>
        <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Grand+Hotel' rel='stylesheet' type='text/css'>
        <script type="text/javascript">
            $(function () {
                var Accordion = function (el, multiple) {
                    this.el = el || {};
                    this.multiple = multiple || false;
                    // Variables privadas
                    var links = this.el.find('.link');
                    // Evento
                    links.on('click', {
                        el: this.el
                        , multiple: this.multiple
                    }, this.dropdown)
                }
                Accordion.prototype.dropdown = function (e) {
                    var $el = e.data.el;
                    $this = $(this), $next = $this.next();
                    $next.slideToggle();
                    $this.parent().toggleClass('open');
                    if (!e.data.multiple) {
                        $el.find('.submenu').not($next).slideUp().parent().removeClass('open');
                    };
                }
                var accordion = new Accordion($('#accordion'), false);
            });
        </script>
    </body>

    </html>