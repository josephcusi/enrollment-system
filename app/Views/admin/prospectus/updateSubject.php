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
              <a href="<?=base_url('/pre_enrolled_reg')?>" class="nav-link">
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
              <a href="<?=base_url('/r_prospectus')?>" class="nav-link active">
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


  <!-- Main content -->
  <section class="content-header">
<br>

  <div class = "container-fluid">
  <div class="card card-primary card-outline mx-auto" style = "width:98%; border-radius:15px">
    <div class = "card-body">
    <div class="card-header">
    <h3 class="card-title"style = "font-family:poppins">Update Table - <span style = "color:maroon">Update Section Table</span></h3>
    </div>
    <form action="<?= site_url('updateProspectus/'.$prospectus['id']) ?>" method="post">
                    <input type="hidden" name="_method" value="PUT" />
                  <?= csrf_field(); ?>
                    <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="inputSubject">Subject</label>
                      <input type="text" name="subject" class="form-control" id="inputSubject" placeholder="Subject" value="<?=$prospectus['subject']?>">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="inputTitle">Title</label>
                      <input type="text" name="title" class="form-control" id="inputTitle" placeholder="Title" value="<?=$prospectus['subject_title']?>">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="inputUnit">Unit</label>
                      <input type="text" name="unit" class="form-control" id="inputUnit" placeholder="Unit" value="<?=$prospectus['unit']?>">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="PreRequisit">Pre-requisit</label>
                      <input type="text" name="pre_requisit" class="form-control" id="PreRequisit" placeholder="Pre-Requisit" value="<?=$prospectus['pre_requisit']?>">
                    </div>

                    <div class="form-group col-md-6">
                      <label for="year_level">Year Level</label>
                      <select class="form-control"id="studentStrand" name = "year_level">

                      <option type="text" class="form-control" id="year_level" placeholder="Year Level" value="Grade 11">Grade 11</option>
                      <option type="text" class="form-control" id="year_level" placeholder="Year Level" value="Grade 12">Grade 12</option>

                     </select>

                      <span class="text-danger">
                            <?= isset($validation) ? display_error($validation, 'year_level') : '' ?>
                      </span>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="semester">Semester</label>
                      <select class="form-control"id="studentStrand" name = "semester">

                      <option type="text" class="form-control" id="semester" placeholder="1st Semester" value="1st Semester">1st Semester</option>
                      <option type="text" class="form-control" id="semester" placeholder="1st Semester" value="1st Semester">2nd Semester</option>

                     </select>
                      <span class="text-danger">
                            <?= isset($validation) ? display_error($validation, 'semester') : '' ?>
                      </span>
                    </div>
                  </div>
                  </div>



                  <!-- Submit button -->
                  <div class="modal-footer justify-content-between">
                  <button type="submit" class="btn btn-primary" style = "border-color:maroon;background-color:maroon; border-radius:20px">Save changes</button>
          </div>
              </form>
             </div>
          </div>
        </div>
</body>
<?= $this->include('admin/include/end')?>
<?= $this->include('admin/include/footer')?>
