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
                            <a href="<?=base_url('newteacher')?>" class="nav-link active">
                                <i class="nav-icon fa-solid fa-user"></i>
                                <p>Teacher</p>
                            </a>
                        </li>
                        <li class="nav-item" style="font-family:poppins;">

                            <a href="#" class="nav-link">
                                <i class="fa-sharp fa-solid fa-envelopes-bulk"></i>
                                <p>Grading<i class="right fas fa-angle-left"></i></p>
                            </a>

                            <ul class="nav nav-treeview">
                                <?php if ($stat['status'] === "SHS"): ?>
                                <li class="nav-item">
                                    <a href="<?= site_url('t_dashboard/' . $year_levelOne['id'])?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Grade 11</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= site_url('t_dashboard/' . $year_levelTwo['id'])?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Grade 12</p>
                                    </a>
                                </li>
                                <?php else: ?>
                                <li class="nav-item">
                                    <a href="<?= site_url('t_dashboard/' . $year_levelOne['id'])?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>1st Year</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= site_url('t_dashboard/' . $year_levelTwo['id'])?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>2nd Year</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= site_url('t_dashboard/' . $year_levelThird['id'])?>"
                                        class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>3rd Year</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= site_url('t_dashboard/' . $year_levelFourth['id'])?>"
                                        class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>4th Year</p>
                                    </a>
                                </li>
                                <?php endif; ?>
                            </ul>
                        </li>
                        </li>
                    </ul>
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
                                <strong>TEACHER</strong>
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active" style="color:maroon;font-family: 'Poppins';">Teacher</li>
                            <li class="breadcrumb-item active" style="font-family: 'Poppins';">Add</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->

        <div class="card-body">
            <div class="card mx-auto" style="width:100%;">
                <!-- /.card-header -->
                <div class="card-body">
                    <!-- /.card-header -->

                    <table id="example1" class="table table-bordered table" style="font-family:poppins">

                        <thead>
                            <tr>
                                <th>Teacher ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($view as $newView):?>
                            <tr>
                                <td><?=$newView['lrn'];?></td>
                                <td><?=$newView['lastname'];?><?= " "?><?=$newView['firstname'];?><?= " "?><?=$newView['middlename'];?>
                                </td>
                                <td><?=$newView['email'];?></td>
                                <td>
                                    <a href="#"> <button type="button" class="btn btn-secondary btn-sm btn-editTeacher"
                                            style="border-radius:20px" data-id="<?=$newView['id'];?>"
                                            data-profile_picture="<?=$newView['profile_picture'];?>"
                                            data-lastname="<?=$newView['lastname'];?>"
                                            data-firstname="<?=$newView['firstname'];?>"
                                            data-middlename="<?=$newView['middlename'];?>"
                                            data-email="<?=$newView['email'];?>"
                                            data-password="<?=$newView['password'];?>">update</button></a>
                                    <?php include 'modal/teacherUpdate.php'?>
                                </td>
                            </tr>
                            <?php endforeach;?>
                        </tbody>
                        <tfoot>
                        </tfoot>
                    </table>
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
<?= $this->include('teacher/include/end')?>
<?= $this->include('teacher/include/footer')?>
<script>
$(document).ready(function() {
    // sa button
    $('.btn-editTeacher').on('click', function() {
        // data galing buton
        const id = $(this).data('id');
        const profile_picture = $(this).data('profile_picture');
        const lastname = $(this).data('lastname');
        const firstname = $(this).data('firstname');
        const middlename = $(this).data('middlename');
        const email = $(this).data('email');
        const password = $(this).data('password');
        // // sa modal
        $('.id').val(id);
        $('.Teacherprofile_pics').val(profile_picture);
        $('.Teacherlastname').val(lastname);
        $('.Teacherfirstname').val(firstname);
        $('.Teachermiddlename').val(middlename);
        $('.Teacheremail').val(email);
        $('.Teacherpassword').val(password).trigger('change');
        // Call Modal
        $('#teacherUpdate').modal('show');
    });
});
</script>