  <?= $this->include('admin/include/top')?>

  <body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
  <?= $this->include('admin/include/navbar')?>
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

        <li class="nav-header"style = "font-family:poppins;">Admin</li>
        <li class="nav-item"style = "font-family:poppins;">
          <a href="<?=base_url()?>/admin" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              <strong>Dashboard<strong>
              <span class="badge badge-info right"></span>
            </p>
          </a>
        </li>
        <br>
        <br>
        <li class="nav-item"style = "font-family:poppins;">
            <li class="nav-item"style = "font-family:poppins;">
              <a href="<?=base_url('/pre_enrolled_reg')?>" class="nav-link active">
                <i class="far fa-thin fa-newspaper"></i>
                <p>Pre-Enrolled</p>
              </a>
            </li>
        </li>
        <li class="nav-item"style = "font-family:poppins;">
            <li class="nav-item"style = "font-family:poppins;">
              <a href="<?=base_url('/section')?>" class="nav-link">
                <i class="fa-sharp fa-solid fa-section"></i>
                <p>Section</p>
              </a>
            </li>
        </li>
        <li class="nav-item"style = "font-family:poppins;">
            <li class="nav-item"style = "font-family:poppins;">
              <a href="<?=base_url('/r_prospectus')?>" class="nav-link">
                <i class="fa-sharp fa-solid fa-atom"></i>
                <p>Prospectus</p>
              </a>
            </li>
        </li>
        <li class="nav-item"style = "font-family:poppins;">
            <li class="nav-item"style = "font-family:poppins;">
              <a href="<?=base_url('/retrieve_strand')?>" class="nav-link">
                <i class="fa-sharp fa-solid fa-envelopes-bulk"></i>
                <p>Strand</p>
              </a>
            </li>
        </li>
        <li class="nav-item"style = "font-family:poppins;">
            <li class="nav-item"style = "font-family:poppins;">
              <a href="<?=base_url('/newadmin')?>" class="nav-link">
                <i class="nav-icon fa-solid fa-user"></i>
                <p>Admin</p>
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
    <?php if(!empty(session()->getFlashdata('rejected'))) : ?>
    <script>swal("Rejected!", "Registration successfully rejected.", "success");</script>
    <?php endif ?>
    <?php if(!empty(session()->getFlashdata('enrolled'))) : ?>
    <script>swal("Enrolled!", "Registration has been successfully enrolled.", "success");</script>
    <?php endif ?>
    <!-- Content Header (Page header) -->

    <section class="content-header">

      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>
              <class="a" style="color:maroon; font-family: 'Poppins';font-size: 22px"><strong>Pre-Enrolled Table</strong>
            </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active" style="color:maroon;font-family: 'Poppins';">Admin</li>
              <li class="breadcrumb-item active"style="font-family: 'Poppins';">Pre-Enrolled</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content-header">
      <div class="card card-primary card-outline mx-auto" style = "border-radius:;">

        <!-- /.card-header -->
        <div class="card-body">


        <table id="example1" class="table table-bordered table" style = "font-family:poppins">
          <thead>
            <tr>
              <th>Student LRN</th>
              <th>Name</th>
              <th>Grade Level</th>
              <th>Strand</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach($pre_enrolled as $pre_enrolled_value):?>
            <tr>
              <td><?= $pre_enrolled_value['lrn'];?></td>
              <td><?= $pre_enrolled_value['firstname'] .' ' . $pre_enrolled_value['middlename'] . ' ' . $pre_enrolled_value['lastname'];?></td>
              <td><?= $pre_enrolled_value['year_level'];?></td>
              <td><?= $pre_enrolled_value['strand'];?></td>
              <td><?= $pre_enrolled_value['state'];?></td>
              <td>
                <a href="<?=base_url('viewPreEnroll/'.$pre_enrolled_value['id'])?>"><button type="button" class="btn btn-secondary btn-sm" style = "border-radius:15px">view</button>

              </td>
            </tr>
            <?php endforeach;?>
          </tbody>
          <tfoot>
          </tfoot>
        </table>
      </div>
      <!-- /.card-body -->
    </div>

    <!-- /.content -->
  </div>
</div>
</div>
</div>


</section>
<script src="<?=base_url()?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?=base_url()?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?=base_url()?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?=base_url()?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?=base_url()?>/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?=base_url()?>/plugins/jszip/jszip.min.js"></script>
<script src="<?=base_url()?>/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?=base_url()?>/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?=base_url()?>/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?=base_url()?>/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?=base_url()?>/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->

<!-- AdminLTE for demo purposes -->

<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,

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
  </body>

  <?= $this->include('admin/include/end')?>
  <?= $this->include('admin/include/footer')?>
