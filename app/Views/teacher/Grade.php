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
                            <th>Subject</th>
                            <th>Subject Grade</th>
                            <th>Remarks</th>

                        </tr>
                    </thead>
                    <?php if($count_grade == 1):?>
                    <tbody class="userData">
                        <?php 
          $grades = array_combine(explode(",", $student_grade['subject_id']), explode(",", $student_grade['subject_grade']));
          foreach($subject as $sub):
              if(isset($grades[$sub['id']])):
      ?>
                        <tr>
                            <td><?=$sub['subject']?></td>
                            <td><?=$grades[$sub['id']]?></td>
                            <td><?=$student_grade['remark']?></td>
                        </tr>
                        <?php 
            endif;
        endforeach; 
    ?>
                        <button type="button" class="btn btn-default btn-update"
                            style="border-radius:20px;font-family:poppins; background-color:maroon; color: white;" data-id="<?= $student_grade['stud_id']?>" data-lrn="<?= $student_grade['lrn']?>">Update
                        </button>
                        <?php include 'include/grademodal/updategrademodal.php'?>
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
            <button type="button" class="btn btn-default btn-add" style="border-radius:20px;font-family:poppins; background-color:gray; color: white;"
                data-lrn="<?= $info['lrn']?>">Add Grade</button>
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