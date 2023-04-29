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
                            <a href="<?=base_url('student_approve')?>" class="nav-link">
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
                            <a href="tae.html" class="nav-link">
                                <i class="fa-sharp fa-solid fa-envelopes-bulk"></i>
                                <p>
                                    Section
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <?php if ($stat['status'] === "SHS"): ?>
                                <li class="nav-item">
                                    <a href="<?= site_url('section11/' . $year_levelOne['id']);?>"
                                        class="nav-link">
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
                                    <a href="<?= site_url('section11/' . $year_levelOne['id']);?>"
                                        class="nav-link">
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

                        <li class="nav-item menu-open" style="font-family:poppins;">
                            <a href="#" class="nav-link active">
                                <i class="fa-sharp fa-solid fa-envelopes-bulk"></i>
                                <p>Prospectus<i class="right fas fa-angle-left"></i></p>
                            </a>

                            <ul class="nav nav-treeview">
                                <?php if ($stat['status'] === "SHS"): ?>
                                <li class="nav-item">
                                    <a href="<?= base_url('prospectus11/' . $year_levelOne['id'])?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Grade 11</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                <a href="<?= base_url('prospectus11/' . $year_levelTwo['id'])?>" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Grade 12</p>
                                    </a>
                                </li>
                                <?php else: ?>
                                <li class="nav-item">
                                <a href="<?= base_url('prospectus11/' . $year_levelOne['id'])?>" class="nav-link">
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
                                <a href="<?= base_url('prospectus11/' . $year_levelFourth['id'])?>" class="nav-link active">
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
                        </li>
                        <br>
                        <br>


                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

    </div>
    <div class="content-wrapper">
        <script src="<?= base_url()?>/dist/js/sweetalert.js"></script>
        <?php if(!empty(session()->getFlashdata('updateprospectus'))) : ?>
        <script>
        swal("Updated Successfully!", "Changes has made.", "success");
        </script>
        <?php endif ?>

        <script src="<?= base_url()?>/dist/js/sweetalert.js"></script>
        <?php if(!empty(session()->getFlashdata('subjectadded'))) : ?>
        <script>
        swal("Subject Added!", "You successfully added subject.", "success");
        </script>
        <?php endif ?>


        <?php if(!empty(session()->getFlashdata('notupdatesection'))) : ?>
        <script>
        swal("Duplicate Input!", "Please try another.", "warning");
        </script>
        <?php endif ?>
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>
                            <class="a" style="color:maroon; font-family: 'Poppins';font-size: 22px">
                                <strong>PROSPECTUS</strong>
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active" style="color:maroon;font-family: 'Poppins';">Admin</li>
                            <li class="breadcrumb-item active" style="font-family: 'Poppins';">Prospectus</li>
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
                                <div class="text-center">

                                </div>
                                <p class="text-muted text-left">Strand</p>
                                <ul class="list-group list-group-unbordered mb-3 nav nav-pills">
                                    <?php if ($stat['status'] === "SHS"): ?>
                                    <?php $strand = session()->getFlashdata('strand');?>
                                    <li class="nav-item"><a type="button"
                                            class="tablinks nav-link <?php if($strand == 'GAS'){echo 'active' ;} ?>"
                                            style="border-radius:20px" id="defaultOpen"
                                            href="<?= base_url('strandProspectus11/'. $year_levelFourth['id'] . '/' . 'GAS')?>">GAS</a>
                                    </li>
                                    <li class="nav-item"><a type="button"
                                            class="tablinks nav-link <?php if($strand == 'SMAW'){echo 'active';} ?>"
                                            style="border-radius:20px" id="defaultOpen "
                                            href="<?= base_url('strandProspectus11/'. $year_levelFourth['id'] . '/' . 'SMAW')?>">SMAW</a>
                                    </li>
                                    <?php else:?>
                                    <?php $strand = session()->getFlashdata('strand');?>
                                    <li class="nav-item"><a type="button"
                                            class="tablinks nav-link <?php if($strand == 'ABH'){echo 'active' ;} ?>"
                                            style="border-radius:20px" id="defaultOpen"
                                            href="<?= base_url('strandProspectus11/'.$year_levelFourth['id'] . '/' .'ABH')?>">ABH</a>
                                    </li>
                                    <li class="nav-item"><a type="button"
                                            class="tablinks nav-link <?php if($strand == 'BPA'){echo 'active' ;} ?>"
                                            style="border-radius:20px" id="defaultOpen"
                                            href="<?= base_url('strandProspectus11/'.$year_levelFourth['id'] . '/' .'BPA')?>">BPA</a>
                                    </li>
                                    <li class="nav-item"><a type="button"
                                            class="tablinks nav-link <?php if($strand == 'BTVTED'){echo 'active' ;} ?>"
                                            style="border-radius:20px" id="defaultOpen"
                                            href="<?= base_url('strandProspectus11/'.$year_levelFourth['id'] . '/' .'BTVTED')?>">BTVTED</a>
                                    </li>
                                    <?php endif;?>
                                </ul>
                                </ul>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <!-- About Me Box -->


                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="card card-primary card-outline mx-auto" style=" ">
                            <div class="card-body">


                                <div id="abh" class="tabcontent">
                                    <table id="example1" class="table table-bordered table" style="font-family:poppins">
                                        <thead>
                                            <tr>
                                                <th>Subject Code</th>
                                                <th>Title</th>
                                                <th>Unit</th>
                                                <th>Pre-Requisit</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php foreach($prospectus as $prospect):?>
                                            <tr>
                                                <td><?= $prospect['subject']?></td>
                                                <td><?= $prospect['subject_title']?></td>
                                                <td><?= $prospect['unit']?></td>
                                                <td><?= $prospect['pre_requisit']?></td>
                                                <td>
                                                    <a <button type="button"
                                                        class="btn btn-secondary btn-sm btn-updateProspectus"
                                                        style="border-radius:15px;" data-id="<?=$prospect['id']?>"
                                                        data-subject="<?=$prospect['subject']?>"
                                                        data-subject_title="<?=$prospect['subject_title']?>"
                                                        data-unit="<?=$prospect['unit']?>"
                                                        data-pre_requisit="<?=$prospect['pre_requisit']?>"
                                                        data-year_level="<?=$prospect['year_level']?>"
                                                        data-semester="<?=$prospect['semester']?>">update</button></a>
                                                    <?= $this->include('admin/prospectus/updateprospectus11')?>
                                                </td>
                                            </tr>
                                            <?php endforeach;?>
                                        </tbody>

                                    </table>
                                </div>
                                <div class="card" style="border-radius:15px">
                                    <a class="btn btn-default btn-edit"
                                        style="border-radius:15px;float:right; font-family:poppins; background-color:maroon; color: white;"
                                        data-toggle="modal" data-target="#newSubject">New Subject</a>
                                </div>
                                <div>
                                    <div>
                                        <div class="modal fade subjectmodal" id="newSubject">
                                            <div class="modal-dialog" style="font-family:poppins">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" style="font-family:poppins">Subject
                                                            Maintenance</h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="<?= base_url('/addprospectus11'); ?>"
                                                            method="post">
                                                            <?= csrf_field(); ?>

                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <input type="hidden" name="strand"
                                                                        class="form-control" value="<?= $strand ?>">

                                                                    <label for="inputSubject">Subject Code</label>

                                                                    <input type="text" name="subject"
                                                                        class="form-control" id="inputSubject"
                                                                        placeholder="Subject">
                                                                    <span class="text-danger">
                                                                        <?= isset($validation) ? display_error($validation, 'subject') : '' ?>
                                                                    </span>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="inputTitle">Title</label>
                                                                    <input type="text" name="title" class="form-control"
                                                                        id="inputTitle" placeholder="Title">
                                                                    <span class="text-danger">
                                                                        <?= isset($validation) ? display_error($validation, 'title') : '' ?>
                                                                    </span>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="inputUnit">Unit</label>
                                                                    <input type="text" name="unit" class="form-control"
                                                                        id="inputUnit" placeholder="Unit">
                                                                    <span class="text-danger">
                                                                        <?= isset($validation) ? display_error($validation, 'unit') : '' ?>
                                                                    </span>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="PreRequisit">Pre-requisit</label>
                                                                    <input type="text" name="pre_requisit"
                                                                        class="form-control" id="PreRequisit"
                                                                        placeholder="Pre-Requisit">
                                                                    <span class="text-danger">
                                                                        <?= isset($validation) ? display_error($validation, 'pre_requisit') : '' ?>
                                                                    </span>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="year_level">Year Level</label>
                                                                    <select class="form-control" id="studentStrand"
                                                                        name="year_level">

                                                                        <option type="text" class="form-control"
                                                                            id="year_level" placeholder="Year Level"
                                                                            value="4th Year">4th Year</option>

                                                                    </select>

                                                                    <span class="text-danger">
                                                                        <?= isset($validation) ? display_error($validation, 'year_level') : '' ?>
                                                                    </span>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="semester">Semester</label>
                                                                    <select class="form-control" id="studentStrand"
                                                                        name="semester">
                                                                        <option type="text" class="form-control"
                                                                            id="semester" placeholder="1st Semester"
                                                                            value="<?= $sem_year['semester']?>">
                                                                            <?= $sem_year['semester']?></option>
                                                                    </select>
                                                                    <span class="text-danger">
                                                                        <?= isset($validation) ? display_error($validation, 'semester') : '' ?>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                    </div>
                                                    <!-- Submit button -->
                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-default"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save
                                                            changes</button>
                                                    </div>
                                                    </form>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>


                                        <!-- /.modal -->


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- /.card -->
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
$(document).ready(function() {
    // sa button
    $('.btn-updateProspectus').on('click', function() {
        // data galing buton
        const id = $(this).data('id');
        const subject = $(this).data('subject');
        const subject_title = $(this).data('subject_title');
        const unit = $(this).data('unit');
        const pre_requisit = $(this).data('pre_requisit');
        const year_level = $(this).data('year_level');
        const semester = $(this).data('semester');
        // // sa modal
        $('.id').val(id);
        $('.subjectModal').val(subject);
        $('.subject_titleModal').val(subject_title);
        $('.unitModal').val(unit);
        $('.year_levelModal').val(year_level);
        $('.semesterModal').val(semester);
        $('.pre_requisitModel').val(pre_requisit).trigger('change');
        // Call Modal
        $('#updatesubject').modal('show');
    });
});
</script>