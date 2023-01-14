<?= $this->include('admin/include/top')?>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
<?= $this->include('admin/include/navbar')?>
<aside class="main-sidebar sidebar-dark-secondary elevation-8">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="<?=base_url()?>/dist/img/dormehiLogo.png" alt="dormehi Logo" class="brand-image img-circle elevation-3" style="opacity: 10;">
    <span class="brand-text font-weight-light" style="margin-left:10%;"><strong>DORMEHI</strong></span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->

    <!-- SidebarSearch Form -->


    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->

        <li class="nav-header"style = "font-family:poppins;">Admin</li>
        <li class="nav-item"style = "font-family:poppins;">
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
        <li class="nav-item"style = "font-family:poppins;">
            <li class="nav-item"style = "font-family:poppins;">
              <a href="<?=base_url('/pre_enrolled_reg')?>" class="nav-link">
                <i class="far fa-thin fa-newspaper"></i>
                <p>Pre-Enrolled</p>
              </a>
            </li>
        </li>
        <li class="nav-item"style = "font-family:poppins;">
            <li class="nav-item"style = "font-family:poppins;">
              <a href="<?=base_url('/section')?>" class="nav-link">
                <i class="fa-sharp fa-solid fa-section"></i>
                <p>Section</p>
              </a>
            </li>
        </li>
        <li class="nav-item"style = "font-family:poppins;">
            <li class="nav-item"style = "font-family:poppins;">
              <a href="<?=base_url('/r_prospectus')?>" class="nav-link">
                <i class="fa-sharp fa-solid fa-atom"></i>
                <p>Prospectus</p>
              </a>
            </li>
        </li>
        <li class="nav-item"style = "font-family:poppins;">
            <li class="nav-item"style = "font-family:poppins;">
              <a href="<?=base_url('/grading')?>" class="nav-link">
                <i class="fa-sharp fa-solid fa-barcode"></i>
                <p>Grading</p>
              </a>
            </li>
        </li>
        <li class="nav-item"style = "font-family:poppins;">
            <li class="nav-item"style = "font-family:poppins;">
              <a href="<?=base_url('/retrieve_strand')?>" class="nav-link">
                <i class="fa-sharp fa-solid fa-envelopes-bulk"></i>
                <p>Strand</p>
              </a>
            </li>
        </li>
        <li class="nav-item"style = "font-family:poppins;">
            <li class="nav-item"style = "font-family:poppins;">
              <a href="<?=base_url('/newadmin')?>" class="nav-link active">
                <i class="fa-sharp fa-solid fa-envelopes-bulk"></i>
                <p>Admin</p>
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


  <!-- Main content -->

      <div class="card-body">
        <div class="card card-primary card-outline mx-auto" style = "width:100%; border-radius:15px">
          <div class="card-header">
            <h3 class="card-title"style = "font-family:poppins">Admin Registration</h3>


          </div>
          <?php if(session()->has('validation')){
            $errorFlash = session()->getFlashdata('validation');
          } ?>
          <!-- /.card-header -->
          <div class="card-body">
            <form action="<?= base_url('insertAdmin'); ?>" method="post">
                  <div class="card-body p-0">
                    <div class="bs-stepper">
                      <div class="bs-stepper-header mx-auto" style = "width:85%" role="tablist">
                        <!-- your steps here -->
                        <div class="step" data-target="#logins-part">
                          <button type="button" class="step-trigger" role="tab" aria-controls="logins-part" id="logins-part-trigger">
                            <span class="bs-stepper-circle" style = "background-color:maroon;">1</span>
                            <span class="bs-stepper-label"style = "font-family:poppins;">Information</span>
                          </button>
                        </div>
                        <div class="line" style = "background-color:maroon;"></div>
                        <div class="step" data-target="#information-part">
                          <button type="button" class="step-trigger" role="tab" aria-controls="information-part" id="information-part-trigger">
                            <span class="bs-stepper-circle" style = "background-color:maroon;">2</span>
                            <span class="bs-stepper-label" style = "font-family:poppins;">Credentials</span>
                          </button>
                        </div>
                      </div>
                      <div class="bs-stepper-content mx-auto" style = "width:70%">


                        <!-- your steps content here -->
                        <div id="logins-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                          <div class="card-body box-profile">

                                          <a href="#" class="btn-edit" data-id=""style="margin-right:5%;background:white;border:0;">
                                              <img class="profile-user-img img-fluid img-circle"
                                              style="width:150px; height:150px;float:left; background-image:url(../../dist/img/avatar.png); border-color:maroon; background-size:cover;" src="">
                                          </a>

                                </div>

                          <div class="form-group row"style="font-family: Poppins;">
                            <label for="lastname" class="col-sm-2 col-form-label"style="font-family: Poppins;">Lastname</label>
                            <div class="col-sm-10">
                              <input type="text" name="lastname" class="form-control" id="lastname"
                                placeholder="Lastname">
                                <span class="text-danger"><?= isset($validation) ? display_error($validation, 'lastname') : '' ?></span>
                            </div>
                          </div>
                          <div class="form-group row"style="font-family: Poppins;">
                            <label for="firstname" class="col-sm-2 col-form-label"style="font-family: Poppins;">Firstname</label>
                            <div class="col-sm-10">
                              <input type="text" name="firstname" class="form-control" id="firstname"
                                placeholder="Firstname">
                                <span class="text-danger"><?= isset($validation) ? display_error($validation, 'firstname') : '' ?></span>
                            </div>
                          </div>
                          <div class="form-group row"style="font-family: Poppins;">
                            <label for="middlename" class="col-sm-2 col-form-label"style="font-family: Poppins;">Middlename</label>
                            <div class="col-sm-10">
                              <input type="text" name="middlename" class="form-control" id="middlename"
                                placeholder="Middlename">
                                <span class="text-danger"><?= isset($validation) ? display_error($validation, 'middlename') : '' ?></span>
                            </div>
                          </div>
                          <button type="button" class="btn btn-primary" style = "float:right;font-family:poppins;background-color:maroon;border-color:maroon;border-radius:20px" onclick="stepper.next()">Next</button>

                      </div>
                      </div>
                      <div class="bs-stepper-content mx-auto" style = "width:70%">

                        <div id="information-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                          <div class="form-group row"style="font-family: Poppins;">
                            <label for="email" class="col-sm-2 col-form-label"style="font-family: Poppins;">Email</label>
                            <div class="col-sm-10">
                              <input type="email" name="adminEmail" class="form-control" id="adminEmail"
                                placeholder="Email">
                                <span class="text-danger"><?= isset($validation) ? display_error($validation, 'adminEmail') : '' ?></span>
                            </div>
                          </div>
                          <div class="form-group row"style="font-family: Poppins;">
                            <label for="password" class="col-sm-2 col-form-label"style="font-family: Poppins;">Password</label>
                            <div class="col-sm-10">
                              <input type="password" name="adminPassword" class="form-control" id="adminPassword"
                                placeholder="Password">
                                <span class="text-danger"><?= isset($validation) ? display_error($validation, 'adminPassword') : '' ?></span>
                            </div>
                          </div>
                          <div class = "a"style = "float:right;">
                          <button type="button" class="btn btn-primary"style = "font-family:poppins;background-color:maroon;border-color:maroon;border-radius:20px" onclick="stepper.previous()">Previous</button>
                          <button type="submit" class="btn btn-primary"style = "font-family:poppins;background-color:maroon;border-color:maroon;border-radius:20px">Submit</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- /.card-body -->

                </div>
              </form>
                <!-- /.card -->
              </div>
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
<?= $this->include('admin/include/end')?>
<?= $this->include('admin/include/footer')?>
