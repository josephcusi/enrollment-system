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
        <li class="nav-item"style = "font-family:poppins;">
          <a href="<?=base_url()?>/userSchedule" class="nav-link">
            <i class="fa-sharp fa-solid fa-calendar"></i>
            <p>
              Schedule
            </p>
          </a>
        </li>
        <li class="nav-item"style = "font-family:poppins;">
          <a href="<?=base_url()?>/userProspectus" class="nav-link">
            <i class="fa-sharp fa-solid fa-book"></i>
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

    <!-- Main content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->

  <br>
      <!-- Main content -->

      <section class="content-header">
        <div class="card card-primary card-outline mx-auto" style = "width:95%; margin-top:7% ">

          <div class="card-body">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
            <div class="tab-content">
              <div class="active tab-pane" id="basic_info">
                <div class = "card-header">
                <p style="font-size:20px; font-family: Poppins;color:maroon; margin-left:40%">Update Application Form</p>
              </div><br><br>
              <form style = "margin-left:30%" action="<?= site_url('update/'.$user['id']) ?>" method="post">
                     <input type="hidden" name="_method" value="PUT" />
                  <?= csrf_field(); ?>
                   <div class="form-horizontal" style = "font-family:poppins; color:maroon;">
                   <div class="form-group col-md-6">
                     <label for="studentLrn">Student LRN</label>
                     <select class="form-control" name = "lrn" placeholder = "<?= $user['lrn'];?>">
                     <option type="text" class="form-control" value = "<?= $user['lrn'];?>"><?= $user['lrn'];?></option>
                     </select>
                   </div>
                   <div class="form-group col-md-6">
                     <label for="studentStrand">Strand</label>
                     <select class="form-control"id="studentStrand" name = "strand">
                     <option type="text" value="HUMSS">HUMSS</option>
                     <option type="text" value="ABM">ABM</option>
                     <option type="text" value="STEM">STEM</option>
                     </select>
                   </div>
                   <div class="form-group col-md-6">
                     <label for="yearLevel">Year Level</label>
                     <select class="form-control"id="yearLevel" name = "year_level">
                     <option type="text" value="Grade 11">Grade 11</option>
                     <option type="text" value="Grade 12">Grade 12</option>
                     </select>
                   </div>
                   <div class="form-group col-md-6">
                   <label for="semester">Semester</label>
                     <select class="form-control" name = "semester" placeholder="<?= $user['semester'];?>">
                     <option type="text" value = "<?= $user['semester'];?>"><?= $user['semester'];?></option>
                     </select>
                     <button type= "submit" style=" border-radius: 5px;margin-top:20px; float:right;  font-size:20px; font-family: Poppins;background-color:maroon; color:white;margin-left:45%">Update</button>
                   </div>
                   </div>
                  </form>
                   </div>
              </div>
              <!-- /.tab-pane -->
            <!-- /.tab-pane -->
          </div>
          <!-- /.tab-content -->

        </div><!-- /.card-body -->
      </div>

      <!-- /.content -->
    </div>
    </div>
    </div>

</section>


</body>

<?= $this->include('user/include/end')?>
<?= $this->include('user/include/footer')?>
