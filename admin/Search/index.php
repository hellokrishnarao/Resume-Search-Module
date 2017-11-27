<?php session_start();

require_once '../config/dbconnect.php';

if (!isset($_SESSION['adminId'])) {
     header("Location: ../Signin/ ");
}

$id = $_SESSION['adminId'];

$query = "SELECT * FROM admin WHERE admin_id='$id'";
$result = mysqli_query($comp, $query);
$result = mysqli_fetch_assoc($result);
// Fetching the data from the form
if($result) 
{   
    $name = $result['name'];
    $email = $result['email'];
    $designation = $result['designation'];
    $address = $result['address'];
    $contact = $result['contact']; 
    $company = $result['company'];
}


if (isset($_POST['submit'])) 
{
    $_SESSION['education'] = $_POST['education'];
    $_SESSION['work'] = $_POST['work'];
    $_SESSION['nontech'] = $_POST['nontech'];
    
    if(!empty($_POST['skill_list'])) 
    {
        foreach($_POST['skill_list'] as $check) 
        {
            $skill[] = $check;
            // Access each value in skill array starting from 0 index as an integer
        }

    }
    $_SESSION['skill1'] =  $skill[0];
    $_SESSION['skill2'] =  $skill[1];
    $_SESSION['skill3'] =  $skill[2];

    header("Location: ../Results");

}


?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>
            <?php echo $company; ?>
        </title>
        <!-- Bootstrap Core CSS -->
        <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- MetisMenu CSS -->
        <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
        <!-- Morris Charts CSS -->
        <link href="../vendor/morrisjs/morris.css" rel="stylesheet">
        <!-- Custom Fonts -->
        <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </head>
    <style type="text/css">
        
        .skillClass{
            
        }

    </style>
    <body>
        <div id="wrapper">
            <!-- Navigation -->
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                    <a class="navbar-brand" href="index.html">
                        <?php echo $name." | ".$designation; ?>
                    </a>
                </div>
                <!-- /.navbar-header -->
                <ul class="nav navbar-top-links navbar-right">
                    <!-- /.dropdown -->
                    <!-- /.dropdown -->
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"> <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i> </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a> </li>
                            <li class="divider"></li>
                            <li><a href="../logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a> </li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    <!-- /.dropdown -->
                </ul>
                <!-- /.navbar-top-links -->
                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li class="sidebar-search">
                                <div class="input-group custom-search-form">
                                    <input type="text" class="form-control" placeholder="Search the blog..."> <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span> </div>
                                <!-- /input-group -->
                            </li>
                            <li> <a href="../"><i class="fa fa-dashboard fa-fw active"></i> Admin Dashboard</a> </li>
                            <li> <a href="../Shortlist"><i class="fa fa-table fa-fw"></i> Resume Status</a> </li>
                            <li> <a href="#"><i class="fa fa-tasks fa-fw"></i> Blog</a> </li>
                            <li> <a href="#"><i class="fa fa-wrench fa-fw"></i> Settings</a> </li>
                            <li> <a href="../logout.php"><i class=" fa fa-sign-out fa-fw"></i> Logout</a>
                                <!-- /.nav-second-level -->
                            </li>
                        </ul>
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>
                <!-- /.navbar-static-side -->
            </nav>
            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Resume Search</h1> </div>
                    <form  method="post">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label>Education</label>
                                <input text="text" name="education" class="form-control" placeholder="keywords Eg: CS, BTech" required> </div>
                            
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label>Work Experience</label>
                                <input text="text" name="work" class="form-control" placeholder="keywords Eg: 2 years"> </div>
                            
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label>Non-Technical Skills</label>
                            <input text="text" name="nontech" class="form-control" placeholder="keywords Eg: Public Speaking"> </div>
                            
                        </div>
                         <div class="form-row">
                            <div class="form-group col-md-12">
                                 <div class="jumbotron" style="padding-right: 10px; padding-left: 10px; height: 650px; border: solid #cecece 1px; border-radius: 3px; background-color: white ">
                                    <h4 style="margin-bottom: 20px; font-size: 20px;">Choose your required skills</h4>
                                    <h5 style="margin-bottom: 50px;"><i>(Select only 3 top skills)</i></h5>
                                      <!--  Print Skills dynamically from skill table in app --> 
                                    <div class="checkbox ">
                                        <?php
                                        $query = "SELECT skill FROM skills";
                                        $result = mysqli_query($comp, $query);
                                        $i = 0 ;
                                        while ($row = mysqli_fetch_assoc($result))
                                        {
                                            
                                            if ($i%3==0) 
                                            {
                                                $classRow = "<div class=\"row\">";
                                            }
                                            else 
                                            {
                                                $classRow = "";
                                            }
                                            echo $classRow;
                                            echo "<div class=\"col-md-4\"> <label><input  type=\"checkbox\" name=\"skill_list[]\" value=\"".$row['skill']."\">".$row['skill']."</label>";
                                            echo "</div>";
                                            if ($i%3==0) {
                                                echo "</div>";
                                            }
                                            $i=$i+1;
                                        }

                                        ?>
                                       
                                    </div>
                                     
                                 </div>
                             </div>
                            
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                
                                <button type="submit" name="submit" class="btn btn-primary">Search</button>
                            </div>
                        </div>
                       
                    </form>
                </div>
            </div>
        </div>
        <!-- /#wrapper -->
        <!-- jQuery -->
        <script src="../vendor/jquery/jquery.min.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
        <!-- Metis Menu Plugin JavaScript -->
        <script src="../vendor/metisMenu/metisMenu.min.js"></script>
        <!-- Morris Charts JavaScript -->
        <script src="../vendor/raphael/raphael.min.js"></script>
        <script src="../vendor/morrisjs/morris.min.js"></script>
        <script src="../data/morris-data.js"></script>
        <!-- Custom Theme JavaScript -->
        <script src="../dist/js/sb-admin-2.js"></script>
    </body>

    </html>