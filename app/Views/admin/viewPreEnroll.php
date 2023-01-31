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
  <!-- Content Header (Page header) -->

<br>
  <!-- Main content -->
  <section class="content-header">
    <?php $i = 0; foreach($pre_enrolled as $new_pre_enrolled):?>
      <?php  $i++; if ($i == 1):?>
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
                <input type="text" name="Strand" class="form-control" id="Strand" value="<?=$new_pre_enrolled['strand'];?>" disabled>
              </div>
            </div>
          </div>
          <div class="form-group row">
            <label for="yearLevel" class="col-sm-2 col-form-label">Year Level</label>
            <div class="col-sm-3">
              <input type="text" name="yearLevel" class="form-control" id="yearLevel" value="<?=$new_pre_enrolled['year_level'];?>" disabled>
            </div>
          </div>
          <div class="form-group row">
            <label for="semester" class="col-sm-2 col-form-label">Semester</label>
            <div class="col-sm-3">
              <input type="text" class="form-control" name="semester" id="semester" value="<?=$new_pre_enrolled['semester'];?>" disabled>
            </div>
          </div>
          <div class="form-group row">
            <label for="schoolyear" class="col-sm-2 col-form-label">School Year</label>
            <div class="col-sm-3">
              <input type="text" name="schoolyear" class="form-control" id="schoolyear" value="<?=$new_pre_enrolled['year'];?>" disabled>
            </div>
          </div>
          <div class="form-group row">
            <label for="date" class="col-sm-2 col-form-label">Date</label>
            <div class="col-sm-3">
              <input type="text" name="date" class="form-control" id="date" value="<?=$new_pre_enrolled['student_created_at'];?>" disabled>
            </div>
          </div>
          <div class="form-group row">
            <label for="status" class="col-sm-2 col-form-label">Status</label>
            <div class="col-sm-3">
              <input type="text" name="status" class="form-control" id="status" value="<?=$new_pre_enrolled['state'];?>" disabled>
            </div>
          </div>
      </div>

      <p class="a" style="font-size:1.5em; font-family: Poppins;color:maroon;">Student Info</p>
      <div class="form-group row">
        <label for="fullname" class="col-sm-2 col-form-label">Full Name</label>
        <div class="col-sm-3">
          <div>
            <input type="text" name="fullname" class="form-control" id="fullname" value="<?=$new_pre_enrolled['firstname'];?><?=" "?><?=$new_pre_enrolled['middlename'];?><?=" "?><?=$new_pre_enrolled['lastname'];?>" disabled>
          </div>
        </div>
      </div>
      <div class="form-group row">
        <label for="gender" class="col-sm-2 col-form-label">Gender</label>
        <div class="col-sm-3">
          <input type="text" name="gender" class="form-control" id="gender" value="<?=$new_pre_enrolled['gender'];?>" disabled>
        </div>
      </div>
      <div class="form-group row">
        <label for="birthday" class="col-sm-2 col-form-label">Birthday</label>
        <div class="col-sm-3">
          <input type="text" class="form-control" name="birthday" id="birthday" value="<?=$new_pre_enrolled['birthday'];?>" disabled>
        </div>
      </div>
      <div class="form-group row">
        <label for="birthplace" class="col-sm-2 col-form-label">Birthplace</label>
        <div class="col-sm-3">
          <input type="text" name="birthplace" class="form-control" id="birthplace" value="<?=$new_pre_enrolled['birthplace'];?>" disabled>
        </div>
      </div>
      <div class="form-group row">
        <label for="inputCivil" class="col-sm-2 col-form-label">Civil Status</label>
        <div class="col-sm-3">
          <input type="text" name="inputCivil" class="form-control" id="inputCivil" value="<?=$new_pre_enrolled['civil_status'];?>" disabled>
        </div>
      </div>
      <div class="form-group row">
        <label for="religion" class="col-sm-2 col-form-label">Religion</label>
        <div class="col-sm-3">
          <input type="text" name="religion" class="form-control" id="religion" value="<?=$new_pre_enrolled['religion'];?>" disabled>
        </div>
      </div>
      <div class="form-group row">
        <label for="nationality" class="col-sm-2 col-form-label">Nationality</label>
        <div class="col-sm-3">
          <input type="text" name="nationality" class="form-control" id="nationality" value="<?=$new_pre_enrolled['nationality'];?>" disabled>
        </div>
      </div>
      <div class="modal-footer justify-content-between">
        <span><button type="button"  class="btn btn-default" style = "border-radius:15px; font-family:poppins; margin-bottom:; background-color:Green; color: white;" data-toggle="modal" data-target="#enroll">Enroll</button>
        <a href="<?=base_url('rejected/'.$rejected['id'])?>"><button type="button"  class="btn btn-default" style = "border-radius:15px; font-family:poppins; margin-bottom:; background-color:red; color: white;">Reject</button></span></a>

     </div>
     </form>
     <?php include'modal/enroll.php';?>
    </div>
  </div>
  <?php endif;?>
  <?php endforeach;?>
    <!-- /.card-body -->
  </div>


  <!-- /.content -->
</div>

</body>
<?= $this->include('admin/include/end')?>
<?= $this->include('admin/include/footer')?>
