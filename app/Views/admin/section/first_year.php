<?= $this->include('admin/include/top')?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <?= $this->include('admin/include/navbar')?>
        <aside class="main-sidebar sidebar-dark-secondary elevation-8">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="<?=base_url()?>/cssjs/img/bccLogo.png" alt="dormehi Logo"
                    class="brand-image img-circle elevation-3" style="opacity: 10;">
                <span class="brand-text font-weight-light" style="margin-left:0%; font-size:85%;"><strong>Baco Community
                        College</strong></span>
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

                        <li class="nav-item menu-open" style="font-family: poppins;">
                            <a href="tae.html" class="nav-link" id="section-link">
                                <i class="fa-sharp fa-solid fa-envelopes-bulk"></i>
                                <p>
                                    Section
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" id="section-menu">
                                <?php if ($stat['status'] === "SHS"): ?>
                                <li class="nav-item year-level-nav-item">
                                    <a href="<?= site_url('section/Grade-11') ;?>"
                                        class="nav-link <?= (strpos(current_url(), 'section/Grade-11') !== false) ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Grade 11</p>
                                    </a>
                                </li>
                                <li class="nav-item year-level-nav-item">
                                    <a href="<?= site_url('section/Grade-12') ;?>"
                                        class="nav-link <?= (strpos(current_url(), 'section/Grade-12') !== false) ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Grade 12</p>
                                    </a>
                                </li>
                                <?php else: ?>
                                <li class="nav-item year-level-nav-item">
                                    <a href="<?= site_url('section/1st-Year') ;?>"
                                        class="nav-link <?= (strpos(current_url(), 'section/1st-Year') !== false) ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>1st Year</p>
                                    </a>
                                </li>
                                <li class="nav-item year-level-nav-item">
                                    <a href="<?= site_url('section/2nd-Year') ;?>"
                                        class="nav-link <?= (strpos(current_url(), 'section/2nd-Year') !== false) ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>2nd Year</p>
                                    </a>
                                </li>
                                <li class="nav-item year-level-nav-item">
                                    <a href="<?= site_url('section/3rd-Year') ;?>"
                                        class="nav-link <?= (strpos(current_url(), 'section/3rd-Year') !== false) ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>3rd Year</p>
                                    </a>
                                </li>
                                <li class="nav-item year-level-nav-item">
                                    <a href="<?= site_url('section/4th-Year') ;?>"
                                        class="nav-link <?= (strpos(current_url(), 'section/4th-Year') !== false) ? 'active' : '' ?>">
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
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

    </div>
    <div class="content-wrapper">
        <script src="<?= base_url()?>/dist/js/sweetalert.js"></script>
        <?php if(!empty(session()->getFlashdata('updatesection'))) : ?>
        <script>
        swal({
            title: "Changes has made.",
            text: "You successfully added subject.",
            icon: "success",
            buttons: false,
            timer: 1000,
        });
        </script>
        <?php endif ?>

        <script src="<?= base_url()?>/dist/js/sweetalert.js"></script>
        <?php if(!empty(session()->getFlashdata('subjectadded'))) : ?>

        <script>
        swal({
            title: "Section Added!",
            text: "You successfully added section.",
            icon: "success",
            buttons: false,
            timer: 1000,
        });
        </script>
        <?php endif ?>

        <?php if(!empty(session()->getFlashdata('notupdatesection'))) : ?>
        <script>
        swal({
            title: "Duplicate Input!",
            text: "Please try another.",
            icon: "warning",
            buttons: false,
            timer: 1000,
        });
        </script>
        <?php endif ?>
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>
                            <class="a" style="color:maroon; font-family: 'Poppins';font-size: 22px"><strong>SECTION /
                                    <?= $yearlvl?></strong></strong>
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active" style="color:maroon;font-family: 'Poppins';">Admin</li>
                            <li class="breadcrumb-item active" style="font-family: 'Poppins';">Section</li>
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
                        <div class="card card-primary card-outline" style="font-family:poppins;font-weight:bold;">
                            <div class="card-body box-profile">
                                <div class="text-center">

                                </div>
                                <p class="text-muted text-left">Program</p>
                                <ul class="list-group list-group-unbordered mb-3 nav nav-pills">
                                    <?php if ($stat['status'] === "SHS"): ?>
                                    <?php $strand = session()->getFlashdata('strand');?>
                                    <li class="nav-item"><a type="button"
                                            class="tablinks nav-link <?php if($strand == 'GAS'){echo 'active' ;} ?>"
                                            style="border-radius:20px" id="defaultOpen"
                                            href="<?= base_url('section/'. $yearlvl . '/' . 'GAS')?>">GAS</a>
                                    </li>
                                    <li class="nav-item"><a type="button"
                                            class="tablinks nav-link <?php if($strand == 'CSS'){echo 'active' ;} ?>"
                                            style="border-radius:20px" id="defaultOpen"
                                            href="<?= base_url('section/'. $yearlvl . '/' . 'CSS')?>">CSS</a>
                                    </li>
                                    <li class="nav-item"><a type="button"
                                            class="tablinks nav-link <?php if($strand == 'HUMSS'){echo 'active' ;} ?>"
                                            style="border-radius:20px" id="defaultOpen"
                                            href="<?= base_url('section/'. $yearlvl . '/' . 'HUMSS')?>">HUMSS</a>
                                    </li>
                                    <li class="nav-item"><a type="button"
                                            class="tablinks nav-link <?php if($strand == 'SMAW'){echo 'active';} ?>"
                                            style="border-radius:20px" id="defaultOpen "
                                            href="<?= base_url('section/'. $yearlvl . '/' . 'SMAW')?>">SMAW</a>
                                    </li>
                                    <?php else:?>
                                    <?php $strand = session()->getFlashdata('strand');?>
                                    <li class="nav-item"><a type="button"
                                            class="tablinks nav-link <?php if($strand == 'ABH'){echo 'active' ;} ?>"
                                            style="border-radius:20px" id="defaultOpen"
                                            href="<?= base_url('section/'.$yearlvl . '/' .'ABH')?>">ABH</a>
                                    </li>
                                    <li class="nav-item"><a type="button"
                                            class="tablinks nav-link <?php if($strand == 'BPA'){echo 'active' ;} ?>"
                                            style="border-radius:20px" id="defaultOpen"
                                            href="<?= base_url('section/'.$yearlvl . '/' .'BPA')?>">BPA</a>
                                    </li>
                                    <li class="nav-item"><a type="button"
                                            class="tablinks nav-link <?php if($strand == 'BTVTED'){echo 'active' ;} ?>"
                                            style="border-radius:20px" id="defaultOpen"
                                            href="<?= base_url('section/'.$yearlvl . '/' .'BTVTED')?>">BTVTED</a>
                                    </li>
                                    <?php endif;?>
                                </ul>
                                </ul>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="card card-primary card-outline mx-auto" style="">


                            <div class="card-body">

                                <div id="bpa" class="tabcontent">
                                    <table id="example1" class="table table-bordered table" style="font-family:poppins">
                                        <thead>
                                            <tr>
                                                <th>Section</th>
                                                <th>Year Level</th>
                                                <th>Students</th>
                                                <th>Actions</th>
                                            </tr>
                                            <thead>
                                            <tbody>
                                                <?php foreach($section as $section_value):?>
                                                <tr>
                                                    <td><?= $section_value['section']?></td>
                                                    <td><?=$section_value['year_level']?></td>
                                                    <td> <?php
                                                  $count = 0;
                                                  foreach ($sectENROLLED as $sec) {
                                                      if ($sec['secID'] == $section_value['secID']) {
                                                          $count++;
                                                      }
                                                  }
                                                  echo  $count;
                                                  ?></td>
                                                    <td>
                                                        <a
                                                            href="<?=base_url('schedule11/'. $yearlvl . '/' . str_replace(' ','-',$section_value['section']) .'/'. $section_value['strand'])?>"><button
                                                                type="button" class="btn btn-secondary btn-sm"
                                                                style="border-radius:15px">schedule</button>
                                                            <a type="button"
                                                                class="btn btn-secondary btn-sm btn-updateSection"
                                                                style="border-radius:15px;"
                                                                data-id="<?=$section_value['id'];?>"
                                                                data-section="<?=$section_value['section'];?>"
                                                                data-year_level="<?=$section_value['year_level'];?>">update</a>
                                                            <?= $this->include('admin/section/updatesection11')?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <?php endforeach;?>
                                    </table>
                                    <div class="card" style="border-radius:15px;">
                                        <a button type="button" class="btn btn-default"
                                            style="border-radius:15px;float:right; font-family:poppins; margin-bottom:; background-color:maroon; color: white;"
                                            data-toggle="modal" data-target="#new-section">New Section</button></a>
                                    </div>




                                    <div class="modal fade" id="new-section">
                                        <div class="modal-dialog" style="font-family:poppins">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Section Maintenance</h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="<?= base_url('newsection11'); ?>" method="post">
                                                        <?= csrf_field(); ?>
                                                        <div class="form-row">
                                                            <input type="hidden" name="strand_id" class="form-control"
                                                                value="<?=$strand?>">
                                                            <div class="form-group col-md-6">
                                                                <label for="inputSection">Section</label>
                                                                <input type="text" name="section" class="form-control"
                                                                    id="inputSection" placeholder="Section">
                                                                <span class="text-danger">
                                                                    <?= isset($validation) ? display_error($validation, 'section') : '' ?>
                                                                </span>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="inputYearLevel">Year Level</label>
                                                                <select class="form-control" id="studentStrand"
                                                                    name="year_level">

                                                                    <option type="text" class="form-control"
                                                                        id="year_level" placeholder="Year Level"
                                                                        value="<?=$year['year_level']?>">
                                                                        <?=$year['year_level']?></option>

                                                                </select>
                                                                <span class="text-danger">
                                                                    <?= isset($validation) ? display_error($validation, 'year_level') : '' ?>
                                                                </span>
                                                            </div>
                                                        </div>
                                                </div>
                                                <!-- Submit button -->
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-default"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                </div>
                                                </form>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    <!-- /.modal -->



                                </div>
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
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
document.addEventListener('DOMContentLoaded', function() {
    var sectionLink = document.getElementById('section-link');
    var sectionMenu = document.getElementById('section-menu');
    var currentURL = window.location.href;

    // Add 'active' class to section link if current URL matches
    if (currentURL.includes('section/') || currentURL.includes('section/')) {
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