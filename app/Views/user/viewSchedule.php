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
        <li class="nav-item">
          <a href="<?=base_url()?>/myprofile" class="nav-link    ">
            <i class="nav-icon fas fa-user"></i>
            <p style = "font-family:poppins;">
              <strong>My Profile<strong>
              <span class="badge badge-info right"></span>
            </p>
          </a>
        </li>

        <li class="nav-header"style = "font-family:poppins;">Maintenance</li>
        <li class="nav-item">
          <a href="<?=base_url()?>/registration" class="nav-link">
            <i class="fa-sharp fa-solid fa-id-card"></i>
            <p style = "font-family:poppins;">
              Registration

            </p>
          </a>
        </li>
        <li class="nav-item"style = "font-family:poppins;">
          <a href="<?=base_url()?>/userSchedule" class="nav-link active">
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

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">

    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>
            <class="a" style="color:maroon; font-family: 'Poppins';font-size: 22px"><strong>SCHEDULE</strong>
          </h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active" style="font-family:poppins;color:maroon">Home</li>
            <li class="breadcrumb-item active" style = "font-family:poppins;">Schedule</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <div class="card card-primary card-outline mx-auto" style = "width:98%; ">

    <!-- /.card-header -->
    <div class="card-body">

      <table id="example1" class="table table-bordered table-striped" style = "font-family:poppins">

        <thead>
          <?php //foreach($section as $sect): ?>
          <tr>

            <th>Subject</th>
            <th>Monday</th>
            <th>Tuesday</th>
            <th>Wednesday</th>
            <th>Thursday</th>
            <th>Friday</th>
          </tr>
        </thead>
        <tbody>
            <?php foreach($userSched as $sched_value):?>
          <tr>
            <td><?=isset($sched_value['subject']) ? $sched_value['subject'] : 'UNAVAILABLE';?></td>
            <td><?=isset($sched_value['monday']) ? $sched_value['monday'] : 'UNAVAILABLE';?> <?= '-'?> <?=isset($sched_value['mon_two']) ? $sched_value['mon_two'] : 'UNAVAILABLE';?></td>
            <td><?=isset($sched_value['tuesday']) ? $sched_value['tuesday'] : 'UNAVAILABLE';?> <?= '-'?> <?=isset($sched_value['tue_two']) ? $sched_value['tue_two'] : 'UNAVAILABLE';?></td>
            <td><?=isset($sched_value['wednesday']) ? $sched_value['wednesday'] : 'UNAVAILABLE';?> <?= '-'?> <?=isset($sched_value['wed_two']) ? $sched_value['wed_two'] : 'UNAVAILABLE';?></td>
            <td><?=isset($sched_value['thursday']) ? $sched_value['thursday'] : 'UNAVAILABLE';?> <?= '-'?> <?=isset($sched_value['thu_two']) ? $sched_value['thu_two'] : 'UNAVAILABLE';?></td>
            <td><?=isset($sched_value['friday']) ? $sched_value['friday'] : 'UNAVAILABLE';?> <?= '-'?> <?=isset($sched_value['fri_two']) ? $sched_value['fri_two'] : 'UNAVAILABLE';?></td>
          </tr>

          </tr>
          <?php endforeach;?>
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
