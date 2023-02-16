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
      <li class="nav-item"style = "font-family:poppins;"style = "font-family:poppins;">
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

            <a href="#" class="nav-link ">
              <i class="fa-sharp fa-solid fa-envelopes-bulk"></i>
              <p>Section<i class="right fas fa-angle-left"></i></p>
            </a>

          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/section11" class="nav-link ">
                <i class="far fa-circle nav-icon"></i>
                <p>Grade 11</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/section12" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Grade 12</p>
              </a>
            </li>
          </ul>
      </li>
      <li class="nav-item"style = "font-family:poppins;">

            <a href="#" class="nav-link ">
              <i class="fa-sharp fa-solid fa-atom"></i>
              <p>Prospectus<i class="right fas fa-angle-left"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/prospectus11" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Grade 11</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/prospectus12" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Grade 12</p>
                </a>
              </li>
            </ul>
      </li>
      <li class="nav-item"style = "font-family:poppins;">
          <li class="nav-item"style = "font-family:poppins;">
            <a href="<?=base_url('/retrieve_strand')?>" class="nav-link active">
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
      <li class="nav-item"style = "font-family:poppins;">
            <li class="nav-item"style = "font-family:poppins;">
              <a href="<?=base_url('/listofteacher')?>" class="nav-link">
                <i class="fa-sharp fa-solid fa-envelopes-bulk"></i>
                <p>Teachers</p>
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

  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>
            <class="a" style="color:maroon; font-family: 'Poppins';font-size: 22px"><strong>STRAND</strong>
          </h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active" style="color:maroon;font-family: 'Poppins';">Admin</li>
            <li class="breadcrumb-item active"style="font-family: 'Poppins';">Strand</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
    <!-- Main content -->

    <!-- /.card-header -->
    <div class="card-body">
      <div class="card card-primary card-outline mx-auto" style = "">
        <div class="card-header">
            <button type="button" class="btn btn-default" style = "border-radius:20px;float: right; font-family:poppins; margin-bottom:1%; background-color:maroon; color: white;" data-toggle="modal" data-target="#new-strand">New Strand</button>
        </div>
        <!-- /.card-header -->
        <div class="card-body">

      <table id="example1" class="table table-bordered table" style = "font-family:poppins">
      <?= $this->include('admin/include/strandmodal/newStrand')?>
        <thead>
          <tr>
            <th>Strand</th>
            <th>Title</th>
            <th>Type</th>
            <th>Actions</th>
          </tr>
        </thead>

        <tbody>
          <?php foreach($strand as $strand_value):?>
          <tr>
            <td><?= $strand_value['strand']?></td>
            <td><?= $strand_value['title']?></td>
            <td><?=$strand_value['type']?></td>
            <td>
            <a href="<?=site_url('edit_strand/'.$strand_value['id'])?>"><button type="button" class="btn btn-secondary btn-sm"style = "border-radius:15px">update</button>

            </td>
          </tr>
          <?php endforeach;?>
        </tbody>

        <tfoot>
        </tfoot>

      </table>
    </div>
    <!-- /.card-body -->
  </div>

  <!-- /.content -->
</div>

</div>
</body>
<?= $this->include('admin/include/end')?>
<?= $this->include('admin/include/footer')?>
