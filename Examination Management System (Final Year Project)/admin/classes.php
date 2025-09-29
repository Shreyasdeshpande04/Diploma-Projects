<?php
include('soes.php');
$object = new soes();

if(!$object->is_login()) {
    header("location:".$object->base_url."admin");
}

if(!$object->is_master_user()) {
    header("location:".$object->base_url."admin/result.php");
}
?>
<html class="no-js" lang="">
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard</title>

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
            <h1>Classes</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Classes</li>
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
                <h3 class="card-title">DataTable with default features</h3>
                  <div class="col" align="right">
                    <button type="button" name="add_class" id="add_class" class="btn btn-success "><i class="fa fa-plus"></i></button>
                  </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="class_table" class="table table-bordered table-striped">
                  <thead>
                                        <tr>
                                            <th>Class Name</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                  </thead>
                  <tbody>

                  </tbody>
                  <tfoot>
                                        <tr>
                                            <th>Class Name</th>
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

<div id="classModal" class="modal fade">
    <div class="modal-dialog">
      <form method="post" id="class_form">
          <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal_title">Add Class</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <span id="form_message"></span>
                <div class="form-group">
                  <label>Class Name</label>
                  <input type="text" name="class_name" id="class_name" class="form-control" required data-parsley-pattern="/^[a-zA-Z0-9 \s]+$/" data-parsley-trigger="keyup" />
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
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

  <script>
$(document).ready(function(){

  var dataTable = $('#class_table').DataTable({
    "processing" : true,
    "serverSide" : true,
    "order" : [],
    "ajax" : {
      url:"classes_action.php",
      type:"POST",
      data:{action:'fetch'}
    },
    "columnDefs":[
      {
        "targets":[2],
        "orderable":false,
      },
    ],
  });

  $('#add_class').click(function(){
    
    $('#class_form')[0].reset();

    $('#class_form').parsley().reset();

      $('#modal_title').text('Add Class');

      $('#action').val('Add');

      $('#submit_button').val('Add');

      $('#classModal').modal('show');

      $('#form_message').html('');

  });

  $('#class_form').parsley();

  $('#class_form').on('submit', function(event){
    event.preventDefault();
    if($('#class_form').parsley().isValid())
    {   
      $.ajax({
        url:"classes_action.php",
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
            $('#classModal').modal('hide');
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

    var class_id = $(this).data('id');

    $('#class_form').parsley().reset();

    $('#form_message').html('');

    $.ajax({

          url:"classes_action.php",

          method:"POST",

          data:{class_id:class_id, action:'fetch_single'},

          dataType:'JSON',

          success:function(data)
          {

            $('#class_name').val(data.class_name);

            $('#modal_title').text('Edit Class');

            $('#action').val('Edit');

            $('#submit_button').val('Edit');

            $('#classModal').modal('show');

            $('#hidden_id').val(class_id);

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

            url:"classes_action.php",

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

  $(document).on('click', '.delete_button', function(){

      var id = $(this).data('id');

      if(confirm("Are you sure you want to remove it?"))
      {

          $.ajax({

            url:"classes_action.php",

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

});
</script>
</body>
</html>

