<?php
  session_start();
  require_once '../admin/config/dbconnect.php';

  $error = false;


  function trimmer($var)
  {
      $var = trim($var);
      $var = strip_tags($var);
      $var = htmlspecialchars($var);

      return $var;
  }
  if(isset($_POST['submit']))
  { 
   
    
   
  $name = $_POST['name'];
  $key = $_POST['key'];
  $rekey = $_POST['rekey'];
  $address = $_POST['address'];
  $description = $_POST['description'];
  $contact = $_POST['phone'];
  $web = $_POST['web'];


  $name = trimmer($name);
  $key = trimmer($key);
  $rekey = trimmer($rekey);
  $address = trimmer($address);
  $description= trimmer($description);
  $contact = trimmer($contact);
  $web = trimmer($web);


 
    // These attributes are optional. Database accepts Null Values
    
    // basic name validation
    if (empty($name)) {
      $error = true;
      $nameError = "Please enter your name.";
    } else if (strlen($name) < 3) {
      $error = true;
      $nameError = "Name must have atleat 3 characters.";
    }
    
 
    // key validation
    if (empty($key)){
      $error = true;
      $keyError = "Please Enter Key.";
    } else if(strlen($key) < 8) {
      $error = true;
      $keyError = "Key must have atleast 8 characters.";
    }
    elseif ($key != $rekey) {   
      $error = true;
      $rekeyError = "Secret Keys Do Not Match";
    }
    
      
    
    if (empty($address)) { 
      $error = true;
      $addressError = "This field can't be empty";
    }
     if (empty($web)) { 
      $error = true;
      $webError = "This field can't be empty";
    }
    if (empty($contact)) { 
      $error = true;
      $contactError = "This field can't be empty";
    }

     if (empty($description)) { 
      $error = true;
      $descriptionError = "This field can't be empty";
    }
       
    $logo = "default";
    if ($error)
    {
        $error = "Error in Submission. Please Enter Correct Values";
    }
    else
    {

       $query = "INSERT INTO `company_info`(`company_name`, `company_key`, `company_website`, `company_desc`, `company_contact`, `company_logo`) VALUES ('$name', '$key', '$web', '$description', '$contact', '$logo')";
        
       $result = mysqli_query($comp, $query);
       header("Location: ../");
      
    } 

  }


?>
<!DOCTYPE html>
<html>

<head>
  <title>Company Register</title>
  <script src="http://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="../image/png" href="../assets/img/favicon.png">
  <link href="../bootstrap3/css/bootstrap.css" rel="stylesheet" >
  <link href="../bootstrap3/css/font-awesome.css" rel="stylesheet" >
  <link href="../assets/css/gsdk.css" rel="stylesheet" >
  <link rel="stylesheet" type="text/css" href="style.css">

  <body>
    <style type="text/css">
      .errorDiv{
        color: red;
      }
    </style>
    <nav class="navbar navbar-ct-blue navbar-transparent navbar-fixed-top nav-back" role="navigation">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button> <a class="navbar-brand" href="../">Home</a> </div>
        <!-- Collect the nav links, forms••••••••, and other content for toggling -->
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
              <input type="text" value="" class="form-control" placeholder="Search our Blog..."> </div>
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
            </div>
          </div>
          <form role="form" method="post">
            <div class="row setup-content" id="step-1">
              <div class="col-xs-6 col-md-offset-3">
                <div class="col-md-12">
                  <h3> Step 1</h3>
                  <div class="form-group">
                    <div class="errorDiv"><?php echo $error ?></div>
                    <label class="control-label">Company Name</label>
                    <div class="errorDiv"><?php echo $nameError ?></div>
                    <input maxlength="100" name="name" type="text" required="required" class="form-control" placeholder="Company Name" /> </div>
                  <div class="form-group">
                    <label class="control-label">Company Website</label>
                    <div class="errorDiv"><?php echo $webError ?></div>
                    <input maxlength="100" name="web" type="text" required="required" class="form-control" placeholder="Company Link" /> </div>
                  <div class="form-group">
                    <label class="control-label">Company Key</label>
                    <div class="errorDiv"><?php echo $keyError ?></div>
                    <input maxlength="100" name="key" type="password" required="required" class="form-control" placeholder="Enter a Strong Key" /> </div>
                  <button class="btn btn-primary nextBtn btn-lg pull-right" type="button">Next</button>
                </div>
              </div>
            </div>
            <div class="row setup-content" id="step-2">
              <div class="col-xs-6 col-md-offset-3">
                <div class="col-md-12">
                  <h3> Step 2</h3>
                  <div class="form-group">
                    <label class="control-label"> Confirm Key</label>
                    <div class="errorDiv"><?php echo $rekeyError ?></div>
                    <input maxlength="100" name="rekey" type="password" required="required" class="form-control" placeholder="Enter a Strong Key" /> </div>
                  <div class="form-group">
                    <label class="control-label">Registered Address</label>
                    <div class="errorDiv"><?php echo $addressError ?></div>
                    <textarea required="required" name="address" class="form-control" placeholder="Enter your address"></textarea>
                  </div>
                   <div class="form-group">
                    <label class="control-label">Contact</label>
                    <div class="errorDiv"><?php echo $contactError ?></div>
                    <input required="required" name="phone" class="form-control" type="text" placeholder="Enter your Mobile Number">
                  </div>
                  <button class="btn btn-primary nextBtn btn-lg pull-right " style="margin-top: 20px;" type="button">Next</button>
                </div>
              </div>
            </div>
            <div class="row setup-content" id="step-3">
              <div class="col-xs-6 col-md-offset-3">
                <div class="col-md-12">
                  <h3> Step 3</h3>
                    <div class="form-group">
                    <label class="control-label"> Company Description</label>
                    <div class="errorDiv"><?php echo $descriptionError ?></div>
                    <textarea maxlength="500" name="description" type="text" required="required" class="form-control" placeholder="A Short Description of your Company" name="company_desc" ></textarea> </div>
                    <div class="form-group">
                    <label class="control-label">Company Logo</label>
                     <input type="file" name="logo"  class="btn btn-lg btn-primary" style="width: 190px;">
                     </div>
                  <button class="btn btn-success btn-lg pull-right" name="submit"  type="submit" >Finish</button>
                  
                </div>
              </div>
            </div>
        
          </form>
        </div>
      </div>
    </div>
      </script>
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
            format: 'mm/dd/yyyy'
            , container: container
            , todayHighlight: true
            , autoclose: true
          , })
        })
      </script>
      <!-- Include Date Range Picker -->
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css" /> </body>

</html>