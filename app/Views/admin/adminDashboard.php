<?= $this->include('admin/include/top')?>
<!--include top-->

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <?= $this->include('admin/include/navbar')?>
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

                        <li class="nav-header" style="font-family:poppins;">Admin</li>
                        <li class="nav-item" style="font-family:poppins;">
                            <a href="<?=base_url()?>/admin" class="nav-link active">
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
    <div class="content-wrapper">
        <script src="<?= base_url()?>/dist/js/sweetalert.js"></script>
        <?php if(!empty(session()->getFlashdata('admindashboard'))) : ?>
        <script>
        swal({
            title: "Welcome <?= $name['firstname'], ' ' ,$name['middlename'], ' ' ,$name['lastname']; ?> !",
            text: "You successfully login your account.",
            icon: "success",
            buttons: false,
            timer: 1000,
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
                                <strong>DASHBOARD</strong>
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active" style="color:maroon;font-family: 'Poppins';">Admin</li>
                            <li class="breadcrumb-item active" style="font-family: 'Poppins';">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="container-fluid">

                <!-- Info boxes -->

                <!-- neww -->
                <div class="row" style="font-family:poppins;">
                    <!-- ./col -->
                    <!-- ./col -->
                    <!-- small box -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3 id="admin-count"><?=$usertypeadmin?></h3>
                                <p>Total Admin</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="#" class="small-box-footer"><i class=""></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3 id="teacher-count"><?=$usertypeteacher?></h3>
                                <p>Total Teacher</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="#" class="small-box-footer"><i class=""></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3 id="student-count"><?=$usertypestudent?></h3>
                                <p>Total Student Approved</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="#" class="small-box-footer"><i class=""></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3 id="enrolled-count"><?=$enroll?><sup style="font-size: 20px"></sup></h3>
                                <p>Total Enrolled</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="#" class="small-box-footer"><i class=""></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3 id="pre-enrolled-count"><?=$pre_enrolled?><sup style="font-size: 20px"></sup></h3>
                                <p>Total Pre-Enrolled</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="#" class="small-box-footer"><i class=""></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3 id="rejected-count"><?=$rejected?><sup style="font-size: 20px"></sup></h3>
                                <p>Rejected</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="#" class="small-box-footer"><i class=""></i></a>
                        </div>
                    </div>

                    <!-- ./col -->
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">

                        <div class="card-body">
                            <p style="font-family:poppins;">Yearly Enrolled Records</p>
                            <canvas id="lodi"
                                style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                            <button type="button" class="btn btn-default btn-print-chart"
                                style="border-radius:30px;float:right; font-family:poppins; margin-bottom:; background-color:green; color: white;"
                                onclick="printChart()" data-download_data="data_yearly_records">Print Chart</button>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">

                        <div class="card-body">
                            <p style="font-family:poppins;">Indigenous People(IP) Records</p>
                            <canvas id="ips"
                                style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                            <button type="button" class="btn btn-default btn-print-chart"
                                style="border-radius:30px;float:right; font-family:poppins; margin-bottom:; background-color:green; color: white;"
                                onclick="printChart()" data-download_data="data_ip_records">Print Chart</button>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">

                        <div class="card-body">
                            <p style="font-family:poppins;">Gender Records</p>
                            <canvas id="chart-gender"
                                style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                            <button type="button" class="btn btn-default btn-print-chart"
                                style="border-radius:30px;float:right; font-family:poppins; margin-bottom:; background-color:green; color: white;"
                                onclick="printChart()" data-download_data="data_gender_records"
                                data-male="<?= $male?>" data-female="<?= $female?>">Print Chart</button>

                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <div class="col-md-6">
                    <!-- LINE CHART -->
                    <div class="card ">
                        <div class="card-body">
                            <p style="font-family:poppins;">Year Level Records</p>
                            <canvas id="donutChart"
                                style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                            <button type="button" class="btn btn-default btn-print-chart"
                                style="border-radius:30px;float:right; font-family:poppins; margin-bottom:; background-color:green; color: white;"
                                onclick="printChart()" data-download_data="data_year_level_records"
                                data-one="<?= $lvlOne?>" data-two="<?= $lvlTwo?>" data-three="<?= $lvlThree?>" data-four="<?= $lvlFour?>">Print Chart</button>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">

                        <div class="card-body">
                            <p style="font-family:poppins;">Course Records</p>
                            <canvas id="strand"
                                style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                            <button type="button" class="btn btn-default btn-print-chart"
                                style="border-radius:30px;float:right; font-family:poppins; margin-bottom:; background-color:green; color: white;"
                                onclick="printChart()" data-download_data="data_course_records"
                                data-abh="<?= $abh?>" data-bpa="<?= $bpa?>" data-btvted="<?= $btvted?>">Print Chart</button>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>

                <!-- /.col (RIGHT) -->
            </div>
            <!-- /.row -->
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -

    </div>


  Page specific script -->

</body>
<script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>

<?= $this->include('admin/include/end')?>
<script>
$(function() {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */
    //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData = {
        <?php if(session()->get('status') == 'COLLEGE'):?>
        labels: ['1st Year', '2nd Year', '3rd Year', '4th Year'],
        datasets: [{
            data: [<?= $lvlOne ?>, <?= $lvlTwo ?>, <?= $lvlThree ?>, <?= $lvlFour ?>],
            backgroundColor: ['#800000', '#212529', '#F28F79', '#D7DE7D'],
        }]
        <?php else:?>
        labels: ['Grade 11', 'Grade 12'],
        datasets: [{
            data: [<?= $lvlEle ?>, <?= $lvlTwe ?>],
            backgroundColor: ['#800000', '#212529'],
        }]
        <?php endif;?>
    }
    var donutOptions = {
        maintainAspectRatio: false,
        responsive: true,
    }

    // Create pie or doughnut chart
    // You can switch between pie and doughnut using the method below.
    new Chart(donutChartCanvas, {
        type: 'doughnut',
        data: donutData,
        options: donutOptions
    })

    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var donutChartCanvas = $('#chart-gender').get(0).getContext('2d')
    var donutData = {
        labels: ['MALE', 'FEMALE'],
        datasets: [{
            data: [<?= $male ?>, <?= $female ?>],
            backgroundColor: ['#800000', '#212529', ],
        }]
    }
    var donutOptions = {
        maintainAspectRatio: false,
        responsive: true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(donutChartCanvas, {
        type: 'pie',
        data: donutData,
        options: donutOptions
    })
    var donutChartCanvas = $('#strand').get(0).getContext('2d')
    var donutData = {
        <?php if(session()->get('status') == 'COLLEGE'):?>
        labels: ['ABH', 'BPA', 'BTVTED'],
        datasets: [{
            data: [<?= $abh ?>, <?= $bpa ?>, <?=$btvted?>],
            backgroundColor: ['#800000', '#212529', 'e8e19d'],
        }]
        <?php else:?>
        labels: ['GAS', 'HUMSS', 'SMAW', 'CSS'],
        datasets: [{
            data: [<?= $gas ?>, <?= $humss ?>, <?=$smaw?>, <?=$css?>],
            backgroundColor: ['#800000', '#212529', 'e8e19d'],
        }]
        <?php endif;?>
    }
    var donutOptions = {
        maintainAspectRatio: false,
        responsive: true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(donutChartCanvas, {
        type: 'pie',
        data: donutData,
        options: donutOptions
    })
    //--------------
    //- AREA CHART -
    //--------------

    // Get context with jQuery - using jQuery's .get() method.
    var areaChartCanvas = $('#lodi').get(0).getContext('2d')

    var areaChartData = {
        labels: ['2023', '2024', '2025', '2026', '2027'],
        datasets: [{
                label: 'Yearly Enrolled Records',

                borderColor: '#212529',
                pointRadius: false,
                pointColor: '#212529',
                pointStrokeColor: '#212529',


                data: [<?=$e?>, <?=$n?>, <?=$r?>, <?=$o?>, <?=$l?>]
            },

        ]
    }

    var areaChartOptions = {
        maintainAspectRatio: false,
        responsive: true,
        legend: {
            display: false
        },
        scales: {
            xAxes: [{
                gridLines: {
                    display: false,
                }
            }],
            yAxes: [{
                gridLines: {
                    display: false,
                }
            }]
        }
    }

    // This will get the first returned node in the jQuery collection.
    new Chart(areaChartCanvas, {
        type: 'line',
        data: areaChartData,
        options: areaChartOptions
    })
    // Get context with jQuery - using jQuery's .get() method.
    var areaChartCanvas = $('#ips').get(0).getContext('2d')

    <?php
        $uniqueLabels = [];
        $dataCounts = [];

        foreach($ips as $ipss) {
            $ip = strtolower($ipss['ip']); // Convert to lowercase for case-insensitive comparison
            if (!isset($dataCounts[$ip])) {
                $uniqueLabels[] = $ipss['ip'];
                $dataCounts[$ip] = 1;
            } else {
                $dataCounts[$ip]++;
            }
        }
    ?>

    var areaChartData = {
        labels: <?= json_encode($uniqueLabels) ?>,
        datasets: [{
            label: 'Ip Records',
            borderColor: '#212529',
            pointRadius: false,
            pointColor: '#212529',
            pointStrokeColor: '#212529',
            data: <?= json_encode(array_values($dataCounts)) ?>,
        }]
    };


    var areaChartOptions = {
        maintainAspectRatio: false,
        responsive: true,
        legend: {
            display: false
        },
        scales: {
            xAxes: [{
                gridLines: {
                    display: false,
                }
            }],
            yAxes: [{
                gridLines: {
                    display: false,
                }
            }]
        }
    }

    // This will get the first returned node in the jQuery collection.
    new Chart(areaChartCanvas, {
        type: 'bar',
        data: areaChartData,
        options: areaChartOptions
    })



})
</script>
<?= $this->include('admin/include/footer')?>


<script>
function updateCount(countElementId, totalCount) {
    var countElement = document.getElementById(countElementId);
    var currentCount = 0;
    var increment = Math.ceil(totalCount / 100); // Adjust the increment as needed

    function updateCountValue() {
        currentCount += increment;

        if (currentCount >= totalCount) {
            currentCount = totalCount;
            clearInterval(countInterval);
        }

        countElement.textContent = currentCount;
    }

    var countInterval = setInterval(updateCountValue, 50); // Adjust the interval duration as needed
}

// Call the updateCount function for each count element
updateCount('admin-count', <?=$usertypeadmin?>);
updateCount('teacher-count', <?=$usertypeteacher?>);
updateCount('student-count', <?=$usertypestudent?>);
updateCount('enrolled-count', <?=$enroll?>);
updateCount('pre-enrolled-count', <?=$pre_enrolled?>);
updateCount('rejected-count', <?=$rejected?>);
</script>

<script>
$(document).ready(function() {

});
</script>

<!-- <script>
function printChart() {
    // Extract chart data or information from the canvas
    var chartDataLodi = getChartDataLodi(); // Replace with your actual method to get chart data
    // var chartDataIps = getChartDataIps(); // Replace with your actual method to get chart data
    // var chartDataGender = getChartDataGender(); // Replace with your actual method to get chart data
    // var chartDataLevel = getChartDataLevel(); // Replace with your actual method to get chart data
    // var chartDataCourse = getChartDataCourse(); // Replace with your actual method to get chart data
    var downloadData = $(this).data('download_data');

    console.log(chartDataLodi);

    // Send the chart data to the server using Ajax
    $.ajax({
        type: 'POST',
        url: '/download_records', // Replace with the actual URL of your server endpoint
        data: {
            chartDataLodi: chartDataLodi,
            // chartDataIps: chartDataIps,
            // chartDataGender: chartDataGender,
            // chartDataLevel: chartDataLevel,
            // chartDataCourse: chartDataCourse,
            // downloadData: downloadData // Include download data in the request
        }
    });

}

// Replace this function with your actual method to get chart data
function getChartDataLodi() {
        // Example: Extract data from the donutChart canvas
        var canvas = document.getElementById('donutChart');
        return canvas.toDataURL('image/png');
    }

// function getChartDataIps() {
//     // Example: Extract data from the donutChart canvas
//     var canvas = document.getElementById('ips');
//     var chartDataIps = canvas.toDataURL('image/png');
//     return chartDataIps;
// }

// function getChartDataGender() {
//     // Example: Extract data from the donutChart canvas
//     var canvas = document.getElementById('chart-gender');
//     var chartDataGender = canvas.toDataURL('image/png');
//     return chartDataGender;
// }

// function getChartDataLevel() {
//     // Example: Extract data from the donutChart canvas
//     var canvas = document.getElementById('donutChart');
//     var chartDataLevel = canvas.toDataURL('image/png');
//     return chartDataLevel;
// }

// function getChartDataCourse() {
//     // Example: Extract data from the donutChart canvas
//     var canvas = document.getElementById('strand');
//     var chartDataCourse = canvas.toDataURL('image/png');
//     return chartDataCourse;
// }
</script> -->

<!-- <script>
    function printChart() {
        // Extract chart data or information from the canvas
        var chartData = getChartData(); // Replace with your actual method to get chart data

        // Send the chart data to the server using Ajax
        $.ajax({
            type: 'POST',
            url: '/download_records',
            data: { chartData: chartData },
            
        });
    }

    // Replace this function with your actual method to get chart data
    function getChartData() {
        // Example: Extract data from the donutChart canvas
        var canvas = document.getElementById('donutChart');
        return canvas.toDataURL('image/png');
    }
</script> -->

<script>
$(document).ready(function() {
    $('.btn-print-chart').on('click', function() {
        var ChartDataLodi = getChartDataLodi(); 
        var ChartDataIps = getChartDataIps(); // Replace with your actual method to get Chart data
        var ChartDataGender = getChartDataGender(); // Replace with your actual method to get Chart data
        var ChartDataLevel = getChartDataLevel(); // Replace with your actual method to get Chart data
        var ChartDataCourse = getChartDataCourse(); // Replace with your actual method to get chart data
        var download_data = $(this).data('download_data');
        var female = $(this).data('female');
        var male = $(this).data('male');
        var one = $(this).data('one');
        var two = $(this).data('two');
        var three = $(this).data('three');
        var four = $(this).data('four');
        var abh = $(this).data('abh');
        var bpa = $(this).data('bpa');
        var btvted = $(this).data('btvted');

        console.log(download_data);

        const formData = new FormData();
        formData.append('ChartDataLodi', ChartDataLodi);
        formData.append('ChartDataIps', ChartDataIps);
        formData.append('ChartDataGender', ChartDataGender);
        formData.append('ChartDataLevel', ChartDataLevel);
        formData.append('ChartDataCourse', ChartDataCourse);
        formData.append('download_data', download_data);
        formData.append('female', female);
        formData.append('male', male);
        formData.append('one', one);
        formData.append('two', two);
        formData.append('three', three);
        formData.append('four', four);
        formData.append('abh', abh);
        formData.append('bpa', bpa);
        formData.append('btvted', btvted);

        const form = document.createElement('form');
        form.method = 'POST';
        form.action = '/download_records';
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
    function getChartDataLodi() {
        // Example: Extract data from the donutChart canvas
        var canvas = document.getElementById('lodi');
        return canvas.toDataURL('image/png');
    }
    function getChartDataIps() {
        // Example: Extract data from the donutChart canvas
        var canvas = document.getElementById('ips');
        return canvas.toDataURL('image/png');
    }
    function getChartDataGender() {
        // Example: Extract data from the donutChart canvas
        var canvas = document.getElementById('chart-gender');
        return canvas.toDataURL('image/png');
    }
    function getChartDataLevel() {
        // Example: Extract data from the donutChart canvas
        var canvas = document.getElementById('donutChart');
        return canvas.toDataURL('image/png');
    }
    function getChartDataCourse() {
        // Example: Extract data from the donutChart canvas
        var canvas = document.getElementById('strand');
        return canvas.toDataURL('image/png');
    }
});
  </script>