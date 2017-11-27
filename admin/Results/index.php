<?php session_start();

require_once '../config/dbconnect.php';
require_once '../../config/dbconnect.php';
require_once '../../timetaken.php';
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
//// Fetched Keywords from search page.
if ($_SESSION['education'] && $_SESSION['skill1']) {
   

    $education = $_SESSION['education'];
    $work = $_SESSION['work'];
    $nontech= $_SESSION['nontech']; 
    $skill1 = $_SESSION['skill1'];
    $skill2 = $_SESSION['skill2'];
    $skill3 = $_SESSION['skill3'];
    ######################################################################################################

    $query1 = "SELECT `appid` FROM `resume` WHERE `education` LIKE '%$education%' OR `extra_skills` LIKE '%$nontech%' OR `work_experience` LIKE '%$work%'";
    //echo $query1 ;
    $result1 = mysqli_query($app, $query1);
    while ($row = mysqli_fetch_assoc($result1)) 
    {
        $a1[] = $row['appid'];
    }        

    ########################################################################################################
    $query2 = "SELECT `app_id` FROM `skills` WHERE skill = '$skill1' OR skill = '$skill2' OR skill = '$skill3'";
    //echo $query2;
    $result2 = mysqli_query($app, $query2);
    while ($row = mysqli_fetch_assoc($result2)) 
    {
        $a2[] = $row['app_id'];

    }
    ########################################################################################################

    // Merge two arrays and remove duplicates and blank spaces

    if(is_array($a1) && is_array($a2))
        $profile = array_merge($a1, $a2);
    else if(is_array($a1))
        $profile = $a1;
    else 
        $profile = $a2;
    ########################################################################################################
    
     
    $profile = array_unique($profile, SORT_NUMERIC);
    $profile = array_filter($profile);

    ###########################################################################################################
    
   
}
else{
    echo "No Parameters Selected";
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
        <link rel="stylesheet" type="text/css" href="result.css">
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
                            <li> <a href="../Shortlist/"><i class="fa fa-table fa-fw"></i> Resume Status</a> </li>
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
                        <h1 class="page-header">Search Results</h1> </div>
                    <form action="#" method="post">
                    
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <div class="jumbotron" style="padding-right: 10px; padding-left: 10px; height:100%; border:  border-radius: 3px; background-color: white ">
                                    <h4 style="margin-bottom: 50px; font-size: 30px">Top Results</h4>
                                    
                                    <?php
                                    if (isset($profile)) 
                                    {
                                        foreach ($profile as $id) 
                                        {
                                         
                                         $sql = "SELECT * FROM lastSeen WHERE appid='$id'";
                                         $row = mysqli_query($app, $sql);
                                         $row = mysqli_fetch_assoc($row);
                                         $Time = "@".$row['lastseen'];
                                         $lastSeen = time_elapsed_string($Time, true);   
                                         $query = "SELECT name FROM registration WHERE id='$id'";
                                         $result = mysqli_query($app,$query);
                                         $result = mysqli_fetch_assoc($result);
                                         $name = $result['name'];

                                         echo "<div class=\"jumbotron\" style=\"padding-right: 10px; padding-left: 10px; width:100%; height:80%; border: solid lightgrey 1px; border-radius: 3px; background-color: white \">";
                                          
                                        echo "<a href=\"\"><p style=\"padding: 0; margin-top: -35px\">$name</p></a>
      <button type=\"submit\" class=\"btn btn-sucess btn-default pull-right \" style=\"padding: 10px; margin-top: 160px; margin-right: 30px;\">Shortlist</button>
     ";
                                       echo "<div class=\"pull-right\"><p>Last Seen: $lastSeen</p></div>";

                                          $query = "SELECT * FROM resume WHERE appid='$id'";
                                          $result = mysqli_query($app, $query);
                                          
                                         // echo mysqli_num_rows($result);
                                          while ($row = mysqli_fetch_assoc($result)) 
                                          {
                                              $row1 = $row['education'];
                                              $row2 = $row['work_experience'];
                                              $row3 = $row['extra_skills'];
                                              


                                          }
                                          echo "  <p>Keywords Match</p>
                                                  <p style=\"font-size: 15px\">Education: $row1</p>
                                                  <p style=\"font-size: 15px\">Work Experience :$row2</p>
                                                  <p style=\"font-size: 15px\">Non technical Skills and Hobbies: $row3</p>                                               
                                                ";
                                          $query = "SELECT skill FROM skills WHERE app_id='$id' LIMIT 15";
                                          $result = mysqli_query($app, $query);
                                          echo " <p>Tags</p>";
                                          while ($row = mysqli_fetch_assoc($result)) 
                                          {
                                              echo " <p class=\"tags\">".$row['skill']."</p>";

                                          }
                                          echo "</div>";
                                        }

                                    }
                                    

                                    ?>


                                </div>
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