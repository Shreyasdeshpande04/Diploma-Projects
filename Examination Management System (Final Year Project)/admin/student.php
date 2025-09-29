<?php
include('soes.php');
$object = new soes();

$object->query = "SELECT * FROM class_srms WHERE class_status = 'Enable' ORDER BY class_name ASC";
$result = $object->get_result();
?>

<html class="no-js" lang="">
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin | Students</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">
  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <?php include('topnav.php'); ?>

  <?php include('leftnav.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Students</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="#">Students</a></li>
              <li class="breadcrumb-item active">Add Student</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

          <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Subjects</h3>
                  <div class="col" align="right">
                   <button type="button" name="add_student" id="add_student" class="btn btn-success btn-circle"><i class="fas fa-plus"> Add Student</i></button>
                  </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive">
                <table id="student_table" class="table table-bordered table-striped">
                  <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Student Name</th>
                                            <th>Student Address</th>
                                            <th>Email Address</th>
                                            <th>Password</th>
                                            <th>Gender</th>
                                            <th>Date of Birth</th>
                                            <th>Added By</th>
                                            <th>Added On</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                  </thead>
                  <tbody>

                  </tbody>
                  <tfoot>
                                        <tr>
                                            <th>Image</th>
                                            <th>Student Name</th>
                                            <th>Student Address</th>
                                            <th>Email Address</th>
                                            <th>Password</th>
                                            <th>Gender</th>
                                            <th>Date of Birth</th>
                                            <th>Added By</th>
                                            <th>Added On</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<div id="studentModal" class="modal fade">
    <div class="modal-dialog">
        <form method="post" id="student_form" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modal_title">Add Student</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <span id="form_message"></span>
                    <div class="form-group">
                        <label>Student Name</label>
                        <input type="text" name="student_name" id="student_name" class="form-control" required data-parsley-pattern="/^[a-zA-Z0-9 \s]+$/" data-parsley-trigger="keyup" />
                    </div>
                    <div class="form-group">
                        <label>Student Address</label>
                        <input type="text" name="student_address" id="student_address" class="form-control" required data-parsley-pattern="/^[a-zA-Z0-9\s]+$/" data-parsley-trigger="keyup" />
                    </div>
                    <div class="form-group">
                        <label>Student Email</label>
                        <input type="text" name="student_email_id" id="student_email_id" class="form-control" required data-parsley-type="email" data-parsley-trigger="keyup" />
                    </div>
                    <div class="form-group">
                        <label>Student Password</label>
                        <input type="password" name="student_password" id="student_password" class="form-control" required  data-parsley-trigger="keyup" />
                    </div>
                    <div class="form-group">
                        <label>Gender</label>
                        <select name="student_gender" id="student_gender" class="form-control">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Date of Birth</label>
                        <input type="text" name="student_dob" id="student_dob" class="form-control datepicker" readonly required data-parsley-trigger="keyup" />
                    </div>
                    <div class="form-group">
                        <label>Date of Birth</label><br />
                        <input type="file" name="student_image" id="student_image" />
                        <span id="student_uploaded_image"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="hidden_id" id="hidden_id" />
                    <input type="hidden" name="action" id="action" value="Add" />
                    <input type="submit" name="submit" id="submit_button" class="btn btn-success" value="Add" />
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>
    <!-- Right Panel -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page specific script -->

<?php include('footer.php') ?>
<script>
$(document).ready(function(){

    $('#student_dob').datepicker({
        format: "yyyy-mm-dd",
        autoclose: true
    });

    var dataTable = $('#student_table').DataTable({
        "processing" : true,
        "serverSide" : true,
        "order" : [],
        "ajax" : {
            url:"student_action.php",
            type:"POST",
            data:{action:'fetch'}
        },
        "columnDefs":[
            {
                "targets":[9,10],
                "orderable":false,
            },
        ],
    });

    $('#add_student').click(function(){
        
        $('#student_form')[0].reset();
        $('#student_form').parsley().reset();
        $('#modal_title').text('Add Student');
        $('#action').val('Add');
        $('#submit_button').val('Add');
        $('#studentModal').modal('show');
        $('#form_message').html('');
        $('#student_image').attr('required', 'required');
        $('#student_uploaded_image').html('');

    });

    $('#student_image').change(function(){
        var extension = $('#student_image').val().split('.').pop().toLowerCase();
        if(extension != '')
        {
            if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
            {
                alert("Invalid Image File");
                $('#student_image').val('');
                return false;
            }
        }
    });

    $('#student_form').parsley();

    $('#student_form').on('submit', function(event){
        event.preventDefault();
        if($('#student_form').parsley().isValid())
        {       
            $.ajax({
                url:"student_action.php",
                method:"POST",
                data:new FormData(this),
                dataType:'json',
                contentType:false,
                processData:false,
                beforeSend:function()
                {
                    $('#submit_button').attr('disabled', 'disabled');
                    $('#submit_button').val('wait...');
                },
                success:function(data)
                {
                    $('#submit_button').attr('disabled', false);
                    if(data.error != '')
                    {
                        $('#form_message').html(data.error);
                        $('#submit_button').val('Add');
                    }
                    else
                    {
                        $('#studentModal').modal('hide');
                        $('#message').html(data.success);
                        dataTable.ajax.reload();

                        setTimeout(function(){

                            $('#message').html('');

                        }, 5000);
                    }
                }
            })
        }
    });

    $(document).on('click', '.edit_button', function(){

        var student_id = $(this).data('id');

        $('#student_form').parsley().reset();

        $('#student_form')[0].reset();

        $('#form_message').html('');

        $('#student_uploaded_image').html('');

        $.ajax({

            url:"student_action.php",

            method:"POST",

            data:{student_id:student_id, action:'fetch_single'},

            dataType:'JSON',

            success:function(data)
            {

                $('#student_name').val(data.student_name);
                $('#student_address').val(data.student_address);
                $('#student_email_id').val(data.student_email_id);
                $('#student_gender').val(data.student_gender);
                $('#student_dob').val(data.student_dob);
                $('#student_image').attr('required', false);

                $('#student_uploaded_image').html('<img src="'+data.student_image+'" class="img-fluid img-thumbnail" width="100"  /><input type="hidden" name="hidden_student_image" value="'+data.student_image+'" />');

                $('#modal_title').text('Edit Student Details');

                $('#action').val('Edit');

                $('#submit_button').val('Edit');

                $('#studentModal').modal('show');

                $('#hidden_id').val(student_id);

            }

        })

    });

    $(document).on('click', '.status_button', function(){
        var id = $(this).data('id');
        var status = $(this).data('status');
        var next_status = 'Enable';
        if(status == 'Enable')
        {
            next_status = 'Disable';
        }
        if(confirm("Are you sure you want to "+next_status+" it?"))
        {

            $.ajax({

                url:"student_action.php",

                method:"POST",

                data:{id:id, action:'change_status', status:status, next_status:next_status},

                success:function(data)
                {

                    $('#message').html(data);

                    dataTable.ajax.reload();

                    setTimeout(function(){

                        $('#message').html('');

                    }, 5000);

                }

            })

        }
    });

    /*$(document).on('click', '.delete_button', function(){

        var id = $(this).data('id');

        if(confirm("Are you sure you want to remove it?"))
        {

            $.ajax({

                url:"student_action.php",

                method:"POST",

                data:{id:id, action:'delete'},

                success:function(data)
                {

                    $('#message').html(data);

                    dataTable.ajax.reload();

                    setTimeout(function(){

                        $('#message').html('');

                    }, 5000);

                }

            })

        }

    });*/

});
</script>
</body>
</html>



