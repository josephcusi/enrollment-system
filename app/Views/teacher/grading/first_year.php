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
                        <li class="nav-item" style="font-family:poppins;">
                            <a href="<?=base_url('teacher_profile')?>" class="nav-link">
                                <i class="nav-icon fa-solid fa-user"></i>
                                <p>Teacher</p>
                            </a>
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
                                    <a href="<?= site_url('t_dashboard/Grade-11') ;?>"
                                        class="nav-link <?= (strpos(current_url(), 'student_grading/Grade-11' ) !== false) ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Grade 11</p>
                                    </a>
                                </li>
                                <li class="nav-item year-level-nav-item">
                                    <a href="<?= site_url('student_grading/Grade-12') ;?>"
                                        class="nav-link <?= (strpos(current_url(), 'student_grading/Grade-12' ) !== false) ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Grade 12</p>
                                    </a>
                                </li>
                                <?php else: ?>
                                <li class="nav-item year-level-nav-item">
                                    <a href="<?= site_url('student_grading/1st-Year') ;?>"
                                        class="nav-link <?= (strpos(current_url(), 'student_grading/1st-Year' ) !== false) ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>1st Year</p>
                                    </a>
                                </li>
                                <li class="nav-item year-level-nav-item">
                                    <a href="<?= site_url('student_grading/2nd-Year') ;?>"
                                        class="nav-link <?= (strpos(current_url(), 'student_grading/2nd-Year' ) !== false) ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>2nd Year</p>
                                    </a>
                                </li>
                                <li class="nav-item year-level-nav-item">
                                    <a href="<?= site_url('student_grading/3rd-Year') ;?>"
                                        class="nav-link <?= (strpos(current_url(), 'student_grading/3rd-Year' ) !== false) ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>3rd Year</p>
                                    </a>
                                </li>
                                <li class="nav-item year-level-nav-item">
                                    <a href="<?= site_url('student_grading/4th-Year') ;?>"
                                        class="nav-link <?= (strpos(current_url(), 'student_grading/4th-Year' ) !== false) ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>4th Year</p>
                                    </a>
                                </li>
                                <?php endif; ?>
                            </ul>
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
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="<?= base_url()?>/dist/js/sweetalert.js"></script>
        <script>
        <?php if(!empty(session()->getFlashdata('invalid'))) : ?>
        swal({
            title: "Duplicate!",
            text: "You already set grade for this student.",
            icon: "error",
            buttons: false,
            timer: 1000
        });
        <?php endif ?>



        <?php if(!empty(session()->getFlashdata('updated'))) : ?>
        swal({
            title: "Grade Updated!",
            text: "Thank you for updating the grades of students.",
            icon: "success",
            buttons: false,
            timer: 1000
        });
        <?php endif ?>

        <?php if(!empty(session()->getFlashdata('teacher'))) : ?>
        swal({
            title: "Welcome <?= isset($userName['firstname']) ? $userName['firstname'] : $userName['firstname'];?>!",
            text: "You successfully logged in to your account.",
            icon: "success",
            buttons: false,
            timer: 1000
        });
        <?php endif ?>

        <?php if(!empty(session()->getFlashdata('invalidd'))) : ?>
        swal({
            title: "Invalid file format!",
            text: "The file format you uploaded was invalid.",
            icon: "error",
            buttons: false,
            timer: 1000
        });
        <?php endif ?>

        <?php if(!empty(session()->getFlashdata('gradeadded'))) : ?>
        swal({
            title: "Grade added!",
            text: "Thank you for submitting the grades of students.",
            icon: "success",
            buttons: false,
            timer: 1000
        });
        <?php endif ?>
        </script>


        <!-- Main content -->
        <section class="content-header">

            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>
                            <class="a" style="color:maroon; font-family: 'Poppins';font-size: 22px">
                                <strong>GRADING</strong>
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active" style="color:maroon;font-family: 'Poppins';">Admin</li>
                            <li class="breadcrumb-item active" style="font-family: 'Poppins';">Grading</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-3">
                        <div class="card card-primary card-outline" style="">
                            <div class="card-body box-profile">
                                <div class="text-center"></div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <ul class="list-group list-group-unbordered mb-3 nav nav-pills">
                                            <li class="nav-item">
                                                <a type="text"
                                                    style="border-radius:20px; font-family:poppins;font-weight:bold;"><span
                                                        style="color:maroon;">Start:</span><br>
                                                    <?=$deadline_date?><br><?=$deadline_time?></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <ul class="list-group list-group-unbordered mb-3 nav nav-pills">
                                            <li class="nav-item" style="">
                                                <a type="text"
                                                    style="border-radius:20px;font-family:poppins; font-weight:bold;"><span
                                                        style="color:maroon;">End:</span>
                                                    <br><?=$end_date?><br><?=$end_time?> </a>
                                            </li>
                                        </ul>
                                        <!-- Additional text at the bottom -->

                                    </div>
                                    <p style="font-family:poppins;text-align:; color: #666;"><span
                                            style="color:maroon;font-weight:bold;">Reminder:</span> You must submit
                                        grade until the given time, once late, you can't be able to submit grade.
                                        Contact registrar if ever you missed the deadline time. </p>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div class="card card-primary " style="font-family:poppins;font-weight:bold;">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                </div>
                                <p class="text-muted text-left">Program</p>
                                <ul class="list-group list-group-unbordered mb-3 nav nav-pills">
                                    <?php if ($stat['status'] === "SHS"): ?>
                                    <?php $strand = session()->getFlashdata('strand');?>
                                    <!-- <?php foreach($section_name as $asdasd):?>
                                    <?php endforeach;?> -->
                                    <li class="nav-item"><a type="button"
                                            class="tablinks nav-link <?php if($strand == 'GAS'){echo 'active' ;} ?>"
                                            style="border-radius:20px" id="defaultOpen"
                                            href="<?= base_url('student_grading/'. $year_level . '/' . 'GAS')?>">GAS</a>
                                    </li>
                                    <li class="nav-item"><a type="button"
                                            class="tablinks nav-link <?php if($strand == 'CSS'){echo 'active' ;} ?>"
                                            style="border-radius:20px" id="defaultOpen"
                                            href="<?= base_url('student_grading/'. $year_level . '/' . 'CSS')?>">CSS</a>
                                    </li>
                                    <li class="nav-item"><a type="button"
                                            class="tablinks nav-link <?php if($strand == 'HUMSS'){echo 'active' ;} ?>"
                                            style="border-radius:20px" id="defaultOpen"
                                            href="<?= base_url('student_grading/'. $year_level . '/' . 'HUMSS')?>">HUMSS</a>
                                    </li>
                                    <li class="nav-item"><a type="button"
                                            class="tablinks nav-link <?php if($strand == 'SMAW'){echo 'active';} ?>"
                                            style="border-radius:20px" id="defaultOpen "
                                            href="<?= base_url('student_grading/'. $year_level . '/' . 'SMAW')?>">SMAW</a>
                                    </li>
                                    <?php else:?>
                                    <?php $strand = session()->getFlashdata('strand');?>
                                    <li class="nav-item"><a type="button"
                                            class="tablinks nav-link <?php if($strand == 'ABH'){echo 'active' ;} ?>"
                                            style="border-radius:20px" id="defaultOpen"
                                            href="<?= base_url('student_grading/'.$year_level . '/' .'ABH')?>">ABH</a>
                                    </li>
                                    <li class="nav-item"><a type="button"
                                            class="tablinks nav-link <?php if($strand == 'BPA'){echo 'active' ;} ?>"
                                            style="border-radius:20px" id="defaultOpen"
                                            href="<?= base_url('student_grading/'.$year_level . '/' .'BPA')?>">BPA</a>
                                    </li>
                                    <li class="nav-item"><a type="button"
                                            class="tablinks nav-link <?php if($strand == 'BTVTED'){echo 'active' ;} ?>"
                                            style="border-radius:20px" id="defaultOpen"
                                            href="<?= base_url('student_grading/'.$year_level . '/' .'BTVTED')?>">BTVTED</a>
                                    </li>
                                    <?php endif;?>
                                </ul>
                                </ul>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div class="card card-primary " style="font-family:poppins;font-weight:bold;">
                            <div class="card-body box-profile">
                                <div class="text-center"></div>
                                <p class="text-muted text-left">Section</p>
                                <ul class="list-group list-group-unbordered mb-3 nav nav-pills">
                                    <?php if ($stat['status'] === "SHS"): ?>
                                    <?php else:?>
                                    <?php $reg_stats = session()->getFlashdata('reg_stats');?>
                                    <?php foreach($section_name as $student_section):?>
                                    <li class="nav-item">
                                        <a type="button"
                                            class="tablinks nav-link <?php if($reg_stats == $student_section['section']){echo 'active';} ?>"
                                            style="border-radius:20px" id="defaultOpen"
                                            href="<?= base_url('student_grading/'. str_replace(' ', '-', $year_lvl) . '/' . $strand . '/' . str_replace(' ', '-', $student_section['section']))?>"><?= $student_section['section']?></a>
                                    </li>
                                    <?php endforeach;?>
                                    <?php endif;?>
                                </ul>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                        <?php if(!empty($userInfo[0]['strand'])):?>
                        <div class="card card-primary " style="font-family:poppins;font-weight:bold;">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                </div>
                                <p class="text-muted text-left">Courses</p>
                                <ul class="list-group list-group-unbordered mb-3 nav nav-pills">
                                    <?php if ($stat['status'] === "SHS"): ?>
                                    <?php $subtest = session()->getFlashdata('subtest');?>
                                    <?php foreach($test123 as $sub_idsss):
                                    
                                    $sub_idss = str_replace(' ', '-', $sub_idsss['subject'])
                                    ?>
                                    <li class="nav-item"><a type="button"
                                            class="tablinks nav-link <?php if($subtest == $sub_idsss['id']){echo 'active' ;} ?>"
                                            style="border-radius:20px" id="defaultOpen"
                                            href="<?= !empty($userInfo[0]['strand']) ? base_url('student_grading/'.$year_level.'/'.$userInfo[0]['strand'].'/'. $section_name_name . '/' . $sub_idss) : null ?>">
                                            <?= $sub_idsss['subject']?>
                                        </a>
                                    </li>
                                    <?php endforeach;?>

                                    <?php else:?>

                                    <?php $subtest = session()->getFlashdata('subtest');?>
                                    <?php foreach($test123 as $sub_idsss):
                                    
                                            $sub_idss = str_replace(' ', '-', $sub_idsss['subject'])
                                            ?>
                                    <li class="nav-item"><a type="button"
                                            class="tablinks nav-link <?php if($subtest == $sub_idsss['id']){echo 'active' ;} ?>"
                                            style="border-radius:20px" id="defaultOpen"
                                            href="<?= !empty($userInfo[0]['strand']) ? base_url('student_grading/'.$year_level.'/'.$userInfo[0]['strand'].'/'. $section_name_name . '/' . str_replace('+', 'plus',$sub_idss)) : null ?>">
                                            <?= $sub_idsss['subject']?>
                                        </a>
                                    </li>
                                    <?php endforeach;?>

                                    <?php endif;?>

                                </ul>
                                </ul>
                            </div>
                            <!-- /.card-body -->
                        </div>

                        <?php else:?>
                        <?php endif;?>
                        <!-- About Me Box -->


                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="card card-primary card-outline mx-auto" style="">


                            <div class="card-body">

                                <div id="bpa" class="tabcontent">
                                    <table id="example1" class="table table-bordered table" style="font-family:poppins">
                                        <thead>



                                            <?php if(count($userInfo) != 0): ?>
                                            <div>
                                                <div>
                                                    <button type="button" class="btn btn-primary excel-download"
                                                        style="font-family:poppins;" data-year_level="<?= $year_lvl ?>"
                                                        data-strand="<?= isset($userInfo[0]['strand']) ? $userInfo[0]['strand'] : ''; ?>"
                                                        data-section_name="<?= str_replace('-', ' ', $section_name_name)?>">
                                                        Download grading format
                                                    </button>
                                                    <button type="button" class="btn btn-primary excel-upload"
                                                        style="font-family:poppins;" style="margin-left: 10px;"
                                                        data-sub_id="<?= empty($test['id']) ? $userInfo[0]['pros_id'] : $test['id']; ?>"
                                                        data-id="<?= implode(',', array_column($check, 'stud_id')) ?>"
                                                        data-year_level="<?= $year_lvl?>">
                                                        Upload grading format
                                                    </button>
                                                </div>
                                            </div>
                                            <?= $this->include('teacher/include/grademodal/uploadExcel') ?>
                                            <?php else: ?>
                                            <?php endif; ?>
                                            <tr>
                                                <th>Student ID</th>
                                                <th>Name</th>
                                                <th>Section</th>
                                                <th>Program</th>
                                                <th>Grade</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <?php if(empty($check[0]['subject_grade']) || empty($userInfo[0]['subject_grade'])):?>
                                        <tbody>
                                            <?php foreach($userInfo as $user):?>
                                            <tr>
                                                <td><?=$user['lrn'];?></td>
                                                <td><?=$user['firstname'];?> <?= ' '?> <?=$user['middlename'];?>
                                                    <?= ' '?> <?=$user['lastname'];?></td>
                                                <td><?=$user['section'];?></td>
                                                <td><?=$user['strand'];?></td>
                                                <td></td>
                                                <td>
                                                    <button type="submit" class="btn btn-primary button-update-grade"
                                                        data-id="<?= $user['stud_id']?>"
                                                        data-sub="<?= $user['sub_id']?>"
                                                        data-subject="<?= $user['subject']?>"
                                                        data-name="<?= $user['lastname'] . ', ' . $user['firstname'] . ' ' .  $user['middlename']?>"
                                                        data-sub="<?= $user['subject_id']?>"
                                                        data-remark="<?= $user['subject_remark']?>"
                                                        data-grade="<?= $user['subject_grade']?>">Update</button>
                                                </td>
                                            </tr>
                                            <?php endforeach;?>
                                        </tbody>

                                        <?php else:?>
                                        <tbody>
                                            <?php foreach($check as $user):?>
                                            <tr>
                                                <td><?=$user['lrn'];?></td>
                                                <td><?=$user['firstname'];?> <?= ' '?> <?=$user['middlename'];?>
                                                    <?= ' '?> <?=$user['lastname'];?></td>
                                                <td><?=$user['section'];?></td>
                                                <td><?=$user['strand'];?></td>
                                                <?php
                                                $sub_ids = !empty($user['sub_id']) ? explode(',', $user['sub_id']) : array();
                                                $grades = !empty($user['subject_grade']) ? explode(',', $user['subject_grade']) : array();
                                                ?>
                                                <td>
                                                    <?php foreach ($sub_ids as $index => $sub_id): ?>
                                                    <?php if ($sub_id == (empty($test['id']) ? $user['pros_id'] : $test['id'])): ?>
                                                    <?= isset($grades[$index]) ? $grades[$index] : 'NONE'; ?>
                                                    <?php endif; ?>
                                                    <?php endforeach; ?>

                                                </td>
                                                </td>
                                                <td>
                                                    <button type="submit" class="btn btn-primary button-update-grade"
                                                        style="font-family:poppins;" data-id="<?= $user['stud_id']?>"
                                                        data-sub="<?= $user['sub_id']?>"
                                                        data-subject="<?= empty($test['subject']) ? $user['subject'] : $test['subject'] ?>"
                                                        data-name="<?= $user['lastname'] . ', ' . $user['firstname'] . ' ' .  $user['middlename']?>"
                                                        data-subject_id="<?= isset($test['id']) ? $test['id'] : $user['pros_id']?>"
                                                        data-remark="<?= $user['subject_remark']?>"
                                                        data-grade="<?= $user['subject_grade']?>">Update</button>
                                                </td>
                                            </tr>
                                            <?php endforeach;?>
                                        </tbody>
                                        <?php endif;?>
                                        <tfoot>
                                        </tfoot>
                                    </table>
                                    <?php if(count($check) == 0 and count($check) == 0):?>
                                    <div id="buttonSubmit" class="modal-footer justify-content-between"
                                        style="font-family:poppins;">
                                        <button type="submit" class="btn btn-primary button-submit-grade"
                                            data-lrn="<?= implode(',', array_column($userInfo, 'lrn')) ?>"
                                            data-year_level="<?= $year_lvl?>">Submit
                                            Grade</button>
                                    </div>
                                    <?= $this->include('teacher/include/grademodal/grademodal') ?>
                                    <?php else:?>
                                    <div id="buttonSubmit" class="modal-footer justify-content-between"
                                        style="font-family:poppins;">
                                        <button type="submit" class="btn btn-primary button-update-grading"
                                            data-id="<?= implode(',', array_column($check, 'stud_id')) ?>"
                                            data-lrn="<?= implode(',', array_column($check, 'lrn')) ?>">Submit
                                            Grade</button>
                                    </div>
                                    <?= $this->include('teacher/include/grademodal/new_grademodal') ?>
                                    <?php endif;  ?>
                                </div>
                                <?= $this->include('teacher/include/grademodal/updategrademodal') ?>
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
            </div>

            <!-- /.col -->
    </div>
    <!-- /.row -->
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
</body>
<?= $this->include('admin/include/end')?>
<?= $this->include('admin/include/footer')?>
<script>
// Set the start date and end date from PHP variables in UTC format
const startDateUTC = '<?=$deadline_datetime?>'; // Format: YYYY-MM-DDTHH:mm:ss
const endDateUTC = '<?=$end_datetime?>'; // Format: YYYY-MM-DDTHH:mm:ss

// Function to convert UTC date to local date
function convertToLocaleDate(utcDate) {
    const utcDateTime = new Date(utcDate);
    const localDateTime = utcDateTime.toLocaleString();

    return localDateTime;
}

// Function to check if the current date is within the range of start and end dates
function isWithinDateRange() {
    const currentDate = new Date();

    return currentDate >= new Date(startDateUTC) && currentDate <= new Date(endDateUTC);
}

// Function to enable buttons if within date range
function enableButtons() {
    const uploadButton = document.querySelector('.excel-upload');
    const downloadButton = document.querySelector('.excel-download');
    const updateButtons = document.querySelectorAll('.button-update-grade');
    const submitButton = document.querySelector('.button-update-grading');

    if (isWithinDateRange()) {
        uploadButton.removeAttribute('disabled');
        downloadButton.removeAttribute('disabled');
        updateButtons.forEach((button) => button.removeAttribute('disabled'));
        submitButton.removeAttribute('disabled');
    } else {
        uploadButton.setAttribute('disabled', 'disabled');
        downloadButton.setAttribute('disabled', 'disabled');
        updateButtons.forEach((button) => button.setAttribute('disabled', 'disabled'));
        submitButton.setAttribute('disabled', 'disabled');
    }
}

// Function to check the date range status and enable/disable buttons
function checkDateRangeStatus() {
    enableButtons();

    // Display the start date and end date in the user's local time zone
    const startDateElement = document.getElementById('start-date');
    const endDateElement = document.getElementById('end-date');
    startDateElement.textContent = convertToLocaleDate(startDateUTC);
    endDateElement.textContent = convertToLocaleDate(endDateUTC);
}

// Add an event listener for when the page finishes loading and when the user interacts with the page
document.addEventListener('DOMContentLoaded', checkDateRangeStatus);
window.addEventListener('popstate', checkDateRangeStatus);
</script>
<script>
$(document).ready(function() {
    // sa button
    $('.button-submit-grade').on('click', function() {
        // data galing buton
        const lrn = $(this).data('lrn');
        const year_level = $(this).data('year_level');
        // console.log(lrn);
        // // sa modal
        $('.year_level').val(year_level);
        $('.lrn').val(lrn).trigger('change');
        // Call Modal
        $('#addgrade').modal('show');
    });
});
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var sectionLink = document.getElementById('section-link');
    var sectionMenu = document.getElementById('section-menu');
    var currentURL = window.location.href;

    // Add 'active' class to section link if current URL matches
    if (currentURL.includes('t_dashboard/') || currentURL.includes('student_grading/')) {
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
<script>
$(document).ready(function() {
    $('.excel-download').on('click', function() {
        // Get the data from the button
        const year_level = $(this).data('year_level');
        const strand = $(this).data('strand');
        const id = $(this).data('id');
        const section_name = $(this).data('section_name');

        // Set the form data
        const formData = new FormData();
        formData.append('year_level', year_level);
        formData.append('strand', strand);
        formData.append('id', id);
        formData.append('section_name', section_name);

        // Create a hidden form to send the POST request
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = 'https://bccwebportal.com/exceltest';
        form.style.display = 'none';
        document.body.appendChild(form);

        // Append the form data to the form
        for (const pair of formData.entries()) {
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = pair[0];
            input.value = pair[1];
            form.appendChild(input);
        }

        // Submit the form to initiate the file download
        form.submit();

        swal({
            title: 'Student Grading file downloaded!',
            icon: 'success',
            text: 'The student grading file has been downloaded successfully.',
            buttons: false,
            timer: 1000,
        });

        // Refresh the page after a short delay (adjust the delay as needed)
        setTimeout(function() {
            window.location.reload();
        }, 1000); // Refresh after 1 second (1000 milliseconds)
    });
});
</script>


<script>
$(document).ready(function() {
    // sa button
    $('.excel-upload').on('click', function() {
        // data galing buton
        const sub_id = $(this).data('sub_id');
        const id = $(this).data('id');
        const year_level = $(this).data('year_level');
        // console.log(sub_id);
        // // sa 
        $('.id').val(id);
        $('.year_level').val(year_level);
        $('.sub_id').val(sub_id).trigger('change');

        // Call Modal
        $('#excelUpload').modal('show');
    });
});
</script>