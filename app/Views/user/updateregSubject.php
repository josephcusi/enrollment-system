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
                                <i class="nav-icon fas fa-user"></i>
                                <p>
                                    <strong>My Profile<strong>
                                            <span class="badge badge-info right"></span>
                                </p>
                            </a>
                        </li>

                        <li class="nav-header" style="font-family:poppins;">Maintenance</li>
                        <li class="nav-item" style="font-family:poppins;">
                            <a href="<?=base_url()?>/registration" class="nav-link active">
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

    <!-- Main content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <br>
        <!-- Main content -->

        <section class="content-header">
            <div class="card card-primary card-outline mx-auto" style="width:85%; margin-top:7% ">
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="tab-content">
                                        <div class="active tab-pane" id="basic_info">
                                            <form action="<?= site_url('test')?>" method="post">
                                                <div class="tab-pane" id="credential">
                                                    <div class="card-header">
                                                        <p
                                                            style="font-size:20px; font-family: Poppins;color:maroon; margin-left:45%">
                                                            Course</p>
                                                        <input type="hidden" name="student_registration"
                                                            value="<?=implode(',', $yearSem);?>">
                                                        <input type="hidden" name="student_types"
                                                            value="<?=$student_types;?>">
                                                    </div><br><br>
                                                    <div class="card-body">
                                                        <div class="table-responsive">
                                                            <table id="example1"
                                                                class="table table-bordered table-striped"
                                                                style="font-family:poppins">
                                                                <thead>
                                                                    <tr>
                                                                        <th><input type="checkbox" id="checkAll"
                                                                                checked></th>
                                                                        <th>Course</th>
                                                                        <th>Title</th>
                                                                        <th>Unit</th>
                                                                        <th>Pre-Requisit</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php if($year['semester'] == '1st Semester' && $prospectus[0]['year_level'] == '1st Year'
                                                                    || $year['semester'] =='2nd Semester' && $prospectus[0]['year_level'] == '1st Year'
                                                                    || $student_types == "3"):?>
                                                                    <input type="hidden" name="id"
                                                                        value="<?= $user['id'];?>">
                                                                    <?php foreach($prospectus as $prospectus_value):?>
                                                                    <tr>
                                                                        <td><input type="checkbox" name="subject_id[]"
                                                                                value="<?=$prospectus_value['id'];?>"
                                                                                checked>
                                                                        </td>
                                                                        <td><?= $prospectus_value['subject'];?></td>
                                                                        <td><?= $prospectus_value['subject_title'];?>
                                                                        </td>
                                                                        <td><?= $prospectus_value['unit'];?></td>
                                                                        <td><?= $prospectus_value['pre_requisit'];?>
                                                                        </td>
                                                                        <td style="display: none;"><input type="hidden"
                                                                                name="lrn"
                                                                                value="<?=$userName[0]['lrn']?>">
                                                                        </td>
                                                                        <td style="display: none;"><input type="hidden"
                                                                                name="year" value="<?=$year['year']?>">
                                                                        </td>
                                                                        <td style="display: none;"><input type="hidden"
                                                                                name="semester"
                                                                                value="<?=$year['semester']?>">
                                                                        </td>

                                                                    </tr>
                                                                    <?php endforeach;?>




                                                                    <?php else:?>
                                                                    <input type="hidden" name="id"
                                                                        value="<?= $user['id'];?>">
                                                                    <?php foreach($prospectuss as $prospectus_value):
                                                                                        $test = 'N/A'; // Initialize $test with a default value
                                                                                        foreach ($subAll as $suball) {
                                                                                            if ($suball['id'] == $prospectus_value['pre_requisit']) {
                                                                                                $test = isset($suball['subject']) ? $suball['subject'] : 'N/A';
                                                                                                break; // Break the loop once the prerequisite subject is found
                                                                                            }
                                                                                        }
                                                                
                                                                ?>

                                                                    <tr>
                                                                        <td><input type="checkbox" name="subject_id[]"
                                                                                value="<?=$prospectus_value['id'];?>" checked>
                                                                        </td>
                                                                        <td><?= $prospectus_value['subject'];?></td>
                                                                        <td><?= $prospectus_value['subject_title'];?>
                                                                        </td>
                                                                        <td><?= $prospectus_value['unit'];?></td>
                                                                        <td><?= $test;?></td>
                                                                        <td style="display: none;"><input type="hidden"
                                                                                name="lrn"
                                                                                value="<?=$userName[0]['lrn']?>">
                                                                        </td>
                                                                        <td style="display: none;"><input type="hidden"
                                                                                name="year" value="<?=$year['year']?>">
                                                                        </td>
                                                                        <td style="display: none;"><input type="hidden"
                                                                                name="semester"
                                                                                value="<?=$year['semester']?>">
                                                                        </td>
                                                                    </tr>
                                                                    <?php endforeach;?>
                                                                    <?php endif;?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <?php if(!empty($failedprospectuss)):?>
                                                        <div class="table-responsive">
                                                        <table id="example1" class="table table-bordered table-striped"
                                                            style="font-family:poppins">
                                                            <thead>
                                                                <tr>
                                                                    <th><input type="checkbox" id="checkAll" checked>
                                                                    </th>
                                                                    <th>Course</th>
                                                                    <th>Title</th>
                                                                    <th>Unit</th>
                                                                    <th>Pre-Requisit</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                         
                                                                <?php foreach($failedprospectuss as $failedprospectus_value):
                        $test = 'N/A'; // Initialize $test with a default value
                        foreach ($subAll as $suball) {
                            if ($suball['id'] == $failedprospectus_value['pre_requisit']) {
                                $test = isset($suball['subject']) ? $suball['subject'] : 'N/A';
                                break; // Break the loop once the prerequisite subject is found
                            }
                        }
                    ?>

                                                                <tr>
                                                                    <td><input type="checkbox" name="subject_id[]"
                                                                            value="<?=$failedprospectus_value['id'];?>" checked></td>
                                                                    <td><?= $failedprospectus_value['subject'];?></td>
                                                                    <td><?= $failedprospectus_value['subject_title'];?></td>
                                                                    <td><?= $failedprospectus_value['unit'];?></td>
                                                                    <td><?= $test;?></td>
                                                                    <td style="display: none;"><input type="hidden"
                                                                            name="lrn" value="<?=$userName[0]['lrn']?>">
                                                                    </td>
                                                                    <td style="display: none;"><input type="hidden"
                                                                            name="year" value="<?=$year['year']?>"></td>
                                                                    <td style="display: none;"><input type="hidden"
                                                                            name="semester"
                                                                            value="<?=$year['semester']?>"></td>
                                                                </tr>
                                                                <?php endforeach;?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <?php endif;?>
                                                        <div class="modal-footer justify-content-between">
                                                            <?php session()->setFlashdata('sendapplication', 'shhessh')?>
                                                            <a href="#"><button type="submit" class="btn btn-primary"
                                                                    style="margin-left:100%">Submit</button></a>
                                                        </div>
                                                        <!-- /.tab-pane -->
                                                        <!-- /.tab-content -->
                                                    </div>
                                                </div>
                                                <!-- /.tab-pane -->
                                            </form>
                                        </div>
                                    </div>
                                    <!-- /.tab-pane -->
                                    <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-content -->

                            </div><!-- /.card-body -->
                        </div>
                    </div>

                    <!-- /.content -->
                </div>
            </div>
    </div>




    </section>
</body>

<?= $this->include('user/include/end')?>
<?= $this->include('user/include/footer')?>

<script>
const checkAll = document.querySelector('#checkAll');
const checkboxes = document.querySelectorAll('input[name="subject_id[]"]');

checkAll.addEventListener('click', () => {
    checkboxes.forEach(checkbox => {
        checkbox.checked = checkAll.checked;
    });
});
</script>