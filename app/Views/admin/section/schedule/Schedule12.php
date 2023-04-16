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
                        <li class="nav-item" style="font-family:poppins;">
                            <a href="<?=base_url('/pre_enrolled_reg')?>" class="nav-link">
                                <i class="far fa-thin fa-newspaper"></i>
                                <p>Pre-Enrolled</p>
                            </a>
                        </li>
                        </li>
                        <li class="nav-item menu-open" style="font-family:poppins;">

                            <a href="#" class="nav-link active">
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
                                    <a href="<?= site_url('section11/' . $year_levelTwo['id']);?>"
                                        class="nav-link active">
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
                                    <a href="<?= site_url('section11/' . $year_levelTwo['id']);?>"
                                        class="nav-link active">
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
                                    <a href="/prospectus11" class="nav-link ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Grade 11</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/prospectus12" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Grade 12</p>
                                    </a>
                                </li>
                                <?php else: ?>
                                <li class="nav-item">
                                    <a href="/prospectus11" class="nav-link ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>1st Year</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/prospectus12" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>2nd Year</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/prospectus3rd" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>3rd Year</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/prospectus4th" class="nav-link">
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

        <script src="<?= base_url()?>/dist/js/sweetalert.js"></script>
        <?php if(!empty(session()->getFlashdata('duplicate'))) : ?>
        <script>
        swal("Duplicate Input!", "You already set the schedule of this section.", "warning");
        </script>
        <?php endif ?>

        <?php if(!empty(session()->getFlashdata('updatesection'))) : ?>
        <script>
        swal("Updated Successfully!", "Chaged has made.", "success");
        </script>
        <?php endif ?>

        <?php if(!empty(session()->getFlashdata('added'))) : ?>
        <script>
        swal("Added Successfully!", "You successfully added schedule.", "success");
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
                <div class="card-header">
                    <?php foreach($section as $sect):?>
                    <button type="button" class="btn btn-section"
                        style="border-radius:20px;background-color:maroon; color: white;"
                        data-id='<?=$sect['id']?>'>Add</button>
                    <?= $this->include('admin/section/schedule/addSchedule11')?>
                    <?php endforeach;?>
                </div>
                <div class="card-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- /.card-header -->


                                <table id="example1" class="table table-bordered table" style="font-family:poppins">
                                    <thead>
                                        <?php //foreach($section as $sect): ?>
                                        <tr>
                                            <th>Subject</th>
                                            <th>Monday</th>
                                            <th>Tuesday</th>
                                            <th>Wednesday</th>
                                            <th>Thursday</th>
                                            <th>Friday</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($sched as $new):?>
                                        <tr>
                                            <td><?=$new['subject'];?></td>
                                            <td><?=$new['monday'];?> <?= '-'?> <?=$new['mon_two'];?></td>
                                            <td><?=$new['tuesday'];?> <?= '-'?> <?=$new['tue_two'];?></td>
                                            <td><?=$new['wednesday'];?> <?= '-'?> <?=$new['wed_two'];?></td>
                                            <td><?=$new['thursday'];?> <?= '-'?> <?=$new['thu_two'];?></td>
                                            <td><?=$new['friday'];?> <?= '-'?> <?=$new['fri_two'];?></td>
                                            <td>
                                                <button type="button" class="btn btn-update"
                                                    style="border-radius:20px;background-color:maroon; color: white;"
                                                    data-id="<?=$new['id'];?>" data-teacher="<?=$new['teacher_id'];?>"
                                                    data-mon_one="<?=$new['monday'];?>"
                                                    data-mon_two="<?=$new['mon_two'];?>"
                                                    data-tue_one="<?=$new['tuesday'];?>"
                                                    data-tue_two="<?=$new['tue_two'];?>"
                                                    data-wed_one="<?=$new['wednesday'];?>"
                                                    data-wed_two="<?=$new['wed_two'];?>"
                                                    data-thu_one="<?=$new['thursday'];?>"
                                                    data-thu_two="<?=$new['thu_two'];?>"
                                                    data-fri_one="<?=$new['friday'];?>"
                                                    data-fri_two="<?=$new['fri_two'];?>"
                                                    data-subject="<?=$new['subject'];?>">Update</button>
                                                <?= $this->include('admin/section/schedule/updateSchedule11')?>
                                            </td>
                                        </tr>

                                        </tr>
                                        <?php endforeach;?>
                                    </tbody>
                                    <tfoot>
                                    </tfoot>
                                </table>
                                <!-- /.card-body -->
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
    $('.btn-section').on('click', function() {
        // data galing buton
        const id = $(this).data('id');
        // // sa modal
        $('.id').val(id);
        // Call Modal
        $('#addSchedule').modal('show');
    });
    $('.btn-update').on('click', function() {
        // data galing buton
        const id = $(this).data('id');
        const subject = $(this).data('subject');
        const teacher = $(this).data('teacher');
        const mon_one = $(this).data('mon_one');
        const mon_two = $(this).data('mon_two');
        const tue_one = $(this).data('tue_one');
        const tue_two = $(this).data('tue_two');
        const wed_one = $(this).data('wed_one');
        const wed_two = $(this).data('wed_two');
        const thu_one = $(this).data('thu_one');
        const thu_two = $(this).data('thu_two');
        const fri_one = $(this).data('fri_one');
        const fri_two = $(this).data('fri_two');
        // // sa modal
        $('.id').val(id);
        $('.subject').val(subject);
        $('.teacher').val(teacher);
        $('.mon_one').val(mon_one);
        $('.mon_two').val(mon_two);
        $('.tue_one').val(tue_one);
        $('.tue_two').val(tue_two);
        $('.wed_one').val(wed_one);
        $('.wed_two').val(wed_two);
        $('.thu_one').val(thu_one);
        $('.thu_two').val(thu_two);
        $('.fri_one').val(fri_one);
        $('.fri_two').val(fri_two);
        // Call Modal
        $('#updateSched').modal('show');
    });
});
</script>