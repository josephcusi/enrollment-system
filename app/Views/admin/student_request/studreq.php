  <?= $this->include('admin/include/top')?>

  <body class="hold-transition sidebar-mini layout-fixed">
      <div class="wrapper">
          <?= $this->include('admin/include/navbar')?>
          <aside class="main-sidebar sidebar-dark-secondary elevation-8">
              <!-- Brand Logo -->
              <a href="index3.html" class="brand-link">
                  <img src="<?=base_url()?>/cssjs/img/bccLogo.png" alt="dormehi Logo"
                      class="brand-image img-circle elevation-3" style="opacity: 10;">
                  <span class="brand-text font-weight-light" style="margin-left:0%; font-size:85%;"><strong>Baco
                          Community College</strong></span>
              </a>

              <!-- Sidebar -->
              <div class="sidebar">
                  <!-- Sidebar user panel (optional) -->

                  <!-- SidebarSearch Form -->


                  <!-- Sidebar Menu -->
                  <nav class="mt-2">
                      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                          data-accordion="false">
                          <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->

                          <li class="nav-header" style="font-family:poppins;">Admin</li>
                          <li class="nav-item" style="font-family:poppins;">
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
                          <li class="nav-item" style="font-family:poppins;">

                              <a href="#" class="nav-link">
                                  <i class="fa-sharp fa-solid fa-envelopes-bulk"></i>
                                  <p>School Updates<i class="right fas fa-angle-left"></i></p>
                              </a>

                              <ul class="nav nav-treeview">

                                  <li class="nav-item">
                                      <a href="<?= site_url('school_updates/' . 'announcement');?>" class="nav-link">
                                          <i class="far fa-circle nav-icon"></i>
                                          <p>Announcements</p>
                                      </a>
                                  </li>
                                  <li class="nav-item">
                                      <a href="<?= site_url('school_updates/' . 'event')?>" class="nav-link">
                                          <i class="far fa-circle nav-icon"></i>
                                          <p>Events</p>
                                      </a>
                                  </li>
                              </ul>
                          </li>
                          <li class="nav-item" style="font-family:poppins;">
                              <a href="<?=base_url('student_approve')?>" class="nav-link">
                                  <i class="far fa-thin fa-newspaper"></i>
                                  <p>Student Approval</p>
                              </a>
                          </li>
                          <li class="nav-item" style="font-family:poppins;">
                          <li class="nav-item menu-open" style="font-family: poppins;">
                              <a href="tae.html" class="nav-link" id="section-link">
                                  <i class="fa-sharp fa-solid fa-envelopes-bulk"></i>
                                  <p>
                                      Student Request
                                      <i class="right fas fa-angle-left"></i>
                                  </p>
                              </a>
                              <ul class="nav nav-treeview" id="section-menu">
                                  <?php if ($stat['status'] === "SHS"): ?>
                                  <li class="nav-item year-level-nav-item">
                                      <a href="<?= site_url('student-request/Grade-11') ;?>"
                                          class="nav-link <?= (strpos(current_url(), 'student-request/Grade-11') !== false) ? 'active' : '' ?>">
                                          <i class="far fa-circle nav-icon"></i>
                                          <p>Grade 11</p>
                                      </a>
                                  </li>
                                  <li class="nav-item year-level-nav-item">
                                      <a href="<?= site_url('student-request/Grade-12') ;?>"
                                          class="nav-link <?= (strpos(current_url(), 'student-request/Grade-12') !== false) ? 'active' : '' ?>">
                                          <i class="far fa-circle nav-icon"></i>
                                          <p>Grade 12</p>
                                      </a>
                                  </li>
                                  <?php else: ?>
                                  <li class="nav-item year-level-nav-item">
                                      <a href="<?= site_url('student-request/1st-Year') ;?>"
                                          class="nav-link <?= (strpos(current_url(), 'student-request/1st-Year') !== false) ? 'active' : '' ?>">
                                          <i class="far fa-circle nav-icon"></i>
                                          <p>1st Year</p>
                                      </a>
                                  </li>
                                  <li class="nav-item year-level-nav-item">
                                      <a href="<?= site_url('student-request/2nd-Year') ;?>"
                                          class="nav-link <?= (strpos(current_url(), 'student-request/2nd-Year') !== false) ? 'active' : '' ?>">
                                          <i class="far fa-circle nav-icon"></i>
                                          <p>2nd Year</p>
                                      </a>
                                  </li>
                                  <li class="nav-item year-level-nav-item">
                                      <a href="<?= site_url('student-request/3rd-Year') ;?>"
                                          class="nav-link <?= (strpos(current_url(), 'student-request/3rd-Year') !== false) ? 'active' : '' ?>">
                                          <i class="far fa-circle nav-icon"></i>
                                          <p>3rd Year</p>
                                      </a>
                                  </li>
                                  <li class="nav-item year-level-nav-item">
                                      <a href="<?= site_url('student-request/4th-Year') ;?>"
                                          class="nav-link <?= (strpos(current_url(), 'student-request/4th-Year') !== false) ? 'active' : '' ?>">
                                          <i class="far fa-circle nav-icon"></i>
                                          <p>4th Year</p>
                                      </a>
                                  </li>
                                  <?php endif; ?>
                              </ul>
                          </li>
                          <li class="nav-item" style="font-family:poppins;">
                              <a href="#" class="nav-link ">
                                  <i class="fa-sharp fa-solid fa-envelopes-bulk"></i>
                                  <p>Students<i class="right fas fa-angle-left"></i></p>
                              </a>

                              <ul class="nav nav-treeview">
                                  <?php if ($stat['status'] === "SHS"): ?>
                                  <li class="nav-item">
                                      <a href="<?= base_url('student-list/Grade-11')?>" class="nav-link ">
                                          <i class="far fa-circle nav-icon"></i>
                                          <p>Grade 11</p>
                                      </a>
                                  <li class="nav-item">
                                      <a href="<?= base_url('student-list/Grade-12')?>" class="nav-link">
                                          <i class="far fa-circle nav-icon"></i>
                                          <p>Grade 12</p>
                                      </a>
                                  </li>
                                  <?php else: ?>
                                  <li class="nav-item">
                                      <a href="<?= base_url('student-list/1st-Year')?>" class="nav-link">
                                          <i class="far fa-circle nav-icon"></i>
                                          <p>1st Year</p>
                                      </a>
                                  </li>
                                  <li class="nav-item">
                                      <a href="<?= base_url('student-list/2nd-Year')?>" class="nav-link">
                                          <i class="far fa-circle nav-icon"></i>
                                          <p>2nd Year</p>
                                      </a>
                                  </li>
                                  <li class="nav-item">
                                      <a href="<?= base_url('student-list/3rd-Year')?>" class="nav-link">
                                          <i class="far fa-circle nav-icon"></i>
                                          <p>3rd Year</p>
                                      </a>
                                  </li>
                                  <li class="nav-item">
                                      <a href="<?= base_url('student-list/4th-Year')?>" class="nav-link">
                                          <i class="far fa-circle nav-icon"></i>
                                          <p>4th Year</p>
                                      </a>
                                  </li>
                                  <?php endif; ?>
                              </ul>
                          </li>
                          <li class="nav-item" style="font-family:poppins;">
                              <a href="#" class="nav-link ">
                                  <i class="fa-sharp fa-solid fa-envelopes-bulk"></i>
                                  <p>Pre-Enrolled<i class="right fas fa-angle-left"></i></p>
                              </a>

                              <ul class="nav nav-treeview">
                                  <?php if ($stat['status'] === "SHS"): ?>
                                  <li class="nav-item">
                                      <a href="<?= base_url('pre-enrolled-registration/Grade-11')?>" class="nav-link ">
                                          <i class="far fa-circle nav-icon"></i>
                                          <p>Grade 11</p>
                                      </a>
                                  <li class="nav-item">
                                      <a href="<?= base_url('pre-enrolled-registration/Grade-12')?>" class="nav-link">
                                          <i class="far fa-circle nav-icon"></i>
                                          <p>Grade 12</p>
                                      </a>
                                  </li>
                                  <?php else: ?>
                                  <li class="nav-item">
                                      <a href="<?= base_url('pre-enrolled-registration/1st-Year')?>" class="nav-link">
                                          <i class="far fa-circle nav-icon"></i>
                                          <p>1st Year</p>
                                      </a>
                                  </li>
                                  <li class="nav-item">
                                      <a href="<?= base_url('pre-enrolled-registration/2nd-Year')?>" class="nav-link">
                                          <i class="far fa-circle nav-icon"></i>
                                          <p>2nd Year</p>
                                      </a>
                                  </li>
                                  <li class="nav-item">
                                      <a href="<?= base_url('pre-enrolled-registration/3rd-Year')?>" class="nav-link">
                                          <i class="far fa-circle nav-icon"></i>
                                          <p>3rd Year</p>
                                      </a>
                                  </li>
                                  <li class="nav-item">
                                      <a href="<?= base_url('pre-enrolled-registration/4th-Year')?>" class="nav-link">
                                          <i class="far fa-circle nav-icon"></i>
                                          <p>4th Year</p>
                                      </a>
                                  </li>
                                  <?php endif; ?>
                              </ul>
                          </li>
                          </li>
                          <li class="nav-item" style="font-family:poppins;">

                              <a href="#" class="nav-link">
                                  <i class="fa-sharp fa-solid fa-envelopes-bulk"></i>
                                  <p>Section<i class="right fas fa-angle-left"></i></p>
                              </a>

                              <ul class="nav nav-treeview">
                                  <?php if ($stat['status'] === "SHS"): ?>
                                  <li class="nav-item">
                                      <a href="<?= base_url('section/Grade-11')?>" class="nav-link ">
                                          <i class="far fa-circle nav-icon"></i>
                                          <p>Grade 11</p>
                                      </a>
                                  <li class="nav-item">
                                      <a href="<?= base_url('section/Grade-12')?>" class="nav-link">
                                          <i class="far fa-circle nav-icon"></i>
                                          <p>Grade 12</p>
                                      </a>
                                  </li>
                                  <?php else: ?>
                                  <li class="nav-item">
                                      <a href="<?= base_url('section/1st-Year')?>" class="nav-link">
                                          <i class="far fa-circle nav-icon"></i>
                                          <p>1st Year</p>
                                      </a>
                                  </li>
                                  <li class="nav-item">
                                      <a href="<?= base_url('section/2nd-Year')?>" class="nav-link">
                                          <i class="far fa-circle nav-icon"></i>
                                          <p>2nd Year</p>
                                      </a>
                                  </li>
                                  <li class="nav-item">
                                      <a href="<?= base_url('section/3rd-Year')?>" class="nav-link">
                                          <i class="far fa-circle nav-icon"></i>
                                          <p>3rd Year</p>
                                      </a>
                                  </li>
                                  <li class="nav-item">
                                      <a href="<?= base_url('section/4th-Year')?>" class="nav-link">
                                          <i class="far fa-circle nav-icon"></i>
                                          <p>4th Year</p>
                                      </a>
                                  </li>
                                  <?php endif; ?>
                              </ul>
                          </li>

                          <li class="nav-item" style="font-family:poppins;">
                              <a href="#" class="nav-link ">
                                  <i class="fa-sharp fa-solid fa-envelopes-bulk"></i>
                                  <p>Prospectus<i class="right fas fa-angle-left"></i></p>
                              </a>

                              <ul class="nav nav-treeview">
                                  <?php if ($stat['status'] === "SHS"): ?>
                                  <li class="nav-item">
                                      <a href="<?= base_url('prospectus/Grade-11')?>" class="nav-link ">
                                          <i class="far fa-circle nav-icon"></i>
                                          <p>Grade 11</p>
                                      </a>
                                  <li class="nav-item">
                                      <a href="<?= base_url('prospectus/Grade-12')?>" class="nav-link">
                                          <i class="far fa-circle nav-icon"></i>
                                          <p>Grade 12</p>
                                      </a>
                                  </li>
                                  <?php else: ?>
                                  <li class="nav-item">
                                      <a href="<?= base_url('prospectus/1st-Year')?>" class="nav-link">
                                          <i class="far fa-circle nav-icon"></i>
                                          <p>1st Year</p>
                                      </a>
                                  </li>
                                  <li class="nav-item">
                                      <a href="<?= base_url('prospectus/2nd-Year')?>" class="nav-link">
                                          <i class="far fa-circle nav-icon"></i>
                                          <p>2nd Year</p>
                                      </a>
                                  </li>
                                  <li class="nav-item">
                                      <a href="<?= base_url('prospectus/3rd-Year')?>" class="nav-link">
                                          <i class="far fa-circle nav-icon"></i>
                                          <p>3rd Year</p>
                                      </a>
                                  </li>
                                  <li class="nav-item">
                                      <a href="<?= base_url('prospectus/4th-Year')?>" class="nav-link">
                                          <i class="far fa-circle nav-icon"></i>
                                          <p>4th Year</p>
                                      </a>
                                  </li>
                                  <?php endif; ?>
                              </ul>
                          </li>
                          <li class="nav-item" style="font-family:poppins;">

                              <a href="#" class="nav-link">
                                  <i class="fa-sharp fa-solid fa-envelopes-bulk"></i>
                                  <p>Grading<i class="right fas fa-angle-left"></i></p>
                              </a>

                              <ul class="nav nav-treeview">
                                  <?php if ($stat['status'] === "SHS"): ?>
                                  <li class="nav-item">
                                      <a href="<?= base_url('student-grading/Grade-11')?>" class="nav-link ">
                                          <i class="far fa-circle nav-icon"></i>
                                          <p>Grade 11</p>
                                      </a>
                                  <li class="nav-item">
                                      <a href="<?= base_url('student-grading/Grade-12')?>" class="nav-link">
                                          <i class="far fa-circle nav-icon"></i>
                                          <p>Grade 12</p>
                                      </a>
                                  </li>
                                  <?php else: ?>
                                  <li class="nav-item">
                                      <a href="<?= base_url('/deadline_form') ?>" class="nav-link ">
                                          <i class="far fa-circle nav-icon"></i>
                                          <p>Submission of Grade </p>
                                      </a>
                                  </li>
                                  <li class="nav-item">
                                      <a href="<?= base_url('student-grading/1st-Year')?>" class="nav-link">
                                          <i class="far fa-circle nav-icon"></i>
                                          <p>1st Year</p>
                                      </a>
                                  </li>
                                  <li class="nav-item">
                                      <a href="<?= base_url('student-grading/2nd-Year')?>" class="nav-link">
                                          <i class="far fa-circle nav-icon"></i>
                                          <p>2nd Year</p>
                                      </a>
                                  </li>
                                  <li class="nav-item">
                                      <a href="<?= base_url('student-grading/3rd-Year')?>" class="nav-link">
                                          <i class="far fa-circle nav-icon"></i>
                                          <p>3rd Year</p>
                                      </a>
                                  </li>
                                  <li class="nav-item">
                                      <a href="<?= base_url('student-grading/4th-Year')?>" class="nav-link">
                                          <i class="far fa-circle nav-icon"></i>
                                          <p>4th Year</p>
                                      </a>
                                  </li>
                                  <?php endif; ?>
                              </ul>
                          </li>
                          <li class="nav-item" style="font-family:poppins;">
                          <li class="nav-item" style="font-family:poppins;">
                              <a href="<?=base_url('/retrieve_strand')?>" class="nav-link">
                                  <i class="fa-sharp fa-solid fa-envelopes-bulk"></i>
                                  <p>Program</p>
                              </a>
                          </li>
                          </li>


                          </li>
                          <li class="nav-item" style="font-family:poppins;">
                          <li class="nav-item" style="font-family:poppins;">
                              <a href="<?=base_url('/newadmin')?>" class="nav-link">
                                  <i class="nav-icon fa-solid fa-user"></i>
                                  <p>Admin</p>
                              </a>
                          </li>
                          </li>

                          <li class="nav-item" style="font-family:poppins;">
                          <li class="nav-item" style="font-family:poppins;">
                              <a href="<?=base_url('/listofteacher')?>" class="nav-link">
                                  <i class="fa-sharp fa-solid fa-envelopes-bulk"></i>
                                  <p>Teachers</p>
                              </a>
                          </li>
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
          <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
          <?php if (!empty(session()->getFlashdata('rejected'))) : ?>
          <script>
          swal({
              title: "Rejected!",
              text: "Registration successfully rejected.",
              icon: "success",
              timer: 1000,
              buttons: false
          });
          </script>
          <?php endif ?>

          <?php if (!empty(session()->getFlashdata('nodata'))) : ?>
          <script>
          swal({
              title: "No data found!",
              text: "There's no available data for the requested credential.",
              icon: "warning",
              timer: 2000,
              buttons: false,
              customClass: {
                  content: "text-center",
                  popup: "text-center"
              }
          });
          </script>

          <?php endif ?>

          <!-- Content Header (Page header) -->

          <section class="content-header">
              <div class="container-fluid">
                  <div class="row mb-2">
                      <div class="col-sm-6">
                          <h1>
                              <class="a" style="color:maroon; font-family: 'Poppins';font-size: 22px">
                                  <strong>Student Request Table</strong>
                          </h1>
                      </div>
                      <div class="col-sm-6">
                          <ol class="breadcrumb float-sm-right">
                              <li class="breadcrumb-item active" style="color:maroon;font-family: 'Poppins';">Admin</li>
                              <li class="breadcrumb-item active" style="font-family: 'Poppins';">Student Request</li>
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
                          <div class="card card-primary card-outline" style="">
                              <div class="card-body box-profile">
                                  <div class="text-center"></div>
                                  <p class="text-muted text-left">Program</p>
                                  <ul class="list-group list-group-unbordered mb-3 nav nav-pills">
                                      <?php if ($stat['status'] === "SHS"): ?>
                                      <?php $strand = session()->getFlashdata('strand');?>
                                      <li class="nav-item">
                                          <a type="button"
                                              class="tablinks nav-link <?php if($strand == 'GAS'){echo 'active';} ?>"
                                              style="border-radius:20px" id="defaultOpen"
                                              href="<?= base_url('student-request/'. $year . '/' . 'GAS')?>">GAS</a>
                                      </li>
                                      <li class="nav-item">
                                          <a type="button"
                                              class="tablinks nav-link <?php if($strand == 'CSS'){echo 'active';} ?>"
                                              style="border-radius:20px" id="defaultOpen"
                                              href="<?= base_url('student-request/'. $year . '/' . 'CSS')?>">CSS</a>
                                      </li>
                                      <li class="nav-item">
                                          <a type="button"
                                              class="tablinks nav-link <?php if($strand == 'HUMSS'){echo 'active';} ?>"
                                              style="border-radius:20px" id="defaultOpen"
                                              href="<?= base_url('student-request/'. $year . '/' . 'HUMSS')?>">HUMSS</a>
                                      </li>
                                      <li class="nav-item">
                                          <a type="button"
                                              class="tablinks nav-link <?php if($strand == 'SMAW'){echo 'active';} ?>"
                                              style="border-radius:20px" id="defaultOpen"
                                              href="<?= base_url('student-request/'. $year . '/' . 'SMAW')?>">SMAW</a>
                                      </li>
                                      <?php else:?>
                                      <?php $strand = session()->getFlashdata('strand');?>
                                      <li class="nav-item">
                                          <a type="button"
                                              class="tablinks nav-link <?php if($strand == 'ABH'){echo 'active';} ?>"
                                              style="border-radius:20px" id="defaultOpen"
                                              href="<?= base_url('student-request/'.$year . '/' .'ABH')?>">ABH</a>
                                      </li>
                                      <li class="nav-item">
                                          <a type="button"
                                              class="tablinks nav-link <?php if($strand == 'BPA'){echo 'active';} ?>"
                                              style="border-radius:20px" id="defaultOpen"
                                              href="<?= base_url('student-request/'.$year . '/' .'BPA')?>">BPA</a>
                                      </li>
                                      <li class="nav-item">
                                          <a type="button"
                                              class="tablinks nav-link <?php if($strand == 'BTVTED'){echo 'active';} ?>"
                                              style="border-radius:20px" id="defaultOpen"
                                              href="<?= base_url('student-request/'.$year . '/' .'BTVTED')?>">BTVTED</a>
                                      </li>
                                      <?php endif;?>
                                  </ul>
                              </div>
                              <!-- /.card-body -->
                          </div>
                      </div>

                      <div class="col-md-9">
                          <div class="card card-primary card-outline mx-auto" style="border-radius:;">

                              <input type="hidden" class="form-control year_lvl" value="<?= $year ?>" name="year_lvl">
                              <input type="hidden" class="form-control stud_strand" value="<?= $strand ?>"
                                  name="stud_strand">
                              <div class="card-body">
                                  <table id="example1" class="table table-bordered table" style="font-family:poppins">
                                      <thead>
                                          <tr>
                                              <th>Name</th>
                                              <th>Purpose</th>
                                              <th>Credentials to be Requested</th>
                                              <th>Schedule</th>
                                              <th>Status</th>
                                              <th>Actions</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                          <?php foreach($stud_req as $stud_cred_req): ;?>
                                          <tr>
                                              <td><?= isset($stud_cred_req['firstname'], $stud_cred_req['middlename'], $stud_cred_req['lastname']) ? $stud_cred_req['firstname'] .' ' . $stud_cred_req['middlename'] . ' ' . $stud_cred_req['lastname'] : ''; ?>
                                              </td>
                                              <td><?= isset($stud_cred_req['purpose']) ? $stud_cred_req['purpose'] : ''; ?>
                                              </td>
                                              <td><?= isset($stud_cred_req['cred_requested']) ? $stud_cred_req['cred_requested'] : ''; ?>
                                              </td>
                                              <td><?= isset($stud_cred_req['schedule']) ? $stud_cred_req['schedule'] : 'ANAVAIlABLE'; ?>
                                              </td>
                                              <td>
                                                  <?php if ($stud_cred_req && isset($stud_cred_req['cred_status'])): ?>
                                                  <?php if ($stud_cred_req['cred_status'] == '1'): ?>
                                                  <button type="button"
                                                      class="btn btn-secondary btn-sm btn-print-schedule"
                                                      style="border-radius:15px" data-id="<?=$stud_cred_req['id']?>"
                                                      data-status="<?=$stud_cred_req['cred_status']?>"
                                                      data-name="<?=$stud_cred_req['firstname'] . ' ' . $stud_cred_req['middlename'] . ' ' . $stud_cred_req['lastname']?>"
                                                      data-purpose="<?=$stud_cred_req['purpose']?>"
                                                      data-cred_requested="<?=$stud_cred_req['cred_requested']?>">Approved</button>
                                                  <?php elseif ($stud_cred_req['cred_status'] == '2'): ?>
                                                  <button type="button"
                                                      class="btn btn-secondary btn-sm btn-print-schedule"
                                                      style="border-radius:15px" data-id="<?=$stud_cred_req['id']?>"
                                                      data-status="<?=$stud_cred_req['cred_status']?>"
                                                      data-name="<?=$stud_cred_req['firstname'] . ' ' . $stud_cred_req['middlename'] . ' ' . $stud_cred_req['lastname']?>"
                                                      data-purpose="<?=$stud_cred_req['purpose']?>"
                                                      data-cred_requested="<?=$stud_cred_req['cred_requested']?>">Rejected</button>
                                                  <?php else: ?>
                                                  <button type="button"
                                                      class="btn btn-secondary btn-sm btn-print-schedule"
                                                      style="border-radius:15px" data-id="<?=$stud_cred_req['id']?>"
                                                      data-status="<?=$stud_cred_req['cred_status']?>"
                                                      data-name="<?=$stud_cred_req['firstname'] . ' ' . $stud_cred_req['middlename'] . ' ' . $stud_cred_req['lastname']?>"
                                                      data-purpose="<?=$stud_cred_req['purpose']?>"
                                                      data-cred_requested="<?=$stud_cred_req['cred_requested']?>">Pending</button>
                                                  <?php endif; ?>
                                                  <?php else: ?>
                                                  <?php endif; ?>
                                              </td>
                                              <td>
                                                  <?php if($stud_cred_req['cred_status'] == '1'):?>
                                                  <button type="button"
                                                      class="btn btn-secondary btn-sm btn-print-credentials"
                                                      style="border-radius:15px" data-id="<?=$stud_cred_req['id']?>"
                                                      data-lrn="<?=$stud_cred_req['lrn']?>">view</button>
                                                  <?= $this->include('admin/student_request/shwreq') ?>
                                                  <?php else:?>
                                                  N/A
                                                  <?php endif;?>
                                              </td>
                                          </tr>
                                          <!-- Modal -->
                                          <?= $this->include('admin/student_request/cred_schedule') ?>
                                          <?php endforeach;?>

                                      </tbody>
                                  </table>
                              </div>

                          </div>
                      </div>
                  </div>

                  <!-- /.content -->
              </div>
      </div>
      </div>
      </div>
      </div>
      </section>
      <script src="<?=base_url()?>/plugins/datatables/jquery.dataTables.min.js"></script>
      <script src="<?=base_url()?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
      <script src="<?=base_url()?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
      <script src="<?=base_url()?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
      <script src="<?=base_url()?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
      <script src="<?=base_url()?>/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
      <script src="<?=base_url()?>/plugins/jszip/jszip.min.js"></script>
      <script src="<?=base_url()?>/plugins/pdfmake/pdfmake.min.js"></script>
      <script src="<?=base_url()?>/plugins/pdfmake/vfs_fonts.js"></script>
      <script src="<?=base_url()?>/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
      <script src="<?=base_url()?>/plugins/datatables-buttons/js/buttons.print.min.js"></script>
      <script src="<?=base_url()?>/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
      <!-- AdminLTE App -->

      <!-- AdminLTE for demo purposes -->

      <!-- Page specific script -->
  </body>

  <?= $this->include('admin/include/end')?>
  <?= $this->include('admin/include/footer')?>

  <script>
document.addEventListener('DOMContentLoaded', function() {
    var sectionLink = document.getElementById('section-link');
    var sectionMenu = document.getElementById('section-menu');
    var currentURL = window.location.href;

    // Add 'active' class to section link if current URL matches
    if (currentURL.includes('student-request/') || currentURL.includes('strandSec11/')) {
        sectionLink.classList.add('active');
    }

    // Check each menu item and add 'active' class if current URL matches
    var menuItems = sectionMenu.getElementsByTagName('a');
    for (var i = 0; i < menuItems.length; i++) {
        var menuItem = menuItems[i];
        var href = menuItem.getAttribute('href');
        if (currentURL.includes(href)) {
            menuItem.classList.add('active');
        }
    }

    // Store the active menu item in local storage
    var activeMenuItem = sectionMenu.getElementsByClassName('active')[0];
    if (activeMenuItem) {
        localStorage.setItem('activeMenuItem', activeMenuItem.getAttribute('href'));
    }

    // Retrieve the active menu item from local storage on page load
    var storedActiveMenuItem = localStorage.getItem('activeMenuItem');
    if (storedActiveMenuItem) {
        var storedMenuItem = sectionMenu.querySelector('[href="' + storedActiveMenuItem + '"]');
        if (storedMenuItem) {
            storedMenuItem.classList.add('active');
        }
    }
});
  </script>