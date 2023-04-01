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
          <a href="<?=base_url()?>/registration" class="nav-link">
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
            Grade
            </p>
          </a>
        </li>
        <li class="nav-item"style = "font-family:poppins;">
          <a href="<?=base_url()?>/subject" class="nav-link active">
            <i class="fa-sharp fa-solid fa-book"></i>
            <p>
            Subject
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
      
      <!-- Main content -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>
                <class="a" style="color:maroon; font-family: 'Poppins';font-size: 22px"><strong>Subject</strong>
              </h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active" style="font-family:poppins;color:maroon">Home</li>
                <li class="breadcrumb-item active" style = "font-family:poppins;">Subject</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
          <div class="card-body">
            <div class="card card-primary card-outline mx-auto" style = "width:100%;">
              <div class="card-header">
                
              </div>
              <!-- /.card-header -->
              <div class="card-body">
        <!-- /.card-header -->

          <table id="example1" class="table table-bordered table" style = "font-family:poppins">

            <thead>
              <tr>
                <th>Subject</th>
                <th>Title</th>
                <th>Unit</th>
                <th>Pre-Requisit</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($userSub as $newSub):?>
              <tr>
                <td><?=$newSub['subject']?></td>
                <td><?=$newSub['subject_title']?></td>
                <td><?=$newSub['unit']?></td>
                <td><?=$newSub['pre_requisit']?></td>
              </tr>
           <?php endforeach;?>
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
