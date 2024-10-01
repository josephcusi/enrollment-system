<?= $this->include('teacher/include/top')?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <?= $this->include('teacher/include/navbar')?>
        <aside class="main-sidebar sidebar-dark-secondary elevation-8">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
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

                        <li class="nav-header" style="font-family:poppins;">Teacher</li>
                        <br>

                        <li class="nav-item" style="font-family:poppins;">
                            <a href="<?=base_url('teacher_profile')?>" class="nav-link active">
                                <i class="nav-icon fa-solid fa-user"></i>
                                <p>Teacher</p>
                            </a>
                        </li>
                        <li class="nav-item" style="font-family:poppins;">

                            <a href="#" class="nav-link">
                                <i class="fa-sharp fa-solid fa-envelopes-bulk"></i>
                                <p>Section<i class="right fas fa-angle-left"></i></p>
                            </a>

                            <ul class="nav nav-treeview">
                                <?php if ($stat['status'] === "SHS"): ?>
                                <li class="nav-item">
                                    <a href="<?= site_url('student_grading/Grade-11')?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Grade 11</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= site_url('student_grading/Grade-12')?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Grade 12</p>
                                    </a>
                                </li>
                                <?php else: ?>
                                <li class="nav-item">
                                    <a href="<?= site_url('student_grading/1st-Year')?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>1st Year</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= site_url('student_grading/2nd-Year')?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>2nd Year</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= site_url('student_grading/3rd-Year')?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>3rd Year</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= site_url('student_grading/4th-Year')?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>4th Year</p>
                                    </a>
                                </li>
                                <?php endif; ?>
                            </ul>
                        </li>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

    </div>
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->

        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <?php if (!empty(session()->getFlashdata('error'))) : ?>
        <script>
        swal({
            title: "Error!",
            text: "Check your inputed data.",
            icon: "error",
            timer: 2000,
            buttons: false
        });
        </script>
        <?php endif ?>
        <?php if (!empty(session()->getFlashdata('old'))) : ?>
        <script>
        swal({
            title: "Opppsss!",
            text: "Your old password is incorrect.",
            icon: "warning",
            timer: 2000,
            buttons: false
        });
        </script>
        <?php endif ?>
        <?php if (!empty(session()->getFlashdata('updated'))) : ?>
        <script>
        swal({
            title: "Successfuly Updated!",
            text: "You successfuly updated your data.",
            icon: "success",
            timer: 2000,
            buttons: false
        });
        </script>
        <?php endif ?>
        <?php if (!empty(session()->getFlashdata('match'))) : ?>
        <script>
        swal({
            title: "Opppsss!",
            text: "Your password do not match.",
            icon: "warning",
            timer: 2000,
            buttons: false
        });
        </script>
  <?php endif ?>



        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>
                            <class="a" style="color:maroon; font-family: 'Poppins';font-size: 22px">
                                <strong>TEACHER</strong>
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active" style="color:maroon;font-family: 'Poppins';">Teacher</li>
                            <li class="breadcrumb-item active" style="font-family: 'Poppins';"><?= $view[0]['lrn']?></li>
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
                    <div class="card-body p-0">
                        <div class="bs-stepper">
                            <div class="bs-stepper-header mx-auto" style="width:85%" role="tablist">
                                <!-- your steps here -->
                                <div class="step" data-target="#logins-part">
                                    <button type="button" class="step-trigger" role="tab" aria-controls="logins-part"
                                        id="logins-part-trigger">
                                        <span class="bs-stepper-circle" style="background-color:maroon;">1</span>
                                        <span class="bs-stepper-label" style="font-family:poppins;">Information</span>
                                    </button>
                                </div>
                                <div class="line" style="background-color:maroon;"></div>
                                <div class="step" data-target="#information-part">
                                    <button type="button" class="step-trigger" role="tab"
                                        aria-controls="information-part" id="information-part-trigger">
                                        <span class="bs-stepper-circle" style="background-color:maroon;">2</span>
                                        <span class="bs-stepper-label" style="font-family:poppins;">Credentials</span>
                                    </button>
                                </div>
                            </div>
                            <div class="bs-stepper-content mx-auto" style="width:70%">


                                <!-- your steps content here -->
                                <div id="logins-part" class="content" role="tabpanel"
                                    aria-labelledby="logins-part-trigger">
                                    <br>
                                    <br>
                                    <br>
                                    <div class="form-group row" style="font-family: Poppins;">
                                        <div class="col-sm-2">
                                            <div class="rounded-circle img-circle-wrapper">
                                                <img  style="width: 200px; height: 200px; margin: 1 auto;margin-left:250%;background-image:url(../../dist/img/profile.jpg);border-radius:50%;border: 2px solid #800000; background-size:cover; background-size: cover;" src="<?= base_url().'/'.'teacher-profile/'. $view[0]['department'] . '/' . $view[0]['email'] . '/' . $view[0]['profile_picture'] ?>">
                                                
                                            </div>
                                        </div>
                                        <div class="col-sm-9">
                                            <span
                                                class="text-danger"><?= isset($validation) ? display_error($validation, 'profile_picture') : '' ?></span>
                                        </div>
                                    </div>

                                    <div class="form-group row" style="font-family: Poppins;">
                                        <label class="col-sm-2 col-form-label" style="font-family: Poppins;">Last
                                            Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="lastname" class="form-control"
                                                placeholder="Last Name" value="<?= $view[0]['lastname']?>" disabled>
                                            <span
                                                class="text-danger"><?= isset($validation) ? display_error($validation, 'lastname') : '' ?></span>
                                        </div>
                                    </div>
                                    <div class="form-group row" style="font-family: Poppins;">
                                        <label class="col-sm-2 col-form-label" style="font-family: Poppins;">First
                                            Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="firstname" class="form-control"
                                                placeholder="First Name" value="<?= $view[0]['firstname']?>" disabled>
                                            <span
                                                class="text-danger"><?= isset($validation) ? display_error($validation, 'firstname') : '' ?></span>
                                        </div>
                                    </div>
                                    <div class="form-group row" style="font-family: Poppins;">
                                        <label class="col-sm-2 col-form-label" style="font-family: Poppins;">Middle
                                            Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="middlename" class="form-control"
                                                placeholder="Middle Name" value="<?= $view[0]['middlename']?>" disabled>
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
                                            style="font-family: Poppins;">Department</label>
                                        <div class="col-sm-9">
                                            <input type="email" name="adminEmail" class="form-control"
                                                placeholder="Email" value="<?= $view[0]['department']?>" disabled>
                                            <span
                                                class="text-danger"><?= isset($validation) ? display_error($validation, 'adminEmail') : '' ?></span>
                                        </div>
                                    </div>
                                    <div class="form-group row" style="font-family: Poppins;">
                                        <label class="col-sm-2 col-form-label"
                                            style="font-family: Poppins;">Teacher ID</label>
                                        <div class="col-sm-9">
                                            <input type="email" name="adminEmail" class="form-control"
                                                placeholder="Email" value="<?= $view[0]['lrn']?>" disabled>
                                            <span
                                                class="text-danger"><?= isset($validation) ? display_error($validation, 'adminEmail') : '' ?></span>
                                        </div>
                                    </div>
                                    <div class="form-group row" style="font-family: Poppins;">
                                        <label class="col-sm-2 col-form-label"
                                            style="font-family: Poppins;">Email</label>
                                        <div class="col-sm-9">
                                            <input type="email" name="adminEmail" class="form-control"
                                                placeholder="Email" value="<?= $view[0]['email']?>" disabled>
                                            <span
                                                class="text-danger"><?= isset($validation) ? display_error($validation, 'adminEmail') : '' ?></span>
                                        </div>
                                    </div>
                                    <div class="a" style="float:right;">
                                        <button type="button" class="btn btn-primary"
                                            style="font-family:poppins;background-color:maroon;border-color:maroon;border-radius:20px"
                                            onclick="stepper.previous()">Previous</button>
                                            <button type="submit" class="btn btn-password"
                                                style="font-family:poppins;background-color:maroon;border-color:maroon;border-radius:20px;color:white;"
                                                data-id="<?= $view[0]['id']?>">Update password</button>
                                                <?= $this->include('teacher/modal/passwordTeacher') ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->

                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card-body -->
    </div>
    </div>
    </div>
    <!-- /.content -->
    </section>
</body>
<?= $this->include('teacher/include/end')?>
<?= $this->include('teacher/include/footer')?>
<script>
$(document).ready(function() {
    // sa button
    $('.btn-password').on('click', function() {
        // data galing buton
        const id = $(this).data('id');
        // console.log(lrn);
        // // sa 
        $('.id').val(id).trigger('change');
        // Call Modal
        $('#changePassword').modal('show');
    });
});
</script>