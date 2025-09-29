<?php
include('soes.php');
$object = new soes();
if(!$object->is_login()) {
    header("location:".$object->base_url."admin");
}
if(!$object->is_master_user()) {
    header("location:".$object->base_url."admin/result.php");
}

$object->query = "SELECT * FROM class_soes WHERE class_status = 'Enable' ORDER BY class_name ASC";
$result = $object->get_result();

?>

<html class="no-js" lang="">
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin | Exam</title>

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
            <h1>Exam</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="#">Exam</a></li>
              <li class="breadcrumb-item active">Add Exam</li>
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
                <h3 class="card-title">Exam</h3>
                  <div class="col" align="right">
                    <button type="button" name="add_exam" id="add_exam" class="btn btn-success"><i class="fas fa-plus"> Add Exam</i></button>
                  </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="exam_table" class="table table-bordered table-striped">
                  <thead>
                                        <tr>
                                            <th>Exam Name</th>
                                            <th>Class Name</th>
                                            <th>Exam Duration</th>
                                            <th>Result Date & Time</th>
                                            <th>Status</th>
                                            <th>Created On</th>
                                            <th>Action</th>
                                        </tr>
                  </thead>
                  <tbody>

                  </tbody>
                  <tfoot>
                                        <tr>
                                            <th>Exam Name</th>
                                            <th>Class Name</th>
                                            <th>Exam Duration</th>
                                            <th>Result Date & Time</th>
                                            <th>Status</th>
                                            <th>Created On</th>
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

<div id="examModal" class="modal fade">
    <div class="modal-dialog">
        <form method="post" id="exam_form">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modal_title">Add Exam Data</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <span id="form_message"></span>
                    <div class="form-group">
                        <label>Exam Name</label>
                        <input type="text" name="exam_title" id="exam_title" class="form-control" required data-parsley-pattern="/^[a-zA-Z0-9 \s]+$/" data-parsley-trigger="keyup" />
                    </div>
                    <div class="form-group">
                        <label>Class</label>
                        <select name="exam_class_id" id="exam_class_id" class="form-control" required>
                            <option value="">Select Class</option>
                            <?php
                            foreach($result as $row)
                            {
                                echo '
                                <option value="'.$row["class_id"].'">'.$row["class_name"].'</option>
                                ';
                            }
                            ?>
                        </select>
                    </div>
                    <!--<div class="form-group">
                        <label>Exam Date & Time</label>
                        <input type="text" name="exam_datetime" id="exam_datetime" class="form-control datepicker" readonly required data-parsley-trigger="keyup" />
                    </div>!-->
                    <div class="form-group">
                        <label>Exam Duration for Each Subject <span class="text-danger">*</span></label>
                        <select name="exam_duration" id="exam_duration" class="form-control" required>
                            <option value="">Select</option>
                            <option value="5">5 Minute</option>
                            <option value="30">30 Minute</option>
                            <option value="60">1 Hour</option>
                            <option value="120">2 Hour</option>
                            <option value="180">3 Hour</option>
                        </select>
                    </div>
                    <div class="form-group" id="ifedit">

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

<div id="publishresultModal" class="modal fade">
    <div class="modal-dialog">
        <form method="post" id="publish_result_form">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modal_title">Publish Exam Result</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">                    
                    <div class="form-group">
                        <label>Exam Result Publish Date & Time</label>
                        <input type="text" name="exam_result_publish_datetime" id="exam_result_publish_datetime" class="form-control datepicker" readonly required data-parsley-trigger="keyup" />
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="hidden_exam_id" id="hidden_exam_id" />
                    <input type="hidden" name="action" id="action" value="Result Publish" />
                    <input type="submit" name="submit" id="result_publish_submit_button" class="btn btn-success" value="Publish" />
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

    var dataTable = $('#exam_table').DataTable({
        "processing" : true,
        "serverSide" : true,
        "order" : [],
        "ajax" : {
            url:"exam_action.php",
            type:"POST",
            data:{action:'fetch'}
        },
        "columnDefs":[
            {
                "targets":[6],
                "orderable":false,
            },
        ],
    });

    var date = new Date();
    date.setDate(date.getDate());
    $("#exam_datetime").datetimepicker({
        startDate: date,
        format: 'yyyy-mm-dd hh:ii',
        autoclose: true
    });

    $('#exam_result_publish_datetime').datetimepicker({
        startDate: date,
        format: 'yyyy-mm-dd hh:ii',
        autoclose: true
    });

    $('#add_exam').click(function(){
        
        $('#exam_form')[0].reset();

        $('#exam_form').parsley().reset();

        $('#modal_title').text('Add Exam Data');

        $('#action').val('Add');

        $('#submit_button').val('Add');

        $('#examModal').modal('show');

        $('#form_message').html('');

        $('#ifedit').html('');

        $('#exam_class_id').attr('disabled', false);

    });

    $('#exam_form').parsley();

    $('#exam_form').on('submit', function(event){
        event.preventDefault();
        if($('#examModal').parsley().isValid())
        {       
            $.ajax({
                url:"exam_action.php",
                method:"POST",
                data:$(this).serialize(),
                dataType:'json',
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
                        $('#examModal').modal('hide');
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

        var exam_id = $(this).data('id');

        $('#exam_form').parsley().reset();

        $('#form_message').html('');

        $.ajax({

            url:"exam_action.php",

            method:"POST",

            data:{exam_id:exam_id, action:'fetch_single'},

            dataType:'JSON',

            success:function(data)
            {

                $('#exam_class_id').val(data.exam_class_id);

                $('#exam_class_id').attr('disabled', 'disabled');

                $('#exam_title').val(data.exam_title);

                $('#exam_duration').val(data.exam_duration);

                $('#modal_title').text('Edit Exam Data');

                $('#action').val('Edit');

                $('#submit_button').val('Edit');

                $('#examModal').modal('show');

                $('#hidden_id').val(exam_id);

                var exam_status_html = '<label>Exam Status <span class="text-danger">*</span></label>';

                exam_status_html += '<select name="exam_status" id="exam_status" class="form-control">';

                exam_status_html += '<option value="Pending">Pending</option>';

                exam_status_html += '<option value="Created">Created</option></select><span class="text-muted"><small>If you have select Created status, then Student will able to view Exam details in their dashboard & you will not able to edit or delete this exam data.</small></span>';

                $('#ifedit').html(exam_status_html);

                $('#exam_status').val(data.exam_status);

            }

        })

    });

    $(document).on('click', '.delete_button', function(){

        var id = $(this).data('id');

        if(confirm("Are you sure you want to remove it?"))
        {

            $.ajax({

                url:"exam_action.php",

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

    });

    $(document).on('click', '.publish_result', function(){
        var exam_id = $(this).data('exam_id');
        $.ajax({
            url:"exam_action.php",
            method:"POST",
            data:{exam_id:exam_id, action:"fetch_result_publish_data"},
            success:function(data)
            {
                if(data != '')
                {
                    $('#exam_result_publish_datetime').val(data);
                }
                $('#publishresultModal').modal('show');
                $('#hidden_exam_id').val(exam_id);
            }
        });
    });

    $('#publish_result_form').parsley();

    $('#publish_result_form').on('submit', function(event){
        event.preventDefault();
        if($('#publish_result_form').parsley().isValid())
        {       
            $.ajax({
                url:"exam_action.php",
                method:"POST",
                data:$(this).serialize(),
                dataType:'json',
                beforeSend:function()
                {
                    $('#result_publish_submit_button').attr('disabled', 'disabled');
                    $('#result_publish_submit_button').val('wait...');
                },
                success:function(data)
                {
                    $('#result_publish_submit_button').attr('disabled', false);
                    
                    $('#publishresultModal').modal('hide');
                    $('#message').html(data.success);
                    dataTable.ajax.reload();

                    setTimeout(function(){
                        $('#message').html('');
                    }, 5000);
                }
            })
        }
    });

});
</script>
</body>
</html>

