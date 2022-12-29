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
<br>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->


  <!-- Main content -->
  <div class="card">
    <div class="card-header">
      <h3 class="card-title"style = "font-family:poppins">Section Table</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">

      <table id="example1" class="table table-bordered table-striped" style = "font-family:poppins">
      <button type="button" class="btn btn-default" style = "margin-left: 90%; font-family:poppins; margin-bottom:1%; background-color:maroon; color: white;" data-toggle="modal" data-target="#new-section">New Section</button>
      <?= $this->include('admin/include/sectionmodal/newSection')?>
        <thead>
          <tr>

            <th>Section</th>
            <th>Strand</th>
            <th>Semester</th>
            <th>Year Level</th>
            <th>Subject Count</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
            <?php foreach($section as $section_value):?>
          <tr>

            <td><?= $section_value['section']?></td>
            <td><?= $section_value['strand']?></td>
            <td><?= $section_value['semester']?></td>
            <td><?=$section_value['year_level']?></td>
            <td><?=$subject_count?></td>
            <td>
              <a href="<?=base_url('schedule')?>"><button type="button" class="btn btn-secondary btn-sm">schedule</button>
              <a href="<?=site_url('edit/'.$section_value['id'])?>"><button type="button" class="btn btn-secondary btn-sm">update</button>
              <a href="<?= site_url('delete/'.$section_value['id']) ?>"><button type="button" class="btn btn-primary btn-sm">delete</button>
            </td>
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
<?= $this->include('admin/include/end')?>
<?= $this->include('admin/include/footer')?>
