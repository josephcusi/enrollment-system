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
                          <li class="nav-item" style="font-family:poppins;">
                              <a href="#" class="nav-link ">
                                  <i class="fa-sharp fa-solid fa-envelopes-bulk"></i>
                                  <p>Students Request<i class="right fas fa-angle-left"></i></p>
                              </a>

                              <ul class="nav nav-treeview">
                                  <?php if ($stat['status'] === "SHS"): ?>
                                  <li class="nav-item">
                                      <a href="<?= base_url('student-request/Grade-11')?>" class="nav-link ">
                                          <i class="far fa-circle nav-icon"></i>
                                          <p>Grade 11</p>
                                      </a>
                                  <li class="nav-item">
                                      <a href="<?= base_url('student-request/Grade-12')?>" class="nav-link">
                                          <i class="far fa-circle nav-icon"></i>
                                          <p>Grade 12</p>
                                      </a>
                                  </li>
                                  <?php else: ?>
                                  <li class="nav-item">
                                      <a href="<?= base_url('student-request/1st-Year')?>" class="nav-link">
                                          <i class="far fa-circle nav-icon"></i>
                                          <p>1st Year</p>
                                      </a>
                                  </li>
                                  <li class="nav-item">
                                      <a href="<?= base_url('student-request/2nd-Year')?>" class="nav-link">
                                          <i class="far fa-circle nav-icon"></i>
                                          <p>2nd Year</p>
                                      </a>
                                  </li>
                                  <li class="nav-item">
                                      <a href="<?= base_url('student-request/3rd-Year')?>" class="nav-link">
                                          <i class="far fa-circle nav-icon"></i>
                                          <p>3rd Year</p>
                                      </a>
                                  </li>
                                  <li class="nav-item">
                                      <a href="<?= base_url('student-request/4th-Year')?>" class="nav-link">
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
                          <li class="nav-item menu-open" style="font-family: poppins;">
                              <a href="tae.html" class="nav-link" id="section-link">
                                  <i class="fa-sharp fa-solid fa-envelopes-bulk"></i>
                                  <p>
                                      Pre-Enrolled
                                      <i class="right fas fa-angle-left"></i>
                                  </p>
                              </a>
                              <ul class="nav nav-treeview" id="section-menu">
                                  <?php if ($stat['status'] === "SHS"): ?>
                                  <li class="nav-item year-level-nav-item">
                                      <a href="<?= site_url('pre-enrolled-registration/Grade-11') ;?>"
                                          class="nav-link <?= (strpos(current_url(), 'pre-enrolled-registration/Grade-11') !== false) ? 'active' : '' ?>">
                                          <i class="far fa-circle nav-icon"></i>
                                          <p>Grade 11</p>
                                      </a>
                                  </li>
                                  <li class="nav-item year-level-nav-item">
                                      <a href="<?= site_url('pre-enrolled-registration/Grade-12') ;?>"
                                          class="nav-link <?= (strpos(current_url(), 'pre-enrolled-registration/Grade-12') !== false) ? 'active' : '' ?>">
                                          <i class="far fa-circle nav-icon"></i>
                                          <p>Grade 12</p>
                                      </a>
                                  </li>
                                  <?php else: ?>
                                  <li class="nav-item year-level-nav-item">
                                      <a href="<?= site_url('pre-enrolled-registration/1st-Year') ;?>"
                                          class="nav-link <?= (strpos(current_url(), 'pre-enrolled-registration/1st-Year') !== false) ? 'active' : '' ?>">
                                          <i class="far fa-circle nav-icon"></i>
                                          <p>1st Year</p>
                                      </a>
                                  </li>
                                  <li class="nav-item year-level-nav-item">
                                      <a href="<?= site_url('pre-enrolled-registration/2nd-Year') ;?>"
                                          class="nav-link <?= (strpos(current_url(), 'pre-enrolled-registration/2nd-Year') !== false) ? 'active' : '' ?>">
                                          <i class="far fa-circle nav-icon"></i>
                                          <p>2nd Year</p>
                                      </a>
                                  </li>
                                  <li class="nav-item year-level-nav-item">
                                      <a href="<?= site_url('pre-enrolled-registration/3rd-Year') ;?>"
                                          class="nav-link <?= (strpos(current_url(), 'pre-enrolled-registration/3rd-Year') !== false) ? 'active' : '' ?>">
                                          <i class="far fa-circle nav-icon"></i>
                                          <p>3rd Year</p>
                                      </a>
                                  </li>
                                  <li class="nav-item year-level-nav-item">
                                      <a href="<?= site_url('pre-enrolled-registration/4th-Year') ;?>"
                                          class="nav-link <?= (strpos(current_url(), 'pre-enrolled-registration/4th-Year') !== false) ? 'active' : '' ?>">
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

          <?php if (!empty(session()->getFlashdata('enrolled'))) : ?>
          <script>
          swal({
              title: "Enrolled!",
              text: "Registration has been successfully enrolled.",
              icon: "success",
              timer: 1000,
              buttons: false
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
                                  <strong>Pre-Enrolled Table</strong>
                          </h1>
                      </div>
                      <div class="col-sm-6">
                          <ol class="breadcrumb float-sm-right">
                              <li class="breadcrumb-item active" style="color:maroon;font-family: 'Poppins';">Admin</li>
                              <li class="breadcrumb-item active" style="font-family: 'Poppins';">Pre-Enrolled</li>
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
                                              href="<?= base_url('pre-enrolled-registration/'. $year . '/' . 'GAS' . '/' . $sts)?>">GAS</a>
                                      </li>
                                      <li class="nav-item">
                                          <a type="button"
                                              class="tablinks nav-link <?php if($strand == 'CSS'){echo 'active';} ?>"
                                              style="border-radius:20px" id="defaultOpen"
                                              href="<?= base_url('pre-enrolled-registration/'. $year . '/' . 'CSS' . '/' . $sts)?>">CSS</a>
                                      </li>
                                      <li class="nav-item">
                                          <a type="button"
                                              class="tablinks nav-link <?php if($strand == 'HUMSS'){echo 'active';} ?>"
                                              style="border-radius:20px" id="defaultOpen"
                                              href="<?= base_url('pre-enrolled-registration/'. $year . '/' . 'HUMSS' . '/' . $sts)?>">HUMSS</a>
                                      </li>
                                      <li class="nav-item">
                                          <a type="button"
                                              class="tablinks nav-link <?php if($strand == 'SMAW'){echo 'active';} ?>"
                                              style="border-radius:20px" id="defaultOpen"
                                              href="<?= base_url('pre-enrolled-registration/'. $year . '/' . 'SMAW' . '/' . $sts)?>">SMAW</a>
                                      </li>
                                      <?php else:?>
                                      <?php $strand = session()->getFlashdata('strand');?>
                                      <li class="nav-item">
                                          <a type="button"
                                              class="tablinks nav-link <?php if($strand == 'ABH'){echo 'active';} ?>"
                                              style="border-radius:20px" id="defaultOpen"
                                              href="<?= base_url('pre-enrolled-registration/'.$year . '/' .'ABH' . '/' . $sts)?>">ABH</a>
                                      </li>
                                      <li class="nav-item">
                                          <a type="button"
                                              class="tablinks nav-link <?php if($strand == 'BPA'){echo 'active';} ?>"
                                              style="border-radius:20px" id="defaultOpen"
                                              href="<?= base_url('pre-enrolled-registration/'.$year . '/' .'BPA' . '/' . $sts)?>">BPA</a>
                                      </li>
                                      <li class="nav-item">
                                          <a type="button"
                                              class="tablinks nav-link <?php if($strand == 'BTVTED'){echo 'active';} ?>"
                                              style="border-radius:20px" id="defaultOpen"
                                              href="<?= base_url('pre-enrolled-registration/'.$year . '/' .'BTVTED' . '/' . $sts)?>">BTVTED</a>
                                      </li>
                                      <?php endif;?>
                                  </ul>
                              </div>
                              <!-- /.card-body -->
                          </div>
                          <div class="card card-primary card-outline" style="">
                              <div class="card-body box-profile">
                                  <div class="text-center"></div>
                                  <p class="text-muted text-left">Registration Status</p>
                                  <ul class="list-group list-group-unbordered mb-3 nav nav-pills">
                                      <?php if ($stat['status'] === "SHS"): ?>
                                      <?php $reg_stats = session()->getFlashdata('reg_stats');?>
                                      <li class="nav-item">
                                          <a type="button"
                                              class="tablinks nav-link <?php if($reg_stats == 'Pending'){echo 'active';} ?>"
                                              style="border-radius:20px" id="defaultOpen"
                                              href="<?= base_url('pre-enrolled-registration/'.$year . '/' . $strand . '/' . 'Pending')?>">PENDING</a>
                                      </li>
                                      <li class="nav-item">
                                          <a type="button"
                                              class="tablinks nav-link <?php if($reg_stats == 'Enrolled'){echo 'active';} ?>"
                                              style="border-radius:20px" id="defaultOpen"
                                              href="<?= base_url('pre-enrolled-registration/'. $year . '/' . $strand . '/' . 'Enrolled' )?>">ENROLLED</a>
                                      </li>
                                      <li class="nav-item">
                                          <a type="button"
                                              class="tablinks nav-link <?php if($reg_stats == 'Rejected'){echo 'active';} ?>"
                                              style="border-radius:20px" id="defaultOpen"
                                              href="<?= base_url('pre-enrolled-registration/'. $year . '/' . $strand . '/' . 'rejected')?>">REJECTED</a>
                                      </li>
                                      <?php else:?>
                                      <?php $reg_stats = session()->getFlashdata('reg_stats');?>
                                      <li class="nav-item">
                                          <a type="button"
                                              class="tablinks nav-link <?php if($reg_stats == 'Pending'){echo 'active';} ?>"
                                              style="border-radius:20px" id="defaultOpen"
                                              href="<?= base_url('pre-enrolled-registration/'.$year . '/' . $strand . '/' . 'Pending')?>">PENDING</a>
                                      </li>
                                      <li class="nav-item">
                                          <a type="button"
                                              class="tablinks nav-link <?php if($reg_stats == 'Enrolled'){echo 'active';} ?>"
                                              style="border-radius:20px" id="defaultOpen"
                                              href="<?= base_url('pre-enrolled-registration/'.$year . '/' . $strand . '/' . 'Enrolled')?>">ENROLLED</a>
                                      </li>
                                      <li class="nav-item">
                                          <a type="button"
                                              class="tablinks nav-link <?php if($reg_stats == 'Rejected'){echo 'active';} ?>"
                                              style="border-radius:20px" id="defaultOpen"
                                              href="<?= base_url('pre-enrolled-registration/'.$year . '/' . $strand . '/' . 'Rejected')?>">REJECTED</a>
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
                                              <th><input type="checkbox" id="checkAll" checked>
                                              <th>Student Type</th>
                                              <th>Student ID</th>
                                              <th>Name</th>
                                              <th>Section</th>
                                              <th>Status</th>
                                              <th>Actions</th>
                                          </tr>
                                      </thead>
                                      <tbody>

                                          <?php foreach ($pre_enrolled as $key => $pre_enrolled_value): 
                                             
                                              ?>
                                          <tr>

                                              <td><input type="checkbox" class="idss" name="ids[]"
                                                      value="<?= implode(',', array_column($pre_enrolled, 'id')); ?>"
                                                      checked></td>

                                            <?php if($pre_enrolled_value['student_types'] == '1'):?>
                                                <td>New</td>
                                            <?php elseif($pre_enrolled_value['student_types'] == '2'):?>
                                                <td>Old</td>
                                            <?php else:?>
                                                <td>Transferee</td>
                                            <?php endif;?>

                                            <?php if($pre_enrolled_value['state'] === "Enrolled"):?>
                                              <td><?= $pre_enrolled_value['lrn'];?></td>
                                             <?php else:?>
                                               <td></td>
                                              <?php endif;?>
                                              <td><?= $pre_enrolled_value['firstname'] .' ' . $pre_enrolled_value['middlename'] . ' ' . $pre_enrolled_value['lastname'];?>
                                              </td>
                                              <td><?= $pre_enrolled_value['section'];?></td>

                                              <td><?= $pre_enrolled_value['state'];?></td>
                                              <td>
                                                  <a
                                                      href="<?=base_url('viewPreEnroll/'. $pre_enrolled_value['lrn'] )?>"><button
                                                          type="button" class="btn btn-secondary btn-sm"
                                                          style="border-radius:15px">view</button></a>
                                                  <?php if($pre_enrolled_value['state'] == "Enrolled"):?>
                                                  <button type="button" class="btn btn-secondary btn-sm btn-download"
                                                      style="border-radius:15px"
                                                      data-download_id="<?= $pre_enrolled_value['prof_id'];?>">Download</button>
                                                  <?php else:?>
                                                  <?php endif;?>
                                              </td>
                                          </tr>
                                          <?php endforeach;?>

                                      </tbody>
                                  </table>
                              </div>
                              <?php if($reg_stats == 'Pending'):?>
                              <div class="card" style="border-radius:15px">
                                  <?php if(empty($pre_enrolled[0]['id']) || ($year === "1st-Year" && $pre_enrolled[0]['semester'] === "1st Semester" || $pre_enrolled[0]['year_level'] === "Grade 11" && $pre_enrolled[0]['semester'] === "1st Semester")):?>
                                  <?php else:?>
                                  <button type="submit" class="btn btn-default btn-edit-downloadAll"
                                      style="float:right; font-family:poppins; background-color:maroon; color: white;">Enroll
                                      all student</button>
                                  <?php endif;?>
                                  <?php elseif($reg_stats == 'Enrolled'):?>
                                  <button type="submit" class="btn btn-default btn-edit-student-cor"
                                      style="float:right; font-family:poppins; background-color:maroon; color: white;">Download
                                      All (Student COR)</button>
                                  <button type="submit" class="btn btn-default btn-edit-student-form"
                                      style="float:right; font-family:poppins; background-color:maroon; color: white;">Download
                                      All (Student Form) </button>
                                  <br>
                                  <?php else:?>
                                  <?php endif;?>
                              </div>
                              <?= $this->include('admin/modal/download_info')?>
                          </div>
                      </div>

                      <!-- /.content -->
                  </div>
              </div>
      </div>
      </div>
      </div>
      </section>
  </body>
  <!-- AdminLTE App -->

  <!-- AdminLTE for demo purposes -->

  <!-- Page specific script -->

  <?= $this->include('admin/include/end')?>
  <?= $this->include('admin/include/footer')?>

  <script>
document.addEventListener('DOMContentLoaded', function() {
    var sectionLink = document.getElementById('section-link');
    var sectionMenu = document.getElementById('section-menu');
    var currentURL = window.location.href;

    // Add 'active' class to section link if current URL matches
    if (currentURL.includes('pre-enrolled-registration/') || currentURL.includes('strandSec11/')) {
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

  <script>
const checkAll = document.querySelector('#checkAll');
const checkboxes = document.querySelectorAll('input[name="ids[]"]');

checkAll.addEventListener('click', () => {
    checkboxes.forEach(checkbox => {
        checkbox.checked = checkAll.checked;
    });
});
  </script>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- Include SweetAlert library -->
  <script>
$(document).ready(function() {
    $('.btn-edit-downloadAll').on('click', function() {
        const id = $('.idss').val(); // Get the id from the hidden input
        const year_lvl = $('.year_lvl').val(); // Get the id from the hidden input
        const stud_strand = $('.stud_strand').val(); // Get the id from the hidden input

        const formData = new FormData();
        formData.append('ids', id);
        formData.append('year_lvl', year_lvl);
        formData.append('stud_strand', stud_strand);

        const form = document.createElement('form');
        form.method = 'POST';
        form.action = '/enroll_all';
        form.style.display = 'none';
        document.body.appendChild(form);

        for (const pair of formData.entries()) {
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = pair[0];
            input.value = pair[1];
            form.appendChild(input);
        }

        form.submit();


        setTimeout(function() {
            window.location.reload();
        }, 3000);
    });
});
  </script>


  <script>
$(document).ready(function() {
    $('.btn-edit-student-cor').on('click', function() {
        const id = $('.idss').val(); // Get the id from the hidden input
        const stud_cor = "cor";

        console.log(stud_cor);

        const formData = new FormData();
        formData.append('ids', id);
        formData.append('stud_cor', stud_cor);


        const form = document.createElement('form');
        form.method = 'POST';
        form.action = '/stud_cor_form';
        form.style.display = 'none';
        document.body.appendChild(form);

        for (const pair of formData.entries()) {
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = pair[0];
            input.value = pair[1];
            form.appendChild(input);
        }

        form.submit();


        setTimeout(function() {
            window.location.reload();
        }, 3000);
    });
});
  </script>
  <script>
$(document).ready(function() {
    $('.btn-edit-student-form').on('click', function() {
        const id = $('.idss').val(); // Get the id from the hidden input
        const stud_form = "form";

        const formData = new FormData();
        formData.append('ids', id);
        formData.append('stud_form', stud_form);


        const form = document.createElement('form');
        form.method = 'POST';
        form.action = '/stud_cor_form';
        form.style.display = 'none';
        document.body.appendChild(form);

        for (const pair of formData.entries()) {
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = pair[0];
            input.value = pair[1];
            form.appendChild(input);
        }

        form.submit();


        setTimeout(function() {
            window.location.reload();
        }, 3000);
    });
});
  </script>