<?= $this->include('user/include/top') ?>

  <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
      <?= $this->include('user/include/navbar') ?>
      <aside class="main-sidebar sidebar-dark-secondary elevation-8">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="<?=base_url()?>/dist/img/dormehiLogo.png" alt="dormehi Logo" class="brand-image img-circle elevation-3" style="opacity: 10;">
    <span class="brand-text font-weight-light" style="margin-left:10%;"><strong>DORMEHI</strong></span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?=base_url()?>/dist/img/user8-128x128.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Joseph Salavaria Cusi</a>
      </div>
    </div>

    <!-- SidebarSearch Form -->


    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->

        <li class="nav-header">Student</li>
        <li class="nav-item">
          <a href="<?=base_url()?>/myprofile" class="nav-link active">
            <i class="nav-icon fas fa-user"></i>
            <p>
              <strong>My Profile<strong>
              <span class="badge badge-info right"></span>
            </p>
          </a>
        </li>

        <li class="nav-header">Maintenance</li>
        <li class="nav-item">
          <a href="<?=base_url()?>/registration" class="nav-link">
            <i class="nav-icon fas fa-envelope"></i>
            <p>
              Registration

            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?=base_url()?>/userSchedule" class="nav-link">
            <i class="nav-icon fas fa-envelope"></i>
            <p>
              Schedule
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?=base_url()?>/userProspectus" class="nav-link">
            <i class="nav-icon fas fa-envelope"></i>
            <p>
              Prospectus
            </p>
          </a>
        </li>
        <br>
        <br>
          <li class="nav-item">
          <a href="<?=site_url()?>logout" method="post" class="nav-link">
            <i class="nav-icon fas fa-reply" style = "margin-left:4%"></i>

            <p>
              Log out
            </p>
           </a>
          </li>
          </ul>
          </li>


    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>


    </div>
    <div class="content-wrapper">
      <script src="<?= base_url()?>/dist/js/sweetalert.js"></script>
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      <?php if(!empty(session()->getFlashdata('dashboard'))) : ?>
      <script>swal("Welcome", "You successfully login your account.", "success");</script>
      <?php endif ?>

      <?php if(!empty(session()->getFlashdata('saveprofile'))) : ?>
      <script>swal("Saved", "Profile has been successfully updated.", "success");</script>
      <?php endif ?>

      <?php if(!empty(session()->getFlashdata('missing'))) : ?>
      <script>swal("Oopps!", "Please fill out all missing fields.", "warning");</script>
      <?php endif ?>
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>
                <class="a" style="color:maroon; font-family: 'Poppins';font-size: 22px"><strong>PROFILE</strong>
              </h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active" style="color:maroon">Home</li>
                <li class="breadcrumb-item active">User Profile</li>
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

              <!-- Profile Image -->
              <div class="card card-primary card-outline">

                <div class="card-body box-profile">
                  <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle" style="width:210px; background-color:maroon;"
                      src="../../dist/img/profile.jpg" alt="User profile picture">
                  </div>
                  <?php if(session()->has('validation')){
                    $errorFlash = session()->getFlashdata('validation');
                  } ?>
                  <?php $i = 0; foreach($userInfo as $profile): ?>

                    <?php  $i++; if ($i == 1):?>
                  <h3 class="profile-username text-center" style="color:maroon">
                    <?= isset($profile['firstname']) ? $profile['firstname'] : $userInfo['firstname'];?>
                    <?=" " ?>
                    <?= isset($profile['middlename']) ? $profile['middlename'] : $userInfo['middlename']; ?>
                    <?php echo " " ?>
                    <?= isset($profile['lastname']) ? $profile['lastname'] : $userInfo['lastname']; ?>
                  </h3>
                  <p class="text-muted text-center">
                    <?= isset($profile['email']) ? $profile['email'] : $userInfo['email']; ?>
                  </p>

                  <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item" style="color:gray">
                      <b>Strand</b> <a class="float-right" style="color:maroon"></a>
                    </li>
                    <li class="list-group-item" style="color:gray">
                      <b>Section</b> <a class="float-right" style="color:maroon"></a>
                    </li>
                    <li class="list-group-item" style="color:gray">
                      <b>Semester</b> <a class="float-right" style="color:maroon"></a>
                    </li>

                  </ul>


                </div>


                <!-- /.card-body -->
              </div>
              <!-- /.card -->
              <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
              <div class="card">
                <div class="card-header p-2">
                  <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#basic_info" data-toggle="tab">Basic
                        Information</a></li>
                    <li class="nav-item"><a class="nav-link" href="#credential" data-toggle="tab">Credential</a></li>
                    <li class="nav-item"><a class="nav-link" href="#address" data-toggle="tab">Address</a></li>
                    <li class="nav-item"><a class="nav-link" href="#guardian" data-toggle="tab">Guardian</a></li>
                    <li class="nav-item"><a class="nav-link" href="#education" data-toggle="tab">Education</a></li>
                  </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                  <div class="tab-content">
                     <!-- /.tab-pane -->
                    <div class="tab-pane" id="credential">
                      <p class="a" style="font-size:1.5em; font-family: Poppins;color:maroon;">Credential</p>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-1 col-form-label">Email</label>
                        <div class="col-sm-5">
                          <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="<?= isset($profile['email']) ? $profile['email'] : $userInfo['email'] ; ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-1 col-form-label">Password</label>
                        <div class="col-sm-5">
                          <input type="password" name="password" class="form-control" id="password"
                            placeholder="Password" value="<?= isset($profile['password']) ? $profile['password'] : $userInfo['password']; ?>">
                        </div>
                      </div>

                    </div>
                    <div class="active tab-pane" id="basic_info">
                      <p style="font-size:1.5em; font-family: Poppins;color:maroon;">Basic Information</p>
                      <div class="form-group row">
                        <label for="lastname" class="col-sm-1 col-form-label">Last Name</label>
                        <div class="col-sm-5">
                          <input type="text" class="form-control" id="lastname" name="lastname" placeholder="LastName"
                            value="<?=  isset($profile['lastname']) ? $profile['lastname'] : $userInfo['lastname'];  ?>">
                          <span class="text-danger">
                            <?= isset($errorFlash) ? display_error($errorFlash, 'lastname') : '' ?>
                          </span>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="firstname" class="col-sm-1 col-form-label">First Name</label>
                        <div class="col-sm-5">
                          <input type="text" class="form-control" name="firstname" id="firstname"
                            placeholder="First Name" value="<?=isset($profile['firstname']) ? $profile['firstname'] : $userInfo['firstname'];  ?>">
                          <span class="text-danger">
                            <?= isset($errorFlash) ? display_error($errorFlash, 'firstname') : '' ?>
                          </span>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="middlename" class="col-sm-1 col-form-label">Middle Name</label>
                        <div class="col-sm-5">
                          <input type="text" class="form-control" id="middlename" name="middlename"
                            placeholder="Middle Name" value="<?= isset($profile['middlename']) ? $profile['middlename'] : $userInfo['middlename'] ; ?>">
                          <span class="text-danger">
                            <?= isset($errorFlash) ? display_error($errorFlash, 'middlename') : '' ?>
                          </span>
                        </div>
                      </div>
                      <div class = "container">
                        <div class = "card-body">
                      <p class="a" style="font-size:1.5em; font-family: Poppins;color:maroon;">Other Info</p>
                      <form class="form-horizontal" action="insertProfile" method="post">
                      <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputGender">Gender</label>
                        <select class="form-control"id="inputGender" name = "gender" value="<?= isset($profile['gender']) ? $profile['gender'] : '' ; ?>">
                        <option type="text" class="form-control" id="inputGender">Male</option>
                        <option type="text" class="form-control" id="inputGender">Female</option>
                        </select>
                        <span class="text-danger">
                              <?= isset($errorFlash) ? display_error($errorFlash, 'gender') : '' ?>
                            </span>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputCivil">Civil Status</label>
                        <select class="form-control"id="inputCivil" name = "civil_status"  value="<?= isset($profile['civil_status']) ? $profile['civil_status'] : '' ; ?>">
                        <option type="text" class="form-control" id="inputCivil">Single</option>
                        <option type="text" class="form-control" id="inputCivil">Married</option>
                        <option type="text" class="form-control" id="inputCivil">Divorced</option>
                        <option type="text" class="form-control" id="inputCivil">Separated</option>
                        </select>
                        <span class="text-danger">
                              <?= isset($errorFlash) ? display_error($errorFlash, 'civil_status') : '' ?>
                            </span>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputReligion">Religion</label>
                        <input type="text" name="religion" class="form-control" id="religion" placeholder="Religion" value="<?= isset($profile['religion']) ? $profile['religion'] : '' ; ?>">
                        <span class="text-danger">
                              <?= isset($errorFlash) ? display_error($errorFlash, 'religion') : '' ?>
                            </span>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputNationality">Nationality</label>
                        <input type="text" name="nationality" class="form-control" id="nationality" placeholder="Nationality" value="<?= isset($profile['nationality']) ? $profile['nationality'] : '' ; ?>">
                        <span class="text-danger">
                              <?= isset($errorFlash) ? display_error($errorFlash, 'nationality') : '' ?>
                            </span>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputBirthday">Birthday</label>
                        <input type="date" name="birthday" class="form-control" id="birthday" placeholder="Birthday" value="<?= isset($profile['birthday']) ? $profile['birthday'] : '' ; ?>">
                        <span class="text-danger">
                              <?= isset($errorFlash) ? display_error($errorFlash, 'birthday') : '' ?>
                            </span>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="birthplace">Birthplace</label>
                        <input type="text" name="birthplace" class="form-control" id="birthplace" placeholder="Birthplace" value="<?= isset($profile['birthplace']) ? $profile['birthplace'] : '' ; ?>">
                        <span class="text-danger">
                              <?= isset($errorFlash) ? display_error($errorFlash, 'birthplace') : '' ?>
                            </span>
                      </div>
                    </div>
                    </div>
                  </div>
                    </div>

                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="address">

                        <p class="a" style="font-size:1.5em; font-family: Poppins;color:maroon;">Address</p>
                        <div class="form-group row">
                          <label for="address" class="col-sm-1 col-form-label">Street</label>
                          <div class="col-sm-5">
                            <div>
                              <input type="text" name="street" class="form-control" id="street" placeholder="Street"
                                value="<?= isset($profile['street']) ? $profile['street'] : '' ; ?>">
                            </div>
                            <span class="text-danger">
                              <?= isset($errorFlash) ? display_error($errorFlash, 'street') : '' ?>
                            </span>
                          </div>
                        </div>

                        <div class="form-group row">
                          <label for="contact" class="col-sm-1 col-form-label">Baranggay</label>
                          <div class="col-sm-5">
                            <input type="text" name="baranggay" class="form-control" id="baranggay"
                              placeholder="Baranggay" value="<?= isset($profile['baranggay']) ? $profile['baranggay'] : '' ; ?>">
                            <span class="text-danger">
                              <?= isset($errorFlash) ? display_error($errorFlash, 'baranggay') : '' ?>
                            </span>
                          </div>
                        </div>
                        <br>
                        <br>
                        <div class="form-group row">
                          <label for="contact" class="col-sm-1 col-form-label">Provincial Address</label>
                          <div class="col-sm-5">
                            <input type="text" class="form-control" name="prov_add" id="prov_add"
                              placeholder="Provincial" value="<?= isset($profile['prov_add']) ? $profile['prov_add'] : '' ; ?>">
                            <span class="text-danger">
                              <?= isset($errorFlash) ? display_error($errorFlash, 'prov_add') : '' ?>
                            </span>
                          </div>
                        </div>

                        <div class="form-group row">
                          <label for="pcontact" class="col-sm-1 col-form-label">Contact</label>
                          <div class="col-sm-5">
                            <input type="text" name="contact" class="form-control" id="contact" placeholder="Contact"
                              value="<?= isset($profile['contact']) ? $profile['contact'] : '' ; ?>">
                            <span class="text-danger">
                              <?= isset($errorFlash) ? display_error($errorFlash, 'contact') : '' ?>
                            </span>
                          </div>
                        </div>

                    </div>
                    <div class="tab-pane" id="guardian">
                      <p class="a" style="font-size:1.5em; font-family: Poppins;color:maroon;">Guardian</p>
                      <div class="form-group row">
                        <label for="guardian" class="col-sm-1 col-form-label">Guardian</label>
                        <div class="col-sm-5">
                          <input type="text" class="form-control" name="guardian_name" id="guardian_name"
                            placeholder="Guardian Name" value="<?= isset($profile['guardian_name']) ? $profile['guardian_name'] : '' ; ?>">
                          <span class="text-danger">
                            <?= isset($errorFlash) ? display_error($errorFlash, 'guardian_name') : '' ?>
                          </span>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="contact" class="col-sm-1 col-form-label">Contact</label>
                        <div class="col-sm-5">
                          <input type="text" class="form-control" name="guardian_contact" id="guardian_contact"
                            placeholder="Contact Number" value="<?= isset($profile['guardian_contact']) ? $profile['guardian_contact'] : '' ; ?>">
                          <span class="text-danger">
                            <?= isset($errorFlash) ? display_error($errorFlash, 'guardian_contact') : '' ?>
                          </span>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="contact" class="col-sm-1 col-form-label">Address</label>
                        <div class="col-sm-5">
                          <input type="text" class="form-control" name="guardian_address" id="guardian_address"
                            placeholder="Address" value="<?= isset($profile['guardian_address']) ? $profile['guardian_address'] : '' ; ?>">
                          <span class="text-danger">
                            <?= isset($errorFlash) ? display_error($errorFlash, 'guardian_address') : '' ?>
                          </span>
                        </div>
                      </div>

                    </div>
                    <div class="tab-pane" id="education">
                      <p class="a" style="font-size:1.5em; font-family: Poppins;color:maroon;">Elementary</p>
                      <div class="form-group row">
                        <label for="school" class="col-sm-1 col-form-label">School Name</label>
                        <div class="col-sm-5">
                          <input type="text" class="form-control" id="school" name="elem_school"
                            placeholder="School Name" value="<?= isset($profile['elem_school']) ? $profile['elem_school'] : '' ; ?>">
                          <span class="text-danger">
                            <?= isset($errorFlash) ? display_error($errorFlash, 'elem_school') : '' ?>
                          </span>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="address" class="col-sm-1 col-form-label">Address</label>
                        <div class="col-sm-5">
                          <input type="text" class="form-control" id="contact" name="elem_address" placeholder="Address"
                            value="<?= isset($profile['elem_address']) ? $profile['elem_address'] : '' ; ?>">
                          <span class="text-danger">
                            <?= isset($errorFlash) ? display_error($errorFlash, 'elem_address') : '' ?>
                          </span>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="year" class="col-sm-1 col-form-label">Year Attendee</label>
                        <div class="col-sm-5">
                          <input type="text" class="form-control" id="address" name="elem_year"
                            placeholder="Year attendee" value="<?= isset($profile['elem_year']) ? $profile['elem_year'] : '' ; ?>">
                          <span class="text-danger">
                            <?= isset($errorFlash) ? display_error($errorFlash, 'elem_year') : '' ?>
                          </span>
                        </div>
                      </div>
                      <p class="a" style="font-size:1.5em; font-family: Poppins; color:maroon;">High School</p>
                      <div class="form-group row">
                        <label for="school_name" class="col-sm-1 col-form-label">School Name</label>
                        <div class="col-sm-5">
                          <input type="text" class="form-control" id="school_name" name="high_school"
                            placeholder="School Name" value="<?= isset($profile['high_school']) ? $profile['high_school'] : '' ; ?>">
                          <span class="text-danger">
                            <?= isset($errorFlash) ? display_error($errorFlash, 'high_school') : '' ?>
                          </span>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="address" class="col-sm-1 col-form-label">Address</label>
                        <div class="col-sm-5">
                          <input type="text" class="form-control" id="address" name="high_address" placeholder="Address"
                            value="<?= isset($profile['high_address']) ? $profile['high_address'] : '' ; ?>">
                          <span class="text-danger">
                            <?= isset($errorFlash) ? display_error($errorFlash, 'high_address') : '' ?>
                          </span>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="year" class="col-sm-1 col-form-label">Year Attendee</label>
                        <div class="col-sm-5">
                          <input type="text" class="form-control" id="year" name="high_year" placeholder="Year attendee"
                            value="<?= isset($profile['high_year']) ? $profile['high_year'] : '' ; ?>">
                          <span class="text-danger">
                            <?= isset($errorFlash) ? display_error($errorFlash, 'high_year') : '' ?>
                          </span>
                        </div>
                      </div>
                      <?php endif; ?>
                      <?php endforeach; ?>
                      <div class="form-group row">
                        <div class="offset-sm-1 col-sm-5">

                          <button type="submit" class="btn btn-danger">Save</button>

                          </button>

                        </div>
                      </div>

                    </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->

              </div><!-- /.card-body -->
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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  </body>
  <?= $this->include('user/include/end') ?>
    <?= $this->include('user/include/footer') ?>
