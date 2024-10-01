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
                                <i class="nav-icon fas fa-user"></i>
                                <p>
                                    <strong>My Profile<strong>
                                            <span class="badge badge-info right"></span>
                                </p>
                            </a>
                        </li>

                        <li class="nav-header" style="font-family:poppins;">Maintenance</li>
                        <li class="nav-item" style="font-family:poppins;">
                            <a href="<?=base_url()?>/registration" class="nav-link">
                                <i class="fa-sharp fa-solid fa-id-card"></i>
                                <p>
                                    Registration

                                </p>
                            </a>
                        </li>
                        <li class="nav-item" style="font-family:poppins;">
                            <a href="<?=base_url()?>/userSchedule" class="nav-link active">
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
        <?php if (!empty(session()->getFlashdata('nodata'))) : ?>
        <script>
        swal({
            title: "Not Available!",
            text: "Schedule is under maintenance.",
            icon: "warning",
            buttons: false,
            timer: 2000
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
                                <strong>SCHEDULE</strong>
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active" style="font-family:poppins;color:maroon">Home</li>
                            <li class="breadcrumb-item active" style="font-family:poppins;">Schedule</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content-header">

            <div class="card card-primary card-outline mx-auto" style="width:99%; ">
                <div class="card-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">


                                <!-- /.card-header -->
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table" style="font-family:poppins">
                                        <thead>
                                            <tr>
                                                <th>Section</th>
                                                <th>Program</th>
                                                <th>Semester</th>
                                                <th>Year Level</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><?=isset($userSched['section']) ? $userSched['section'] : 'UNAVAILABLE';?>
                                                </td>
                                                <td><?=isset($userSched['strand']) ? $userSched['strand'] : 'UNAVAILABLE';?>
                                                </td>
                                                <td><?=isset($userSched['semester']) ? $userSched['semester'] : 'UNAVAILABLE';?>
                                                </td>
                                                <td><?=isset($userSched['year_level']) ? $userSched['year_level'] : 'UNAVAILABLE';?>
                                                </td>
                                                <td>
                                                    <a href="<?=base_url('viewSchedule')?>"><button type="button"
                                                            class="btn btn-primary btn-sm"
                                                            style="border-radius:15px">view schedule</button>
                                                </td>

                                            </tr>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                        </tfoot>
                                    </table>
                                    <!-- /.card-body -->
                                </div>
                            </div>

                            <!-- /.content -->
                        </div>
                        <!-- /.content -->
                    </div>
                </div>
            </div>
    </div>

    </section>
</body>

<?= $this->include('user/include/end')?>
<?= $this->include('user/include/footer')?>
