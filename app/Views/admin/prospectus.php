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
              <a href="<?=base_url('/section')?>" class="nav-link">
                <i class="far fa-thin fa-newspaper"></i>
                <p>Section</p>
              </a>
            </li>
        </li>
        <li class="nav-item">
            <li class="nav-item">
              <a href="<?=base_url('/r_prospectus')?>" class="nav-link active">
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
            <h1>Prospectus</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Prospectus</a></li>
              <li class="breadcrumb-item active">Prospectus</li>
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
                <p class="text-muted text-left">Humanities and Social Sciences - 1st Year - 1st Semester</p>
                <div class="dropdown"style = "float:right; margin-right:10%">
                <a href="#" class="dropbt">Settings</a>
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
                <tr>
                  <th>Subject</th>
                  <th>Title</th>
                  <th>Unit</th>
                  <th>Pre-Requisit</th>
                  <th>Actions</th>
                </tr>
                <?php foreach($humss as $humss_value):?>
                  <tr>
                    <td><?= $humss_value['subject']?></td>
                    <td><?= $humss_value['title']?></td>
                    <td><?= $humss_value['unit']?></td>
                    <td><?= $humss_value['pre_requisit']?></td>
                    <td>
                      <a href="<?=base_url('edit_prospectus'.$humss_value['id'])?>"><button type="button" class="btn btn-secondary btn-sm">update</button>
                      <a href="#"><button type="button" class="btn btn-primary btn-sm">delete</button>
                    </td>
                  </tr>
                  <?php endforeach;?>
              </table>
              </div>
              <div id="abm" class="tabcontent">
              <table class="table table-bordered table-striped" style = "font-family:poppins">
                <tr>
                  <th>Subject</th>
                  <th>Title</th>
                  <th>Unit</th>
                  <th>Pre-Requisit</th>
                  <th>Actions</th>
                </tr>
                <?php foreach($abm as $abm_values):?>
                  <tr>
                    <td><?= $abm_values['subject']?></td>
                    <td><?= $abm_values['title']?></td>
                    <td><?= $abm_values['unit']?></td>
                    <td><?= $abm_values['pre_requisit']?></td>
                    <td>
                      <a href="<?=base_url('edit_prospectus'.$abm_values['id'])?>"><button type="button" class="btn btn-secondary btn-sm">update</button>
                      <a href="#"><button type="button" class="btn btn-primary btn-sm">delete</button>
                    </td>
                  </tr>
                  <?php endforeach;?>
              </table>
              </div>
              <div id="stem" class="tabcontent">
              <table class="table table-bordered table-striped" style = "font-family:poppins">
                <tr>
                  <th>Subject</th>
                  <th>Title</th>
                  <th>Unit</th>
                  <th>Pre-Requisit</th>
                  <th>Actions</th>
                </tr>
                <?php foreach($stem as $stem_values):?>
                  <tr>
                    <td><?= $stem_values['subject']?></td>
                    <td><?= $stem_values['title']?></td>
                    <td><?= $stem_values['unit']?></td>
                    <td><?= $stem_values['pre_requisit']?></td>
                    <td>
                      <a href="<?=base_url('edit_prospectus'.$stem_values['id'])?>"><button type="button" class="btn btn-secondary btn-sm">update</button>
                      <a href="#"><button type="button" class="btn btn-primary btn-sm">delete</button>
                    </td>
                  </tr>
                  <?php endforeach;?>
                </table>
              </div>
              <button type="button" class="btn btn-default" style = "float:right; font-family:poppins; margin-bottom:1%; background-color:maroon; color: white;" data-toggle="modal" data-target="#newSubject">New Subject</button>
                <?= $this->include('admin/include/prospectusmodal/subjectmodal')?>
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
