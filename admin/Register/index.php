<?php
session_start();
require_once('../config/dbconnect.php');
if (isset($_POST['submit'])) 
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $repass = $_POST['repass'];
    $key = $_POST['key'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $company = $_POST['company'];
    $designation = $_POST['designation'];

    
    $query = "SELECT company_id, company_key FROM company_info WHERE company_name='$company'";
    $result = mysqli_query($comp, $query);
    $result = mysqli_fetch_assoc($result);
    if ($result) 
    {
        $company_key = $result['company_key'];

        if ($key == $company_key) 
        {
          
            $query = "INSERT INTO `admin`(`name`, `password`, `email`, `designation`, `address`, `contact`, `company`) VALUES('$name', '$password', '$email', '$designation', '$address','$contact', '$company')";

            $result = mysqli_query($comp, $query);
            if ($result) 
            {
              $query = "SELECT * FROM admin WHERE name='$name'";
              $result = mysqli_query($comp, $query);
              $result = mysqli_fetch_assoc($result);
              $id = $result['admin_id'];
              $_SESSION['adminId'] = $id;
              header("Location: ../");
            }
            else {
              echo mysqli_error($comp);
            }
        }

    }



}

?>

<!DOCTYPE html>
<html>

<head>
  <title>Admin Register</title>
  <script src="http://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
  <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png">
  <link rel="icon" type="../../image/png" href="../../assets/img/favicon.png">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link href="../../bootstrap3/css/bootstrap.css" rel="stylesheet" />
  <link href="../../bootstrap3/css/font-awesome.css" rel="stylesheet" />
  <link href="../../assets/css/gsdk.css" rel="stylesheet" />

  <body>
    <style type="text/css">
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
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button> <a class="navbar-brand" href="../../">Home</a> </div>
        <!-- Collect the nav links, forms••••••••, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li class="active"><a href="../../about/">About</a></li>
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
          <form role="form" action="" method="post">
            <div class="row setup-content" id="step-1">
              <div class="col-xs-6 col-md-offset-3">
                <div class="col-md-12">
                  <h3> Step 1</h3>
                  <div class="form-group">
                    <label class="control-label">Admin Name</label>
                    <input maxlength="100" name="name"  type="text" required="required" class="form-control" placeholder="Full Name" /> </div>
                    <div class="form-group">
                    <label class="control-label">Admin Email</label>
                    <input maxlength="100" name="email" type="email" required="required" class="form-control" placeholder="Email" /> </div>
                  <div class="form-group">
                    <label class="control-label">Admin Password</label>
                    <input maxlength="100" name="password" type="password" required="required" class="form-control" placeholder="Choose a Strong Password" /> </div>
                  <button class="btn btn-primary nextBtn btn-lg pull-right" type="button">Next</button>
                </div>
              </div>
            </div>
            <div class="row setup-content" id="step-2">
              <div class="col-xs-6 col-md-offset-3">
                <div class="col-md-12">
                  <h3> Step 2</h3>
                  <div class="form-group">
                    <label class="control-label"> Confirm Password</label>
                    <input maxlength="100" name="repass" type="password" required="required" class="form-control" placeholder="Re-type Your Password" /> </div>
                  <div class="form-group">
                    <label class="control-label">Company Select</label>
                     <div class="form-group">
                        <select class="form-control" name="company" id="sel1">
                          <?php 

                            $sql = "SELECT * FROM company_info";
                            $row = mysqli_query($comp, $sql);
                            while ($res = mysqli_fetch_array($row)) 
                            {
                              echo "<option>".$res['company_name']."</option>";
                            }

                          ?>        
                          
                        </select>
                      </div> 
                  </div>
                    <!-- Put a dropdown here -->
                   <div class="form-group">
                    <label class="control-label">Company Key</label>
                    <input required="required" name="key" class="form-control" type="password" placeholder="Enter the secure Company Key">
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
                    <label class="control-label">Admin Designation</label>
                    <input maxlength="100" type="text" name="designation" required="required" class="form-control" placeholder="eg. HR Official.." /> 
                  </div>
                  <div class="form-group">
                    <label class="control-label">Branch Address</label>
                    <textarea maxlength="100" type="text" name="address" required="required" class="form-control" placeholder="Full Address"></textarea>
                  </div>
                  <div class="form-group">
                    <label class="control-label">Branch Contact</label>
                    <input maxlength="100" type="text" name="contact" required="required" class="form-control" placeholder="Contact" /> 
                  </div>
                 
                  <button class="btn btn-lg btn-primary" type="submit" name="submit">Finish</button>
                 </div>
              </div>
            </div>
            
        
          </form>
        </div>
      </div>
    </div>
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