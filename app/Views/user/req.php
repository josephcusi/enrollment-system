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
                        <li class="nav-item">
                            <a href="<?=base_url()?>/myprofile" class="nav-link    ">
                                <i class="nav-icon fas fa-user"></i>
                                <p style="font-family:poppins;">
                                    <strong>My Profile<strong>
                                            <span class="badge badge-info right"></span>
                                </p>
                            </a>
                        </li>

                        <li class="nav-header" style="font-family:poppins;">Maintenance</li>
                        <li class="nav-item">
                            <a href="<?=base_url()?>/registration" class="nav-link">
                                <i class="fa-sharp fa-solid fa-id-card"></i>
                                <p style="font-family:poppins;">
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
                            <a href="<?=base_url()?>/student-request" class="nav-link active">
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

        <?php if (!empty(session()->getFlashdata('sendCred'))) : ?>
        <script>
        swal({
            title: "Can't Proceed!",
            text: "Please fill out the profile first.",
            icon: "warning",
            timer: '2000',
            buttons: false
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
                                <strong>Request Credentials</strong>
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active" style="font-family:poppins;color:maroon">Home</li>
                            <li class="breadcrumb-item active" style="font-family:poppins;">Credentials</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <div class="card-body">
            <div class="card card-primary card-outline mx-auto">
                <div class="card-header">
                    <a href="<?= base_url('makereq') ?>">
                        <button type="button" class="btn btn-secondary btn-sm"
                            style="border-color: maroon; border-radius: 15px; float: right; font-family: poppins; margin-bottom: 1%; background-color: maroon; color: white;">
                            Request
                        </button>
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped" style="font-family: poppins">
                            <thead>
                                <tr>

                                    <th>Name</th>
                                    <th>Purpose</th>
                                    <th>Credential to be requested</th>
                                    <th>Schedule</th>
                                    <th>Status</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($stud_req as $rqst): ?>
                                <tr>

                                    <td><?= isset($rqst['firstname'], $rqst['middlename'], $rqst['lastname']) ? $rqst['firstname'] .' ' . $rqst['middlename'] . ' ' . $rqst['lastname'] : ''; ?>
                                    </td>
                                    <td><?= isset($rqst['purpose']) ? $rqst['purpose'] : ''; ?></td>
                                    <td><?= isset($rqst['cred_requested']) ? $rqst['cred_requested'] : ''; ?></td>
                                    <td><?= isset($rqst['schedule']) ? $rqst['schedule'] : ''; ?></td>
                                    <td>
                                        <?php if ($rqst && isset($rqst['cred_status'])): ?>
                                            <?php if ($rqst['cred_status'] == '1'): ?>
                                            Approved
                                            <?php elseif ($rqst['cred_status'] == '2'): ?>
                                            Rejected
                                            <?php else: ?>
                                            Pending
                                            <?php endif; ?>
                                        <?php else: ?>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <!-- /.card-body -->
    </div>

</body>

<?= $this->include('user/include/end')?>
<?= $this->include('user/include/footer')?>