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
                        <li class="nav-item menu-open" style="font-family: poppins;">
                            <a href="tae.html" class="nav-link" id="section-link">
                                <i class="fa-sharp fa-solid fa-envelopes-bulk"></i>
                                <p>
                                    Section
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" id="section-menu">
                                <?php if ($stat['status'] === "SHS"): ?>
                                <li class="nav-item year-level-nav-item">
                                    <a href="<?= site_url('section/Grade-11') ;?>"
                                        class="nav-link <?= (strpos(current_url(), 'schedule11/Grade-11') !== false) ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Grade 11</p>
                                    </a>
                                </li>
                                <li class="nav-item year-level-nav-item">
                                    <a href="<?= site_url('section/Grade-12') ;?>"
                                        class="nav-link <?= (strpos(current_url(), 'schedule11/Grade-12') !== false) ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Grade 12</p>
                                    </a>
                                </li>
                                <?php else: ?>
                                <li class="nav-item year-level-nav-item">
                                    <a href="<?= site_url('section/1st-Year') ;?>"
                                        class="nav-link <?= (strpos(current_url(), 'schedule11/1st-Year') !== false) ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>1st Year</p>
                                    </a>
                                </li>
                                <li class="nav-item year-level-nav-item">
                                    <a href="<?= site_url('section/2nd-Year') ;?>"
                                        class="nav-link <?= (strpos(current_url(), 'schedule11/2nd-Year') !== false) ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>2nd Year</p>
                                    </a>
                                </li>
                                <li class="nav-item year-level-nav-item">
                                    <a href="<?= site_url('section/3rd-Year') ;?>"
                                        class="nav-link <?= (strpos(current_url(), 'schedule11/3rd-Year') !== false) ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>3rd Year</p>
                                    </a>
                                </li>
                                <li class="nav-item year-level-nav-item">
                                    <a href="<?= site_url('section/4th-Year') ;?>"
                                        class="nav-link <?= (strpos(current_url(), 'schedule11/4th-Year') !== false) ? 'active' : '' ?>">
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
                                <p>Strand</p>
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
        <script src="<?= base_url()?>/dist/js/sweetalert.js"></script>
        <?php if (!empty(session()->getFlashdata('duplicate'))) : ?>
        <script>
        swal({
            title: "Duplicate Input!",
            text: "Please try another.",
            icon: "warning",
            buttons: false,
            timer: 1000
        });
        </script>
        <?php endif ?>

        <?php if (!empty(session()->getFlashdata('updatesection'))) : ?>
        <script>
        swal({
            title: "Updated Successfully!",
            text: "Changes have been made.",
            icon: "success",
            buttons: false,
            timer: 1000
        });
        </script>
        <?php endif ?>

        <?php if (!empty(session()->getFlashdata('added'))) : ?>
        <script>
        swal({
            title: "Added Successfully!",
            text: "You have successfully added the schedule.",
            icon: "success",
            buttons: false,
            timer: 1000
        });
        </script>
        <?php endif ?>

        <?php if (!empty(session()->getFlashdata('room'))) : ?>
        <script>
        swal({
            title: "Added Successfully!",
            text: "You have successfully added the room.",
            icon: "success",
            buttons: false,
            timer: 1000
        });
        </script>
        <?php endif ?>

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>
                            <class="a" style="color:maroon; font-family: 'Poppins';font-size: 22px">
                                <strong>SCHEDULE</strong>
                        </h1>
                        <button type="button" class="btn button-past-schedule"
                            style="position:absolute;right:60%;top:0%; border-radius: 20px; background-color: maroon; color: white;"
                            data-section_id="<?= isset($sched_years[0]['section_id']) ? $sched_years[0]['section_id'] : ''; ?>">
                            <strong>View past schedule</strong>
                        </button>
                        <?= $this->include('admin/section/schedule/past_sched') ?>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active" style="color:maroon;font-family: 'Poppins';">Section</li>
                            <li class="breadcrumb-item active" style="font-family: 'Poppins';">Schedule</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content-header">
            <div class="card card-primary card-outline mx-auto" style="">
                <div class="card-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- /.card-header -->
                                <table id="example1" class="table table-bordered table" style="font-family:poppins">
                                    <thead>
                                        <div style="font-family: 'Poppins';">
                                        <div  class="card" style="border-radius:15px">
                                             <button type="button" class="btn pdf-schedule"
                                                style="position:absolute; border-radius:20px; background-color: maroon; color: white; margin-left: 85%;"
                                                data-section="<?=$section['id']?>"
                                                data-year_level="<?=$section['year_level']?>"
                                                data-strand="<?=$section['strand_id']?>"
                                                data-section_name="<?=$section['section']?>">
                                                Print Schedule
                                            </button>
                                        </div>
                                           
                                            <button type="button" class="btn button-room"
                                                style="position:absolute;right:92%; border-radius: 20px; background-color: maroon; color: white;"
                                                data-room="<?= isset($sched[0]['room']) ? $sched[0]['room'] : ''; ?>"
                                                data-section="<?= isset($sched[0]['id']) ? $sched[0]['id'] : ''; ?>">
                                                <strong>Room
                                                    (<?= isset($sched[0]['room']) ? $sched[0]['room'] : 'NONE'; ?>)</strong>
                                            </button>
                                            <?= $this->include('admin/section/schedule/addRoom') ?>
    </div>
                                        <br>
                                        <br>

                                        <tr>
                                            <th>Monday</th>
                                            <th>Tuesday</th>
                                            <th>Wednesday</th>
                                            <th>Thursday</th>
                                            <th>Friday</th>
                                            <th>Saturday</th>
                                            <th>Subject</th>
                                            <th>Profesor</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(empty($sched)):?>
                                        <?php else:?>
                                        <?php 
$ids = array_combine(
    explode(',', $sched[0]['subject_id']),
    array_map(function($teacher_id, $str_mon, $en_mon, $str_tue, $en_tue, $str_wed, $en_wed, $str_thu, $en_thu, $str_fri, $en_fri, $str_sat, $en_sat) use ($teacher) {
        $teacher_name = '';
        foreach ($teacher as $teachers) {
            if ($teachers['id'] == $teacher_id) {
                $teacher_name = $teachers['firstname'] . ' ' . $teachers['middlename'] . ' ' . $teachers['lastname'];
                break;
            }
        }
        return [
            'teacher_name' => $teacher_name,
            'str_mon' => $str_mon,
            'en_mon' => $en_mon,
            'str_tue' => $str_tue,
            'en_tue' => $en_tue,
            'str_wed' => $str_wed,
            'en_wed' => $en_wed,
            'str_thu' => $str_thu,
            'en_thu' => $en_thu,
            'str_fri' => $str_fri,
            'en_fri' => $en_fri,
            'str_sat' => $str_sat,
            'en_sat' => $en_sat,
        ];
    }, 
    explode(',', $sched[0]['teacher_id']),
    explode(',', $sched[0]['start_monday']),
    explode(',', $sched[0]['end_monday']),
    explode(',', $sched[0]['start_tuesday']),
    explode(',', $sched[0]['end_tuesday']),
    explode(',', $sched[0]['start_wednesday']),
    explode(',', $sched[0]['end_wednesday']),
    explode(',', $sched[0]['start_thursday']),
    explode(',', $sched[0]['end_thursday']),
    explode(',', $sched[0]['start_friday']),
    explode(',', $sched[0]['end_friday']),
    explode(',', $sched[0]['start_saturday']),
    explode(',', $sched[0]['end_saturday'])
));                                        
?>

                                        <?php foreach($subs as $stdnt_sjct): ?>
                                        <?php if(isset($ids[$stdnt_sjct['id']])): ?>
                                        <tr>
                                            <td><?= $ids[$stdnt_sjct['id']]['str_mon']; ?> -
                                                <?= $ids[$stdnt_sjct['id']]['en_mon']; ?></td>
                                            <td><?= $ids[$stdnt_sjct['id']]['str_tue']; ?> -
                                                <?= $ids[$stdnt_sjct['id']]['en_tue']; ?></td>
                                            <td><?= $ids[$stdnt_sjct['id']]['str_wed']; ?> -
                                                <?= $ids[$stdnt_sjct['id']]['en_wed']; ?></td>
                                            <td><?= $ids[$stdnt_sjct['id']]['str_thu']; ?> -
                                                <?= $ids[$stdnt_sjct['id']]['en_thu']; ?></td>
                                            <td><?= $ids[$stdnt_sjct['id']]['str_fri']; ?> -
                                                <?= $ids[$stdnt_sjct['id']]['en_fri']; ?></td>
                                            <td><?= $ids[$stdnt_sjct['id']]['str_sat']; ?> -
                                                <?= $ids[$stdnt_sjct['id']]['en_sat']; ?></td>
                                            <td><?= $stdnt_sjct['subject']; ?></td>
                                            <td><?= $ids[$stdnt_sjct['id']]['teacher_name']; ?></td>
                                            <td>
                                                <button type="button" class="btn btn-update"
                                                    style="border-radius:20px;background-color:maroon; color: white;"
                                                    data-id="<?= $sched[0]['id'] ?>"
                                                    data-teacher="<?= $ids[$stdnt_sjct['id']]['teacher_name']; ?>"
                                                    data-mon_one="<?= $ids[$stdnt_sjct['id']]['str_mon']; ?>"
                                                    data-mon_two="<?= $ids[$stdnt_sjct['id']]['en_mon']; ?>"
                                                    data-tue_one="<?= $ids[$stdnt_sjct['id']]['str_tue']; ?>"
                                                    data-tue_two="<?= $ids[$stdnt_sjct['id']]['en_tue']; ?>"
                                                    data-wed_one="<?= $ids[$stdnt_sjct['id']]['str_wed']; ?>"
                                                    data-wed_two="<?= $ids[$stdnt_sjct['id']]['en_wed']; ?>"
                                                    data-thu_one="<?= $ids[$stdnt_sjct['id']]['str_thu']; ?>"
                                                    data-thu_two="<?= $ids[$stdnt_sjct['id']]['en_thu']; ?>"
                                                    data-fri_one="<?= $ids[$stdnt_sjct['id']]['str_fri']; ?>"
                                                    data-fri_two="<?= $ids[$stdnt_sjct['id']]['en_fri']; ?>"
                                                    data-sat_one="<?= $ids[$stdnt_sjct['id']]['str_sat']; ?>"
                                                    data-sat_two="<?= $ids[$stdnt_sjct['id']]['en_sat']; ?>"
                                                    data-sub="<?= $stdnt_sjct['subject']; ?>"
                                                    data-strand_id="<?= $sched[0]['strand_id']; ?>">Update</button>
                                            </td>
                                        </tr>
                                        <?= $this->include('admin/section/schedule/updateSchedule11')?>
                                        <?php endif; ?>
                                        <?php endforeach; ?>
                                        <?php endif; ?>



                                    </tbody>
                                    <tfoot>
                                    </tfoot>
                                </table>
                                <div class="card" style="border-radius:15px">
                                    <button type="button" class="btn btn-section"
                                        style="border-radius:15px;float:right; font-family:poppins; background-color:maroon; color: white;"
                                        data-toggle="modal" data-target="#addSchedule" data-id='<?=$section['id']?>'
                                        data-sched_id='<?=isset($sched[0]['id']) ? $sched[0]['id'] : '' ?>'>Add
                                        Schedule</button>
                                    <?= $this->include('admin/section/schedule/addSchedule11')?>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                            <!-- /.content -->
                        </div>
                    </div>
                </div>
            </div>
    </div>

    </section>
    <!-- /.content -->
    </div>
</body>
<?= $this->include('admin/include/end')?>
<?= $this->include('admin/include/footer')?>

<script>
$(document).ready(function() {
    // sa button
    $('.button-room').on('click', function() {
        // data galing buton
        const section = $(this).data('section');
        const room = $(this).data('room');

        // // sa modal
        $('.room').val(room);
        $('.section').val(section).trigger('change');
        // Call Modal
        $('#addroom').modal('show');
    });
});
</script>

<script>
$(document).ready(function() {
    // sa button
    $('.btn-section').on('click', function() {
        // data galing buton
        const id = $(this).data('id');
        const sched_id = $(this).data('sched_id');
        // // sa modal
        $('.sched_id').val(sched_id);
        $('.id').val(id).trigger('change');
        // Call Modal
        $('#addSchedule').modal('show');
    });
});
</script>

<!-- <script>
$(document).ready(function() {
    $('.pdf-schedule').on('click', function() {
        var section = $(this).data('section');
        var year_level = $(this).data('year_level');
        var strand = $(this).data('strand');
        var section_name = $(this).data('section_name');

        $.ajax({
            method: "POST",
            url: "/pdf_subject_schedule",
            data: {
                section: section,
                year_level: year_level,
                strand: strand
            },
            xhrFields: {
                responseType: 'blob' // Set the response type to 'blob' to handle binary data
            },
            success: function(response) {
                // Create a blob object from the response
                var blob = new Blob([response]);

                // Create a temporary URL for the blob object
                var url = URL.createObjectURL(blob);

                // Create a temporary link element
                var link = document.createElement('a');
          

                // Simulate a click event on the link to trigger the download
                link.click();

                // Clean up the temporary URL and link
                URL.revokeObjectURL(url);
                link.remove();
            },
            error: function(xhr, status, error) {
                // Handle the error gracefully
                console.log(xhr.responseText);
                alert("An error occurred while generating the PDF.");
            }
        });
    });
});
</script> -->

<script>
    $(document).ready(function() {

        $('.pdf-schedule').on('click', function() {
            var section = $(this).data('section');
            var year_level = $(this).data('year_level');
            var strand = $(this).data('strand');
            var section_name = $(this).data('section_name');

            const formData = new FormData();
            formData.append('section', section);
            formData.append('year_level', year_level);
            formData.append('strand', strand);
            formData.append('section_name', section_name);
            

            const form = document.createElement('form');
            form.method = 'POST';
            form.action = '/pdf_subject_schedule';
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
            }, 1000);
        });
    });
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var sectionLink = document.getElementById('section-link');
    var sectionMenu = document.getElementById('section-menu');
    var currentURL = window.location.href;

    // Add 'active' class to section link if current URL matches
    if (currentURL.includes('section/') || currentURL.includes('schedule11/')) {
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