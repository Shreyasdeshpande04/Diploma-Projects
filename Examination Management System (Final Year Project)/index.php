<?php
include('admin/soes.php');
$object = new soes();

if($object->is_student_login()) {
	header("location:".$object->base_url."student_dashboard.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Top Navigation</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

		<?php include('topnav.php')  ?>

    <!-- Main content -->
    <div class="content-wrapper">
      <div class="container">
        <div class="row">

		      	<h3 class="text-center">Welcome</h3>
		      	<p class="text-center">If you are not login into system, click <a href="login.php">here</a></p>
		      	<div class="container">
			      	<div class="card mt-4 mb-4">
			      		<div class="card-header">Latest News</div>
			      		<div class="card-body">
			      		<?php
			      		$object->query = "
			      		SELECT * FROM exam_soes 
			      		WHERE exam_result_datetime != '0000-00-00 00:00:00' 
			      		ORDER BY exam_result_datetime ASC
			      		";

			      		$object->execute();

			      		if($object->row_count() > 0)
			      		{
			      			$result = $object->statement_result();
			      			foreach($result as $row)
			      			{
			      				if(time() < strtotime($row["exam_result_datetime"]))
			      				{
			      					echo '<p><b>'.$row["exam_title"].' </b>exam of <b>'.$object->Get_class_name($row["exam_class_id"]).'</b> will publish on '.$row["exam_result_datetime"].'</p>';
			      				}
			      			}
			      		}
			      		else
			      		{
			      			echo '<p>No News Found</p>';
			      		}


			      		?>
			      		</div>
			      	</div>
			      </div>				
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->

      <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
  </div>
  <!-- /.content-wrapper -->



<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>


		  