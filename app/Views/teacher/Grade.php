<?= $this->include('teacher/include/top')?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <?= $this->include('teacher/include/navbar')?>
        <aside class="main-sidebar sidebar-dark-secondary elevation-8">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="<?=base_url()?>/dist/img/dormehiLogo.png" alt="dormehi Logo"
                    class="brand-image img-circle elevation-3" style="opacity: 10;">
                <span class="brand-text font-weight-light" style="margin-left:10%;"><strong>DORMEHI</strong></span>
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
                            <a href="<?=base_url('newteacher')?>" class="nav-link">
                                <i class="nav-icon fa-solid fa-user"></i>
                                <p>Teacher</p>
                            </a>
                        </li>
                        <li class="nav-item menu-open" style="font-family:poppins;">
                            <a href="tae.html" class="nav-link active">
                                <i class="fa-sharp fa-solid fa-envelopes-bulk"></i>
                                <p>
                                    Section
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <?php if ($stat['status'] === "SHS"): ?>
                                <li class="nav-item year-level-nav-item">
                                    <a href="<?= site_url('t_dashboard/' . $year_levelOne['id']) ;?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Grade 11</p>
                                    </a>
                                </li>
                                <li class="nav-item year-level-nav-item">
                                    <a href="<?= site_url('t_dashboard/' . $year_levelTwo['id'])  ;?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Grade 12</p>
                                    </a>
                                </li>
                                <?php else: ?>
                                <li class="nav-item year-level-nav-item">
                                    <a href="<?= site_url('t_dashboard/' . $year_levelOne['id'])  ;?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>1st Year</p>
                                    </a>
                                </li>
                                <li class="nav-item year-level-nav-item">
                                    <a href="<?= site_url('t_dashboard/' . $year_levelTwo['id'])   ;?>"
                                        class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>2nd Year</p>
                                    </a>
                                </li>
                                <li class="nav-item year-level-nav-item">
                                    <a href="<?= site_url('t_dashboard/' . $year_levelThird['id'])  ;?>"
                                        class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>3rd Year</p>
                                    </a>
                                </li>
                                <li class="nav-item year-level-nav-item">
                                    <a href="<?= site_url('t_dashboard/' . $year_levelFourth['id'])  ;?>"
                                        class="nav-link">
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
    <?php if(!empty(session()->getFlashdata('addgrade'))) : ?>
    <script>
    swal("Grade Added!", "Registration successfully rejected.", "success");
    </script>
    <?php endif ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <section class="content-header">

            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>
                            <class="a" style="color:maroon; font-family: 'Poppins';font-size: 22px">
                                <strong>GRADE</strong>
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active" style="color:maroon;font-family: 'Poppins';">Grading</li>
                            <li class="breadcrumb-item active" style="font-family: 'Poppins';">Grade</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <div class="card card-primary card-outline mx-auto" style="width:98%;">

            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table" style="font-family:poppins">
                    <thead>
                        <tr>
                            <th>Course</th>
                            <th>Course Grade</th>

                        </tr>
                    </thead>
                    <?php if($test123 == 1):?>
                    <tbody class="userData">
                        <?php 
                                            $ids = array_combine(
                                                explode(',', $grading['subject_id']),
                                                array_map(function($grade, $remark) {
                                                    return [
                                                        'grade' => $grade,
                                                        'remark' => $remark,
                                                    ];
                                                }, explode(',', $grading['subject_grade']), explode(',', $grading['subject_remark']))
                                            );
                                        ?>
                        <?php foreach($stud_sub as $stdnt_sjct):?>
                        <?php if(isset($ids[$stdnt_sjct['id']])):?>
                        <tr>
                            <td><?=$stdnt_sjct['subject'];?></td>
                            <td><?=$ids[$stdnt_sjct['id']]['grade']?></td>
                        </tr>
                        <?php endif; endforeach; ?>
                        <button type="button" class="btn btn-default btn-update"
                            style="border-radius:20px;font-family:poppins; background-color:maroon; color: white;"
                            data-id="<?//= $infoStud['stud_id']?>" data-lrn="<?//= $infoStud['lrn']?>">Update
                        </button>
                        <?//php include 'include/grademodal/updategrademodal.php'?>
                    </tbody>
                    <?php else:?>
                    <tbody class="userData">
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                    <?php endif?>
            </div>
            <button type="button" class="btn btn-default btn-add"
                style="border-radius:20px;font-family:poppins; background-color:gray; color: white;"
                data-lrn="<?= $stud['lrn']?>">Add Grade</button>
            <?php include 'include/grademodal/grademodal.php';?>
            </table>
            <!-- /.card-body -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content -->
    </div>
</body>
<?= $this->include('admin/include/end')?>
<?= $this->include('admin/include/footer')?>
<script>
$(document).ready(function() {
    // sa button
    $('.btn-update').on('click', function() {
        // data galing buton
        const id = $(this).data('id');
        const lrn = $(this).data('lrn');
        // const profile_picture = $(this).data('profile');
        // // sa modal
        $('.idModal').val(id);
        $('.lrn').val(lrn).trigger('change');
        // Call Modal
        $('#updategrade').modal('show');
    });
    $('.btn-add').on('click', function() {
        // data galing buton
        const lrn = $(this).data('lrn');
        // const profile_picture = $(this).data('profile');
        // // sa modal
        $('.lrnModal').val(lrn).trigger('change');
        // Call Modal
        $('#addgrade').modal('show');
    });
});
</script>