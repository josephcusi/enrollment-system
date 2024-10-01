<?= $this->include('user/include/top')?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/css/multi-select-tag.css">

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
                                <i class="nav-icon fa-solid fa-user"></i>
                                <p>
                                    <strong>My Profile<strong>
                                            <span class="badge badge-info right"></span>
                                </p>
                            </a>
                        </li>

                        <li class="nav-header" style="font-family:poppins;">Maintenance</li>
                        <li class="nav-item" style="font-family:poppins;">
                            <a href="<?=base_url()?>/registration" class="nav-link ">
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
                            <a href="<?=base_url()?>/student-request" class="nav-link active">
                                <i class="fa-sharp fa-solid fa-book"></i>
                                <p>
                                    Request Credentials
                                </p>
                            </a>
                        </li>
                        <br>
                        <br>
                        <!-- -->
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
        <script src="<?= base_url()?>/dist/js/sweetalert.js"></script>
        <?php if(!empty(session()->getFlashdata('enroll'))) : ?>
        <script>
        swal({
            title: "",
            text: "You can now fill out for your enrollment application.",
            icon: "success",
            timer: 2000,
            buttons: false
        });
        </script>
        <?php endif ?>
        <!-- Content Header (Page header) -->

        <br>
        <!-- Main content -->

        <section class="content-header">
            <div class="card card-primary card-outline mx-auto" style="width:95%; margin-top:7% ">

                <div class="card-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="tab-content">
                                    <div class="active tab-pane" id="basic_info">
                                        <div class="card-header">
                                            <p
                                                style="font-size:20px; font-family: Poppins;color:maroon; margin-left:40%">
                                                Request Form</p>
                                        </div><br><br>
                                        <form class="mx-auto" style="max-width: 500px;"
                                            action="<?= base_url('request_form')?>" method="post">
                                            <div class="form-horizontal" style="font-family: poppins; color: maroon;">
                                                <div class="form-group col-md-12">
                                                    <input type="hidden" name="strand" value="<?= !empty($strand['strand']) ? $strand['strand'] : null ?>">
                                                    <input type="hidden" name="section"
                                                        value="<?= !empty($strand['section']) ? $strand['section'] : null?>">
                                                    <label for="studentLrn">* Purpose</label>
                                                    <fieldset>
                                                        <textarea name="purpose" rows="6" class="form-control"
                                                            id="credential" placeholder="E.g (Scholarship)"
                                                            required=""></textarea>
                                                    </fieldset>
                                                    <span
                                                        class="text-danger"><?= isset($validation) ? display_error($validation, 'credential') : '' ?></span>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label for="studentStrand">* Certificate of Enrollment to be Requested (Insert if needed)</label>
                                                    <fieldset>
                                                        <select name="credentialCOE[]" id="a" multiple>
                                                            <option value="COE">COE</option>
                                                              <?php foreach($year_lvl as $yr_lvl):?>
                                                                <option value="<?= $yr_lvl['year_level']?>"><?= $yr_lvl['year_level']?></option>
                                                                <option value="<?= $yr_lvl['semester']?>"><?= $yr_lvl['semester']?></option>
                                                            <?php endforeach;?>
                                                        </select>
                                                    </fieldset>
                                                    <span
                                                        class="text-danger"><?= isset($validation) ? display_error($validation, 'credential') : '' ?></span>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label for="studentStrand">* Certificate of Grade to be Requested (Insert if needed)</label>
                                                    <fieldset>
                                                        <select name="credentialCOG[]" id="b" multiple>
                                                            <option value="COR">COG</option>
                                                            <?php foreach($year_lvl as $yr_lvl):?>
                                                                <option value="<?= $yr_lvl['year_level']?>"><?= $yr_lvl['year_level']?></option>
                                                                <option value="<?= $yr_lvl['semester']?>"><?= $yr_lvl['semester']?></option>
                                                            <?php endforeach;?>
                                                        </select>
                                                    </fieldset>
                                                    <span
                                                        class="text-danger"><?= isset($validation) ? display_error($validation, 'credential') : '' ?></span>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label for="studentStrand">* Transcript of Record to be Requested (Insert if needed)</label>
                                                    <fieldset>
                                                        <select name="credentialTOR" id="c" multiple>
                                                            <option value="TOR">TOR</option>
                                                        </select>
                                                    </fieldset>
                                                    <span
                                                        class="text-danger"><?= isset($validation) ? display_error($validation, 'credential') : '' ?></span>
                                                </div>


                                                <div class="form-group col-md-12">
                                                    <button type="submit"
                                                        class="btn btn-primary btn-block">Submit</button>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                                <!-- /.tab-pane -->
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->

                        </div><!-- /.card-body -->
                    </div>

                    <!-- /.content -->
                </div>
            </div>


        </section>
    </div>

</body>

<?= $this->include('user/include/end')?>
<?= $this->include('user/include/footer')?>
<script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/js/multi-select-tag.js"></script>
<script>
new MultiSelectTag('a') // id
</script>
<script>
new MultiSelectTag('b') // id
</script>
<script>
new MultiSelectTag('c') // id
</script>