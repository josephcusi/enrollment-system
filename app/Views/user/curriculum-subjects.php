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
                            <a href="<?=base_url()?>/subject" class="nav-link">
                                <i class="fa-sharp fa-solid fa-book"></i>
                                <p>
                                    Course
                                </p>
                            </a>
                        </li>
                        <li class="nav-item" style="font-family:poppins;">
                            <a href="<?=base_url()?>/curriculum-subject" class="nav-link active">
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
                                <strong>Curriculum Subject</strong>
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active" style="font-family:poppins;color:maroon">Home</li>
                            <li class="breadcrumb-item active" style="font-family:poppins;">Curriculum Subject</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        
        <?php
            $yearsAndSemesters = [];
            $semesterUnits = [];

            foreach ($sem as $sub) {
                $yearSemester = $sub['year_level'] . '/' . $sub['semester'];

                if (!in_array($yearSemester, $yearsAndSemesters)) {
                    $yearsAndSemesters[] = $yearSemester;

                    $semesterUnits[$yearSemester] = 0;
                }

                $semesterUnits[$yearSemester] += $sub['unit'];
            }

            sort($yearsAndSemesters);

            foreach ($yearsAndSemesters as $yearSemester) {
                list($year, $semester) = explode('/', $yearSemester);
        ?>
    
                             
    <!-- Year/Semester card -->
    <div class="card-body" style="min-width: 0%; max-width: 100%;">
        <div class="card" style="width: 100%;">
            <div class="card-header">
                <h3 class="card-title" style="font-family: poppins">Year/Semester: <span style="color: black; font-weight: bold;"><?= $yearSemester; ?></span></h3><br>
                <h3 class="card-title" style="font-family: poppins">Total Units:<span style="color: black; font-weight: bold;">  <?= $semesterUnits[$yearSemester] ?>  </span></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <!-- /.card-header -->
                <div class="table-responsive">
                    <table id="example1" class="table table-bordered table" style="font-family: poppins">
                        <thead>
                            <tr>
                                <th>Course Code</th>
                                <th>Description</th>
                                <th>Pre-Requisite</th>
                                <th>Unit</th>
                                <th>Final Grade</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach ($sem as $sub) {
                                    if ($sub['year_level'] . '/' . $sub['semester'] === $yearSemester) {
                                        $test = 'N/A'; // Initialize $test with a default value
                                foreach ($subAll as $suball) {
                                    if ($suball['id'] == $sub['pre_requisit']) {
                                        $test = isset($suball['subject']) ? $suball['subject'] : 'N/A';
                                        break; // Break the loop once the prerequisite subject is found
                                    }
                                }
                                $subject_ids = []; 
                                $subject_grades = []; 
                                $student_all_subject = [];

                                foreach ($student_grade as $std_grd) {
                                    $subject_ids = array_merge($subject_ids, explode(',', $std_grd['subject_id']));
                                    $subject_grades = array_merge($subject_grades, explode(',', $std_grd['subject_grade']));
                                }
                                foreach ($all_stud_sub as $all_std_sub) {
                                    $student_all_subject = array_merge($student_all_subject, explode(',', $all_std_sub['subject_id']));
                                }

                                $grade = ''; 
                                $colors = '#FC7676';

                                foreach ($subject_ids as $key => $value) {
                                    
                                    if ($value == $sub['id']) {
                                        $grade = $subject_grades[$key];
                                    }
                                }

                                foreach ($student_all_subject as $keys => $values) {
                                    if ($values == $sub['id']) {
                                        $colors = ($grade <= '74') ? '#FEBA4F' : '#98FB98';
                                        break;
                                    }
                                }

                        ?>
                            
                                    <tr>
                                      
                                        <td style="background-color: <?= $colors; ?>"><?= $sub['subject']; ?></td>
                                        <td style="background-color: <?= $colors; ?>"><?= $sub['subject_title']; ?></td>
                                        <td style="background-color: <?= $colors; ?>"><?= $test ?></td>
                                        <td style="background-color: <?= $colors; ?>"><?= $sub['unit']; ?></td>
                                        <td style="background-color: <?= $colors; ?>"><?= isset($grade)?$grade:null; ?></td>
                                    </tr>
                                    <?php
                                    
                                }
                                
                            }
                            
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php
}
?>

    </div>


</body>

<?= $this->include('user/include/end')?>
<?= $this->include('user/include/footer')?>