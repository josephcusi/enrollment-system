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


    <!-- SidebarSearch Form -->


    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->

        <li class="nav-header"style = "font-family:poppins;">Student</li>
        <li class="nav-item"style = "font-family:poppins;">
          <a href="<?=base_url()?>/myprofile" class="nav-link active">
            <i class="nav-icon fa-solid fa-user"></i>
            <p>
              <strong>My Profile<strong>
              <span class="badge badge-info right"></span>
            </p>
          </a>
        </li>

        <li class="nav-header"style = "font-family:poppins;">Maintenance</li>
        <li class="nav-item"style = "font-family:poppins;">
          <a href="<?=base_url()?>/registration" class="nav-link">
            <i class="fa-sharp fa-solid fa-id-card"></i>
            <p>
              Registration

            </p>
          </a>
        </li>
        <li class="nav-item"style = "font-family:poppins;">
          <a href="<?=base_url()?>/userSchedule" class="nav-link">
            <i class="fa-sharp fa-solid fa-calendar"></i>
            <p>
              Schedule
            </p>
          </a>
        </li>
        <li class="nav-item"style = "font-family:poppins;">
          <a href="<?=base_url()?>/userProspectus" class="nav-link">
            <i class="fa-sharp fa-solid fa-book"></i>
            <p>
            Grade
            </p>
          </a>
        </li>
        <li class="nav-item"style = "font-family:poppins;">
          <a href="<?=base_url()?>/subject" class="nav-link">
            <i class="fa-sharp fa-solid fa-book"></i>
            <p>
            Subject
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
    <div class="content-wrapper">
      <script src="<?= base_url()?>/dist/js/sweetalert.js"></script>
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      <?php if(!empty(session()->getFlashdata('dashboard'))) : ?>
      <script>swal("Welcome <?= isset($name['firstname']) ? $name['firstname'] : $name['firstname'];?> <?= isset($name['lastname']) ? $name['lastname'] : $userName['lastname'];?>!", "You successfully login your account.", "success");</script>
      <?php endif ?>

      <?php if(!empty(session()->getFlashdata('saveprofile'))) : ?>
      <script>swal("Saved!", "Profile has been successfully updated.", "success");</script>
      <?php endif ?>

      <?php if(!empty(session()->getFlashdata('missing'))) : ?>
      <script>swal("Missing Fields!", "Please fill out all missing fields.", "warning");</script>
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
                <li class="breadcrumb-item active" style="font-family:poppins;color:maroon">Home</li>
                <li class="breadcrumb-item active"style="font-family:poppins;">User Profile</li>
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
                        <!-- Profile Image -->
                        <div class="card card-primary card-outline" style = "">
                            <div class="card-body box-profile">
                                <div class="text-center"
                                                >
                                    <?php foreach($profile_picture as $prof):?>
                                            <a href="#" class="btn btn-info btn-sm btn-edit" data-id="<?=$prof['id']?>" style="background:white;border:0; ">

                                                <img class="profile-user-img img-fluid img-circle"
                                                style="width:250px; height:240px; background-image:url(../../dist/img/profile.jfif); border-color:maroon; background-size:cover;" src="<?= base_url().'/'.'profile/'.$prof['profile_picture'] ?>">

                                            </a>

                                        <?php endforeach;?>

                                </div>
                                <?php foreach($profile_picture as $prof):?>
                                  <?php include 'modal/updateProfilePic.php'?>
                                <?php endforeach;?>
                  <?php if(session()->has('validation')){
                    $errorFlash = session()->getFlashdata('validation');
                  } ?>
                  <?php $i = 0; foreach($userInfo as $profile): ?>

                    <?php  $i++; if ($i == 1):?>
                  <h3 class="profile-username text-center" style="color:maroon;font-family:poppins">
                    <?= isset($profile['firstname']) ? $profile['firstname'] : $userInfo['firstname'];?>
                    <?=" " ?>
                    <?= isset($profile['middlename']) ? $profile['middlename'] : $userInfo['middlename']; ?>
                    <?php echo " " ?>
                    <?= isset($profile['lastname']) ? $profile['lastname'] : $userInfo['lastname']; ?>
                  </h3>
                  <p class="text-muted text-center"style = "font-family:poppins">
                    <?= isset($profile['email']) ? $profile['email'] : $userInfo['email']; ?>
                  </p>

                  <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item" style="color:gray;font-family:poppins">
                      <b>Strand</b> <a class="float-right" style="color:maroon; font-family:poppins"><?=isset($student_registration['strand']) ? $student_registration['strand'] : 'N/A' ;?></a>
                    </li>
                    <li class="list-group-item" style="color:gray;font-family:poppins">
                       <b>Section</b><a class="float-right" style="color:maroon;font-family:poppins"><?=isset($student_registration['semester']) ? $student_registration['section'] : 'N/A' ;?></a>
                    </li>
                    <li class="list-group-item" style="color:gray;font-family:poppins">
                       <b>Semester</b> <a class="float-right" style="color:maroon;font-family:poppins"><?=isset($student_registration['semester']) ? $student_registration['semester'] : 'N/A' ;?></a>
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
              <div class="card card-primary card-outline mx-auto" style = "">

                <div class="card-header p-2">
                  <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" style = "border-radius:20px;font-family: Poppins;" href="#basic_info" data-toggle="tab">Basic
                        Information</a></li>
                    <li class="nav-item"><a class="nav-link"style = "border-radius:20px;font-family: Poppins;" href="#credential" data-toggle="tab">Credential</a></li>
                    <li class="nav-item"><a class="nav-link"style = "border-radius:20px;font-family: Poppins;" href="#address" data-toggle="tab">Address</a></li>
                    <li class="nav-item"><a class="nav-link"style = "border-radius:20px;font-family: Poppins;" href="#guardian" data-toggle="tab">Guardian</a></li>
                    <li class="nav-item"><a class="nav-link"style = "border-radius:20px;font-family: Poppins;" href="#education" data-toggle="tab">Education</a></li>
                  </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                  <div class="tab-content">
                     <!-- /.tab-pane -->
                    <div class="tab-pane" id="credential">
                      <p class="a" style="font-size:1.5em; font-family: Poppins;color:maroon;">Credential</p>
                      <div class="form-group row"style="font-family: Poppins;">
                        <label for="inputEmail" class="col-sm-1 col-form-label"style="font-family: Poppins;">Email</label>
                        <div class="col-sm-5">
                          <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="<?= isset($profile['email']) ? $profile['email'] : $userInfo['email'] ; ?>" disabled>
                        </div>
                      </div>
                      <div class="form-group row"style="font-family: Poppins;">
                        <label for="inputName2" class="col-sm-1 col-form-label"style="font-family: Poppins;">Password</label>
                        <div class="col-sm-5">
                          <input type="password" name="password" class="form-control" id="password"
                            placeholder="Password" value="<?= isset($profile['password']) ? $profile['password'] : $userInfo['password']; ?>" disabled>
                        </div>
                      </div>
                      <?php foreach($userName as $password):?>
                      <button type="submit" class="btn btn-danger btn-editName"style = "border-radius:20px; background-color:maroon; border-color:maroon" data-id="<?=$password['id'];?>" data-password="<?=$password['password'];?>">Update</button>
                      <?php include 'modal/passwordModal.php'?>
                                <?php endforeach;?>
                    </div>
                    <div class="active tab-pane" id="basic_info">
                      <p style="font-size:1.5em; font-family: Poppins;color:maroon;">Basic Information</p>
                      <div class="form-group row"style="font-family: Poppins;">
                        <label for="lastname" class="col-sm-1 col-form-label"style="font-family: Poppins;">Last Name</label>
                        <div class="col-sm-5">
                          <input type="text" class="form-control"style = "border-radius:20px" id="lastname" name="lastname" placeholder="LastName"
                            value="<?=  isset($profile['lastname']) ? $profile['lastname'] : $userInfo['lastname'];  ?>">
                          <span class="text-danger">
                            <?= isset($errorFlash) ? display_error($errorFlash, 'lastname') : '' ?>
                          </span>
                        </div>
                      </div>
                      <div class="form-group row"style="font-family: Poppins;">
                        <label for="firstname" class="col-sm-1 col-form-label"style="font-family: Poppins;">First Name</label>
                        <div class="col-sm-5">
                          <input type="text" class="form-control"style = "border-radius:20px" name="firstname" id="firstname"
                            placeholder="First Name" value="<?=isset($profile['firstname']) ? $profile['firstname'] : $userInfo['firstname'];  ?>">
                          <span class="text-danger">
                            <?= isset($errorFlash) ? display_error($errorFlash, 'firstname') : '' ?>
                          </span>
                        </div>
                      </div>
                      <div class="form-group row"style="font-family: Poppins;">
                        <label for="middlename" class="col-sm-1 col-form-label"style="font-family: Poppins;">Middle Name</label>
                        <div class="col-sm-5">
                          <input type="text" class="form-control"style = "border-radius:20px" id="middlename" name="middlename"
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
                      <div class="form-group col-md-6"style="font-family: Poppins;">
                        <label for="inputGender">Gender</label>
                        <select class="form-control"style = "border-radius:20px"id="inputGender" name = "gender" value="<?= isset($profile['gender']) ? $profile['gender'] : '' ; ?>">
                        <option type="text" class="form-control"style="font-family: Poppins;" id="inputGender">Male</option>
                        <option type="text" class="form-control"style="font-family: Poppins;" id="inputGender">Female</option>
                        </select>
                        <span class="text-danger">
                              <?= isset($errorFlash) ? display_error($errorFlash, 'gender') : '' ?>
                            </span>
                      </div>
                      <div class="form-group col-md-6"style="font-family: Poppins;">
                        <label for="inputCivil">Civil Status</label>
                        <select class="form-control"style = "border-radius:20px"id="inputCivil" name = "civil_status"  value="<?= isset($profile['civil_status']) ? $profile['civil_status'] : '' ; ?>">
                        <option type="text" class="form-control"style="font-family: Poppins;" id="inputCivil">Single</option>
                        <option type="text" class="form-control"style="font-family: Poppins;" id="inputCivil">Married</option>
                        <option type="text" class="form-control"style="font-family: Poppins;" id="inputCivil">Divorced</option>
                        <option type="text" class="form-control"style="font-family: Poppins;" id="inputCivil">Separated</option>
                        </select>
                        <span class="text-danger">
                              <?= isset($errorFlash) ? display_error($errorFlash, 'civil_status') : '' ?>
                            </span>
                      </div>
                      <div class="form-group col-md-6"style="font-family: Poppins;">
                        <label for="inputReligion">Religion</label>
                        <input type="text" name="religion" class="form-control"style = "border-radius:20px;font-family:poppins;" id="religion" placeholder="Religion" value="<?= isset($profile['religion']) ? $profile['religion'] : '' ; ?>">
                        <span class="text-danger">
                              <?= isset($errorFlash) ? display_error($errorFlash, 'religion') : '' ?>
                            </span>
                      </div>
                      <div class="form-group col-md-6"style="font-family: Poppins;">
                        <label for="inputNationality">Nationality</label>
                        <input type="text" name="nationality" class="form-control"style = "border-radius:20px;font-family:poppins;" id="nationality" placeholder="Nationality" value="<?= isset($profile['nationality']) ? $profile['nationality'] : '' ; ?>">
                        <span class="text-danger">
                              <?= isset($errorFlash) ? display_error($errorFlash, 'nationality') : '' ?>
                            </span>
                      </div>
                      <div class="form-group col-md-6"style="font-family: Poppins;">
                        <label for="inputBirthday">Birthday</label>
                        <input type="date" name="birthday" class="form-control"style = "border-radius:20px;font-family:poppins;" id="birthday" placeholder="Birthday" value="<?= isset($profile['birthday']) ? $profile['birthday'] : '' ; ?>">
                        <span class="text-danger">
                              <?= isset($errorFlash) ? display_error($errorFlash, 'birthday') : '' ?>
                            </span>
                      </div>
                      <div class="form-group col-md-6"style="font-family: Poppins;">
                        <label for="birthplace">Birthplace</label>
                        <input type="text" name="birthplace" class="form-control"style = "border-radius:20px;font-family:poppins;" id="birthplace" placeholder="Birthplace" value="<?= isset($profile['birthplace']) ? $profile['birthplace'] : '' ; ?>">
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
                          <label for="address" class="col-sm-1 col-form-label"style = "font-family:poppins;">Street</label>
                          <div class="col-sm-5">
                            <div>
                              <input type="text" name="street" class="form-control"style = "border-radius:20px;font-family:poppins;" id="street" placeholder="Street"
                                value="<?= isset($profile['street']) ? $profile['street'] : '' ; ?>">
                            </div>
                            <span class="text-danger">
                              <?= isset($errorFlash) ? display_error($errorFlash, 'street') : '' ?>
                            </span>
                          </div>
                        </div>

                        <div class="form-group row">
                          <label for="contact" class="col-sm-1 col-form-label"style="font-family: Poppins;">Baranggay</label>
                          <div class="col-sm-5">
                            <input type="text" name="baranggay" class="form-control"style = "border-radius:20px;font-family:poppins;" id="baranggay"
                              placeholder="Baranggay" value="<?= isset($profile['baranggay']) ? $profile['baranggay'] : '' ; ?>">
                            <span class="text-danger">
                              <?= isset($errorFlash) ? display_error($errorFlash, 'baranggay') : '' ?>
                            </span>
                          </div>
                        </div>
                        <br>
                        <br>
                        <div class="form-group row">
                          <label for="contact" class="col-sm-1 col-form-label"style="font-family: Poppins;">Provincial Address</label>
                          <div class="col-sm-5">
                            <input type="text" class="form-control"style = "border-radius:20px;font-family:poppins;" name="prov_add" id="prov_add"
                              placeholder="Provincial" value="<?= isset($profile['prov_add']) ? $profile['prov_add'] : '' ; ?>">
                            <span class="text-danger">
                              <?= isset($errorFlash) ? display_error($errorFlash, 'prov_add') : '' ?>
                            </span>
                          </div>
                        </div>

                        <div class="form-group row">
                          <label for="pcontact" class="col-sm-1 col-form-label"style="font-family: Poppins;">Contact</label>
                          <div class="col-sm-5">
                            <input type="text" name="contact" class="form-control"style = "border-radius:20px;font-family:poppins;" id="contact" placeholder="Contact"
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
                        <label for="guardian" class="col-sm-1 col-form-label"style="font-family: Poppins;">Guardian</label>
                        <div class="col-sm-5">
                          <input type="text" class="form-control"style = "border-radius:20px;font-family:poppins;" name="guardian_name" id="guardian_name"
                            placeholder="Guardian Name" value="<?= isset($profile['guardian_name']) ? $profile['guardian_name'] : '' ; ?>">
                          <span class="text-danger">
                            <?= isset($errorFlash) ? display_error($errorFlash, 'guardian_name') : '' ?>
                          </span>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="contact" class="col-sm-1 col-form-label"style="font-family: Poppins;">Contact</label>
                        <div class="col-sm-5">
                          <input type="text" class="form-control"style = "border-radius:20px;font-family:poppins;" name="guardian_contact" id="guardian_contact"
                            placeholder="Contact Number" value="<?= isset($profile['guardian_contact']) ? $profile['guardian_contact'] : '' ; ?>">
                          <span class="text-danger">
                            <?= isset($errorFlash) ? display_error($errorFlash, 'guardian_contact') : '' ?>
                          </span>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="contact" class="col-sm-1 col-form-label"style="font-family: Poppins;">Address</label>
                        <div class="col-sm-5">
                          <input type="text" class="form-control"style = "border-radius:20px;font-family:poppins;" name="guardian_address" id="guardian_address"
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
                        <label for="school" class="col-sm-1 col-form-label"style="font-family: Poppins;">School Name</label>
                        <div class="col-sm-5">
                          <input type="text" class="form-control"style = "border-radius:20px;font-family:poppins;" id="school" name="elem_school"
                            placeholder="School Name" value="<?= isset($profile['elem_school']) ? $profile['elem_school'] : '' ; ?>">
                          <span class="text-danger">
                            <?= isset($errorFlash) ? display_error($errorFlash, 'elem_school') : '' ?>
                          </span>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="address" class="col-sm-1 col-form-label"style="font-family: Poppins;">Address</label>
                        <div class="col-sm-5">
                          <input type="text" class="form-control"style = "border-radius:20px;font-family:poppins;" id="contact" name="elem_address" placeholder="Address"
                            value="<?= isset($profile['elem_address']) ? $profile['elem_address'] : '' ; ?>">
                          <span class="text-danger">
                            <?= isset($errorFlash) ? display_error($errorFlash, 'elem_address') : '' ?>
                          </span>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="year" class="col-sm-1 col-form-label"style="font-family: Poppins;">Year Attendee</label>
                        <div class="col-sm-5">
                          <input type="text" class="form-control"style = "border-radius:20px;font-family:poppins;" id="address" name="elem_year"
                            placeholder="Year attendee" value="<?= isset($profile['elem_year']) ? $profile['elem_year'] : '' ; ?>">
                          <span class="text-danger">
                            <?= isset($errorFlash) ? display_error($errorFlash, 'elem_year') : '' ?>
                          </span>
                        </div>
                      </div>
                      <p class="a" style="font-size:1.5em; font-family: Poppins; color:maroon;">High School</p>
                      <div class="form-group row">
                        <label for="school_name" class="col-sm-1 col-form-label"style="font-family: Poppins;">School Name</label>
                        <div class="col-sm-5">
                          <input type="text" class="form-control"style = "border-radius:20px;font-family:poppins;" id="school_name" name="high_school"
                            placeholder="School Name" value="<?= isset($profile['high_school']) ? $profile['high_school'] : '' ; ?>">
                          <span class="text-danger">
                            <?= isset($errorFlash) ? display_error($errorFlash, 'high_school') : '' ?>
                          </span>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="address" class="col-sm-1 col-form-label"style="font-family: Poppins;">Address</label>
                        <div class="col-sm-5">
                          <input type="text" class="form-control"style = "border-radius:20px;font-family:poppins;" id="address" name="high_address" placeholder="Address"
                            value="<?= isset($profile['high_address']) ? $profile['high_address'] : '' ; ?>">
                          <span class="text-danger">
                            <?= isset($errorFlash) ? display_error($errorFlash, 'high_address') : '' ?>
                          </span>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="year" class="col-sm-1 col-form-label"style="font-family: Poppins;">Year Attendee</label>
                        <div class="col-sm-5">
                          <input type="text" class="form-control"style = "border-radius:20px;font-family:poppins;" id="year" name="high_year" placeholder="Year attendee"
                            value="<?= isset($profile['high_year']) ? $profile['high_year'] : '' ; ?>">
                          <span class="text-danger">
                            <?= isset($errorFlash) ? display_error($errorFlash, 'high_year') : '' ?>
                          </span>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-1 col-sm-5">
                        <button type="submit" class="btn btn-danger"style = "border-radius:20px; background-color:maroon; border-color:maroon">Save</button>
                          <?php foreach($profileUpdate as $myProfile):?>
                          <button type="button" class="btn btn-danger btn-updateprofile"style = "border-radius:20px; background-color:maroon; border-color:maroon"
                          data-id="<?=$myProfile['id'];?>" data-gender="<?=$myProfile['gender'];?>" data-civil_status="<?=$myProfile['civil_status'];?>" data-religion="<?=$myProfile['religion'];?>"
                          data-nationality="<?=$myProfile['nationality'];?>" data-birthday="<?=$myProfile['birthday'];?>" data-birthplace="<?=$myProfile['birthplace'];?>" data-street="<?=$myProfile['street'];?>"
                          data-baranggay="<?=$myProfile['baranggay'];?>" data-prov_add="<?=$myProfile['prov_add'];?>" data-contact="<?=$myProfile['contact'];?>" data-guardian_name="<?=$myProfile['guardian_name'];?>"
                          data-guardian_contact="<?=$myProfile['guardian_contact'];?>" data-guardian_address="<?=$myProfile['guardian_address'];?>" data-elem_school="<?=$myProfile['elem_school'];?>" data-elem_address="<?=$myProfile['elem_address'];?>"
                          data-elem_year="<?=$myProfile['elem_year'];?>" data-high_school="<?=$myProfile['high_school'];?>" data-high_address="<?=$myProfile['high_address'];?>" data-high_year="<?=$myProfile['high_year'];?>"
                          >Update</a>
                        </div>
                      </div>
                    </div>
                    </form>
                    <?php include 'modal/updateProfile.php'?>

                  </div>
                  <?php endforeach; ?>
                  <?php endif; ?>
                  <?php endforeach; ?>
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
    <script src="<?=base_url()?>/cssjs/js/jquery.min.js"></script>
<script src="<?=base_url()?>/cssjs/js/bundle.min.js"></script>

<script>
    $(document).ready(function(){
        // sa button
        $('.btn-edit').on('click',function(){
            // data galing buton
            // const id = $(this).data('id');
            // const profile_picture = $(this).data('profile');
            // // sa modal
            // $('.profile_pics').val(profile_picture).trigger('change');
            // Call Modal
            $('#profilepicture').modal('show');
        });
        $('.btn-editName').on('click',function(){
            // data galing buton
            // const id = $(this).data('id');
            // const profile_picture = $(this).data('profile');
            // // sa modal
            // $('.profile_pics').val(profile_picture).trigger('change');
            // Call Modal
            $('#changePassword').modal('show');
        });
        $('.btn-updateprofile').on('click',function(){
            // data galing buton
            const id = $(this).data('id');
            const gender = $(this).data('gender');
            const civil_status = $(this).data('civil_status');
            const religion = $(this).data('religion');
            const nationality = $(this).data('nationality');
            const birthday = $(this).data('birthday');
            const birthplace = $(this).data('birthplace');
            const street = $(this).data('street');
            const baranggay = $(this).data('baranggay');
            const prov_add = $(this).data('prov_add');
            const contact = $(this).data('contact');
            const guardian_name = $(this).data('guardian_name');
            const guardian_contact = $(this).data('guardian_contact');
            const guardian_address = $(this).data('guardian_address');
            const elem_school = $(this).data('elem_school');
            const elem_address = $(this).data('elem_address');
            const elem_year = $(this).data('elem_year');
            const high_school = $(this).data('high_school');
            const high_address = $(this).data('high_address');
            const high_year = $(this).data('high_year');
            // // sa modal
            $('.gender').val(gender);
            $('.civil_status').val(civil_status);
            $('.religion').val(religion);
            $('.nationality').val(nationality);
            $('.birthday').val(birthday);
            $('.birthplace').val(birthplace);
            $('.street').val(street);
            $('.baranggay').val(baranggay);
            $('.prov_add').val(prov_add);
            $('.contact').val(contact);
            $('.guardian_name').val(guardian_name);
            $('.guardian_contact').val(guardian_contact);
            $('.guardian_address').val(guardian_address);
            $('.elem_school').val(elem_school);
            $('.elem_address').val(elem_address);
            $('.elem_year').val(elem_year);
            $('.high_school').val(high_school);
            $('.high_address').val(high_address);
            $('.high_year').val(high_year).trigger('change');
            // Call Modal
            $('#updateProfile').modal('show');
        });
    });
</script>
