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
            <a href="<?=base_url('/grading')?>" class="nav-link">
              <i class="fa-sharp fa-solid fa-barcode"></i>
              <p>Grading</p>
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
              <i class="fa-sharp fa-solid fa-envelopes-bulk"></i>
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
  <!-- Content Header (Page header) -->

<br>
  <!-- Main content -->
  <section class="content-header">

    <div class="card card-primary card-outline mx-auto" style = "width:98%; border-radius:15px;">
      <div class="card-header">
        <h3 class="card-title"style = "font-family:poppins">Pre-Enrolled Table</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">

      <div class="tab-pane" id="address">
        <form class="form-horizontal" action="#" method="post">
          <p class="a" style="font-size:1.5em; font-family: Poppins;color:maroon;">Pre-Enrollment Info</p>
          <div class="form-group row">
            <label for="Strand" class="col-sm-2 col-form-label">Strand</label>
            <div class="col-sm-3">
              <div>
                <input type="text" name="Strand" class="form-control" id="Strand" value="HUMSS" disabled>
              </div>
            </div>
          </div>
          <div class="form-group row">
            <label for="yearLevel" class="col-sm-2 col-form-label">Year Level</label>
            <div class="col-sm-3">
              <input type="text" name="yearLevel" class="form-control" id="yearLevel" value="Grade 12" disabled>
            </div>
          </div>
          <div class="form-group row">
            <label for="semester" class="col-sm-2 col-form-label">Semester</label>
            <div class="col-sm-3">
              <input type="text" class="form-control" name="semester" id="semester" value="1st Sem" disabled>
            </div>
          </div>
          <div class="form-group row">
            <label for="schoolyear" class="col-sm-2 col-form-label">School Year</label>
            <div class="col-sm-3">
              <input type="text" name="schoolyear" class="form-control" id="schoolyear" value="2021-2022" disabled>
            </div>
          </div>
          <div class="form-group row">
            <label for="date" class="col-sm-2 col-form-label">Date</label>
            <div class="col-sm-3">
              <input type="text" name="date" class="form-control" id="date" value="2021-09-12" disabled>
            </div>
          </div>
          <div class="form-group row">
            <label for="status" class="col-sm-2 col-form-label">Status</label>
            <div class="col-sm-3">
              <input type="text" name="status" class="form-control" id="status" value="Pending" disabled>
            </div>
          </div>
      </div>

      <p class="a" style="font-size:1.5em; font-family: Poppins;color:maroon;">Student Info</p>
      <div class="form-group row">
        <label for="fullname" class="col-sm-2 col-form-label">Full Name</label>
        <div class="col-sm-3">
          <div>
            <input type="text" name="fullname" class="form-control" id="fullname" value="Bayot Kyusi" disabled>
          </div>
        </div>
      </div>
      <div class="form-group row">
        <label for="gender" class="col-sm-2 col-form-label">Gender</label>
        <div class="col-sm-3">
          <input type="text" name="gender" class="form-control" id="gender" value="Female" disabled>
        </div>
      </div>
      <div class="form-group row">
        <label for="birthday" class="col-sm-2 col-form-label">Birthday</label>
        <div class="col-sm-3">
          <input type="text" class="form-control" name="birthday" id="birthday" value="09-01-2022" disabled>
        </div>
      </div>
      <div class="form-group row">
        <label for="birthplace" class="col-sm-2 col-form-label">Birthplace</label>
        <div class="col-sm-3">
          <input type="text" name="birthplace" class="form-control" id="birthplace" value="Oriental Mindoro" disabled>
        </div>
      </div>
      <div class="form-group row">
        <label for="inputCivil" class="col-sm-2 col-form-label">Civil Status</label>
        <div class="col-sm-3">
          <input type="text" name="inputCivil" class="form-control" id="inputCivil" value="Separated" disabled>
        </div>
      </div>
      <div class="form-group row">
        <label for="religion" class="col-sm-2 col-form-label">Religion</label>
        <div class="col-sm-3">
          <input type="text" name="religion" class="form-control" id="religion" value="Athiest" disabled>
        </div>
      </div>
      <div class="form-group row">
        <label for="nationality" class="col-sm-2 col-form-label">Nationality</label>
        <div class="col-sm-3">
          <input type="text" name="nationality" class="form-control" id="nationality" value="Canadian" disabled>
        </div>
      </div>
      <div class="modal-footer justify-content-between">
        <span><a href="<?=base_url('enroll')?>"><button type="button" class="btn btn-success btn-sm">ENROLL</button>
        <a href="#"><button type="button" class="btn btn-danger btn-sm">REJECT</button></span>
     </div>
     </form>
    </div>
  </div>
    <!-- /.card-body -->
  </div>


  <!-- /.content -->
</div>

</body>
<?= $this->include('admin/include/end')?>
<?= $this->include('admin/include/footer')?>
