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
                        <li class="nav-item menu-open" style="font-family: poppins;">
                            <a href="tae.html" class="nav-link active" id="section-link">
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
                                        class="nav-link <?= (strpos(current_url(), 'viewPreEnroll/Grade-11') !== false) ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Grade 11</p>
                                    </a>
                                </li>
                                <li class="nav-item year-level-nav-item">
                                    <a href="<?= site_url('pre-enrolled-registration/Grade-12') ;?>"
                                        class="nav-link <?= (strpos(current_url(), 'viewPreEnroll/Grade-12') !== false) ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Grade 12</p>
                                    </a>
                                </li>
                                <?php else: ?>
                                <li class="nav-item year-level-nav-item">
                                    <a href="<?= site_url('pre-enrolled-registration/1st-Year') ;?>"
                                        class="nav-link <?= (strpos(current_url(), 'viewPreEnroll/1st-Year') !== false) ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>1st Year</p>
                                    </a>
                                </li>
                                <li class="nav-item year-level-nav-item">
                                    <a href="<?= site_url('pre-enrolled-registration/2nd-Year') ;?>"
                                        class="nav-link <?= (strpos(current_url(), 'viewPreEnroll/2nd-Year') !== false) ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>2nd Year</p>
                                    </a>
                                </li>
                                <li class="nav-item year-level-nav-item">
                                    <a href="<?= site_url('pre-enrolled-registration/3rd-year') ;?>"
                                        class="nav-link <?= (strpos(current_url(), 'viewPreEnroll/3rd-year') !== false) ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>3rd Year</p>
                                    </a>
                                </li>
                                <li class="nav-item year-level-nav-item">
                                    <a href="<?= site_url('pre-enrolled-registration/4th-Year') ;?>"
                                        class="nav-link <?= (strpos(current_url(), 'viewPreEnroll/4th-Year') !== false) ? 'active' : '' ?>">
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

                    </ul>
                    </li>

                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

    </div>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.css">
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <br>
        <!-- Main content -->
        <section class="content-header">
            <div class="card card-primary card-outline mx-auto" style="width:98%;font-family:poppins;">

                <!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-pane" id="address">
                        <form class="form-horizontal" action="#" method="post">
                            <p class="a" style="font-size:1.5em; font-family: Poppins;color:maroon;">Pre-Enrollment Info
                            </p>
                            <div class="form-group row">
                                <label for="Strand" class="col-sm-2 col-form-label">Program</label>
                                <div class="col-sm-3">
                                    <div>
                                        <input type="text" name="Strand" class="form-control" id="Strand"
                                            value="<?=$enrolled[0]['strand'];?>" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="yearLevel" class="col-sm-2 col-form-label">Year Level</label>
                                <div class="col-sm-3">
                                    <input type="text" name="yearLevel" class="form-control" id="yearLevel"
                                        value="<?=$enrolled[0]['year_level'];?>" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="semester" class="col-sm-2 col-form-label">Semester</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="semester" id="semester"
                                        value="<?=$enrolled[0]['semester'];?>" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="schoolyear" class="col-sm-2 col-form-label">School Year</label>
                                <div class="col-sm-3">
                                    <input type="text" name="schoolyear" class="form-control" id="schoolyear"
                                        value="<?=$enrolled[0]['year'];?>" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="date" class="col-sm-2 col-form-label">Date</label>
                                <div class="col-sm-3">
                                    <input type="text" name="date" class="form-control" id="date"
                                        value="<?=$enrolled[0]['student_created_at'];?>" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="status" class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-3">
                                    <input type="text" name="status" class="form-control" id="status"
                                        value="<?=$enrolled[0]['state'];?>" disabled>
                                </div>
                            </div>
                    </div>

                    <p class="a" style="font-size:1.5em; font-family: Poppins;color:maroon;">Student Info</p>
                    <div class="form-group row">
                        <label for="fullname" class="col-sm-2 col-form-label">Full Name</label>
                        <div class="col-sm-3">
                            <div>
                                <input type="text" name="fullname" class="form-control" id="fullname"
                                    value="<?=$enrolled[0]['firstname'];?><?=" "?><?=$enrolled[0]['middlename'];?><?=" "?><?=$enrolled[0]['lastname'];?>"
                                    disabled>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="gender" class="col-sm-2 col-form-label">Gender</label>
                        <div class="col-sm-3">
                            <input type="text" name="gender" class="form-control" id="gender"
                                value="<?=$enrolled[0]['gender'];?>" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="birthday" class="col-sm-2 col-form-label">Birthday</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="birthday" id="birthday"
                                value="<?=$enrolled[0]['birthday'];?>" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="birthplace" class="col-sm-2 col-form-label">Birthplace</label>
                        <div class="col-sm-3">
                            <input type="text" name="birthplace" class="form-control" id="birthplace"
                                value="<?=$enrolled[0]['birthplace'];?>" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputCivil" class="col-sm-2 col-form-label">Civil Status</label>
                        <div class="col-sm-3">
                            <input type="text" name="inputCivil" class="form-control" id="inputCivil"
                                value="<?=$enrolled[0]['civil_status'];?>" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="religion" class="col-sm-2 col-form-label">Religion</label>
                        <div class="col-sm-3">
                            <input type="text" name="religion" class="form-control" id="religion"
                                value="<?=$enrolled[0]['religion'];?>" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nationality" class="col-sm-2 col-form-label">Nationality</label>
                        <div class="col-sm-3">
                            <input type="text" name="nationality" class="form-control" id="nationality"
                                value="<?=$enrolled[0]['nationality'];?>" disabled>
                        </div>
                    </div>
                    <style>
                    table {
                        border-collapse: collapse;
                        width: 100%;
                        margin-top: 20px;
                        margin-bottom: 20px;
                        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                    }

                    table td,
                    table th {
                        border: 1px solid #ddd;
                        padding: 8px;
                        text-align: center;
                    }

                    table th {
                        background-color: #f2f2f2;

                        color: black;

                    }

                    @media screen and (max-width: 768px) {
                        .container {
                            padding: 10px;
                        }

                        header {
                            padding: 10px;
                        }

                        table td,
                        table th {
                            font-size: 14px;
                        }
                    }
                    </style>
                    <p class="a" style="font-size:1.5em; font-family: Poppins;color:maroon;">Courses</p>
                    <table>
                        <thead>
                            <tr>
                                <th>Course</th>
                                <th>Course Description</th>
                                <th>Unit</th>
                                <th>Pre-Requisite</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $ids = explode(",", $id['subject_ids']);
                            foreach($subject as $sub):
                                foreach($ids as $id) :
                                    if($id == $sub['id']):

                                        $test = 'N/A'; // Initialize $test with a default value
                                        foreach ($subAll as $suball) {
                                            if ($suball['id'] == $sub['pre_requisit']) {
                                                $test = isset($suball['subject']) ? $suball['subject'] : 'N/A';
                                                break; // Break the loop once the prerequisite subject is found
                                            }
                                        }
                            ?>
                            <tr>
                                <td><?= $sub['subject'];?></td>
                                <td><?= $sub['subject_title'];?></td>
                                <td><?= $sub['unit'];?></td>
                                <td><?= $test;?></td>
                            </tr>
                            <?php endif; endforeach; endforeach;?>
                        </tbody>
                
                    </table>
                    <div class="modal-footer justify-content-between">
                        <span><button type="button" class="btn btn-default"
                                style=" font-family:poppins; margin-bottom:; background-color:Green; color: white;"
                                data-toggle="modal" data-target="#enroll">Enroll</button>
                            <a href="#" id="reject-link" data-idd="<?=$enrolled[0]['id']?>">
                                <button type="button" class="btn btn-default"
                                    style="font-family:poppins; margin-bottom:; background-color:red; color: white;">Reject</button>
                            </a>
                    </div>
                    </form>
                    <?php include 'modal/enroll.php';?>
                </div>
            </div>
            <!-- /.card-body -->
    </div>
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
    if (currentURL.includes('pre-enrolled-registration/') || currentURL.includes('viewPreEnroll/')) {
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
<!-- Dapat ay naka-include ang mga sumusunod sa iyong HTML -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<script>
$(document).ready(function() {
    $('#reject-link').on('click', function() {
        const idd = this.getAttribute('data-idd');

        // Use SweetAlert to prompt the user for the reason
        Swal.fire({
            title: 'Reject Student ?',
            html: '<input type="text" id="swal-reason-input" class="swal2-input" placeholder="Reason for rejection">',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'OK',
            cancelButtonText: 'Cancel',
            preConfirm: function() {
                // Access the value of the input field in SweetAlert
                return document.getElementById('swal-reason-input').value;
            }
        }).then(function(result) {
            if (result.isConfirmed) {
                // Access the value of the input field
                const rejectionReason = result.value;

                // Perform your action with both idd and rejectionReason
                window.location.href = "<?= base_url('rejected') ?>" + '/' + idd + '?reason=' +
                    rejectionReason;
            }
        });
    });
});
</script>




<script>
const checkAll = document.querySelector('#checkAll');
const checkboxes = document.querySelectorAll('input[name="subject_string_ids[]"]');

checkAll.addEventListener('click', () => {
    checkboxes.forEach(checkbox => {
        checkbox.checked = checkAll.checked;
    });
});
</script>