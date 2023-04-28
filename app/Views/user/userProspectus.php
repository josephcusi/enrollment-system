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
            <i class="nav-icon fas fa-user"></i>
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
          <a href="<?=base_url()?>/userProspectus" class="nav-link active">
            <i class="fa-sharp fa-solid fa-book"></i>
            <p>
            Grade
            </p>
          </a>
        </li>
        <li class="nav-item"style = "font-family:poppins;">
          <a href="<?=base_url()?>/subject" class="nav-link">
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
<div class="content-wrapper">
  <!-- Content Header (Page header) -->


  <!-- Main content -->
  <section class="content-header">

    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>
            <class="a" style="color:maroon; font-family: 'Poppins';font-size: 22px"><strong>PROSPECTUS</strong>
          </h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active" style="font-family:poppins;color:maroon">Home</li>
            <li class="breadcrumb-item active" style = "font-family:poppins;">Prospectus</li>
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


            <div class="card card-primary card-outline" style = "">
              <div class="card-body box-profile">
                <div class="text-center">

                </div>
                <p class="text-muted text-left"style="font-family:poppins;">Strand</p>
                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                       <b>
                        <?=isset($subject['strand']) ? $subject['strand'] : '' ;?>
                      </b>
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
            <div class="card card-primary card-outline" style = "">


              <div class="card-body">

                  <table id="example1" class="table table-bordered table" style = "font-family:poppins">
                    <thead>
                      <tr>
                      <th>Subject</th>
                        <th>Subject Grade</th>
                        <th>Remark</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $ids = array_combine(explode(',', $subject['subject_id']), explode(',', $subject['subject_grade']))?>
                          <?php foreach($stud_sub as $stdnt_sjct):?>
                            <?php if(isset($ids[$stdnt_sjct['id']])):?>
                      <tr>
                        <td><?=$stdnt_sjct['subject'];?></td>
                        <td><?=$ids[$stdnt_sjct['id']]?></td>
                        <td><?=$subject['remark']?></td>
                      </tr>
                       <?php endif; endforeach?>
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


        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
  <!-- /.content -->
</div>

</body>

<?= $this->include('user/include/end')?>
<?= $this->include('user/include/footer')?>
