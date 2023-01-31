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

      <div class="col-md-12">
        <div class="card card-primary card-outline mx-auto" style = "width:98%; border-radius:15px;">
          <div class="card-header">
          </div><!-- /.card-header -->
          <div class="card-body">
            <div class="tab-content">
              <div class="active tab-pane" id="basic_info">
                <div class = "card-header">
                <p style="font-size:20px; font-family: Poppins;color:maroon; margin-left:40%">Approve Maintenance</p>
              </div><br><br>
                <form style = "margin-left:30%" action="<?= site_url('enrolled/'.$pre_enrolled['id']);?>" method='post'>
                <input type="hidden" name="_method" value="PUT" />
                  <?= csrf_field(); ?>
                   <div class="form-horizontal" style = "font-family:poppins; color:maroon;">
                   <div class="form-group col-md-6">
                    <input type="hidden" value="Enrolled" name="state">
                     <label for="section">Section</label>
                     <select class="form-control" id="section" name = "section">
                     <option type="text" class="form-control" id="section"><?=$pre_enrolled['section'];?></option>
                     </select>
                   </div>
                   <div class="form-group col-md-6">
                      <label for="studentLRN" class="col-sm-6 col-form-label">Student LRN</label>
                      <input type="text" class="form-control" value="<?=$pre_enrolled['lrn'];?>" id="studentLRN" placeholder="Learning Reference Number" disabled>
                   </div>
                   </div>
              </div>
                  <div class="modal-footer justify-content-between">
                  <button type="submit" class="btn btn-primary" style = "border-color:maroon; border-radius:20px;margin-left:60%">Submit</button>
                 </div>
                <!-- /.tab-content -->
              </div>
              <!-- /.tab-pane -->
              </form>
            </div>
            <!-- /.tab-pane -->
          </div>
          <!-- /.tab-content -->

        </div><!-- /.card-body -->
      </div>

      <!-- /.content -->
    </div>

</body>
<?= $this->include('admin/include/end')?>
<?= $this->include('admin/include/footer')?>
