<?= $this->include('teacher/include/top')?>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
<?= $this->include('teacher/include/navbar')?>
<aside class="main-sidebar sidebar-dark-secondary elevation-8">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="<?=base_url()?>/dist/img/dormehiLogo.png" alt="dormehi Logo" class="brand-image img-circle elevation-3" style="opacity: 10;">
    <span class="brand-text font-weight-light" style="margin-left:10%;"><strong>DORMEHI</strong></span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->

    <!-- SidebarSearch Form -->


    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->


        <li class="nav-header"style = "font-family:poppins;">Teacher</li>
        <br>

        <li class="nav-item"style = "font-family:poppins;">
            <li class="nav-item"style = "font-family:poppins;">
              <a href="<?=base_url('t_dashboard')?>" class="nav-link active"style = "background-color:maroon;">
                <i class="nav-icon fa-solid fa-user"></i>
                <p>Student Grade</p>
              </a>
            </li>
        </li>

        <li class="nav-item"style = "font-family:poppins;">
            <li class="nav-item"style = "font-family:poppins;">
              <a href="<?=base_url('newteacher')?>" class="nav-link" >
                <i class="nav-icon fa-solid fa-user"></i>
                <p>Teacher</p>
              </a>
            </li>
        </li>
        <br>
        <br>
          </ul>
        </li>

    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>

</div>
<div class="content-wrapper">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <?php if(!empty(session()->getFlashdata('invalid'))) : ?>
  <script>swal("Duplicate!", "You already set grade for this student.", "error");</script>
  <?php endif ?>

  <?php if(!empty(session()->getFlashdata('teacher'))) : ?>
  <script>swal("Welcome   <?= isset($userName['firstname']) ? $userName['firstname'] : $userName['firstname'];?>!", "You successfully login your account.", "success");</script>
  <?php endif ?>

  <!-- Content Header (Page header) -->

  <section class="content-header">

    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>
            <class="a" style="color:maroon; font-family: 'Poppins';font-size: 22px"><strong>GRADING</strong>
          </h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active" style="color:maroon;font-family: 'Poppins';">Admin</li>
            <li class="breadcrumb-item active"style="font-family: 'Poppins';">Grading</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <div class="card card-primary card-outline mx-auto" style = "width:98%;">

    <!-- /.card-header -->
    <div class="card-body">

      <table id="example1" class="table table-bordered table" style = "font-family:poppins">
        <thead>
          <tr>
            <th>Student LRN</th>
            <th>Name</th>
            <th>Section</th>
            <th>Strand</th>
            <th>Semester</th>
            <th>Year Level</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($userInfo as $user):?>
          <tr>
            <td><?=$user['lrn'];?></td>
            <td><?=$user['firstname'];?> <?= ' '?> <?=$user['middlename'];?> <?= ' '?> <?=$user['lastname'];?></td>
            <td><?=$user['section'];?></td>
            <td><?=$user['strand'];?></td>
            <td><?=$user['semester'];?></td>
            <td><?=$user['year_level'];?></td>
            <td>
             <a href="<?=site_url('viewGrade/'. $user['id']);?>"><button type="button" class="btn btn-secondary btn-sm" style = "border-radius:15px">Add Grade</button></a>
            </td>
          </tr>
          <?php endforeach;?>
        </tbody>
        <tfoot>
        </tfoot>


      </table>
    <!-- /.card-body -->
  </div>

  <!-- /.content -->
</div>
  <!-- /.content -->
</div>
</body>
<?= $this->include('teacher/include/end')?>
<?= $this->include('teacher/include/footer')?>
<script>
    $(document).ready(function(){
        // sa button
        $('.btn-add').on('click',function(){
            // data galing buton
            const id = $(this).data('id');
            const lrn = $(this).data('lrn');
            // const profile_picture = $(this).data('profile');
            // // sa modal
             $('.idModal').val(id);
             $('.lrnModal').val(lrn).trigger('change');
            // Call Modal
            $('#addgrade').modal('show');
        });
    });
</script>
<script>
  $(function () {
  if ($.fn.DataTable.isDataTable('#example1')) {
    $('#example1').DataTable().destroy();
  }

  $("#example1").DataTable({
    "responsive": true,
    "lengthChange": false,
    "autoWidth": false,
    "buttons": [
      {
        extend: 'excelHtml5',
        text: 'Export to Grade Layout',
        className: 'btn btn-success',
        title: 'Pre-Enrolled Students List'
      }
    ]
  }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
});

  </script>