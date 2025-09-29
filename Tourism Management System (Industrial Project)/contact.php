<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>
<!DOCTYPE HTML>
<html>
<head>
    <link href="bootstrap.css" rel="stylesheet">

        <link rel="stylesheet" href="formValidation.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" >
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
 <style>
  
  body {
      background-image: url('photos/23.jpg');
      width: 100%; height: 100vh;
  background-repeat:no-repeat;
  background-size: cover
    }
</style>
  
<title>EXPLORE INDIA | CONTACT</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="applijewelleryion/x-javascript">  </script>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
<link href="css/font-awesome.css" rel="stylesheet">
<!-- Custom Theme files -->
<script src="js/jquery-1.12.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!--animate-->
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="js/wow.min.js"></script>
    <script>
         new WOW().init();
    </script>
<!--//end-animate-->
</head>
<body style="background-color: khaki">
<?php include('includes/header.php');?>
<!--- banner ---->



<div class="container">

            <div class="row">

                <div class="col-lg-8 col-lg-offset-2">

<BR>
                  <center><h2><p style="font-family:Comic Sans MS";>"WELCOME TO CONTACT PAGE"</p><hr></center></h2>

                    <form id="contact-form" method="post" role="form">

                        <div class="messages"></div>

                        <div class="controls">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_name">First Name *</label>
                                        <input id="form_name" type="text" name="name" class="form-control" placeholder="Please enter your First Name "  data-error="Firstname is required.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_lastname">Last Name *</label>
                                        <input id="form_lastname" type="text" name="surname" class="form-control" placeholder="Please enter your Last Name"  data-error="Lastname is required.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_email">Email ID *</label>
                                        <input id="form_email" type="email" name="email" class="form-control" placeholder="Please enter your Email ID"  data-error="Valid email is required.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_phone">Mobile Number *</label>
                                        <input id="form_phone" type="text" name="phone" class="form-control" placeholder="Please enter your Mobile Number">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="form_message">Message *</label>
                                        <textarea id="form_message" name="message" class="form-control" placeholder="Message for me" rows="4"  data-error="Please,leave us a message."></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <p class="text-muted"><strong>*</strong> These fields are required.<br></p><br>
                                <div class="col-md-12">
                                    <input type="submit" name="ok" class="btn btn-success btn-send" value="Send message">
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-md-12">
                                    
                                </div>
                            </div>
                        </div>

                    </form>
            <?php 
            if(isset($_POST['ok'])){
                include_once 'function.php';
                $obj=new Contact();
                $res=$obj->contact_us($_POST);
                if($res==true){
                    echo "<script>alert('Query successfully Submitted.Thank you')</script>";
                }else{
                    echo "<script>alert('Something Went wrong!!')</script>";
                }
            }
            ?>

                </div><!-- /.8 -->

            </div> <!-- /.row-->

        </div> <!-- /.container-->

        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        
        <script src="formValidation.js"></script>
        <script src="bootstrap.js"></script>
        <script type="text/javascript">
$(document).ready(function() {
    $('#contact-form').formValidation({
        message: 'This value is not valid',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            name: {
                validators: {
                    notEmpty: {
                        message: 'The name is required'
                    }
                }
            },
            surname: {
                validators: {
                    notEmpty: {
                        message: 'The last name is required'
                    }
                }
            },
            message: {
                validators: {
                    notEmpty: {
                        message: 'The message is required'
                    }
                }
            },
            phone: {
                validators: {
                    notEmpty: {
                        message: 'The mobile no. is required'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'The email address is required'
                    },
                    emailAddress: {
                        message: 'The input is not a valid email address'
                    }
                }
            }
        }
    });
});
</script>










    <!--- /footer-top ---->
<?php include('includes/footer.php');?>
<!-- signup -->
<?php include('includes/signup.php');?>         
<!-- //signu -->
<!-- signin -->
<?php include('includes/signin.php');?>         
<!-- //signin -->
<!-- write us -->
<?php include('includes/write-us.php');?>           
<!-- //write us -->











    </body>
</html>
