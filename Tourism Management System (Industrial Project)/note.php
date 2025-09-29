<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>
<!DOCTYPE HTML>
<html>
<head>
  
<title>TMS  | Note</title>
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


    <style>
      .button {
        background-color: #1c87c9;
        border: none;
        color: white;
        padding: 4px 14px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 20px;
        margin: 4px 2px;
        cursor: pointer;
      }
    </style>
<!--//end-animate-->
</head>
<body>
<?php include('includes/header.php');?><br>
<center>
  <p style="font-size:60px"> READ BELOW CAREFULLY</p>
<STRONG><p style="font-size:25px">This is only a project . <u>Dont make payments </u>, i have  added google pay button only for demo. it will only take it to google pay homepage. Dont be afraid as it is only for demo purpose<br><br>
  <u>It will not make payment as it is only a project.</p></u>
<BR><br>
<u><u><p style="font-size:60px">"NO PAYMENTS WILL BE MADE"</p></u></u>
  </strong>
</p><br>

 <a href="https://pay.google.com/" class="button">GOOGLE PAY</a><br>
</center>
<br>

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