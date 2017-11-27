<?php
session_start();
require_once '../config/dbconnect.php';
require_once '../admin/config/dbconnect.php';
if (!isset($_SESSION['userId'])) 
{
    header("Location: ../Signin/");
}
$id = $_SESSION['userId'];

$query = "SELECT * FROM resume WHERE appid='$id'";
$result = mysqli_query($app, $query);
$result = mysqli_fetch_assoc($result);

$Education = $result['education'];
$Work = $result['work_experience'];
$Nontech = $result['extra_skills'];
$Description = $result['description'];

if (isset($_POST['submit'])) 
{
    $education = $_POST['education'];
    $work = $_POST['work'];
    $nontech = $_POST['nontech'];
    $description = $_POST['description'];
    
    // Fetching each skill selected by the Admin

    if(!empty($_POST['skill_list'])) 
    {
        foreach($_POST['skill_list'] as $check) 
        {
            $query = "INSERT INTO `skills`(`app_id`, `skill`) VALUES ('$id', '$check')";
            $result = mysqli_query($app, $query);
            // Access each value in skill array starting from 0 index as an integer
        }



    }
    if (!empty($education)) 
    {
        
        $query = "UPDATE `resume` SET `education`='$education',`work_experience`='$work',`extra_skills`='$nontech',`description`='$description' WHERE `appid`='$id'";
        $result = mysqli_query($app, $query);
        echo "UPDATED";
        echo "Erro: ".mysqli_error($app);
        //

    }
    if (empty($Education)) 
    {
        $query = "INSERT INTO resume(`appid`, `education`,`work_experience`,`extra_skills`,`description`) VALUES('$id','$education','$work','$nontech','$description')";
        $result = mysqli_query($app, $query);
        echo "INSERTED";
        echo "Erro: ".mysqli_error($app);
        
    }
    header("Location: ../profile");
   



}


?>
<!DOCTYPE html>
<html>

<head>
    <title>Settings</title>
   <script src="http://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
  <link rel="apple-touch-icon" sizes="76x76" href="..assets/img/apple-icon.png">
  <link rel="icon" type="../image/png" href="../assets/img/favicon.png">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link href="../bootstrap3/css/bootstrap.css" rel="stylesheet" />
  <link href="../bootstrap3/css/font-awesome.css" rel="stylesheet" />
 <link href="../assets/gsdk.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="profile.css">
<style type="text/css">
    
    .skillClass{
        font-size: 14px;
    }
</style>

 </head>

<body>
    <style type="text/css">
     html {
            background:rgb(83, 223, 245);
            height:2000px;
            font-family: 'Open Sans', Arial, Helvetica, Sans-serif, Verdana, Tahoma;
    
        }
      body {
            height: 2000px;
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
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button> <a class="navbar-brand" href="#">Settings</a> </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="../profile/">Profile</a></li>
                    <li><a href="../profile/logout.php">Logout</a></li>
                    <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Menu<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="../">Home</a></li>
                            <li><a href="#">Blog</a></li>
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
    <input type="checkbox" name="skill" id="">
    <div class="card card-container" style="height:1500px; margin-top: 120px">
        <form class="form" method="post">
              <div class="form-row">
                            <div class="form-group col-md-12">
                                <label>Education</label>
                                <input text="text" name="education" class="form-control" placeholder="" value="<?php echo $Education; ?>" required></div>
                            
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label>Work Experience</label>
                                <input text="text" name="work" class="form-control" placeholder="Eg: 2 years" value="<?php echo $Work; ?>"> </div>
                            
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label>Non-Technical Skills</label>
                            <input text="text" name="nontech" class="form-control" placeholder="Eg: Public Speaking" value="<?php echo $Nontech; ?>"> </div>
                            
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label>Description</label>
                            <input text="text" name="description" class="form-control" placeholder="Eg: Goals" value="<?php echo $Description; ?>"> </div>
                            
                        </div>
         <div class="form-row">
                            <div class="form-group col-md-12">
                                 <div class="jumbotron" style="height: 1000px; border: solid #cecece 1px; border-radius: 3px; background-color: white ">
                                    <h4 style="margin-bottom: 50px;">Choose all your skills</h4>
                                    
                                      <!--  Print Skills dynamically from skill table in app --> 
                                    <div class="checkbox">
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
                                            echo "<div class=\"col-md-4 skillClass\"> <label><input id=\"val".$i."\" type=\"checkbox\" name=\"skill_list[]\" value=\"".$row['skill']."\">".$row['skill']."</label>";
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
                
                                <button type="submit" name="submit" value="done" class="btn btn-primary">Update</button>
                            </div>
                        </div>
        </form>
    </div>
    <script src="../jquery/jquery-1.10.2.js" type="text/javascript"></script>
    <script src="../assets/js/jquery-ui-1.10.4.custom.min.js" type="text/javascript"></script>
    <script src="../bootstrap3/js/bootstrap.js" type="text/javascript"></script>
      
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
                $this = $(this)
                    , $next = $this.next();
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