<?= $this->include('user/include/top')?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <?= $this->include('user/include/navbar')?>
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

                        <li class="nav-header" style="font-family:poppins;">Student</li>
                        <li class="nav-item" style="font-family:poppins;">
                            <a href="<?=base_url()?>/myprofile" class="nav-link    ">
                                <i class="nav-icon fa-solid fa-user"></i>
                                <p>
                                    <strong>My Profile<strong>
                                            <span class="badge badge-info right"></span>
                                </p>
                            </a>
                        </li>

                        <li class="nav-header" style="font-family:poppins;">Maintenance</li>
                        <li class="nav-item" style="font-family:poppins;">
                            <a href="<?=base_url()?>/registration" class="nav-link active">
                                <i class="fa-sharp fa-solid fa-id-card"></i>
                                <p>
                                    Registration

                                </p>
                            </a>
                        </li>
                        <li class="nav-item" style="font-family:poppins;">
                            <a href="<?=base_url()?>/userSchedule" class="nav-link">
                                <i class="fa-sharp fa-solid fa-calendar"></i>
                                <p>
                                    Schedule
                                </p>
                            </a>
                        </li>
                        <li class="nav-item" style="font-family:poppins;">
                            <a href="<?=base_url()?>/userProspectus" class="nav-link">
                                <i class="fa-sharp fa-solid fa-book"></i>
                                <p>
                                    Grade
                                </p>
                            </a>
                        </li>
                        <li class="nav-item" style="font-family:poppins;">
                            <a href="<?=base_url()?>/subject" class="nav-link">
                                <i class="fa-sharp fa-solid fa-book"></i>
                                <p>
                                    Course
                                </p>
                            </a>
                        </li>
                        <li class="nav-item" style="font-family:poppins;">
                            <a href="<?=base_url()?>/curriculum-subject" class="nav-link">
                                <i class="fa-sharp fa-solid fa-book"></i>
                                <p>
                                    Curriculum Subject
                                </p>
                            </a>
                        </li>
                        <li class="nav-item" style="font-family:poppins;">
                            <a href="<?=base_url()?>/student-request" class="nav-link">
                                <i class="fa-sharp fa-solid fa-book"></i>
                                <p>
                                    Request Credentials
                                </p>
                            </a>
                        </li>
                        <br>
                        <br>
                        <!-- -->
                    </ul>
                    </li>


                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

    </div>

    <!-- Main content -->

    <div class="content-wrapper">
        <script src="<?= base_url()?>/dist/js/sweetalert.js"></script>
        <?php if(!empty(session()->getFlashdata('enroll'))) : ?>
        <script>
        swal({
            title: "Application Form",
            text: "You can now fill out for your enrollment application.",
            icon: "success",
            timer: 1000,
            buttons: false
        });
        </script>
        <?php endif ?>
        <!-- Content Header (Page header) -->

        <br>
        <!-- Main content -->

        <section class="content-header">
            <div class="card card-primary card-outline mx-auto" style="width:95%; margin-top:7% ">

                <div class="card-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="tab-content">
                                    <div class="active tab-pane" id="basic_info">
                                        <div class="card-header">
                                            <p
                                                style="font-size:20px; font-family: Poppins;color:maroon; margin-left:40%">
                                                Application Form</p>
                                        </div><br><br>
                                        <form class="mx-auto" style="max-width: 500px;"
                                            action="<?=site_url('insert_registration')?>" method="post">
                                            <div class="form-horizontal" style="font-family: poppins; color: maroon;">
                                                <div class="form-group col-md-12" style="display: none;">
                                                    <input type="hidden" name="year" value="<?=$year['year']?>">
                                                    <label for="studentLrn">Student LRN</label>
                                                    <select class="form-control" name="lrn"
                                                        placeholder="<?= $user['lrn'];?>">
                                                        <option type="text" class="form-control"
                                                            value="<?= $user['lrn'];?>"><?= $user['lrn'];?></option>
                                                    </select>
                                                    <span
                                                        class="text-danger"><?= isset($validation) ? display_error($validation, 'lrn') : '' ?></span>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label for="studentStrand">Student Type</label>
                                                    <select class="form-control" id="studentStrand" name="student_types">
                                                        <option type="text" value="1">New</option>
                                                        <option type="text" value="2">Old</option>
                                                        <option type="text" value="3">Transferee</option>
                                                    </select>
                                                    <span
                                                        class="text-danger"><?= isset($validation) ? display_error($validation, 'strand') : '' ?></span>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label for="studentStrand">Program</label>
                                                    <select class="form-control" id="studentStrand" name="strand">
                                                        <?php foreach($strands as $strand): ?>
                                                        <option type="text" value="<?= $strand['strand']?>">
                                                            <?= $strand['strand'] ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <span
                                                        class="text-danger"><?= isset($validation) ? display_error($validation, 'strand') : '' ?></span>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label for="yearLevel">Year Level</label>
                                                    <select class="form-control" id="yearLevel" name="year_level">
                                                        <?php foreach($yearnew as $yearLevel):?>
                                                        <option type="text" value="<?= $yearLevel['year_level']?>">
                                                            <?= $yearLevel['year_level']?></option>
                                                        <?php endforeach;?>
                                                    </select>
                                                    <span
                                                        class="text-danger"><?= isset($validation) ? display_error($validation, 'year_level') : '' ?></span>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label for="semester">Semester</label>
                                                    <select class="form-control" name="semester"
                                                        placeholder="<?= $year['semester'];?>">
                                                        <option type="text" value="<?= $year['semester'];?>">
                                                            <?= $year['semester'];?></option>
                                                    </select>
                                                    <span
                                                        class="text-danger"><?= isset($validation) ? display_error($validation, 'semester') : '' ?></span>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <button type="submit"
                                                        class="btn btn-primary btn-block">Submit</button>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                                <!-- /.tab-pane -->
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->

                        </div><!-- /.card-body -->
                    </div>

                    <!-- /.content -->
                </div>
            </div>


        </section>
    </div>

</body>

<?= $this->include('user/include/end')?>
<?= $this->include('user/include/footer')?>