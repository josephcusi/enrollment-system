<?= $this->include('admin/include/top')?>
<!--include top-->

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
    <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background-color:maroon">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fa-solid fa-bars-staggered"
                    style="color:white"></i></a>

        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="<?=base_url()?>/admin" class="nav-link"
                style="color:white;font-family:poppins;"><strong>Home</strong></a>
        </li>
      
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-1 pb-1 mb-1 d-flex">

            <div class="image" style="margin-left:-15%">
                <img style="background-image:url(../../dist/img/profile.jpg); border-color:maroon; background-size:cover; width:35px; height:35px;"
                    src="<?= base_url().'/'.'registrar-profile/' . $userName[0]['email'] . '/' . $userName[0]['profile_picture'] ?>" class="img-fluid img-circle">
            </div>
        </div>
        <div class="dropdown">
            <div class="info">
                <a class="d-block"
                    style="color:white; background-color:#212529; font-family:poppins;  margin-top:1.5%; border-radius:18px; padding:7px"
                    href="#">

                    <?= isset($userName[0]['firstname']) ? $userName[0]['firstname'] : $userName[0]['firstname'];?>
                    <?=" " ?>
                    <?= isset($userName[0]['lastname']) ? $userName[0]['lastname'] : $userName[0]['lastname']; ?>
                </a>
                <div class="dropdown-content " style="margin-left:30%; margin-top:2%;">
                    <a href="<?=site_url()?>logout" style="font-family:poppins; margin-left:17%; font-weight:bolder"
                        method="post">LOGOUT</a>
                </div>
            </div>
        </div>

        <!-- Messages Dropdown Menu -->
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt" style="color:white"></i>
            </a>
        </li>
        <li class="nav-item">
            <label class="switch">
                <?php if($sem_year['enroll_status'] == 'on'):?>
                <input type="checkbox" class="checkkboxx" data-id="<?=$sem_year['id']?>" data-status="off" checked>
                <span class="slider round"></span>
                <?php else:?>
                <input type="checkbox" class="checkkboxx" data-id="<?=$sem_year['id']?>" data-status="on">
                <span class="slider round"></span>
                <?php endif;?>
               
            </label>
        </li>
    </ul>

</nav>
<?= $this->include('admin/modal/yearModal')?>

<script src="<?=base_url()?>/cssjs/js/jquery.min.js"></script>
<script src="<?=base_url()?>/cssjs/js/bundle.min.js"></script>

<script>
$(document).ready(function() {
    // sa button
    $('.btn-year').on('click', function() {
        // data galing buton
        const id = $(this).data('id');
        const year = $(this).data('year');
        const sem = $(this).data('sem');
        // // sa modal
        $('.id').val(id);
        $('.yearModal').val(year);
        $('.semester').val(sem).trigger('change');
        // Call Modal
        $('#year').modal('show');
    });
});
</script>
<script>
$(document).ready(function() {
    $('input[class="checkkboxx"]').on('change', function() {
        var id = $(this).data('id');
        var status = $(this).is(':checked') ? 'on' : 'off';

        $.ajax({
            url: '/enrollment_status',
            type: 'POST',
            data: {
                id: id,
                status: status
            },
            success: function(response) {
                if (status == 'on') {
                    swal({
                        title: "Enrollment On Going",
                        text: "Enrollment is open",
                        icon: "success",
                       buttons: false,
                        timer: 1000,
                    });
                } else {
                    swal({
                        title: "Enrollment is CLOSED",
                        text: "Enrollment is not ongoing",
                        icon: "success",
                       buttons: false,
                        timer: 1000,
                    });
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });
    });
});
</script>
<style>
.switch {
    position: relative;
    display: inline-block;
    width: 40px;
    height: 20px;
    margin-top: 25%;

}

.switch input {
    opacity: 0;
    width: 0;
    height: 0;
}

.slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 5px;
    bottom: 0;
    background-color: #ccc;
    -webkit-transition: .4s;
    transition: .4s;
}

.slider:before {
    position: absolute;
    content: "";
    height: 16px;
    width: 16px;
    border-radius: 50%;
    left: 2px;
    bottom: 2px;
    background-color: white;
    -webkit-transition: .4s;
    transition: .4s;
}

input:checked+.slider {
    background-color: #2196F3;
}

input:focus+.slider {
    box-shadow: 0 0 1px #2196F3;
}

input:checked+.slider:before {
    -webkit-transform: translateX(26px);
    -ms-transform: translateX(60px);
    transform: translateX(15px);
}

.slider.round {
    border-radius: 34px;
}

.slider.round:before {
    border-radius: 50%;
}

.switch-label {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    left: 70px;
    font-size: 14px;
    font-weight: bold;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: #2196F3;
}
</style>
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
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->

                        <li class="nav-header" style="font-family:poppins;">Admin</li>
                        <li class="nav-item" style="font-family:poppins;">
                            <a href="<?= base_url().'/admin' ?>" class="nav-link ">
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
                                    <a href="<?= site_url('school_updates/announcement') ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Announcements</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= site_url('school_updates/event') ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Events</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item" style="font-family:poppins;">
                            <a href="<?= base_url('student_approve') ?>" class="nav-link">
                                <i class="far fa-thin fa-newspaper"></i>
                                <p>Student Approval</p>
                            </a>
                        </li>
                        <li class="nav-item" style="font-family:poppins;">
                            <a href="<?= base_url('/studreq') ?>" class="nav-link">
                                <i class="fa-sharp fa-solid fa-envelopes-bulk"></i>
                                <p>Student Request</p>
                            </a>
                        </li>
                          <li class="nav-item" style="font-family:poppins;">
                              <a href="<?=base_url('insert-old-student')?>" class="nav-link">
                                  <i class="far fa-thin fa-newspaper"></i>
                                  <p>Old Student</p>
                              </a>
                          </li>
                        <li class="nav-item" style="font-family:poppins;">
                            <a href="#" class="nav-link ">
                                <i class="fa-sharp fa-solid fa-envelopes-bulk"></i>
                                <p>Pre-Enrolled<i class="right fas fa-angle-left"></i></p>
                            </a>

                            <ul class="nav nav-treeview">
                                <?php if ($stat['status'] === "SHS"): ?>
                                <li class="nav-item">
                                    <a href="<?= base_url('pre-enrolled-registration/Grade-11') ?>" class="nav-link ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Grade 11</p>
                                    </a>
                                <li class="nav-item">
                                    <a href="<?= base_url('pre-enrolled-registration/Grade-12') ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Grade 12</p>
                                    </a>
                                </li>
                                <?php else: ?>
                                <li class="nav-item">
                                    <a href="<?= base_url('pre-enrolled-registration/1st-Year') ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>1st Year</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('pre-enrolled-registration/2nd-Year') ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>2nd Year</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('pre-enrolled-registration/3rd-Year') ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>3rd Year</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('pre-enrolled-registration/4th-Year') ?>" class="nav-link">
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
                                <p>Section<i class="right fas fa-angle-left"></i></p>
                            </a>

                            <ul class="nav nav-treeview">
                                <?php if ($stat['status'] === "SHS"): ?>
                                <li class="nav-item">
                                    <a href="<?= base_url('section/Grade-11') ?>" class="nav-link ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Grade 11</p>
                                    </a>
                                <li class="nav-item">
                                    <a href="<?= base_url('section/Grade-12') ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Grade 12</p>
                                    </a>
                                </li>
                                <?php else: ?>
                                <li class="nav-item">
                                    <a href="<?= base_url('section/1st-Year') ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>1st Year</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('section/2nd-Year') ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>2nd Year</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('section/3rd-Year') ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>3rd Year</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('section/4th-Year') ?>" class="nav-link">
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
                                    <a href="<?= base_url('prospectus/Grade-11') ?>" class="nav-link ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Grade 11</p>
                                    </a>
                                <li class="nav-item">
                                    <a href="<?= base_url('prospectus/Grade-12') ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Grade 12</p>
                                    </a>
                                </li>
                                <?php else: ?>
                                <li class="nav-item">
                                    <a href="<?= base_url('prospectus/1st-Year') ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>1st Year</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('prospectus/2nd-Year') ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>2nd Year</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('prospectus/3rd-Year') ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>3rd Year</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('prospectus/4th-Year') ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>4th Year</p>
                                    </a>
                                </li>
                                <?php endif; ?>
                            </ul>
                        </li>
                        <li class="nav-item menu-open" style="font-family:poppins;">
                            <a href="#" class="nav-link active">
                                <i class="fa-sharp fa-solid fa-envelopes-bulk"></i>
                                <p>Grading<i class="right fas fa-angle-left"></i></p>
                            </a>

                            <ul class="nav nav-treeview">
                                <?php if ($stat['status'] === "SHS"): ?>
                                <li class="nav-item">
                                    <a href="<?= base_url('student-grading/Grade-11') ?>" class="nav-link ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Grade 11</p>
                                    </a>
                                <li class="nav-item">
                                    <a href="<?= base_url('student-grading/Grade-12') ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Grade 12</p>
                                    </a>
                                </li>
                                <?php else: ?>
                                <li class="nav-item">
                                    <a href="<?= base_url('/deadline_form') ?>" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Submission of Grade </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('student-grading/1st-Year') ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>1st Year</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('student-grading/2nd-Year') ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>2nd Year</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('student-grading/3rd-Year') ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>3rd Year</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('student-grading/4th-Year') ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>4th Year</p>
                                    </a>
                                </li>
                                <?php endif; ?>
                            </ul>
                        </li>
                        <li class="nav-item" style="font-family:poppins;">
                            <a href="<?= base_url('/retrieve_strand') ?>" class="nav-link">
                                <i class="fa-sharp fa-solid fa-envelopes-bulk"></i>
                                <p>Strand</p>
                            </a>
                        </li>
                        <li class="nav-item" style="font-family:poppins;">
                            <a href="<?= base_url('/newadmin') ?>" class="nav-link">
                                <i class="nav-icon fa-solid fa-user"></i>
                                <p>Admin</p>
                            </a>
                        </li>
                        <li class="nav-item" style="font-family:poppins;">
                            <a href="<?= base_url('/listofteacher') ?>" class="nav-link">
                                <i class="fa-sharp fa-solid fa-envelopes-bulk"></i>
                                <p>Teachers</p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
    </div>
    <div class="content-wrapper">
        <script src="<?= base_url() ?>/dist/js/sweetalert.js"></script>
        <script src="<?= base_url()?>/dist/js/sweetalert.js"></script>
        <?php if(!empty(session()->getFlashdata('savedeadline'))) : ?>
        <script>
        swal({
            title: "Submission Date Added!",
            text: "You successfully added submission date of grade..",
            icon: "success",
            buttons: false,
            timer: 2000,
        });
        </script>
        <?php endif ?>
         <?php if(!empty(session()->getFlashdata('resetdata'))) : ?>
        <script>
        swal({
            title: "Reset Successfully!",
            text: "You reset the data.",
            icon: "success",
            buttons: false,
            timer: 2000,
        });
        </script>
        <?php endif ?>
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="a" style="color:maroon; font-family: 'Poppins';font-size: 22px">
                            <strong>Submission of Grade</strong>
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active" style="color:maroon;font-family: 'Poppins';">Grade</li>
                            <li class="breadcrumb-item active" style="font-family: 'Poppins';">Submission of Grade</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
<br>
<br>
<br>
<br>
        <!-- Main content -->
        <section class="content" style = "width:100%;" >

            <div class="container-fluid" >
                <!-- Info boxes -->
                <!-- neww -->
                <div class="row" style="font-family:poppins;">
                    <!-- ./col -->
                    <!-- ./col -->
                    <!-- small box -->
                    <div class="card card-primary card-outline mx-auto" style = "width:80%;height:50%;">
                            <div class="card-body">
                    <style>
 

label {
    display: block;
    font-weight: bold;
    margin-bottom: 10px;
}

input[type="date"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    outline: none;
}

button {
    display: block;
    width: 100%;
    padding: 10px;
    margin-top: 20px;
    background-color: maroon;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    outline: none;
}

button:hover {
    background-color: maroon;
}

                    </style>
                  
                        <div class="container">
                            <!-- Deadline Date Form Content Here -->
                          
    <!-- Display deadline_datetime -->
   
<br>
    <form action="<?= base_url('save_deadline') ?>" method="post">
        <label for="deadline_date">Start Date:</label>
        <input type="date" id="deadline_date" name="deadline_date" required value="<?= esc($deadline_date) ?>">

        <label for="deadline_time">Start Time:</label>
        <input type="time" id="deadline_time" name="deadline_time" required value="<?= esc($deadline_time) ?>">
        <br>
        <br>
        <br>
        <br>
        <label for="end_date">End Date:</label>
        <input type="date" id="end_date" name="end_date" required value="<?= esc($end_date) ?>">

        <label for="end_time">End Time:</label>
        <input type="time" id="end_time" name="end_time" required value="<?= esc($end_time) ?>">

        <button type="submit" style = "border-color:maroon;">Save Deadline</button>
    </form>
     <form action="<?= base_url('delete_all_data') ?>" method="post">
    <button type="submit" style="border-color: red; background-color: white; color: red;">Reset</button>
</form>
    <br>
                        </div>
               
                    
                    <!-- ./col -->
                </div>
            </div>
            <br>
            
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->

    </div>
    </div>

    </div>


    <!-- Page specific script -->

</body>
<?= $this->include('admin/include/end')?>
<?= $this->include('admin/include/footer')?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
