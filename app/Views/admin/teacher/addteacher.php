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
                        <li class="nav-item" style="font-family:poppins;">
                            <a href="<?=base_url('/pre_enrolled_reg')?>" class="nav-link">
                                <i class="far fa-thin fa-newspaper"></i>
                                <p>Pre-Enrolled</p>
                            </a>
                        </li>
                        </li>
                        <li class="nav-item" style="font-family:poppins;">

                        <li class="nav-item" style="font-family:poppins;">

                            <a href="#" class="nav-link">
                                <i class="fa-sharp fa-solid fa-envelopes-bulk"></i>
                                <p>Section<i class="right fas fa-angle-left"></i></p>
                            </a>

                            <ul class="nav nav-treeview">
                                <?php if ($stat['status'] === "SHS"): ?>
                                <li class="nav-item">
                                    <a href="<?= site_url('section11/' . $year_levelOne['id']);?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Grade 11</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= site_url('section11/' . $year_levelTwo['id']);?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Grade 12</p>
                                    </a>
                                </li>
                                <?php else: ?>
                                <li class="nav-item">
                                    <a href="<?= site_url('section11/' . $year_levelOne['id']);?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>1st Year</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= site_url('section11/' . $year_levelTwo['id']);?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>2nd Year</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= site_url('section11/' . $year_levelThird['id']);?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>3rd Year</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= site_url('section11/' . $year_levelFourth['id']);?>" class="nav-link">
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
                                    <a href="<?= base_url('prospectus11/' . $year_levelOne['id'])?>" class="nav-link ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Grade 11</p>
                                    </a>
                                <li class="nav-item">
                                    <a href="<?= base_url('prospectus11/' . $year_levelTwo['id'])?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Grade 12</p>
                                    </a>
                                </li>
                                <?php else: ?>
                                <li class="nav-item">
                                    <a href="<?= base_url('prospectus11/' . $year_levelOne['id'])?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>1st Year</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('prospectus11/' . $year_levelTwo['id'])?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>2nd Year</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('prospectus11/' . $year_levelThird['id'])?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>3rd Year</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('prospectus11/' . $year_levelFourth['id'])?>"
                                        class="nav-link">
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
                                    <a href="<?= site_url('StudentGrading/' . $year_levelOne['id'])?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Grade 11</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= site_url('StudentGrading/' . $year_levelTwo['id'])?>" class="nav-link">
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
                                    <a href="<?= site_url('StudentGrading/' . $year_levelOne['id'])?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>1st Year</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= site_url('StudentGrading/' . $year_levelTwo['id'])?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>2nd Year</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= site_url('StudentGrading/' . $year_levelThird['id'])?>"
                                        class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>3rd Year</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= site_url('StudentGrading/' . $year_levelFourth['id'])?>"
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
                        <li class="nav-item" style="font-family:poppins;">
                        <li class="nav-item" style="font-family:poppins;">
                            <a href="<?=base_url('/newadmin')?>" class="nav-link">
                                <i class="fa-sharp fa-solid fa-envelopes-bulk"></i>
                                <p>Admin</p>
                            </a>
                        </li>
                        </li>
                        <li class="nav-item" style="font-family:poppins;">
                        <li class="nav-item" style="font-family:poppins;">
                            <a href="<?=base_url('/listofteacher')?>" class="nav-link active">
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
        <script src="<?= base_url()?>/dist/js/sweetalert.js"></script>
        <?php if(!empty(session()->getFlashdata('failedTeacher'))) : ?>
        <script>
        swal({
            title: "Duplicate Id.",
            text: "Teacher ID already exist.",
            icon: "warning",
            buttons: false,
            timer: 1000,
        });
        </script>
        <?php endif;?>

        <!-- Content Header (Page header) -->

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>
                            <class="a" style="color:maroon; font-family: 'Poppins';font-size: 22px"><strong>ADMIN
                                    REGISTRATION</strong>
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active" style="color:maroon;font-family: 'Poppins';">Admin</li>
                            <li class="breadcrumb-item active" style="font-family: 'Poppins';">Admin Registration</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->

        <div class="card-body">
            <div class="card card-primary card-outline mx-auto" style="width:100%; ">
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="<?= base_url('addNewTeacher'); ?>" method="post" enctype="multipart/form-data">
                        <div class="card-body p-0">
                            <div class="bs-stepper">
                                <div class="bs-stepper-header mx-auto" style="width:85%" role="tablist">
                                    <!-- your steps here -->
                                    <div class="step" data-target="#logins-part">
                                        <button type="button" class="step-trigger" role="tab"
                                            aria-controls="logins-part" id="logins-part-trigger">
                                            <span class="bs-stepper-circle" style="background-color:maroon;">1</span>
                                            <span class="bs-stepper-label"
                                                style="font-family:poppins;">Information</span>
                                        </button>
                                    </div>
                                    <div class="line" style="background-color:maroon;"></div>
                                    <div class="step" data-target="#information-part">
                                        <button type="button" class="step-trigger" role="tab"
                                            aria-controls="information-part" id="information-part-trigger">
                                            <span class="bs-stepper-circle" style="background-color:maroon;">2</span>
                                            <span class="bs-stepper-label"
                                                style="font-family:poppins;">Credentials</span>
                                        </button>
                                    </div>
                                </div>
                                <?php if(session()->has('validation')){
                    $errorFlash = session()->getFlashdata('validation');
                  } ?>
                                <div class="bs-stepper-content mx-auto" style="width:70%">


                                    <!-- your steps content here -->
                                    <div id="logins-part" class="content" role="tabpanel"
                                        aria-labelledby="logins-part-trigger">
                                        <br>
                                        <br>
                                        <br>
                                        <div class="form-group row" style="font-family: Poppins;">
                                            <img class="profile-user-img img-fluid img-circle"
                                                style="width:50px; height:50px;margin-left:30px; background-image:url(../../dist/img/profile.jpg); border-color:maroon; background-size:cover;">
                                            <div class="col-sm-10">
                                                <input type="file" name="profile_picture" class="form-control">
                                                <span
                                                    class="text-danger"><?= isset($errorFlash) ? display_error($errorFlash, 'profile_picture') : '' ?></span>
                                            </div>
                                        </div>

                                        <div class="form-group row" style="font-family: Poppins;">
                                            <label class="col-sm-2 col-form-label"
                                                style="font-family: Poppins;">Department</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" id="inputCivil" name="department">
                                                    <?php foreach($strand as $strands):?>
                                                    <option type="text" class="form-control"
                                                        style="font-family: Poppins;" id="inputCivil">
                                                        <?= $strands['strand']?>
                                                    </option>
                                                    <?php endforeach;?>
                                                    <option type="text" class="form-control"
                                                        style="font-family: Poppins;" id="inputCivil">
                                                        SHS
                                                    </option>
                                                    <option type="text" class="form-control"
                                                        style="font-family: Poppins;" id="inputCivil">
                                                        NONE
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row" style="font-family: Poppins;">
                                            <label class="col-sm-2 col-form-label" style="font-family: Poppins;">Last
                                                Name</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="lastname" class="form-control"
                                                    placeholder="Last Name">
                                                <span
                                                    class="text-danger"><?= isset($validation) ? display_error($validation, 'lastname') : '' ?></span>
                                            </div>
                                        </div>
                                        <div class="form-group row" style="font-family: Poppins;">
                                            <label class="col-sm-2 col-form-label" style="font-family: Poppins;">First
                                                Name</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="firstname" class="form-control"
                                                    placeholder="First Name">
                                                <span
                                                    class="text-danger"><?= isset($validation) ? display_error($validation, 'firstname') : '' ?></span>
                                            </div>
                                        </div>
                                        <div class="form-group row" style="font-family: Poppins;">
                                            <label class="col-sm-2 col-form-label" style="font-family: Poppins;">Middle
                                                Name</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="middlename" class="form-control"
                                                    placeholder="Middle Name">
                                                <span
                                                    class="text-danger"><?= isset($validation) ? display_error($validation, 'middlename') : '' ?></span>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-primary"
                                            style="float:right;font-family:poppins;background-color:maroon;border-color:maroon;border-radius:20px"
                                            onclick="stepper.next()">Next</button>

                                    </div>
                                </div>
                                <div class="bs-stepper-content mx-auto" style="width:70%">

                                    <div id="information-part" class="content" role="tabpanel"
                                        aria-labelledby="information-part-trigger">
                                        <div class="form-group row" style="font-family: Poppins;">
                                            <label class="col-sm-2 col-form-label"
                                                style="font-family: Poppins;">Designation</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="designation" class="form-control"
                                                    placeholder="E.g Instructor 1">
                                                <span
                                                    class="text-danger"><?= isset($validation) ? display_error($validation, 'teacher_id') : '' ?></span>
                                            </div>
                                        </div>
                                        <div class="form-group row" style="font-family: Poppins;">
                                            <label class="col-sm-2 col-form-label" style="font-family: Poppins;">Teacher
                                                ID</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="teacher_id" class="form-control"
                                                    placeholder="Teacher ID">
                                                <span
                                                    class="text-danger"><?= isset($validation) ? display_error($validation, 'teacher_id') : '' ?></span>
                                            </div>
                                        </div>
                                        <div class="form-group row" style="font-family: Poppins;">
                                            <label class="col-sm-2 col-form-label"
                                                style="font-family: Poppins;">Email</label>
                                            <div class="col-sm-10">
                                                <input type="email" name="teacherEmail" class="form-control"
                                                    placeholder="Email">
                                                <span
                                                    class="text-danger"><?= isset($validation) ? display_error($validation, 'teacherEmail') : '' ?></span>
                                            </div>
                                        </div>
                                        <div class="form-group row" style="font-family: Poppins;">
                                            <label class="col-sm-2 col-form-label"
                                                style="font-family: Poppins;">Password</label>
                                            <div class="col-sm-10">
                                                <input type="password" name="teacherPassword" class="form-control"
                                                    placeholder="Password">
                                                <span
                                                    class="text-danger"><?= isset($validation) ? display_error($validation, 'teacherPassword') : '' ?></span>
                                            </div>
                                        </div>
                                        <div class="a" style="float:right;">
                                            <button type="button" class="btn btn-primary"
                                                style="font-family:poppins;background-color:maroon;border-color:maroon;border-radius:20px"
                                                onclick="stepper.previous()">Previous</button>
                                            <button type="submit" class="btn btn-primary"
                                                style="font-family:poppins;background-color:maroon;border-color:maroon;border-radius:20px">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->

                        </div>
                    </form>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
    <!-- /.card-body -->
    </div>
    </div>
    </div>
    <!-- /.content -->
    </section>
</body>
<?= $this->include('admin/include/end')?>
<?= $this->include('admin/include/footer')?>