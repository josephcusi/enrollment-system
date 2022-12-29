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
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?=base_url()?>/dist/img/user8-128x128.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Joseph Salavaria Cusi</a>
      </div>
    </div>

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
          <a href="<?=base_url()?>/userSchedule" class="nav-link">
            <i class="nav-icon fas fa-envelope"></i>
            <p>
              Schedule
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?=base_url()?>/userProspectus" class="nav-link active">
            <i class="nav-icon fas fa-envelope"></i>
            <p>
              Prospectus
            </p>
          </a>
        </li>
        <br>
        <br>
          <li class="nav-item">
          <a href="<?=site_url()?>logout" method="post" class="nav-link">
            <i class="nav-icon fas fa-reply" style = "margin-left:4%"></i>

            <p>
              Log out
            </p>
           </a>
          </li>
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
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Prospectus</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Prospectus</a></li>
              <li class="breadcrumb-item active">Prospectus</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">


            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">

                </div>
                <p class="text-muted text-left">Strand</p>
                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>HUMSS</b>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->


            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul>
                <p href = "#" class="text-muted text-left">Humanities and Social Sciences - 1st Year - 1st Semester</p>
                <div class="dropdown"style = "float:right; margin-right:10%">
                  <a href="#" class="dropbt">Settings</a>
                  <div class="dropdown-content">
                    <a style = "color:maroon">Grade 11</a>
                    <a href="#">1st Semester</a>
                    <a href="#">2nd Semester</a>
                    <a style = "color:maroon">Grade 12</a>
                    <a href="#">1st Semester</a>
                    <a href="#">2nd Semester</a>
                  </div>
                </div>
                </ul>
              </div>
              <div class="card-body">

                  <table id="example1" class="table table-bordered table-striped" style = "font-family:poppins">
                    <thead>
                      <tr>
                        <th>Subject</th>
                        <th>Title</th>
                        <th>Unit</th>
                        <th>Pre Requisit</th>
                        <th>Grade</th>
                        <th>Remark</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Fil01</td>
                        <td>Filipino Sheesh</td>
                        <td>3</td>
                        <td>Fil02</td>
                        <td></td>
                        <td></td>
                      </tr>
                    </tbody>
                    <tfoot>
                    </tfoot>

                  </table>
                  <!-- /.tab-pane -->

                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
  <!-- /.content -->
</div>

</body>

<?= $this->include('user/include/end')?>
<?= $this->include('user/include/footer')?>
