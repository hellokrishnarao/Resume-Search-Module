  <?php
  session_start();
  if(isset($_SESSION['userId'])){
    header("Location: ../profile");
  }
  require_once '../config/dbconnect.php';

  $error = false;

  if ( isset($_POST['submit']) )
   { 
    // clean user inputs to prevent sql injections
    $fullname = trim($_POST['fullname']);
    $fullname = strip_tags($fullname);
    $fullname = htmlspecialchars($fullname);
    
    $email = trim($_POST['email']);
    $email = strip_tags($email);
    $email = htmlspecialchars($email);
    
    $password = trim($_POST['password']);
    $password = strip_tags($password);
    $password = htmlspecialchars($password);

    $address = trim($_POST['address']);
    $address = strip_tags($address);
    $address = htmlspecialchars($address);

    $phone = trim($_POST['phone']);
    $phone = strip_tags($phone);
    $phone = htmlspecialchars($phone);

    $gender = trim($_POST['gender']);
    $gender = strip_tags($gender);
    $gender = htmlspecialchars($gender);
    
    $date = trim($_POST['date']);
    $date = strip_tags($date);
    $date = htmlspecialchars($date);

    $education = trim($_POST['education']);
    $education = strip_tags($education);
    $education = htmlspecialchars($education); 

   

     function nullCheck($var)
    {
        
      if (!isset($_POST['$var']))
      {
        $_POST['$var'] = "NULL" ;
      }
    }

    // These attributes are optional. Database accepts Null Values

    nullCheck('fblink');
    nullCheck('gitlink');
    nullCheck('linkedin');
    nullCheck('profileImg');
    nullCheck('work');
    nullCheck('description');
    nullCheck('nontechskills');

    $work = trim($_POST['work']);
    $work = strip_tags($work);
    $work = htmlspecialchars($work); 

    $description = trim($_POST['description']);
    $description = strip_tags($description);
    $description = htmlspecialchars($description);

    $nontechskills = trim($_POST['nontechskills']);
    $nontechskills = strip_tags($nontechskills);
    $nontechskills = htmlspecialchars($nontechskills);

    $fblink = trim($_POST['fblink']);
    $fblink = strip_tags($fblink);
    $fblink = htmlspecialchars($fblink);
    
    $gitlink = trim($_POST['gitlink']);
    $gitlink = strip_tags($gitlink);
    $gitlink = htmlspecialchars($gitlink);
    
    $linkedin = trim($_POST['linkedin']);
    $linkedin = strip_tags($linkedin);
    $linkedin = htmlspecialchars($linkedin);

    $profileImg = trim($_POST['profileImg']);
    $profileImg = strip_tags($profileImg);
    $profileImg = htmlspecialchars($profileImg);


   

    // basic name validation
    if (empty($fullname)) {
      $error = true;
      $nameError = "Please enter your name.";
    } else if (strlen($fullname) < 3) {
      $error = true;
      $nameError = "Name must have atleat 3 characters.";
    } else if (!preg_match("/^[a-zA-Z ]+$/",$fullname)) {
      $error = true;
      $nameError = "Name must contain alphabets and space.";
    }
      
    //basic email validation
    if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
      $error = true;
      $emailError = "Please enter valid email address.";
    } else {
      // check email exist or not
      $query = "SELECT email FROM registration WHERE email='$email'";
      $result = mysqli_query($app, $query);
      $count = mysqli_num_rows($result);
      if($count!=0){
        $error = true;
        $emailError = "Provided Email is already in use.";
      }
    }
    // password validation
    if (empty($password)){
      $error = true;
      $passError = "Please enter password.";
    } else if(strlen($password) < 8) {
      $error = true;
      $passError = "Password must have atleast 8 characters.";
    }

    $password = hash('sha256', $password);
      
    //Personal Info Validation
    // dob  address   mobile  gender  profile   fb  github  linkedin 
    if (empty($address)) { 
      $error = true;
      $addressError = "This field can't be empty";
    }

    if (empty($date)) { 
      $error = true;
      $dateError = "Invalid DOB";
    }
    if (empty($phone)) { 
      $error = true;
      $phoneError = "This can't be empty";
    }
    elseif (!is_numeric($phone)) {
      $error = true;
      $phoneError = "Please enter a valid Phone Number";
    }
  
    if (empty($gender)) { 
      $error = true;
      $genderError = "This can't be empty";
    }
  
    // Education Validation
     if (empty($education)) { 
      $error = true;
      $educationError = "This can't be empty";
    }

    // if there's no error, continue to register
    if( !$error ) {
      
       

       $query = "INSERT INTO `registration`(`name`, `email`, `password`, `dob`, `address`, `mobile`, `gender`, `profile`, `fb`, `github`, `linkedin`) VALUES ('$fullname', '$email', '$password', '$date', '$address', '$phone', '$gender', '$profileImg', '$fblink', '$gitlink', '$linkedin');";
        
       $result = mysqli_query($app, $query);
        if ($result) 
        {
          $query = "SELECT id FROM registration WHERE email='$email'";
        
          $result = mysqli_query($app, $query);
          $result = mysqli_fetch_assoc($result);
          $id = $result['id'];
          if ($id) 
          {
           
              $_SESSION['userId'] = $id;
              $query = "INSERT INTO `resume`(`appid`, `education`, `work_experience`, `extra_skills`, `description`) VALUES ('$id','$education', '$work', '$nontechskills', '$description')"; 
              $result = mysqli_query($app, $query);
              header("Location: ../profile");
          }
        

       }
      else{
          echo "Error:".mysqli_error($app);
      }
    } 
}

?>
<!DOCTYPE html>
<html>

<head>
  <title>Applicant Register</title>
  <script src="http://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
  <link rel="apple-touch-icon" sizes="76x76" href="..assets/img/apple-icon.png">
  <link rel="icon" type="../image/png" href="../assets/img/favicon.png">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link href="../bootstrap3/css/bootstrap.css" rel="stylesheet" />
  <link href="../bootstrap3/css/font-awesome.css" rel="stylesheet" />
  <link href="../assets/css/gsdk.css" rel="stylesheet" />

  <body>
    <style type="text/css">
      .errorDiv{
        color: red;
      }
      body {
        margin-top: 40px;
      }
      
      .stepwizard-step p {
        margin-top: 10px;
      }
      
      .stepwizard-row {
        display: table-row;
      }
      
      .stepwizard {
        display: table;
        width: 50%;
        position: relative;
      }
      
      .stepwizard-step button[disabled] {
        opacity: 1 !important;
        filter: alpha(opacity=100) !important;
      }
      
      .stepwizard-row:before {
        top: 14px;
        bottom: 0;
        position: absolute;
        content: " ";
        width: 100%;
        height: 1px;
        background-color: #ccc;
        z-order: 0;
      }
      
      .stepwizard-step {
        display: table-cell;
        text-align: center;
        position: relative;
      }
      
      .btn-circle {
        width: 30px;
        height: 30px;
        text-align: center;
        padding: 6px 0;
        font-size: 12px;
        line-height: 1.428571429;
        border-radius: 15px;
      }
      
      .come-down {
        margin-top: 50px;
      }
      
      footer {
        color: white;
      }
      
      .nav-back {
        background-color: #538685;
      }
      
      .bootstrap-iso .formden_header h2,
      .bootstrap-iso .formden_header p,
      .bootstrap-iso form {
        font-family: Arial, Helvetica, sans-serif;
        color: black
      }
      
      .bootstrap-iso form button,
      .bootstrap-iso form button:hover {
        color: white !important;
      }
      
      .asteriskField {
        color: red;
      }
    </style>
    <nav class="navbar navbar-ct-blue navbar-transparent navbar-fixed-top nav-back" role="navigation">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button> <a class="navbar-brand" href="../">Home</a> </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li class="active"><a href="../about/">About</a></li>
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
   
    <div class="container">
      <div class="container come-down">
        <div class="card card-container">
          <div class="stepwizard col-md-offset-3">
            <div class="stepwizard-row setup-panel">
              <div class="stepwizard-step"> <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                <p>Step 1</p>
              </div>
              <div class="stepwizard-step"> <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                <p>Step 2</p>
              </div>
              <div class="stepwizard-step"> <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                <p>Step 3</p>
              </div>
              <div class="stepwizard-step"> <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4  </a>
                <p>Step 4</p>
              </div>
            </div>
          </div>
          <form role="form" method="post" action="">
            <div class="row setup-content" id="step-1">
              <div class="col-xs-6 col-md-offset-3">
                <div class="col-md-12">
                  <h3> Step 1</h3>
                  <div class="form-group">
                    <label class="control-label">Full Name</label>
                    <div class="errorDiv"><?php echo $nameError ?></div>
                    <input maxlength="100" type="text" name="fullname"  class="form-control" placeholder="Your Full Name" /> </div>
                  <div class="form-group">
                    <label class="control-label">Email</label>
                     <div class="errorDiv"><?php echo $emailError ?></div>
                    <input maxlength="100" type="email" name="email"  class="form-control" placeholder="Your Email" /> </div>
                  <div class="form-group">
                    <label class="control-label">Password</label>
                     <div class="errorDiv"><?php echo $passError ?></div>
                    <input maxlength="100" type="password" name="password"  class="form-control" placeholder="Choose Password" /> </div>
                  <button class="btn btn-primary nextBtn btn-lg pull-right" type="button">Next</button>
                </div>
              </div>
            </div>
            <div class="row setup-content" id="step-2">
              <div class="col-xs-6 col-md-offset-3">
                <div class="col-md-12">
                  <h3> Step 2</h3>
                  <div class="form-group">
                    <label class="control-label">Postal Address</label>
                     <div class="errorDiv"><?php echo $addressError ?></div>
                    <textarea  name="address" class="form-control" placeholder="Enter your address"></textarea>
                  </div>
                   <div class="form-group">
                    <label class="control-label">Phone</label>
                     <div class="errorDiv"><?php echo $phoneError ?></div>
                    <input  name="phone" class="form-control" type="tel" maxlength="10" placeholder="Enter your Mobile Number">
                  </div>
                  <div class="form-group">
                    <label class="control-label">Gender</label>
                     <div class="errorDiv"><?php echo $genderError ?></div>
                    <label class="radio-inline">
                      <input type="radio" name="gender" value="male">Male</label>
                    <label class="radio-inline">
                      <input type="radio" name="gender" value="female">Female</label>
                    <label class="radio-inline">
                      <input type="radio" name="gender" value="third">Third</label>
                    <div class="form-group"> </div>
                  </div>
                  <label class="control-label col-sm-2 requiredField" style="margin-left: -15px;" for="date">Date</label>
                 <div class="form-group">
                    <div class="col-sm-10">
                      <div class="input-group">
                        <div class="input-group-addon"> <i class="fa fa-calendar">
         </i> </div>
                        <input id="date" name="date" placeholder="YYYY-MM-DD" type="text" /> </div>
                    </div>
                  </div>
                  <div class="errorDiv" style="margin-top: 30px"><?php echo $dateError ?></div>
                  <button class="btn btn-primary nextBtn btn-lg pull-right " style="margin-top: 20px;" type="button">Next</button>
                </div>
              </div>
            </div>
            <div class="row setup-content" id="step-3">
              <div class="col-xs-6 col-md-offset-3">
                <div class="col-md-12">
                  <h3> Step 3</h3>
                  <div class="form-group">
                    <label class="control-label">Education</label>
                     <div class="errorDiv"><?php echo $educationError ?></div>
                    <textarea maxlength="400" type="text" name="education"  class="form-control" placeholder="Your Education"></textarea>  </div>
                  <div class="form-group">
                    <label class="control-label">Work Experience</label>
                
                    <textarea maxlength="400" type="text" name="work"  class="form-control" placeholder="Your Work Experience"  ></textarea> </div>
                    <div class="form-group">
                    <label class="control-label">Description</label>
              
                    <textarea maxlength="400" type="text" name="description"  class="form-control" placeholder="Describe your career goals " ></textarea> </div>
                    <div class="form-group">
                    <label class="control-label">Non Technical Skills</label>
                    <textarea ma  xlength="400" type="text" name="nontechskills"  class="form-control" placeholder="Non-Technical Skills " ></textarea> </div>
                  <button class="btn btn-primary nextBtn btn-lg pull-right" type="button">Next</button>
                </div>
              </div>
            </div>
            <div class="row setup-content" id="step-4">
              <div class="col-xs-6 col-md-offset-3">
                <div class="col-md-12">
                  <h3> Step 4</h3>
                  <div class="form-group">
                    <label class="control-label">Facebook</label>
                    <input maxlength="100" type="link" name="fblink"  class="form-control" placeholder="Facebook Profile" /> </div>
                    <div class="form-group">
                    <label class="control-label">Github</label>
                    <input maxlength="100" type="link" name="gitlink"  class="form-control" placeholder="Github Profile" /> </div>
                    <div class="form-group">
                    <label class="control-label">Linked in</label>
                    <input maxlength="100" type="link" name="linkedin"  class="form-control" placeholder="Linked-in Profile" /> </div>
                  <div class="form-group">
                    <label class="control-label">Profile Picture</label>
                    <div class ="btn btn-lg btn-primary">
                     <input type="file" name="profileImg"  class="file" style="margin-top: -5px">
                     </div>
                     </div>
                  <button class="btn btn-lg  btn-primary" type="submit" name="submit">Sign in</button>
                </div>
              </div>
            </div>
          </form>
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
      //SCRIPT FOR FORM STEP
    $(document).ready(function () {
          var navListItems = $('div.setup-panel div a')
            , allWells = $('.setup-content')
            , allNextBtn = $('.nextBtn');
          allWells.hide();
          navListItems.click(function (e) {
            e.preventDefault();
            var $target = $($(this).attr('href'))
              , $item = $(this);
            if (!$item.hasClass('disabled')) {
              navListItems.removeClass('btn-primary').addClass('btn-default');
              $item.addClass('btn-primary');
              allWells.hide();
              $target.show();
              $target.find('input:eq(0)').focus();
            }
          });
          allNextBtn.click(function () {
            var curStep = $(this).closest(".setup-content")
              , curStepBtn = curStep.attr("id")
              , nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a")
              , curInputs = curStep.find("input[type='text'],input[type='url']")
              , isValid = true;
            $(".form-group").removeClass("has-error");
            for (var i = 0; i < curInputs.length; i++) {
              if (!curInputs[i].validity.valid) {
                isValid = false;
                $(curInputs[i]).closest(".form-group").addClass("has-error");
              }
            }
            if (isValid) nextStepWizard.removeAttr('disabled').trigger('click');
          });
          $('div.setup-panel div a.btn-primary').trigger('click');
        });
      </script>
      <script type="text/javascript">
        //DATE PICKER
        $(document).ready(function () {
          var date_input = $('input[name="date"]'); //our date input has the name "date"
          var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
          date_input.datepicker({
            format: 'yyyy-mm-dd'
            , container: container
            , todayHighlight: true
            , autoclose: true
          , })
        })
      </script>
  
    <!-- Include Date Range Picker -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css" />

     </body>

</html>