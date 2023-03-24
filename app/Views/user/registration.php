<?= $this->include('user/include/top')?>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
<?= $this->include('user/include/navbar')?>
<aside class="main-sidebar sidebar-dark-secondary elevation-8">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
  <img src="<?=base_url()?>/cssjs/img/bccLogo.png" alt="dormehi Logo" class="brand-image img-circle elevation-3" style="opacity: 10;">
    <span class="brand-text font-weight-light" style="margin-left:0%; font-size:85%;"><strong>Baco Community College</strong></span>
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

        <li class="nav-header"style = "font-family:poppins;">Student</li>
        <li class="nav-item"style = "font-family:poppins;">
          <a href="<?=base_url()?>/myprofile" class="nav-link    ">
            <i class="nav-icon fa-solid fa-user"></i>
            <p>
              <strong>My Profile<strong>
              <span class="badge badge-info right"></span>
            </p>
          </a>
        </li>

        <li class="nav-header"style = "font-family:poppins;">Maintenance</li>
        <li class="nav-item"style = "font-family:poppins;">
          <a href="<?=base_url()?>/registration" class="nav-link active">
          <i class="fa-sharp fa-solid fa-id-card"></i>
            <p>
              Registration

            </p>
          </a>
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

    <!-- Main content -->
    <div class="content-wrapper">
      <script src="<?= base_url()?>/dist/js/sweetalert.js"></script>
      <?php if(!empty(session()->getFlashdata('notExist'))) : ?>
      <script>swal("Can't Proceed!", "Please fill out the profile first.", "warning");</script>
      <?php endif ?>

      <?php if(!empty(session()->getFlashdata('sendApp'))) : ?>
      <script>swal("Can't Proceed!", "You Already Fill out this form.", "warning");</script>
      <?php endif ?>

      <?php if(!empty(session()->getFlashdata('sendapplication'))) : ?>
      <script>swal("Application Sent!", "You successfully sent your application.", "success");</script>
      <?php endif ?>

      <?php if(!empty(session()->getFlashdata('duplicate'))) : ?>
      <script>swal("Duplicate Input!", "You already sent application for this year level and semester.", "warning");</script>
      <?php endif ?>

      <?php if(!empty(session()->getFlashdata('not'))) : ?>
      <script>swal("Can't Proceed!", "You must be enrolled first to access prospectus page.", "warning");</script>
      <?php endif ?>

      <?php if(!empty(session()->getFlashdata('accessgrade'))) : ?>
      <script>swal("Can't Proceed!", "You must be enrolled first to access grade page.", "warning");</script>
      <?php endif ?>

      <?php if(!empty(session()->getFlashdata('grade'))) : ?>
      <script>swal("Can't Proceed!", "You need to finish semester to acces this page.", "warning");</script>
      <?php endif ?>

      <?php if(!empty(session()->getFlashdata('newSub'))) : ?>
      <script>swal("Can't Proceed!", "You must be enrolled first to access subject page.", "warning");</script>
      <?php endif ?>

      <!-- Content Header (Page header) -->

      <!-- Main content -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>
                <class="a" style="color:maroon; font-family: 'Poppins';font-size: 22px"><strong>REGISTRATION</strong>
              </h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active" style="font-family:poppins;color:maroon">Home</li>
                <li class="breadcrumb-item active" style = "font-family:poppins;">Registration</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
          <div class="card-body">
            <div class="card card-primary card-outline mx-auto" style = "width:100%;">
              <div class="card-header">
                <a href="<?=base_url('retrieve_yearUser')?>"><button type="button" class="btn btn-secondary btn-sm" style = "border-color:maroon;border-radius:15px;float:right; font-family:poppins; margin-bottom:1%; background-color:maroon; color: white;">New Registration</button></a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
        <!-- /.card-header -->

          <table id="example1" class="table table-bordered table" style = "font-family:poppins">

            <thead>
              <tr>
                <th>Semester</th>
                <th>Name</th>
                <th>Strand</th>
                <th>Grade Level</th>
                <th>Status</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($registration as $reg): ?>
              <tr>
                <td><?=$reg['semester']; ?></td>
                <td><?=$user['firstname'] .' ' . $user['middlename'] . ' ' . $user['lastname']; ?></td>
                <td><?=isset($reg['strand']) ? $reg['strand'] : 'N/A'; ?></td>
                <td><?=isset($reg['year_level']) ? $reg['year_level'] : 'N/A'; ?></td>
                <td><?=isset($reg['state']) ? $reg['state'] : 'N/A'; ?></td>
                <td>
                <a href="<?=site_url('edit_reg/'.$reg['id'])?>"><button type="button" class="btn btn-secondary btn-sm" style = "border-radius:15px">update</button></a>
                </td>
              </tr>
              <?php endforeach; ?>
            </tbody>
            <tfoot>
            </tfoot>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
    </div>
    <!-- /.card-body -->
  </div>
</div>
</div>
      <!-- /.content -->
    </section>


</body>

<?= $this->include('user/include/end')?>
<?= $this->include('user/include/footer')?>
