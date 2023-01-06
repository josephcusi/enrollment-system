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
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Section</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Section</a></li>
              <li class="breadcrumb-item active">Section</li>
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


            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">

                </div>
                <p class="text-muted text-left">Strand</p>
                <ul class="list-group list-group-unbordered mb-3 nav nav-pills">
                <li class="nav-item"><a type="button" class="tablinks nav-link active" onclick="openStrand(event, 'humss')" id="defaultOpen" >HUMSS</a></li>
                    <li class="nav-item"><a type="button" class="tablinks nav-link" onclick="openStrand(event, 'abm')" id="defaultOpen" >ABM</a></li>
                    <li class="nav-item"><a type="button" class="tablinks nav-link" onclick="openStrand(event, 'stem')" id="defaultOpen" >STEM</a></li>
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
            <div class="card">
              <div class="card-header p-2">
                <ul>
                <div class="dropdown"style = "float:right; margin-right:10%">
                  <a href class="dropbt">Settings</a>
                  <div class="dropdown-content">
                    <a style = "color:maroon">Grade 11</a>
                    <a href="#">1st Semester</a>
                    <a href="#">2nd Semester</a>
                    <a style = "color:maroon">Grade 12</a>
                    <a href="#">1st Semester</a>
                    <a href="#">2nd Semester</a>
                  </div>
                </div>
                </ul>
              </div>
              <div id="humss" class="tabcontent">
                <table class="table table-bordered table-striped" style = "font-family:poppins">
                <thead>
                <tr>
                <th>Section</th>
                <th>Strand</th>
                <th>Semester</th>
                <th>Year Level</th>
                <th>Subject Count</th>
                <th>Actions</th>
                </tr>
                <thead>
                <tbody>
                <?php foreach($HUMSS as $section_value):?>
                  <tr>
                  <td><?= $section_value['section']?></td>
                  <td><?= $section_value['strand']?></td>
                  <td><?= $section_value['semester']?></td>
                  <td><?=$section_value['year_level']?></td>
                  <td><?=$Humss?></td>
                  <td>
                    <a href="<?=base_url('schedule')?>"><button type="button" class="btn btn-secondary btn-sm">schedule</button>
                    <a href="<?=site_url('edit/'.$section_value['id'])?>"><button type="button" class="btn btn-secondary btn-sm">update</button>
                    <a href="<?= site_url('delete/'.$section_value['id']) ?>"><button type="button" class="btn btn-primary btn-sm">delete</button>
                  </td>
                  </tr>
                  </tbody>
                  <?php endforeach;?>
              </table>
              </div>
              <div id="abm" class="tabcontent">
              <table class="table table-bordered table-striped" style = "font-family:poppins">
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
                <?php foreach($ABM as $section_value):?>
                <tbody>
                  <tr>
                  <td><?= $section_value['section']?></td>
                  <td><?= $section_value['strand']?></td>
                  <td><?= $section_value['semester']?></td>
                  <td><?=$section_value['year_level']?></td>
                  <td><?=$Abm?></td>
                  <td>
                    <a href="<?=base_url('schedule')?>"><button type="button" class="btn btn-secondary btn-sm">schedule</button>
                    <a href="<?=site_url('edit/'.$section_value['id'])?>"><button type="button" class="btn btn-secondary btn-sm">update</button>
                    <a href="<?= site_url('delete/'.$section_value['id']) ?>"><button type="button" class="btn btn-primary btn-sm">delete</button>
                  </td>
                  </tr>
                </tbody>
                  <?php endforeach;?>
              </table>
              </div>
              <div id="stem" class="tabcontent">
              <table class="table table-bordered table-striped" style = "font-family:poppins">
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
                <?php foreach($STEM as $section_value):?>
                  <tbody>
                  <tr>
                  <td><?= $section_value['section']?></td>
                  <td><?= $section_value['strand']?></td>
                  <td><?= $section_value['semester']?></td>
                  <td><?=$section_value['year_level']?></td>
                  <td><?=$Stem?></td>
                  <td>
                    <a href="<?=base_url('schedule')?>"><button type="button" class="btn btn-secondary btn-sm">schedule</button>
                    <a href="<?=site_url('edit/'.$section_value['id'])?>"><button type="button" class="btn btn-secondary btn-sm">update</button>
                    <a href="<?= site_url('delete/'.$section_value['id']) ?>"><button type="button" class="btn btn-primary btn-sm">delete</button>
                  </td>
                  </tr>
                </tbody>
                  <?php endforeach;?>
                </table>
              </div>
                <button type="button" class="btn btn-default" class="btn btn-default" style = "float:right; font-family:poppins; margin-bottom:1%; background-color:maroon; color: white;" data-toggle="modal" data-target="#new-section">New Section</button>
                 <?= $this->include('admin/include/sectionmodal/newSection')?>
            </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
  <!-- /.content -->
</div>
</body>
<?= $this->include('admin/include/end')?>
<?= $this->include('admin/include/footer')?>

<script>
function openStrand(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
