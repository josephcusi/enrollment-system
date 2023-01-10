<?= $this->include('user/include/top')?>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
<?= $this->include('user/include/navbar')?>
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

        <li class="nav-header">Student</li>
        <li class="nav-item">
          <a href="<?=base_url()?>/myprofile" class="nav-link    ">
            <i class="nav-icon fas fa-user"></i>
            <p>
              <strong>My Profile<strong>
              <span class="badge badge-info right"></span>
            </p>
          </a>
        </li>

        <li class="nav-header">Maintenance</li>
        <li class="nav-item">
          <a href="<?=base_url()?>/registration" class="nav-link">
            <i class="nav-icon fas fa-envelope"></i>
            <p>
              Registration

            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?=base_url()?>/userSchedule" class="nav-link active">
            <i class="nav-icon fas fa-envelope"></i>
            <p>
              Schedule
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?=base_url()?>/userProspectus" class="nav-link">
            <i class="nav-icon fas fa-envelope"></i>
            <p>
              Prospectus
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

<div class="content-wrapper">
  <!-- Content Header (Page header) -->


  <!-- Main content -->
  <div class="card">
    <div class="card-header">
      <h3 class="card-title"style = "font-family:poppins">Schedule Table</h3>
    </div>
    <br><br>
    <!-- /.card-header -->
    <div class="card-body">

      <table id="example1" class="table table-bordered table-striped" style = "font-family:poppins">
        <thead>
          <tr>
            <th>Section</th>
            <th>Strand</th>
            <th>Semester</th>
            <th>Year Level</th>
            <th>Subject Count</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>
              <a href="<?=base_url('viewSchedule')?>"><button type="button" class="btn btn-secondary btn-sm">schedule</button>
            </td>

          </tr>
          </tr>
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

<?= $this->include('user/include/end')?>
<?= $this->include('user/include/footer')?>
