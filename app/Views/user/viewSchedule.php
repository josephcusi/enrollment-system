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

        <!-- Content Header (Page header) -->
        <section class="content-header">

            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>
                            <class="a" style="color:maroon; font-family: 'Poppins';font-size: 22px">
                                <strong>Section Schedule</strong>
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
        <?php if($userName[0]['usertype'] == "COLLEGE"):?>
        <!-- Main content -->
        <div class="card card-primary card-outline mx-auto" style="width:98%; ">

            <!-- /.card-header -->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" style="font-family: poppins">
                        <thead>
                            <tr>
                                <th style="width:auto;" id="button-room-student"
                                    colspan="<?= getColspanCount($userSched) ?>">
                                    <?= $userSched[0]['strand'] . ' (ROOM - ' . $userSched[0]['room'] . ') ' ?>
                                </th>
                            </tr>
                            <tr>
                                <?php if (hasuserSchedData($userSched, 'start_monday')) : ?>
                                <th>Monday</th>
                                <?php endif; ?>
                                <?php if (hasuserSchedData($userSched, 'start_tuesday')) : ?>
                                <th>Tuesday</th>
                                <?php endif; ?>
                                <?php if (hasuserSchedData($userSched, 'start_wednesday')) : ?>
                                <th>Wednesday</th>
                                <?php endif; ?>
                                <?php if (hasuserSchedData($userSched, 'start_thursday')) : ?>
                                <th>Thursday</th>
                                <?php endif; ?>
                                <?php if (hasuserSchedData($userSched, 'start_friday')) : ?>
                                <th>Friday</th>
                                <?php endif; ?>
                                <th>Course</th>
                                <th>Professor</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                        $ids = array_combine(
                            explode(',', $userSched[0]['subject_id']),
                            array_map(function($sub, $teacher_id, $str_mon, $en_mon, $str_tue, $en_tue, $str_wed, $en_wed, $str_thu, $en_thu, $str_fri, $en_fri) use ($teacher, $subs) {
                                $teacher_name = '';
                                foreach ($teacher as $teachers) {
                                    if ($teachers['id'] == $teacher_id) {
                                        $teacher_name = $teachers['firstname'] . ' ' . $teachers['middlename'] . ' ' . $teachers['lastname'];
                                        break;
                                    }
                                }
                                $subss = '';
                                foreach ($subs as $subsss) {
                                    if ($subsss['id'] == $sub) {
                                        $subss = $subsss['subject'];
                                        break;
                                    }
                                }                                
                                return [
                                    'subss' => $subss,
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
                                ];
                            }, 
                            explode(',', $userSched[0]['subject_id']),
                            explode(',', $userSched[0]['teacher_id']),
                            explode(',', $userSched[0]['start_monday']),
                            explode(',', $userSched[0]['end_monday']),
                            explode(',', $userSched[0]['start_tuesday']),
                            explode(',', $userSched[0]['end_tuesday']),
                            explode(',', $userSched[0]['start_wednesday']),
                            explode(',', $userSched[0]['end_wednesday']),
                            explode(',', $userSched[0]['start_thursday']),
                            explode(',', $userSched[0]['end_thursday']),
                            explode(',', $userSched[0]['start_friday']),
                            explode(',', $userSched[0]['end_friday'])
                        ));
                        
                        // Function para i-compare ang `str_mon` values
                        function compareStrMon($a, $b) {
                            $strMonA = strtotime($a['str_mon']);
                            $strMonB = strtotime($b['str_mon']);
                            
                            // Kung ang `str_mon` ay pareho, i-validate ang `str_tue`
                            if ($strMonA === $strMonB) {
                                $strTueA = strtotime($a['str_tue']);
                                $strTueB = strtotime($b['str_tue']);
                                
                                return $strTueA - $strTueB;
                            }
                            
                            return $strMonA - $strMonB;
                        }
                        
                        // I-sort ang `$ids` array gamit ang `compareStrMon` function
                        usort($ids, 'compareStrMon');
                        
                                                               
                        ?>

                            <?php foreach ($subs as $stdnt_sjct): ?>
                            <?php if (isset($ids[$stdnt_sjct['id']])): ?>
                            <?php if (hasNoData($ids[$stdnt_sjct['id']])) continue; ?>
                            <tr>
                                <?php if (isset($ids[$stdnt_sjct['id']]['str_mon']) && !empty($ids[$stdnt_sjct['id']]['str_mon']) && $ids[$stdnt_sjct['id']]['str_mon'] !== '06:00 PM' && $ids[$stdnt_sjct['id']]['en_mon'] !== '06:00 PM'): ?>
                                <td><?= formatTime($ids[$stdnt_sjct['id']]['str_mon']) . ' - ' . formatTime($ids[$stdnt_sjct['id']]['en_mon']); ?>
                                </td>
                                <?php endif; ?>
                                <?php if (isset($ids[$stdnt_sjct['id']]['str_tue']) && !empty($ids[$stdnt_sjct['id']]['str_tue']) && $ids[$stdnt_sjct['id']]['str_tue'] !== '06:00 PM' && $ids[$stdnt_sjct['id']]['en_tue'] !== '06:00 PM'): ?>
                                <td><?= formatTime($ids[$stdnt_sjct['id']]['str_tue']) . ' - ' . formatTime($ids[$stdnt_sjct['id']]['en_tue']); ?>
                                </td>
                                <?php endif; ?>
                                <?php if (isset($ids[$stdnt_sjct['id']]['str_wed']) && !empty($ids[$stdnt_sjct['id']]['str_wed']) && $ids[$stdnt_sjct['id']]['str_wed'] !== '06:00 PM' && $ids[$stdnt_sjct['id']]['en_wed'] !== '06:00 PM'): ?>
                                <td><?= formatTime($ids[$stdnt_sjct['id']]['str_wed']) . ' - ' . formatTime($ids[$stdnt_sjct['id']]['en_wed']); ?>
                                </td>
                                <?php endif; ?>
                                <?php if (isset($ids[$stdnt_sjct['id']]['str_thu']) && !empty($ids[$stdnt_sjct['id']]['str_thu']) && $ids[$stdnt_sjct['id']]['str_thu'] !== '06:00 PM' && $ids[$stdnt_sjct['id']]['en_thu'] !== '06:00 PM'): ?>
                                <td><?= formatTime($ids[$stdnt_sjct['id']]['str_thu']) . ' - ' . formatTime($ids[$stdnt_sjct['id']]['en_thu']); ?>
                                </td>
                                <?php endif; ?>
                                <?php if (isset($ids[$stdnt_sjct['id']]['str_fri']) && !empty($ids[$stdnt_sjct['id']]['str_fri']) && $ids[$stdnt_sjct['id']]['str_fri'] !== '06:00 PM' && $ids[$stdnt_sjct['id']]['en_fri'] !== '06:00 PM'): ?>
                                <td><?= formatTime($ids[$stdnt_sjct['id']]['str_fri']) . ' - ' . formatTime($ids[$stdnt_sjct['id']]['en_fri']); ?>
                                </td>
                                <?php endif; ?>
                                <td><?= $ids[$stdnt_sjct['id']]['subss']; ?></td>
                                <td><?= $ids[$stdnt_sjct['id']]['teacher_name']; ?></td>
                            </tr>

                            <?php endif; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <br><br>

                    <?php
$ids = array_combine(
    explode(',', $userSched[0]['subject_id']),
    array_map(function ($sub, $teacher_id, $str_sat, $en_sat) use ($teacher, $subs) {
        $teacher_name = '';
        foreach ($teacher as $teachers) {
            if ($teachers['id'] == $teacher_id) {
                $teacher_name = $teachers['firstname'] . ' ' . $teachers['middlename'] . ' ' . $teachers['lastname'];
                break;
            }
        }
        $subss = '';
        foreach ($subs as $subsss) {
            if ($subsss['id'] == $sub) {
                $subss = $subsss['subject'];
                break;
            }
        }
        return [
            'subss' => $subss,
            'teacher_name' => $teacher_name,
            'str_sat' => $str_sat,
            'en_sat' => $en_sat,
        ];
    },
        explode(',', $userSched[0]['subject_id']),
        explode(',', $userSched[0]['teacher_id']),
        explode(',', $userSched[0]['start_saturday']),
        explode(',', $userSched[0]['end_saturday']),
    ));

// Function para i-compare ang `str_mon` values
function compareStrSat($a, $b)
{
    return strtotime($a['str_sat']) - strtotime($b['str_sat']);
}

// I-sort ang `$ids` array gamit ang `compareStrMon` function
usort($ids, 'compareStrSat');

$userSchedsExist = false;

foreach ($subs as $stdnt_sjct) {
    if (isset($ids[$stdnt_sjct['id']])) {
        $data = $ids[$stdnt_sjct['id']];
        if (empty($data['str_sat']) && empty($data['en_sat'])) continue;
        if (!$userSchedsExist) {
            $userSchedsExist = true;
            echo '<table id="" class="table table-bordered table-striped" style="font-family: poppins">';
            echo '<thead>';
            echo '<tr>';
            echo '<th>Saturday</th>';
            echo '<th>Course</th>';
            echo '<th>Professor</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
        }
        echo '<tr>';
        echo '<td>' . formatTime($data['str_sat']) . ' - ' . formatTime($data['en_sat']) . '</td>';
        echo '<td>' . $ids[$stdnt_sjct['id']]['subss'] . '</td>';
        echo '<td>' . $data['teacher_name'] . '</td>';
        echo '</tr>';
    }
}

if ($userSchedsExist) {
    echo '</tbody>';
    echo '</table>';
}
?>




            <?php else:?>
                <section class="content-header">
            <div class="card card-primary card-outline mx-auto" style="">
                <div class="card-body">
                <div class="table-responsive">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- /.card-header -->
                                <table id="example1" class="table table-bordered table" style="font-family:poppins">
                                
                                    <thead>
                                    <tr>
                                <th style="width:auto;" id="button-room-student"
                                    colspan="<?= getColspanCount($userSched) ?>">
                                    <?= $userSched[0]['strand'] . ' (ROOM - ' . $userSched[0]['room'] . ') ' ?>
                                </th>
                            </tr>
                                        <br>
                                        <br>

                                        <tr>
                                            <th>Monday</th>
                                            <th>Tuesday</th>
                                            <th>Wednesday</th>
                                            <th>Thursday</th>
                                            <th>Friday</th>
                                            <th>Course</th>
                                            <th>Profesor</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                        $ids = array_combine(
                            explode(',', $userSched[0]['subject_id']),
                            array_map(function($sub, $teacher_id, $str_mon, $en_mon, $str_tue, $en_tue, $str_wed, $en_wed, $str_thu, $en_thu, $str_fri, $en_fri) use ($teacher, $subs) {
                                $teacher_name = '';
                                foreach ($teacher as $teachers) {
                                    if ($teachers['id'] == $teacher_id) {
                                        $teacher_name = $teachers['firstname'] . ' ' . $teachers['middlename'] . ' ' . $teachers['lastname'];
                                        break;
                                    }
                                }
                                $subss = '';
                                foreach ($subs as $subsss) {
                                    if ($subsss['id'] == $sub) {
                                        $subss = $subsss['subject'];
                                        break;
                                    }
                                }                                
                                return [
                                    'subss' => $subss,
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
                                ];
                            }, 
                            explode(',', $userSched[0]['subject_id']),
                            explode(',', $userSched[0]['teacher_id']),
                            explode(',', $userSched[0]['start_monday']),
                            explode(',', $userSched[0]['end_monday']),
                            explode(',', $userSched[0]['start_tuesday']),
                            explode(',', $userSched[0]['end_tuesday']),
                            explode(',', $userSched[0]['start_wednesday']),
                            explode(',', $userSched[0]['end_wednesday']),
                            explode(',', $userSched[0]['start_thursday']),
                            explode(',', $userSched[0]['end_thursday']),
                            explode(',', $userSched[0]['start_friday']),
                            explode(',', $userSched[0]['end_friday'])
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
                                                <td><?= $ids[$stdnt_sjct['id']]['subss']; ?></td>
                                            <td><?= $ids[$stdnt_sjct['id']]['teacher_name']; ?></td>
                                        </tr>
                                        <?php endif; ?>
                                        <?php endforeach; ?>



                                    </tbody>
                                </table>
                            </div>
                            <!-- /.content -->
                        </div>
                    </div>
                </div>
            </div>
    </div>

    </section>
            <?php endif;?>
            </div>
            </div>
            </div>
            </div>
            <?php
function formatTime($time)
{
    $timeArray = explode(',', $time); // Convert the comma-separated string to an array
    sort($timeArray); // Sort the time values in ascending order
    
    $formattedTimes = [];
    foreach ($timeArray as $times) {
        $formattedTimes = date('h:i A', strtotime($times));
    }
    return date('h:i A', strtotime($formattedTimes));

}

function hasuserSchedData($data, $day)
{
    foreach ($data as $entry) {
        if (!empty($entry[$day]) && strpos($entry[$day], ',')) {
            return true;
        }
    }
    return false;
}


function hasNoData($data)
{
    $days = ['mon', 'tue', 'wed', 'thu', 'fri', 'sat'];
    foreach ($days as $day) {
        if (!empty($data['str_' . $day]) && $data['str_' . $day] !== '06:00 PM' && $data['en_' . $day] !== '06:00 PM') {
            return false;
        }
    }
    return true;
}
function getColspanCount($userSched) {
    $colspan = 0;

    if (hasuserSchedData($userSched, 'start_monday')) {
        $colspan++;
    }
    if (hasuserSchedData($userSched, 'start_tuesday')) {
        $colspan++;
    }
    if (hasuserSchedData($userSched, 'start_wednesday')) {
        $colspan++;
    }
    if (hasuserSchedData($userSched, 'start_thursday')) {
        $colspan++;
    }
    if (hasuserSchedData($userSched, 'start_friday')) {
        $colspan++;
    }

    // Add extra colspan for Subject and Professor columns
    $colspan += 2;

    return $colspan;
}

?>
</body>

<?= $this->include('user/include/end')?>
<?= $this->include('user/include/footer')?>