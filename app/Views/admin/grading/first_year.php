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
                        <li class="nav-item menu-open" style="font-family:poppins;">

                            <a href="#" class="nav-link active">
                                <i class="fa-sharp fa-solid fa-envelopes-bulk"></i>
                                <p>Grading<i class="right fas fa-angle-left"></i></p>
                            </a>

                            <ul class="nav nav-treeview" id="section-menu">
                                <?php if ($stat['status'] === "SHS"): ?>
                                <li class="nav-item year-level-nav-item">
                                    <a href="<?= site_url('student-grading/Grade-11') ;?>"
                                        class="nav-link <?= (strpos(current_url(), 'student-grading/Grade-11') !== false) ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Grade 11</p>
                                    </a>
                                </li>
                                <li class="nav-item year-level-nav-item">
                                    <a href="<?= site_url('student-grading/Grade-12') ;?>"
                                        class="nav-link <?= (strpos(current_url(), 'student-grading/Grade-12') !== false) ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Grade 12</p>
                                    </a>
                                </li>
                                <?php else: ?>
                                <li class="nav-item">
                                    <a href="<?= base_url('/deadline_form') ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Submission of Grade</p>
                                    </a>
                                </li>
                                <li class="nav-item year-level-nav-item">
                                    <a href="<?= site_url('student-grading/1st-Year') ;?>"
                                        class="nav-link <?= (strpos(current_url(), 'student-grading/1st-Year') !== false) ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>1st Year</p>
                                    </a>
                                </li>
                                <li class="nav-item year-level-nav-item">
                                    <a href="<?= site_url('student-grading/2nd-Year') ;?>"
                                        class="nav-link <?= (strpos(current_url(), 'student-grading/2nd-Year') !== false) ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>2nd Year</p>
                                    </a>
                                </li>
                                <li class="nav-item year-level-nav-item">
                                    <a href="<?= site_url('student-grading/3rd-Year') ;?>"
                                        class="nav-link <?= (strpos(current_url(), 'student-grading/3rd-Year') !== false) ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>3rd Year</p>
                                    </a>
                                </li>
                                <li class="nav-item year-level-nav-item">
                                    <a href="<?= site_url('student-grading/4th-Year') ;?>"
                                        class="nav-link <?= (strpos(current_url(), 'student-grading/4th-Year') !== false) ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>4th Year</p>
                                    </a>
                                </li>
                                <?php endif; ?>
                            </ul>
                        </li>
                        <li class="nav-item" style="font-family:poppins;">
                            <a href="<?=base_url('/retrieve_strand')?>" class="nav-link">
                                <i class="fa-sharp fa-solid fa-envelopes-bulk"></i>
                                <p>Program</p>
                            </a>
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
        swal("Updated Successfully!", "Changes has made.", "success");
        </script>
        <?php endif ?>

        <script src="<?= base_url()?>/dist/js/sweetalert.js"></script>
        <?php if(!empty(session()->getFlashdata('subjectadded'))) : ?>
        <script>
        swal("Section Added!", "You successfully added section.", "success");
        </script>
        <?php endif ?>

        <?php if(!empty(session()->getFlashdata('notupdatesection'))) : ?>
        <script>
        swal("Duplicate Input!", "Please try another.", "warning");
        </script>
        <?php endif ?>
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>
                            <class="a" style="color:maroon; font-family: 'Poppins';font-size: 22px"><strong>GRADING /
                                    <?= $yearlvl?></strong>
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
                                            href="<?= base_url('student-grading/'. $yearlvl . '/' . 'GAS')?>">GAS</a>
                                    </li>
                                    <li class="nav-item"><a type="button"
                                            class="tablinks nav-link <?php if($strand == 'CSS'){echo 'active';} ?>"
                                            style="border-radius:20px" id="defaultOpen "
                                            href="<?= base_url('student-grading/'. $yearlvl . '/' . 'CSS')?>">CSS</a>
                                    </li>
                                    <li class="nav-item"><a type="button"
                                            class="tablinks nav-link <?php if($strand == 'HUMSS'){echo 'active';} ?>"
                                            style="border-radius:20px" id="defaultOpen "
                                            href="<?= base_url('student-grading/'. $yearlvl . '/' . 'HUMSS')?>">HUMSS</a>
                                    </li>
                                    <li class="nav-item"><a type="button"
                                            class="tablinks nav-link <?php if($strand == 'SMAW'){echo 'active';} ?>"
                                            style="border-radius:20px" id="defaultOpen "
                                            href="<?= base_url('student-grading/'. $yearlvl . '/' . 'SMAW')?>">SMAW</a>
                                    </li>
                                    <?php else:?>
                                    <?php $strand = session()->getFlashdata('strand');?>
                                    <li class="nav-item"><a type="button"
                                            class="tablinks nav-link <?php if($strand == 'ABH'){echo 'active' ;} ?>"
                                            style="border-radius:20px" id="defaultOpen"
                                            href="<?= base_url('student-grading/'.$yearlvl . '/' .'ABH')?>">ABH</a>
                                    </li>
                                    <li class="nav-item"><a type="button"
                                            class="tablinks nav-link <?php if($strand == 'BPA'){echo 'active' ;} ?>"
                                            style="border-radius:20px" id="defaultOpen"
                                            href="<?= base_url('student-grading/'.$yearlvl . '/' .'BPA')?>">BPA</a>
                                    </li>
                                    <li class="nav-item"><a type="button"
                                            class="tablinks nav-link <?php if($strand == 'BTVTED'){echo 'active' ;} ?>"
                                            style="border-radius:20px" id="defaultOpen"
                                            href="<?= base_url('student-grading/'.$yearlvl . '/' .'BTVTED')?>">BTVTED</a>
                                    </li>
                                    <?php endif;?>
                                </ul>
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
                        <div class="card card-primary card-outline mx-auto" style="">
                            <div class="card-body">

                                <div id="bpa" class="tabcontent">
                                    <table id="example1" class="table table-bordered table" style="font-family:poppins">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th><?= $sem_year['semester']?></th>
                                                <th>Remarks</th>
                                                <th>Actions</th>
                                            </tr>
                                            <thead>
                                            <tbody>
                                                <?php foreach($grade as $stud_grade):?>

                                                <tr>
                                                    <td><?= $stud_grade['firstname'] . ' ' . $stud_grade['middlename'] . ' ' . $stud_grade['lastname']?>
                                                    </td>
                                                    <td><?= $stud_grade['total_grading'] ? number_format($stud_grade['total_grading'], 2) : "NONE";?>
                                                    </td>
                                                    <td>
                                                        <?php if(empty($stud_grade['overall_remark'])):?>
                                                        NONE
                                                        <?php elseif($stud_grade['overall_remark'] == '1'):?>
                                                        PASSED
                                                        <?php else:?>
                                                        FAILED
                                                        <?php endif;?>
                                                    </td>
                                                    <td>
                                                        <a
                                                            href="<?= site_url('studentGrade/' . $yearlvl . '/' . $stud_grade['strand'] . '/' . $stud_grade['lrn'])?>">
                                                            <button type="submit"
                                                                class="btn btn-secondary btn-sm btn-updateGrade"
                                                                style="border-radius:15px;">View</button></a>
                                                        </a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <?php endforeach;?>
                                    </table>
                                </div>
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
    if (currentURL.includes('student-grading/') || currentURL.includes('studentGrade/')) {
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