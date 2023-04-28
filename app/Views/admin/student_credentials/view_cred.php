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
                        <li class="nav-item" style="font-family:poppins;" style="font-family:poppins;">
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
                        <li class="nav-item" style="font-family:poppins;">
                            <a href="<?=base_url('student_approve')?>" class="nav-link active">
                                <i class="far fa-thin fa-newspaper"></i>
                                <p>Student Approval</p>
                            </a>
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
                                <a href="<?= base_url('prospectus11/' . $year_levelOne['id'])?>" class="nav-link active">
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
                                <a href="<?= base_url('prospectus11/' . $year_levelFourth['id'])?>" class="nav-link">
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
                                <p>Strand</p>
                            </a>
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
        <!-- Content Header (Page header) -->

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>
                            <class="a" style="color:maroon; font-family: 'Poppins';font-size: 22px">
                                <strong>STUDENT CREDENTIALS </strong>
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active" style="color:maroon;font-family: 'Poppins';">Student Approval</li>
                            <li class="breadcrumb-item active" style="font-family: 'Poppins';">View Credential</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <div class="col-12">
          <div class="card card-primary card-outline mx-auto">

            <div class="card-body">
              <div class="row">
                <div class="col-sm-2">


                    <img src="https://via.placeholder.com/300/FFFFFF?text=" class="img-fluid mb-2"/>

                </div>
                <div class="col-sm-2">
                <p class="a" style="font-size:1.5em; font-family: Poppins;color:maroon;">Birth Certificate</p>
                  <a href="<?=base_url()?>/student_credentials/reyondarandell842@gmail.com/received_258625515707793.jpeg" data-toggle="lightbox" data-title="Birth Certificate" data-gallery="gallery">
                    <img src="<?=base_url()?>/student_credentials/reyondarandell842@gmail.com/received_258625515707793.jpeg" class="img-fluid mb-2" alt="black sample"/>
                  </a>
                </div>
                <div class="col-sm-2">
                  <p class="a" style="font-size:1.5em; font-family: Poppins;color:maroon;">Form 137</p>
                  <a href="<?=base_url()?>/student_credentials/reyondarandell842@gmail.com/received_258625515707793.jpeg" data-toggle="lightbox" data-title="Form 137" data-gallery="gallery">
                    <img src="<?=base_url()?>/student_credentials/reyondarandell842@gmail.com/received_258625515707793.jpeg" class="img-fluid mb-2" alt="black sample"/>
                  </a>
                </div>
                <div class="col-sm-2">
                    <p class="a" style="font-size:1.5em; font-family: Poppins;color:maroon;">Class Grade</p>
                  <a href="<?=base_url()?>/student_credentials/reyondarandell842@gmail.com/received_258625515707793.jpeg" data-toggle="lightbox" data-title="Class Grade" data-gallery="gallery">
                    <img src="<?=base_url()?>/student_credentials/reyondarandell842@gmail.com/received_258625515707793.jpeg" class="img-fluid mb-2" alt="red sample"/>
                  </a>
                </div>
                <div class="col-sm-2">
                  <p class="a" style="font-size:1.5em; font-family: Poppins;color:maroon;">Good Moral</p>
                  <a href="<?=base_url()?>/student_credentials/reyondarandell842@gmail.com/received_258625515707793.jpeg" data-toggle="lightbox" data-title="Good Moral" data-gallery="gallery">
                    <img src="<?=base_url()?>/student_credentials/reyondarandell842@gmail.com/received_258625515707793.jpeg" class="img-fluid mb-2" alt="white sample"/>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-header -->


    </div>
</body>
<?= $this->include('admin/include/end')?>
<?= $this->include('admin/include/footer')?>
