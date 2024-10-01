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
                            <a href="<?=base_url()?>/registration" class="nav-link">
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
                            <a href="<?=base_url()?>/subject" class="nav-link active">
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

    <!-- Main content -->
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>
                            <class="a" style="color:maroon; font-family: 'Poppins';font-size: 22px">
                                <strong>Course</strong>
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active" style="font-family:poppins;color:maroon">Home</li>
                            <li class="breadcrumb-item active" style="font-family:poppins;">Course</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <div class="card-body">
            <div class="card card-primary card-outline mx-auto" style="width:100%;">
                <div class="card-header">

                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <!-- /.card-header -->
                    <div class="table-responsive">
                    <table id="example1" class="table table-bordered table" style="font-family:poppins">

                        <thead>
                            <tr>
                                <th>Course</th>
                                <th>Title</th>
                                <th>Unit</th>
                                <th>Pre-Requisite</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $ids = explode(",", $id['subject_id']);
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
                                <td><?=$sub['subject']?></td>
                                <td><?=$sub['subject_title']?></td>
                                <td><?=$sub['unit']?></td>
                                <td><?=$test?></td>
                            </tr>
                            <?php endif; endforeach; endforeach; ?>
                        </tbody>
                    </table>
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

<?= $this->include('user/include/end')?>
<?= $this->include('user/include/footer')?>