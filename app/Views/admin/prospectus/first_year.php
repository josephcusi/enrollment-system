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
                            <a href="<?=base_url('/studreq')?>" class="nav-link">
                                <i class="fa-sharp fa-solid fa-envelopes-bulk"></i>
                                <p>Student Request</p>
                            </a>
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
                                    <a href="<?= base_url('pre-enrolled-registration/4th-Year')?>"
                                        class="nav-link">
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
                                    <a href="<?= base_url('section/4th-Year')?>"
                                        class="nav-link">
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
                                    Prospectus
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" id="section-menu">
                                <?php if ($stat['status'] === "SHS"): ?>
                                <li class="nav-item year-level-nav-item">
                                    <a href="<?= site_url('prospectus/Grade-11') ;?>"
                                        class="nav-link <?= (strpos(current_url(), 'prospectus/Grade-11') !== false) ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Grade 11</p>
                                    </a>
                                </li>
                                <li class="nav-item year-level-nav-item">
                                    <a href="<?= site_url('prospectus/Grade-12') ;?>"
                                        class="nav-link <?= (strpos(current_url(), 'prospectus/Grade-12') !== false) ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Grade 12</p>
                                    </a>
                                </li>
                                <?php else: ?>
                                <li class="nav-item year-level-nav-item">
                                    <a href="<?= site_url('prospectus/1st-Year') ;?>"
                                        class="nav-link <?= (strpos(current_url(), 'prospectus/1st-Year') !== false) ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>1st Year</p>
                                    </a>
                                </li>
                                <li class="nav-item year-level-nav-item">
                                    <a href="<?= site_url('prospectus/2nd-Year') ;?>"
                                        class="nav-link <?= (strpos(current_url(), 'prospectus/2nd-Year') !== false) ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>2nd Year</p>
                                    </a>
                                </li>
                                <li class="nav-item year-level-nav-item">
                                    <a href="<?= site_url('prospectus/3rd-Year') ;?>"
                                        class="nav-link <?= (strpos(current_url(), 'prospectus/3rd-Year') !== false) ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>3rd Year</p>
                                    </a>
                                </li>
                                <li class="nav-item year-level-nav-item">
                                    <a href="<?= site_url('prospectus/4th-Year') ;?>"
                                        class="nav-link <?= (strpos(current_url(), 'prospectus/4th-Year') !== false) ? 'active' : '' ?>">
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
                                    <a href="<?= base_url('student-grading/4th-Year')?>"
                                        class="nav-link">
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
        <?php if(!empty(session()->getFlashdata('updateprospectus'))) : ?>
        <script>
        swal({
            title: "Updated Successfully!",
            text: "Changes has made.",
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
            title: "Subject Added!",
            text: "You successfully added subject.",
            icon: "success",
            buttons: false,
            timer: 1000,
        });
        </script>
        <?php endif ?>


        <?php if(!empty(session()->getFlashdata('notupdatesection'))) : ?>
        <script>
        swal({
            title: "An Error Accured!",
            text: "Please try another.",
            icon: "warning",
            buttons: false,
            timer: 1000,
        });
        </script>
        <?php endif ?>

        <?php if(!empty(session()->getFlashdata('dupli'))) : ?>
        <script>
        swal({
            title: "Duplicate input!",
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
                            <class="a" style="color:maroon; font-family: 'Poppins';font-size: 22px">
                                <strong>PROSPECTUS / <?= $yearlvl?></strong>
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active" style="color:maroon;font-family: 'Poppins';">Admin</li>
                            <li class="breadcrumb-item active" style="font-family: 'Poppins';">Prospectus</li>
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


                        <div class="card card-primary card-outline"  style="font-family:poppins;font-weight:bold;">
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
                                            href="<?= base_url('prospectus/'.  $yearlvl . '/' . 'GAS')?>">GAS</a>
                                    </li>
                                    <li class="nav-item"><a type="button"
                                            class="tablinks nav-link <?php if($strand == 'CSS'){echo 'active';} ?>"
                                            style="border-radius:20px" id="defaultOpen "
                                            href="<?= base_url('prospectus/'.  $yearlvl . '/' . 'CSS')?>">CSS</a>
                                    </li>
                                    <li class="nav-item"><a type="button"
                                            class="tablinks nav-link <?php if($strand == 'HUMSS'){echo 'active';} ?>"
                                            style="border-radius:20px" id="defaultOpen "
                                            href="<?= base_url('prospectus/'.  $yearlvl . '/' . 'HUMSS')?>">HUMSS</a>
                                    </li>
                                    <li class="nav-item"><a type="button"
                                            class="tablinks nav-link <?php if($strand == 'SMAW'){echo 'active';} ?>"
                                            style="border-radius:20px" id="defaultOpen "
                                            href="<?= base_url('prospectus/'.  $yearlvl . '/' . 'SMAW')?>">SMAW</a>
                                    </li>
                                    <?php else:?>
                                    <?php $strand = session()->getFlashdata('strand');?>
                                    <li class="nav-item"><a type="button"
                                            class="tablinks nav-link <?php if($strand == 'ABH'){echo 'active' ;} ?>"
                                            style="border-radius:20px" id="defaultOpen"
                                            href="<?= base_url('prospectus/'. $yearlvl . '/' .'ABH')?>">ABH</a>
                                    </li>
                                    <li class="nav-item"><a type="button"
                                            class="tablinks nav-link <?php if($strand == 'BPA'){echo 'active' ;} ?>"
                                            style="border-radius:20px" id="defaultOpen"
                                            href="<?= base_url('prospectus/'. $yearlvl . '/' .'BPA')?>">BPA</a>
                                    </li>
                                    <li class="nav-item"><a type="button"
                                            class="tablinks nav-link <?php if($strand == 'BTVTED'){echo 'active' ;} ?>"
                                            style="border-radius:20px" id="defaultOpen"
                                            href="<?= base_url('prospectus/'. $yearlvl . '/' .'BTVTED')?>">BTVTED</a>
                                    </li>
                                    <?php endif;?>
                                </ul>
                                </ul>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <!-- About Me Box -->


                       <div class="card card-primary card-outline"  style="font-family:poppins;font-weight:bold;">
                    <div class="card-body box-profile">
                        <div class="text-center"></div>
                        <p class="text-muted text-left">Total/s</p>
                        <ul class="list-group list-group-unbordered mb-3 nav nav-pills">
                            <?php
                            $totalSubjects = 0;
                            $totalUnits = 0;
                            ?>
                            <?php foreach ($prospectus as $prospect):
                                $test = 'N/A'; // Initialize $test with a default value
                                foreach ($subAll as $suball) {
                                    if ($suball['id'] == $prospect['pre_requisit']) {
                                        $test = isset($suball['subject']) ? $suball['subject'] : 'N/A';
                                        break; // Break the loop once the prerequisite subject is found
                                    }
                                }

                                // Increment the total subjects count
                                $totalSubjects++;

                                // Add the current subject's units to the total units count
                                $totalUnits += $prospect['unit'];
                            ?>
                             

                            <?php endforeach; ?>

                            <li class="nav-item">
                                <a type="text" style="border-radius:20px; font-family:poppins;font-weight:bold;">Total Courses: <?= $totalSubjects ?></a>
                            </li>
                            <br>
                            <li class="nav-item">
                                <a type="text" style="border-radius:20px;font-family:poppins">Total Units: <?= $totalUnits ?></a>
                            </li>

                        </ul>
                    </div>
                    <!-- /.card-body -->
                </div>

                <!-- /.card -->
            </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="card card-primary card-outline mx-auto" style=" ">
                            <div class="card-body">


                                <div id="abh" class="tabcontent">
                                    <table id="example1" class="table table-bordered table" style="font-family:poppins">
                                        <thead>
                                            <tr>
                                                <th>Course Code</th>
                                                <th>Title</th>
                                                <th>Unit</th>
                                                <th>Pre-Requisite</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                        <?php foreach ($prospectus as $prospect):
                                            $test = 'N/A'; // Initialize $test with a default value
                                            foreach ($subAll as $suball) {
                                                if ($suball['id'] == $prospect['pre_requisit']) {
                                                    $test = isset($suball['subject']) ? $suball['subject'] : 'N/A';
                                                    break; // Break the loop once the prerequisite subject is found
                                                }
                                            }
                                        ?>
                                            <tr>
                                                <td><?= $prospect['subject'] ?></td>
                                                <td><?= $prospect['subject_title'] ?></td>
                                                <td><?= $prospect['unit'] ?></td>
                                                <td><?= $test ?></td>
                                                <td>
                                                    <a href="#">
                                                        <button type="button" class="btn btn-secondary btn-sm btn-updateProspectus" style="border-radius:15px;" data-id="<?= $prospect['id'] ?>" data-subject="<?= $prospect['subject'] ?>" data-strand_id="<?= $prospect['strand_id'] ?>" data-subject_title="<?= $prospect['subject_title'] ?>" data-unit="<?= $prospect['unit'] ?>" data-pre_requisit="<?= $prospect['pre_requisit'] ?>" data-year_level="<?= $prospect['year_level'] ?>" data-semester="<?= $prospect['semester'] ?>">update</button>
                                                    </a>
                                                    <?= $this->include('admin/prospectus/updateprospectus11') ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>

                                        </tbody>

                                    </table>
                                </div>
                                <div class="card" style="border-radius:15px">
                                    <a class="btn btn-default btn-edit"
                                        style="border-radius:15px;float:right; font-family:poppins; background-color:maroon; color: white;"
                                        data-toggle="modal" data-target="#newSubject">New Course</a>
                                </div>
                                <div>
                                    <div>
                                        <div class="modal fade subjectmodal" id="newSubject">
                                            <div class="modal-dialog" style="font-family:poppins">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" style="font-family:poppins">Subject
                                                            Maintenance</h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="<?= base_url('/addprospectus11'); ?>"
                                                            method="post">
                                                            <?= csrf_field(); ?>

                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <input type="hidden" name="strand"
                                                                        class="form-control" value="<?= $strand ?>">

                                                                    <label for="inputSubject">Course Code</label>

                                                                    <input type="text" name="subject"
                                                                        class="form-control" id="inputSubject"
                                                                        placeholder="Subject">
                                                                    <span class="text-danger">
                                                                        <?= isset($validation) ? display_error($validation, 'subject') : '' ?>
                                                                    </span>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="inputTitle">Title</label>
                                                                    <input type="text" name="title" class="form-control"
                                                                        id="inputTitle" placeholder="Title">
                                                                    <span class="text-danger">
                                                                        <?= isset($validation) ? display_error($validation, 'title') : '' ?>
                                                                    </span>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="inputUnit">Unit</label>
                                                                    <input type="text" name="unit" class="form-control"
                                                                        id="inputUnit" placeholder="Unit">
                                                                    <span class="text-danger">
                                                                        <?= isset($validation) ? display_error($validation, 'unit') : '' ?>
                                                                    </span>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="PreRequisit">Pre-requisit</label>
                                                                    <select class="form-control" id="studentStrand"
                                                                        name="pre_requisit">
                                                                        <option type="text" class="form-control" id="semester"
                                            placeholder="1st Semester" value="N/A">N/A
                                        </option>
                                                                        <?php foreach($sub as $newSub):?>
                                                                        <option type="text" class="form-control"
                                                                            id="semester" placeholder="1st Semester"
                                                                            value="<?= $newSub['id']?>">
                                                                            <?= $newSub['subject']?>
                                                                        </option>
                                                                        <?php endforeach;?>
                                                                    </select>
                                                                    <span class="text-danger">
                                                                        <?= isset($validation) ? display_error($validation, 'pre_requisit') : '' ?>
                                                                    </span>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="year_level">Year Level</label>
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
                                                                <div class="form-group col-md-6">
                                                                    <label for="semester">Semester</label>
                                                                    <select class="form-control" id="studentStrand"
                                                                        name="semester">
                                                                        <option type="text" class="form-control"
                                                                            id="semester" placeholder="1st Semester"
                                                                            value="<?= $sem_year['semester']?>">
                                                                            <?= $sem_year['semester']?></option>
                                                                    </select>
                                                                    <span class="text-danger">
                                                                        <?= isset($validation) ? display_error($validation, 'semester') : '' ?>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                    </div>
                                                    <!-- Submit button -->
                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-default"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save
                                                            changes</button>
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
                            </div>
                        </div>
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
    document.addEventListener('DOMContentLoaded', function () {
        var sectionLink = document.getElementById('section-link');
        var sectionMenu = document.getElementById('section-menu');
        var currentURL = window.location.href;

        // Add 'active' class to section link if current URL matches
        if (currentURL.includes('prospectus/') || currentURL.includes('strandProspectus11/')) {
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