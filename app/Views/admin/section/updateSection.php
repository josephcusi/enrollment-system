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

        <li class="nav-header">Admin</li>
        <li class="nav-item">
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
        <li class="nav-item">
            <li class="nav-item">
              <a href="<?=base_url('/pre_enrolled_reg')?>" class="nav-link">
                <i class="far fa-thin fa-newspaper"></i>
                <p>Pre-Enrolled</p>
              </a>
            </li>
        </li>
        <li class="nav-item">
            <li class="nav-item">
              <a href="<?=base_url('/section')?>" class="nav-link active">
                <i class="far fa-thin fa-newspaper"></i>
                <p>Section</p>
              </a>
            </li>
        </li>
        <li class="nav-item">
            <li class="nav-item">
              <a href="<?=base_url('/r_prospectus')?>" class="nav-link">
                <i class="far fa-thin fa-newspaper"></i>
                <p>Prospectus</p>
              </a>
            </li>
        </li>
        <li class="nav-item">
            <li class="nav-item">
              <a href="<?=base_url('/grading')?>" class="nav-link">
                <i class="far fa-thin fa-newspaper"></i>
                <p>Grading</p>
              </a>
            </li>
        </li>
        <li class="nav-item">
            <li class="nav-item">
              <a href="<?=base_url('/retrieve_strand')?>" class="nav-link">
                <i class="far fa-thin fa-newspaper"></i>
                <p>Strand</p>
              </a>
            </li>
        </li>
        <br>
        <br>
        <li class="nav-item">
          <a href="<?=base_url('/adminlogout')?>" class="nav-link">
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
  <div class = "container-fluid">
  <div class="card">
    <div class = "card-body">
    <div class="card-header">
    <h3 class="card-title"style = "font-family:poppins">Update Table - <span style = "color:maroon">Update Section Table</span></h3>
    </div>
    <!-- /.card-header -->
                    <form action="<?= site_url('section_update/'.$section['id']) ?>" method="post">
                    <input type="hidden" name="_method" value="PUT" />
                  <?= csrf_field(); ?>
                    <div class="form-row">
                    <div class="form-group col-sm-6 mx-auto">
                      <label for="inputSection">Section</label>
                      <input type="text" name="section" class="form-control" value="<?= $section['section']?>" id="inputSection" placeholder="Section" required>
                      <span class="text-danger">
                      </span>
                    </div>
                    <div class="form-group col-sm-6 mx-auto">
                      <label for="inputYearLevel">Year Level</label>
                      <select class="form-control"id="studentStrand" name = "year_level">

                      <option type="text" class="form-control" id="year_level" placeholder="Year Level" value="Grade 11">Grade 11</option>
                      <option type="text" class="form-control" id="year_level" placeholder="Year Level" value="Grade 12">Grade 12</option>

                      </select>
                      <span class="text-danger">
                      </span>
                    </div>
                  </div>
                  </div>
                  <!-- Submit button -->
                  <div class="modal-footer justify-content-between">

                  <button class="btn btn-primary">Save changes</button>
          </div>
              </form>
             </div>
            </div>
          </div>
        </div>

</div>

</div>
</body>
<?= $this->include('admin/include/end')?>
<?= $this->include('admin/include/footer')?>
