<?php
include('soes.php');
$object = new soes();

if(!$object->is_login()) {
    header("location:".$object->base_url."admin");
}

if(!$object->is_master_user()) {
    header("location:".$object->base_url."admin/result.php");
}

$object->query = "SELECT * FROM exam_soes WHERE exam_status = 'Pending' OR exam_status = 'Created' ORDER BY exam_title ASC";
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
              <li class="breadcrumb-item active">Exam Questions</li>
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
                <h3 class="card-title">Exam Questions</h3>
                  <div class="col" align="right">
                    <button type="button" name="add_exam_subject_question" id="add_exam_subject_question" class="btn btn-success">Add Exam Questions<i class="fas fa-plus"></i></button>
                  </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive">
                <table id="exam_subject_question_table" class="table table-bordered table-striped">
                  <thead>
                                        <tr>
                                            <th>Exam Name</th>
                                            <th>Subject</th>
                                            <th>Question</th>
                                            <th>Option 1</th>
                                            <th>Option 2</th>
                                            <th>Option 3</th>
                                            <th>Option 4</th>
                                            <th>Answer</th>
                                            <th>Action</th>
                                        </tr>
                  </thead>
                  <tbody>

                  </tbody>
                  <tfoot>
                                        <tr>
                                            <th>Exam Name</th>
                                            <th>Subject</th>
                                            <th>Question</th>
                                            <th>Option 1</th>
                                            <th>Option 2</th>
                                            <th>Option 3</th>
                                            <th>Option 4</th>
                                            <th>Answer</th>
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
<div id="examsubjectquestionModal" class="modal fade">
    <div class="modal-dialog modal-lg">
        <form method="post" id="exam_subject_question_form">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modal_title">Add Exam Subject Question Data</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <span id="form_message"></span>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Exam Name</label>
                        <div class="col-sm-9">
                            <select name="exam_id" id="exam_id" class="form-control" required>
                                <option value="">Select Exam</option>
                                <?php
                                foreach($result as $row)
                                {
                                    echo '
                                    <option value="'.$row["exam_id"].'">'.$row["exam_title"].'</option>
                                    ';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Subject</label>
                        <div class="col-sm-9">
                            <select name="exam_subject_id" id="exam_subject_id" class="form-control" required>
                                <option value="">Select Subject</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Question Title</label>
                        <div class="col-sm-9">
                            <input type="text" name="exam_subject_question_title" id="exam_subject_question_title" class="form-control datepicker" required data-parsley-trigger="keyup" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Option 1</label>
                        <div class="col-sm-9">
                            <input type="text" name="option_title_1" id="option_title_1" autocomplete="off" class="form-control" required />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Option 2</label>
                        <div class="col-sm-9">
                            <input type="text" name="option_title_2" id="option_title_2" autocomplete="off" class="form-control" required />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Option 3</label>
                        <div class="col-sm-9">
                            <input type="text" name="option_title_3" id="option_title_3" autocomplete="off" class="form-control" required />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Option 4</label>
                        <div class="col-sm-9">
                            <input type="text" name="option_title_4" id="option_title_4" autocomplete="off" class="form-control" required />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Answer</label>
                        <div class="col-sm-9">
                            <select name="exam_subject_question_answer" id="exam_subject_question_answer" class="form-control" required>
                                <option value="">Select</option>
                                <option value="1">1 Option</option>
                                <option value="2">2 Option</option>
                                <option value="3">3 Option</option>
                                <option value="4">4 Option</option>
                            </select>
                        </div>
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

    var dataTable = $('#exam_subject_question_table').DataTable({
        "processing" : true,
        "serverSide" : true,
        "order" : [],
        "ajax" : {
            url:"exam_subject_question_action.php",
            type:"POST",
            data:{action:'fetch'}
        },
        "columnDefs":[
            {
                "targets":[3, 4, 5, 6, 7, 8],
                "orderable":false,
            },
        ],
    });

    $('#exam_id').change(function(){
        var exam_id = $('#exam_id').val();
        if(exam_id != '')
        {
            $.ajax({
                url:"exam_subject_question_action.php",
                method:"POST",
                data:{action:'fetch_subject', exam_id:exam_id},
                success:function(data)
                {
                    $('#exam_subject_id').html(data);
                }
            });
        }
    });

    $('#add_exam_subject_question').click(function(){
        
        $('#exam_subject_question_form')[0].reset();

        $('#exam_subject_question_form').parsley().reset();

        $('#modal_title').text('Add Exam Subject Question Data');

        $('#action').val('Add');

        $('#submit_button').val('Add');

        $('#examsubjectquestionModal').modal('show');

        $('#form_message').html('');

        $('#exam_id').attr('disabled', false);

        $('#exam_subject_id').attr('disabled', false);

    });

    $('#exam_subject_question_form').parsley();

    $('#exam_subject_question_form').on('submit', function(event){
        event.preventDefault();
        if($('#exam_subject_question_form').parsley().isValid())
        {       
            $.ajax({
                url:"exam_subject_question_action.php",
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
                        $('#examsubjectquestionModal').modal('hide');

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

        var exam_subject_question_id = $(this).data('id');

        $('#exam_subject_question_form').parsley().reset();

        $('#form_message').html('');

        $.ajax({

            url:"exam_subject_question_action.php",

            method:"POST",

            data:{exam_subject_question_id:exam_subject_question_id, action:'fetch_single'},

            dataType:'JSON',

            success:function(data)
            {
                $('#exam_id').val(data.exam_id);

                $('#exam_subject_id').html('<option value="">Select Subject</option><option value="'+data.exam_subject_id+'">'+data.subject_name+'</option>');

                $('#exam_subject_id').val(data.exam_subject_id);

                $('#exam_subject_question_title').val(data.exam_subject_question_title);

                $('#option_title_1').val(data.option_title_1);

                $('#option_title_2').val(data.option_title_2);

                $('#option_title_3').val(data.option_title_3);

                $('#option_title_4').val(data.option_title_4);

                $('#exam_subject_question_answer').val(data.exam_subject_question_answer);

                $('#modal_title').text('Edit Exam Subject Question Data');

                $('#action').val('Edit');

                $('#submit_button').val('Edit');

                $('#examsubjectquestionModal').modal('show');

                $('#hidden_id').val(exam_subject_question_id);

                $('#exam_id').attr('disabled', 'disabled');

                $('#exam_subject_id').attr('disabled', 'disabled');
            }

        })

    });

    $(document).on('click', '.delete_button', function(){

        var id = $(this).data('id');

        if(confirm("Are you sure you want to remove it?"))
        {

            $.ajax({

                url:"exam_subject_question_action.php",

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
