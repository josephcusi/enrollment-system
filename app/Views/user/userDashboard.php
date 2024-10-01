<?= $this->include('user/include/top') ?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <?= $this->include('user/include/navbar') ?>
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


                <!-- SidebarSearch Form -->


                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->

                        <li class="nav-header" style="font-family:poppins;">Student</li>
                        <li class="nav-item" style="font-family:poppins;">
                            <a href="<?=base_url()?>/myprofile" class="nav-link active">
                                <i class="nav-icon fa-solid fa-user"></i>
                                <p>
                                    <strong>My Profile<strong>
                                            <span class="badge badge-info right"></span>
                                </p>
                            </a>
                        </li>

                        <li class="nav-header" style="font-family:poppins;">Maintenance</li>
                        <li class="nav-item" style="font-family:poppins;">
                            <a href="<?=base_url()?>/registration" class="nav-link">
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
    <div class="content-wrapper">
        <script src="<?= base_url()?>/dist/js/sweetalert.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <?php if (!empty(session()->getFlashdata('dashboard'))) : ?>
        <script>
        swal({
            title: "Welcome <?= isset($name['firstname']) ? $name['firstname'] : $name['firstname']; ?> <?= isset($name['lastname']) ? $name['lastname'] : $userName['lastname']; ?>!",
            text: "You successfully login your account.",
            icon: "success",
            timer: 2000,
            buttons: false
        });
        </script>
        <?php endif ?>

        <?php if (!empty(session()->getFlashdata('saveprofile'))) : ?>
        <script>
        swal({
            title: "Saved!",
            text: "Profile has been successfully updated.",
            icon: "success",
            timer: 2000,
            buttons: false
        });
        </script>
        <?php endif ?>

        <?php if (!empty(session()->getFlashdata('missing'))) : ?>
        <script>
        swal({
            title: "Missing Fields!",
            text: "Please fill out all missing fields.",
            icon: "warning",
            timer: 2000,
            buttons: false
        });
        </script>
        <?php endif ?>

        <?php if (!empty(session()->getFlashdata('profileDup'))) : ?>
        <script>
        swal({
            title: "Opppsss!",
            text: "You already filled out this field.",
            icon: "warning",
            timer: 2000,
            buttons: false
        });
        </script>
        <?php endif ?>

        <?php if (!empty(session()->getFlashdata('old'))) : ?>
        <script>
        swal({
            title: "Opppsss!",
            text: "Your old password is incorrect.",
            icon: "warning",
            timer: 2000,
            buttons: false
        });
        </script>
        <?php endif ?>

        <?php if (!empty(session()->getFlashdata('match'))) : ?>
        <script>
        swal({
            title: "Opppsss!",
            text: "Your password do not match.",
            icon: "warning",
            timer: 2000,
            buttons: false
        });
        </script>
        <?php endif ?>
        <?php if (!empty(session()->getFlashdata('updateProfileInfo'))) : ?>
        <script>
        swal({
            title: "Updated!",
            text: "You successfuly updated your information.",
            icon: "success",
            timer: 2000,
            buttons: false
        });
        </script>
        <?php endif ?>


        <!-- Content Header (Page header) -->
        <section class="content-header">

            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>
                            <class="a" style="color:maroon; font-family: 'Poppins';font-size: 22px">
                                <strong>PROFILE</strong>
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active" style="font-family:poppins;color:maroon">Home</li>
                            <li class="breadcrumb-item active" style="font-family:poppins;">User Profile</li>
                            <li class="breadcrumb-item active" style="font-family:poppins;color:maroon"></li>


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
                        <div class="card card-primary card-outline" style="">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <?php foreach($profile_picture as $prof):?>
                                    <button href="#" class="btn btn-info btn-sm btn-edit"
                                        data-profile_id="<?=$prof['id']?>" style="background:white;border:0; ">

                                        <img class="profile-user-img img-fluid img-circle"
                                            style="width:250px; height:240px; background-image:url(../../dist/img/profile.jpg); border-color:maroon; background-size:cover;"
                                            src="<?= base_url('student_credentials/' . $prof['firstname'] . ' ' . $prof['lastname'] . '/' . $prof['profile_picture']) ?>">


                                    </button>

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
                                <p class="text-muted text-center" style="font-family:poppins">
                                    <?= isset($profile['email']) ? $profile['email'] : $userInfo['email']; ?>
                                </p>

                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item" style="color:gray;font-family:poppins">
                                        <b>Program</b> <a class="float-right"
                                            style="color:maroon; font-family:poppins"><?=isset($student_registration['strand']) ? $student_registration['strand'] : 'N/A' ;?></a>
                                    </li>
                                    <li class="list-group-item" style="color:gray;font-family:poppins">
                                        <b>Section</b><a class="float-right"
                                            style="color:maroon;font-family:poppins"><?=isset($student_registration['semester']) ? $student_registration['section'] : 'N/A' ;?></a>
                                    </li>
                                    <li class="list-group-item" style="color:gray;font-family:poppins">
                                        <b>Semester</b> <a class="float-right"
                                            style="color:maroon;font-family:poppins"><?=isset($student_registration['semester']) ? $student_registration['semester'] : 'N/A' ;?></a>
                                    </li>
                                    <?php if(!empty($pre_enrolled[0]['id']) && ($pre_enrolled[0]['state'] == "Pending" || $pre_enrolled[0]['state'] == "Enrolled")):?>
                                    <button type="button" class="btn btn-primary btn-sm btn-download"
                                        data-download_id="<?= isset($pre_enrolled[0]['id']) ? $pre_enrolled[0]['id'] : '';?>">
                                        <li class="breadcrumb-item active" style="font-family:poppins; color:white;">
                                            Download Personal File</li>
                                    </button>
                                    <?php else:?>
                                    <?php endif;?>
                                    <?= $this->include('admin/modal/download_info')?>

                                </ul>


                            </div>


                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="card card-primary card-outline mx-auto" style="">

                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active"
                                            style="border-radius:20px;font-family: Poppins;" href="#basic_info"
                                            data-toggle="tab">Basic
                                            Information</a></li>
                                    <li class="nav-item"><a class="nav-link"
                                            style="border-radius:20px;font-family: Poppins;" href="#credential"
                                            data-toggle="tab">Credential</a></li>
                                    <li class="nav-item"><a class="nav-link"
                                            style="border-radius:20px;font-family: Poppins;" href="#address"
                                            data-toggle="tab">Address</a></li>
                                    <li class="nav-item"><a class="nav-link"
                                            style="border-radius:20px;font-family: Poppins;" href="#guardian"
                                            data-toggle="tab">Guardian</a></li>
                                    <li class="nav-item"><a class="nav-link"
                                            style="border-radius:20px;font-family: Poppins;" href="#education"
                                            data-toggle="tab">Education</a></li>

                                </ul>
                            </div><!-- /.card-header -->
                         
                            <div class="card-body">
                                <div class="tab-content">
                                    <!-- /.tab-pane -->
                                    <div class="tab-pane" id="credential">
                                        <p class="a" style="font-size:1.5em; font-family: Poppins;color:maroon;">
                                            Credential</p>
                                        <div class="form-group row" style="font-family: Poppins;">
                                            <label for="inputEmail" class="col-sm-2 col-form-label"
                                                style="font-family: Poppins;">Email</label>
                                            <div class="col-sm-5">
                                                <input type="email" name="email" class="form-control" id="email"
                                                    placeholder="e.g Email"
                                                    value="<?= isset($profile['email']) ? $profile['email'] : $userInfo['email'] ; ?>"
                                                    disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row" style="font-family: Poppins;">
                                            <label for="inputName2" class="col-sm-2 col-form-label"
                                                style="font-family: Poppins;">Password</label>
                                            <div class="col-sm-5">
                                                <input type="password" name="" class="form-control" id="password"
                                                    placeholder="e.g Password"
                                                    value="<?= isset($profile['password']) ? $profile['password'] : $userInfo['password']; ?>"
                                                    disabled>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-primary"
                                            style="float:right;font-family:poppins;background-color:maroon;border-color:maroon;border-radius:20px"
                                            onclick="goToAddressTab()">Next</button>
                                            <button type="button" class="btn btn-primary"
                                            style="float:right;font-family:poppins;background-color:maroon;border-color:maroon;border-radius:20px"
                                            onclick="goToBasicInfoTab()">Previous</button>

                                        <?php foreach($userName as $password):?>
                                        <button type="submit" class="btn btn-danger btn-editName"
                                            style="border-radius:20px; background-color:maroon; border-color:maroon"
                                            data-password_id="<?=$password['id'];?>"
                                            data-password="<?=$password['password'];?>">Update</button>
                                        <?php include 'modal/passwordModal.php'?>
                                        <?php endforeach;?>
                                    </div>
                                    <div class="active tab-pane" id="basic_info">
                                        <p style="font-size:1.5em; font-family: Poppins;color:maroon;">Basic Information
                                        </p>
                                        <div class="form-group row" style="font-family: Poppins;">
                                            <label for="lastname" class="col-sm-2 col-form-label"
                                                style="font-family: Poppins;">Last Name</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" style="border-radius:20px"
                                                    id="lastname" name="lastname" placeholder="e.g LastName"
                                                    value="<?=  isset($profile['lastname']) ? $profile['lastname'] : $userInfo['lastname'];  ?>"
                                                    disabled>
                                                <span class="text-danger">
                                                    <?= isset($errorFlash) ? display_error($errorFlash, 'lastname') : '' ?>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group row" style="font-family: Poppins;">
                                            <label for="firstname" class="col-sm-2 col-form-label"
                                                style="font-family: Poppins;">First Name</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" style="border-radius:20px"
                                                    name="firstname" id="firstname" placeholder="e.g First Name"
                                                    value="<?=isset($profile['firstname']) ? $profile['firstname'] : $userInfo['firstname'];  ?>"
                                                    disabled>
                                                <span class="text-danger">
                                                    <?= isset($errorFlash) ? display_error($errorFlash, 'firstname') : '' ?>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group row" style="font-family: Poppins;">
                                            <label for="middlename" class="col-sm-2 col-form-label"
                                                style="font-family: Poppins;">Middle Name</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" style="border-radius:20px"
                                                    id="middlename" name="middlename" placeholder="e.g Middle Name"
                                                    value="<?= isset($profile['middlename']) ? $profile['middlename'] : $userInfo['middlename'] ; ?>"
                                                    disabled>
                                                <span class="text-danger">
                                                    <?= isset($errorFlash) ? display_error($errorFlash, 'middlename') : '' ?>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="container">
                                            <div class="card-body">
                                                <p class="a"
                                                    style="font-size:1.5em; font-family: Poppins;color:maroon;">Other
                                                    Info</p>
                                                <form class="form-horizontal" action="insertProfile" method="post">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6" style="font-family: Poppins;">
                                                            <label for="inputGender">Gender</label>
                                                            <select class="form-control" style="border-radius:20px"
                                                                id="inputGender" name="gender"
                                                                value="<?= isset($profile['gender']) ? $profile['gender'] : '' ; ?>">

                                                                <option type="text" class="form-control"
                                                                    style="font-family: Poppins;" id="inputGender">Male
                                                                </option>
                                                                <option type="text" class="form-control"
                                                                    style="font-family: Poppins;" id="inputGender">
                                                                    Female</option>
                                                            </select>
                                                            <span class="text-danger">
                                                                <?= isset($errorFlash) ? display_error($errorFlash, 'gender') : '' ?>
                                                            </span>
                                                        </div>
                                                        <div class="form-group col-md-6" style="font-family: Poppins;">
                                                            <label for="inputReligion">Indigenous Peoples (IP)?</label>
                                                            <?php if(empty($ipcount['ip'])):?>
                                                            <input type="checkbox" name="ip" style="border-radius:20px;"
                                                                disabled>
                                                            <?php else:?>
                                                            <input type="checkbox" name="ip" style="border-radius:20px;"
                                                                checked disabled>
                                                            <?php endif;?>

                                                            <input type="text" name="ipOthers" class="form-control"
                                                                style="border-radius:20px;font-family:poppins;"
                                                                placeholder="If Yes. please specify"
                                                                value="<?= isset($profile['ip']) ? $profile['ip'] : '' ; ?>">

                                                            <span class="text-danger">
                                                                <?= isset($errorFlash) ? display_error($errorFlash, 'ipOthers') : '' ?>
                                                            </span>
                                                        </div>
                                                        <div class="form-group col-md-6" style="font-family: Poppins;">
                                                            <label for="inputReligion">Age</label>
                                                            <input type="number" name="age" class="form-control"
                                                                style="border-radius:20px;font-family:poppins;"
                                                                placeholder="e.g 18"
                                                                value="<?= isset($profile['age']) ? $profile['age'] : set_value('age') ; ?>"
                                                                required>
                                                            <span class="text-danger">
                                                                <?= isset($errorFlash) ? display_error($errorFlash, 'age') : '' ?>
                                                            </span>
                                                        </div>
                                                        <div class="form-group col-md-6" style="font-family: Poppins;">
                                                            <label for="inputCivil">Civil Status</label>
                                                            <select class="form-control" style="border-radius:20px"
                                                                id="inputCivil" name="civil_status"
                                                                value="<?= isset($profile['civil_status']) ? $profile['civil_status'] : set_value('civil_status') ; ?>">
                                                                <option type="text" class="form-control"
                                                                    style="font-family: Poppins;" id="inputCivil">Single
                                                                </option>
                                                                <option type="text" class="form-control"
                                                                    style="font-family: Poppins;" id="inputCivil">
                                                                    Married</option>
                                                                <option type="text" class="form-control"
                                                                    style="font-family: Poppins;" id="inputCivil">
                                                                    Divorced</option>
                                                                <option type="text" class="form-control"
                                                                    style="font-family: Poppins;" id="inputCivil">
                                                                    Separated</option>
                                                            </select>
                                                            <span class="text-danger">
                                                                <?= isset($errorFlash) ? display_error($errorFlash, 'civil_status') : '' ?>
                                                            </span>
                                                        </div>
                                                        <div class="form-group col-md-6" style="font-family: Poppins;">
                                                            <label for="inputReligion">Religion</label>
                                                            <input type="text" name="religion" class="form-control"
                                                                style="border-radius:20px;font-family:poppins;"
                                                                id="religion" placeholder="e.g Roman Catholic"
                                                                value="<?= isset($profile['religion']) ? $profile['religion'] : '' ; ?>"
                                                                required>
                                                            <span class="text-danger">
                                                                <?= isset($errorFlash) ? display_error($errorFlash, 'religion') : '' ?>
                                                            </span>
                                                        </div>
                                                        <div class="form-group col-md-6" style="font-family: Poppins;">
                                                            <label for="inputNationality">Nationality</label>
                                                            <input type="text" name="nationality" class="form-control"
                                                                style="border-radius:20px;font-family:poppins;"
                                                                id="nationality" placeholder="e.g Filipino"
                                                                value="<?= isset($profile['nationality']) ? $profile['nationality'] : '' ; ?>"
                                                                required>
                                                            <span class="text-danger">
                                                                <?= isset($errorFlash) ? display_error($errorFlash, 'nationality') : '' ?>
                                                            </span>
                                                        </div>
                                                        <div class="form-group col-md-6" style="font-family: Poppins;">
                                                            <label for="inputBirthday">Birthday</label>
                                                            <input type="date" name="birthday" class="form-control"
                                                                style="border-radius:20px;font-family:poppins;"
                                                                id="birthday" placeholder="e.g Birthday"
                                                                value="<?= isset($profile['birthday']) ? $profile['birthday'] : '' ; ?>"
                                                                required>
                                                            <span class="text-danger">
                                                                <?= isset($errorFlash) ? display_error($errorFlash, 'birthday') : '' ?>
                                                            </span>
                                                        </div>
                                                        <div class="form-group col-md-6" style="font-family: Poppins;">
                                                            <label for="birthplace">Birthplace</label>
                                                            <input type="text" name="birthplace" class="form-control"
                                                                style="border-radius:20px;font-family:poppins;"
                                                                id="birthplace"
                                                                placeholder="e.g Poblacion, Baco, Oriental Mindoro"
                                                                value="<?= isset($profile['birthplace']) ? $profile['birthplace'] : '' ; ?>"
                                                                required>
                                                            <span class="text-danger">
                                                                <?= isset($errorFlash) ? display_error($errorFlash, 'birthplace') : '' ?>
                                                            </span>
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-primary"
                                            style="float:right;font-family:poppins;background-color:maroon;border-color:maroon;border-radius:20px"
                                            onclick="goToCredentialTab()">Next</button>
                                    </div>
                                    <div class="tab-pane" id="address">

                                        <p class="a" style="font-size:1.5em; font-family: Poppins;color:maroon;">Address
                                        </p>
                                        <div class="form-group row">
                                            <label for="address" class="col-sm-2 col-form-label"
                                                style="font-family:poppins;">Provincial Address</label>
                                            <div class="col-sm-5">
                                                <div>
                                                    <input type="text" name="prov_add" class="form-control"
                                                        style="border-radius:20px;font-family:poppins;" id=""
                                                        placeholder="e.g Oriental Mindoro"
                                                        value="<?= isset($profile['prov_add']) ? $profile['prov_add'] : '' ; ?>">
                                                </div>
                                                <span class="text-danger">
                                                    <?= isset($errorFlash) ? display_error($errorFlash, 'prov_add') : '' ?>
                                                </span>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="contact" class="col-sm-2 col-form-label"
                                                style="font-family: Poppins;">City</label>
                                            <div class="col-sm-5">
                                                <input type="text" name="city" class="form-control"
                                                    style="border-radius:20px;font-family:poppins;" id=""
                                                    placeholder="e.g Baco"
                                                    value="<?= isset($profile['city']) ? $profile['city'] : '' ; ?>">
                                                <span class="text-danger">
                                                    <?= isset($errorFlash) ? display_error($errorFlash, 'city') : '' ?>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="contact" class="col-sm-2 col-form-label"
                                                style="font-family: Poppins;">Barangay</label>
                                            <div class="col-sm-5">
                                                <input type="text" name="baranggay" class="form-control"
                                                    style="border-radius:20px;font-family:poppins;" id=""
                                                    placeholder="e.g Poblacion"
                                                    value="<?= isset($profile['baranggay']) ? $profile['baranggay'] : '' ; ?>">
                                                <span class="text-danger">
                                                    <?= isset($errorFlash) ? display_error($errorFlash, 'baranggay') : '' ?>
                                                </span>
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                        <div class="form-group row">
                                            <label for="contact" class="col-sm-2 col-form-label"
                                                style="font-family: Poppins;">Street</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control"
                                                    style="border-radius:20px;font-family:poppins;" name="street" id=""
                                                    placeholder="e.g Cantuhan"
                                                    value="<?= isset($profile['street']) ? $profile['street'] : '' ; ?>">
                                                <span class="text-danger">
                                                    <?= isset($errorFlash) ? display_error($errorFlash, 'street') : '' ?>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="pcontact" class="col-sm-2 col-form-label"
                                                style="font-family: Poppins;">Zip Code</label>
                                            <div class="col-sm-5">
                                                <input type="text" name="zipcode" class="form-control"
                                                    style="border-radius:20px;font-family:poppins;" id=""
                                                    placeholder="e.g 5102"
                                                    value="<?= isset($profile['zipcode']) ? $profile['zipcode'] : '' ; ?>">
                                                <span class="text-danger">
                                                    <?= isset($errorFlash) ? display_error($errorFlash, 'zipcode') : '' ?>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="pcontact" class="col-sm-2 col-form-label"
                                                style="font-family: Poppins;">Contact</label>
                                            <div class="col-sm-5">
                                                <input type="text" name="contact" class="form-control"
                                                    style="border-radius:20px;font-family:poppins;" id=""
                                                    placeholder="e.g 09123456789"
                                                    value="<?= isset($profile['contact']) ? $profile['contact'] : '' ; ?>">
                                                <span class="text-danger">
                                                    <?= isset($errorFlash) ? display_error($errorFlash, 'contact') : '' ?>
                                                </span>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-primary"
                                            style="float:right;font-family:poppins;background-color:maroon;border-color:maroon;border-radius:20px"
                                            onclick="goToGuardianTab()">Next</button>

                                            <button type="button" class="btn btn-primary"
                                            style="float:right;font-family:poppins;background-color:maroon;border-color:maroon;border-radius:20px"
                                            onclick="goToCredentialTab()">Previous</button>
                                    </div>


                                    <div class="tab-pane" id="guardian">
                                        <p class="a" style="font-size:1.5em; font-family: Poppins;color:maroon;">
                                            Parent's/Guardian Information</p>
                                        <div class="form-row">
                                            <div class="form-group col-md-3">
                                                <label for="guardian" class="col-sm-12 col-form-label"
                                                    style="font-family: Poppins;">Father's Name</label>

                                                <input type="text" class="form-control"
                                                    style="border-radius:20px;font-family:poppins;" name="father_name"
                                                    placeholder="e.g Dela Cruz Juan E."
                                                    value="<?= isset($profile['father_name']) ? $profile['father_name'] : '' ; ?>"
                                                    required>
                                                <span class="text-danger">
                                                    <?= isset($errorFlash) ? display_error($errorFlash, 'father_name') : '' ?>
                                                </span>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="guardian" class="col-sm-12 col-form-label"
                                                    style="font-family: Poppins;">Occupation</label>
                                                <input type="text" class="form-control"
                                                    style="border-radius:20px;font-family:poppins;"
                                                    name="father_occupation" placeholder="Farmer."
                                                    value="<?= isset($profile['father_occupation']) ? $profile['father_occupation'] : '' ; ?>"
                                                    required>
                                                <span class="text-danger">
                                                    <?= isset($errorFlash) ? display_error($errorFlash, 'father_occupation') : '' ?>
                                                </span>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="guardian" class="col-sm-13 col-form-label"
                                                    style="font-family: Poppins;">Father's Residence</label>
                                                <input type="text" class="form-control"
                                                    style="border-radius:20px;font-family:poppins;"
                                                    name="father_address"
                                                    placeholder="e.g Poblacion, Baco, Oriental Mindoro."
                                                    value="<?= isset($profile['father_address']) ? $profile['father_address'] : '' ; ?>"
                                                    required>
                                                <span class="text-danger">
                                                    <?= isset($errorFlash) ? display_error($errorFlash, 'father_address') : '' ?>
                                                </span>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="contact" class="col-sm-12 col-form-label"
                                                    style="font-family: Poppins;">Contact</label>
                                                <input type="number" class="form-control"
                                                    style="border-radius:20px;font-family:poppins;"
                                                    name="father_contact" id="mother_contact"
                                                    placeholder="e.g 09123456789"
                                                    value="<?= isset($profile['father_contact']) ? $profile['father_contact'] : '' ; ?>"
                                                    required>
                                                <span class="text-danger">
                                                    <?= isset($errorFlash) ? display_error($errorFlash, 'father_contact') : '' ?>
                                                </span>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="guardian" class="col-sm-12 col-form-label"
                                                    style="font-family: Poppins;">Mother's Name</label>
                                                <input type="text" class="form-control"
                                                    style="border-radius:20px;font-family:poppins;" name="mother_name"
                                                    id="mother_name" placeholder="e.g Dela Cruz Sisa A."
                                                    value="<?= isset($profile['mother_name']) ? $profile['mother_name'] : '' ; ?>"
                                                    required>
                                                <span class="text-danger">
                                                    <?= isset($errorFlash) ? display_error($errorFlash, 'mother_name') : '' ?>
                                                </span>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="guardian" class="col-sm-12 col-form-label"
                                                    style="font-family: Poppins;">Occupation</label>
                                                <input type="text" class="form-control"
                                                    style="border-radius:20px;font-family:poppins;"
                                                    name="mother_occupation" placeholder="Farmer."
                                                    value="<?= isset($profile['mother_occupation']) ? $profile['mother_occupation'] : '' ; ?>"
                                                    required>
                                                <span class="text-danger">
                                                    <?= isset($errorFlash) ? display_error($errorFlash, 'mother_occupation') : '' ?>
                                                </span>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="guardian" class="col-sm-13 col-form-label"
                                                    style="font-family: Poppins;">Mother's Residence</label>
                                                <input type="text" class="form-control"
                                                    style="border-radius:20px;font-family:poppins;"
                                                    name="mother_address"
                                                    placeholder="e.g Poblacion, Baco, Oriental Mindoro."
                                                    value="<?= isset($profile['mother_address']) ? $profile['mother_address'] : '' ; ?>"
                                                    required>
                                                <span class="text-danger">
                                                    <?= isset($errorFlash) ? display_error($errorFlash, 'mother_address') : '' ?>
                                                </span>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="contact" class="col-sm-12 col-form-label"
                                                    style="font-family: Poppins;">Contact</label>
                                                <input type="number" class="form-control"
                                                    style="border-radius:20px;font-family:poppins;"
                                                    name="mother_contact" placeholder="e.g 09123456789"
                                                    value="<?= isset($profile['mother_contact']) ? $profile['mother_contact'] : '' ; ?>"
                                                    required>
                                                <span class="text-danger">
                                                    <?= isset($errorFlash) ? display_error($errorFlash, 'mother_contact') : '' ?>
                                                </span>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="guardian" class="col-sm-12 col-form-label"
                                                    style="font-family: Poppins;">Guardian</label>
                                                <input type="text" class="form-control"
                                                    style="border-radius:20px;font-family:poppins;" name="guardian_name"
                                                    id="guardian_name" placeholder="e.g Juan E. Dela Cruz"
                                                    value="<?= isset($profile['guardian_name']) ? $profile['guardian_name'] : '' ; ?>"
                                                    required>
                                                <span class="text-danger">
                                                    <?= isset($errorFlash) ? display_error($errorFlash, 'guardian_name') : '' ?>
                                                </span>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="guardian" class="col-sm-12 col-form-label"
                                                    style="font-family: Poppins;">Occupation</label>
                                                <input type="text" class="form-control"
                                                    style="border-radius:20px;font-family:poppins;"
                                                    name="guardian_occupation" placeholder="Farmer."
                                                    value="<?= isset($profile['guardian_occupation']) ? $profile['guardian_occupation'] : '' ; ?>"
                                                    required>
                                                <span class="text-danger">
                                                    <?= isset($errorFlash) ? display_error($errorFlash, 'guardian_occupation') : '' ?>
                                                </span>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="contact" class="col-sm-12 col-form-label"
                                                    style="font-family: Poppins;">Address</label>
                                                <input type="text" class="form-control"
                                                    style="border-radius:20px;font-family:poppins;"
                                                    name="guardian_address"
                                                    placeholder="e.g Poblacion, Baco, Oriental Mindoro"
                                                    value="<?= isset($profile['guardian_address']) ? $profile['guardian_address'] : '' ; ?>"
                                                    required>
                                                <span class="text-danger">
                                                    <?= isset($errorFlash) ? display_error($errorFlash, 'guardian_address') : '' ?>
                                                </span>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="contact" class="col-sm-12 col-form-label"
                                                    style="font-family: Poppins;">Contact</label>
                                                <input type="number" class="form-control"
                                                    style="border-radius:20px;font-family:poppins;"
                                                    name="guardian_contact" placeholder="e.g 09123456789"
                                                    value="<?= isset($profile['guardian_contact']) ? $profile['guardian_contact'] : '' ; ?>"
                                                    required>
                                                <span class="text-danger">
                                                    <?= isset($errorFlash) ? display_error($errorFlash, 'guardian_contact') : '' ?>
                                                </span>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-primary"
                                            style="float:right;font-family:poppins;background-color:maroon;border-color:maroon;border-radius:20px"
                                            onclick="goToEducationTab()">Next</button>
                                            <button type="button" class="btn btn-primary"
                                            style="float:right;font-family:poppins;background-color:maroon;border-color:maroon;border-radius:20px"
                                            onclick="goToAddressTab()">Previous</button>
                                    </div>
                                    <div class="tab-pane" id="education">
                                        <p class="a" style="font-size:1.5em; font-family: Poppins;color:maroon;">
                                            Elementary</p>
                                        <div class="form-group row">
                                            <label for="school" class="col-sm-2 col-form-label"
                                                style="font-family: Poppins;">School Name</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control"
                                                    style="border-radius:20px;font-family:poppins;" id="school"
                                                    name="elem_school" placeholder="e.g Benito A. Villar"
                                                    value="<?= isset($profile['elem_school']) ? $profile['elem_school'] : '' ; ?>"
                                                    required>
                                                <span class="text-danger">
                                                    <?= isset($errorFlash) ? display_error($errorFlash, 'elem_school') : '' ?>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="address" class="col-sm-2 col-form-label"
                                                style="font-family: Poppins;">Address</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control"
                                                    style="border-radius:20px;font-family:poppins;" name="elem_address"
                                                    placeholder="e.g Poblacion, Baco, Oriental Mindoro"
                                                    value="<?= isset($profile['elem_address']) ? $profile['elem_address'] : '' ; ?>"
                                                    required>
                                                <span class="text-danger">
                                                    <?= isset($errorFlash) ? display_error($errorFlash, 'elem_address') : '' ?>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="year" class="col-sm-2 col-form-label"
                                                style="font-family: Poppins;">Year Attendee</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control"
                                                    style="border-radius:20px;font-family:poppins;" id="address"
                                                    name="elem_year" placeholder="e.g 2008-2014"
                                                    value="<?= isset($profile['elem_year']) ? $profile['elem_year'] : '' ; ?>"
                                                    required>
                                                <span class="text-danger">
                                                    <?= isset($errorFlash) ? display_error($errorFlash, 'elem_year') : '' ?>
                                                </span>
                                            </div>
                                        </div>
                                        <p class="a" style="font-size:1.5em; font-family: Poppins; color:maroon;">High
                                            School</p>
                                        <div class="form-group row">
                                            <label for="school_name" class="col-sm-2 col-form-label"
                                                style="font-family: Poppins;">School Name</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control"
                                                    style="border-radius:20px;font-family:poppins;" id="school_name"
                                                    name="high_school" placeholder="e.g Baco National High School"
                                                    value="<?= isset($profile['high_school']) ? $profile['high_school'] : '' ; ?>"
                                                    required>
                                                <span class="text-danger">
                                                    <?= isset($errorFlash) ? display_error($errorFlash, 'high_school') : '' ?>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="address" class="col-sm-2 col-form-label"
                                                style="font-family: Poppins;">Address</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control"
                                                    style="border-radius:20px;font-family:poppins;" name="high_address"
                                                    placeholder="e.g Poblacion, Baco, Oriental Mindoro"
                                                    value="<?= isset($profile['high_address']) ? $profile['high_address'] : '' ; ?>"
                                                    required>
                                                <span class="text-danger">
                                                    <?= isset($errorFlash) ? display_error($errorFlash, 'high_address') : '' ?>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="year" class="col-sm-2 col-form-label"
                                                style="font-family: Poppins;">Year Attendee</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control"
                                                    style="border-radius:20px;font-family:poppins;" id="year"
                                                    name="high_year" placeholder="e.g 2014-2018"
                                                    value="<?= isset($profile['high_year']) ? $profile['high_year'] : '' ; ?>"
                                                    required>
                                                <span class="text-danger">
                                                    <?= isset($errorFlash) ? display_error($errorFlash, 'high_year') : '' ?>
                                                </span>
                                            </div>
                                        </div>
                                        <p class="a" style="font-size:1.5em; font-family: Poppins; color:maroon;">Senior
                                            High School</p>
                                        <div class="form-group row">
                                            <label for="school_name" class="col-sm-2 col-form-label"
                                                style="font-family: Poppins;">School Name</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control"
                                                    style="border-radius:20px;font-family:poppins;" id="school_name"
                                                    name="senior_high_school"
                                                    placeholder="e.g Baco National High School"
                                                    value="<?= isset($profile['senior_high_school']) ? $profile['senior_high_school'] : '' ; ?>"
                                                    required>
                                                <span class="text-danger">
                                                    <?= isset($errorFlash) ? display_error($errorFlash, 'senior_high_school') : '' ?>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="address" class="col-sm-2 col-form-label"
                                                style="font-family: Poppins;">Address</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control"
                                                    style="border-radius:20px;font-family:poppins;"
                                                    name="senior_high_address"
                                                    placeholder="e.g Poblacion, Baco, Oriental Mindoro"
                                                    value="<?= isset($profile['senior_high_address']) ? $profile['senior_high_address'] : '' ; ?>"
                                                    required>
                                                <span class="text-danger">
                                                    <?= isset($errorFlash) ? display_error($errorFlash, 'senior_high_address') : '' ?>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="year" class="col-sm-2 col-form-label"
                                                style="font-family: Poppins;">Year Attendee</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control"
                                                    style="border-radius:20px;font-family:poppins;" id="year"
                                                    name="senior_high_year" placeholder="e.g 2014-2018"
                                                    value="<?= isset($profile['senior_high_year']) ? $profile['senior_high_year'] : '' ; ?>"
                                                    required>
                                                <span class="text-danger">
                                                    <?= isset($errorFlash) ? display_error($errorFlash, 'senior_high_year') : '' ?>
                                                </span>
                                            </div>
                                 
                                        </div>
                                        <button type="button" class="btn btn-primary"
                                            style="float:right;font-family:poppins;background-color:maroon;border-color:maroon;border-radius:20px"
                                            onclick="goToGuardianTab()">Previous</button>
                                        <div class="form-group row">
                                            <div class="offset-sm-1 col-sm-5">
                                                <?php if(empty($profile['email'])):?>
                                                <button type="submit" class="btn btn-danger"
                                                    style="border-radius:20px; background-color:maroon; border-color:maroon">Save
                                                </button>
                                                <?php else:?>
                                                <?php foreach($profileUpdate as $myProfile):?>
                                                <button type="button" class="btn btn-danger btn-updateprofile"
                                                    style="border-radius:20px; background-color:maroon; border-color:maroon"
                                                    data-information_id="<?=$myProfile['id'];?>"
                                                    data-gender="<?=$myProfile['gender'];?>"
                                                    data-age="<?=$myProfile['age'];?>" data-ip="<?=$myProfile['ip'];?>"
                                                    data-civil_status="<?=$myProfile['civil_status'];?>"
                                                    data-religion="<?=$myProfile['religion'];?>"
                                                    data-nationality="<?=$myProfile['nationality'];?>"
                                                    data-birthday="<?=$myProfile['birthday'];?>"
                                                    data-birthplace="<?=$myProfile['birthplace'];?>"
                                                    data-street="<?=$myProfile['street'];?>"
                                                    data-baranggay="<?=$myProfile['baranggay'];?>"
                                                    data-prov_add="<?=$myProfile['prov_add'];?>"
                                                    data-zipcode="<?=$myProfile['zipcode'];?>"
                                                    data-contact="<?=$myProfile['contact'];?>"
                                                    data-father_name="<?=$myProfile['father_name'];?>"
                                                    data-father_contact="<?=$myProfile['father_contact'];?>"
                                                    data-father_address="<?=$myProfile['father_address'];?>"
                                                    data-father_occupation="<?=$myProfile['father_occupation'];?>"
                                                    data-mother_name="<?=$myProfile['mother_name'];?>"
                                                    data-mother_contact="<?=$myProfile['mother_contact'];?>"
                                                    data-mother_address="<?=$myProfile['mother_address'];?>"
                                                    data-mother_occupation="<?=$myProfile['mother_occupation'];?>"
                                                    data-guardian_name="<?=$myProfile['guardian_name'];?>"
                                                    data-guardian_contact="<?=$myProfile['guardian_contact'];?>"
                                                    data-guardian_address="<?=$myProfile['guardian_address'];?>"
                                                    data-guardian_occupation="<?=$myProfile['guardian_occupation'];?>"
                                                    data-elem_school="<?=$myProfile['elem_school'];?>"
                                                    data-elem_address="<?=$myProfile['elem_address'];?>"
                                                    data-elem_year="<?=$myProfile['elem_year'];?>"
                                                    data-high_school="<?=$myProfile['high_school'];?>"
                                                    data-high_address="<?=$myProfile['high_address'];?>"
                                                    data-high_year="<?=$myProfile['high_year'];?>"
                                                    data-senior_high_school="<?=$myProfile['senior_high_school'];?>"
                                                    data-senior_high_address="<?=$myProfile['senior_high_address'];?>"
                                                    data-senior_high_year="<?=$myProfile['senior_high_year'];?>">Update</button>

                                            </div>
                                        </div>
                                    </div>
                                    </form>
                                    <?php include 'modal/updateProfile.php'?>

                                </div>
                                <?php endforeach; ?>
                                <?php endif; ?>
                                <?php endif;?>
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
<script src="<?=base_url()?>/cssjs/js/jquery.ph-locations.js"></script>

<script>
$(document).ready(function() {
    // sa button
    $('.btn-edit').on('click', function() {
        // data galing buton
        const profile_id = $(this).data('profile_id');
        // const profile_picture = $(this).data('profile');
        // // sa modal
        $('.id').val(profile_id).trigger('change');
        // Call Modal
        $('#profilepicture').modal('show');
    });
    $('.btn-editName').on('click', function() {
        // data galing buton
        const password_id = $(this).data('password_id');
        // const profile_picture = $(this).data('profile');
        // // sa modal
        $('.password_id').val(password_id).trigger('change');
        // Call Modal
        $('#changePassword').modal('show');
    });
    $('.btn-updateprofile').on('click', function() {
        // data galing buton
        const information_id = $(this).data('information_id');
        const gender = $(this).data('gender');
        const age = $(this).data('age');
        const ip = $(this).data('ip');
        const civil_status = $(this).data('civil_status');
        const religion = $(this).data('religion');
        const nationality = $(this).data('nationality');
        const birthday = $(this).data('birthday');
        const birthplace = $(this).data('birthplace');
        const street = $(this).data('street');
        const baranggay = $(this).data('baranggay');
        const prov_add = $(this).data('prov_add');
        const contact = $(this).data('contact');
        const zipcode = $(this).data('zipcode');

        const father_name = $(this).data('father_name');
        const father_contact = $(this).data('father_contact');
        const father_address = $(this).data('father_address');
        const father_occupation = $(this).data('father_occupation');

        const mother_name = $(this).data('mother_name');
        const mother_contact = $(this).data('mother_contact');
        const mother_address = $(this).data('mother_address');
        const mother_occupation = $(this).data('mother_occupation');

        const guardian_name = $(this).data('guardian_name');
        const guardian_contact = $(this).data('guardian_contact');
        const guardian_address = $(this).data('guardian_address');
        const guardian_occupation = $(this).data('guardian_occupation');

        const elem_school = $(this).data('elem_school');
        const elem_address = $(this).data('elem_address');
        const elem_year = $(this).data('elem_year');
        const high_school = $(this).data('high_school');
        const high_address = $(this).data('high_address');
        const high_year = $(this).data('high_year');
        const senior_high_school = $(this).data('senior_high_school');
        const senior_high_address = $(this).data('senior_high_address');
        const senior_high_year = $(this).data('senior_high_year');
        // // sa modal

        $('.id').val(information_id);
        $('.gender').val(gender);
        $('.age').val(age);
        $('.ip').val(ip);
        $('.civil_status').val(civil_status);
        $('.religion').val(religion);
        $('.nationality').val(nationality);
        $('.birthday').val(birthday);
        $('.birthplace').val(birthplace);
        $('.street').val(street);
        $('.baranggay').val(baranggay);
        $('.prov_add').val(prov_add);
        $('.contact').val(contact);
        $('.zipcode').val(zipcode);

        $('.father_name').val(father_name);
        $('.father_contact').val(father_contact);
        $('.father_address').val(father_address);
        $('.father_occupation').val(father_occupation);

        $('.mother_name').val(mother_name);
        $('.mother_contact').val(mother_contact);
        $('.mother_address').val(mother_address);
        $('.mother_occupation').val(mother_occupation);

        $('.guardian_name').val(guardian_name);
        $('.guardian_contact').val(guardian_contact);
        $('.guardian_address').val(guardian_address);
        $('.guardian_occupation').val(guardian_occupation);

        $('.elem_school').val(elem_school);
        $('.elem_address').val(elem_address);
        $('.elem_year').val(elem_year);
        $('.high_school').val(high_school);
        $('.high_address').val(high_address);
        $('.high_year').val(high_year)
        $('.senior_high_school').val(senior_high_school);
        $('.senior_high_address').val(senior_high_address);
        $('.senior_high_year').val(senior_high_year).trigger('change');
        // Call Modal
        $('#updateProfile').modal('show');
    });
});
</script>

<script type="text/javascript">
var selectedRegion, selectedProvince, selectedCity, selectedBarangay;
var my_handlers = {
    fill_provinces: function() {
        selectedRegion = $(this).val();
        $('#province').ph_locations('fetch_list', [{
            "region_code": selectedRegion
        }]);
    },

    fill_cities: function() {
        selectedProvince = $(this).val();
        $('#city').ph_locations('fetch_list', [{
            "province_code": selectedProvince
        }]);
    },

    fill_barangays: function() {
        selectedCity = $(this).val();
        $('#barangay').ph_locations('fetch_list', [{
            "city_code": selectedCity
        }]);
    }
};

$(function() {
    $('#region').on('change', my_handlers.fill_provinces);
    $('#province').on('change', my_handlers.fill_cities);
    $('#city').on('change', my_handlers.fill_barangays);

    $('#region').ph_locations({
        'location_type': 'regions'
    });
    $('#province').ph_locations({
        'location_type': 'provinces'
    });
    $('#city').ph_locations({
        'location_type': 'cities'
    });
    $('#barangay').ph_locations({
        'location_type': 'barangays'
    });

    $('#region').ph_locations('fetch_list');
});

// Example usage: Accessing the selected values
$('#submit-button').on('click', function() {
    // Retrieve the selected values
    selectedRegion = $('#region').val();
    selectedProvince = $('#province').val();
    selectedCity = $('#city').val();
    selectedBarangay = $('#barangay').val();

    // Perform further processing or submission
});
</script>

<script>
$(function() {
    function capitalizeWords(string) {
        return string.toLowerCase().replace(/(^|\s)\S/g, function(letter) {
            return letter.toUpperCase();
        });
    }

    // Whenever the region dropdown changes, update the value of the hidden field
    $('#region').on('change', function() {
        var selectedCaption = $("#region option:selected").text();
        var capitalizedText = capitalizeWords(selectedCaption.toLowerCase());
        $('input[name=region]').val(capitalizedText);
    });

    // Whenever the province dropdown changes, update the value of the hidden field
    $('#province').on('change', function() {
        var selectedCaption = $("#province option:selected").text();
        var capitalizedText = capitalizeWords(selectedCaption.toLowerCase());
        $('input[name=prov_add]').val(capitalizedText);
    });

    // Whenever the city dropdown changes, update the value of the hidden field
    $('#city').on('change', function() {
        var selectedCaption = $("#city option:selected").text();
        var capitalizedText = capitalizeWords(selectedCaption.toLowerCase());
        $('input[name=city]').val(capitalizedText);
    });

    // Whenever the barangay dropdown changes, update the value of the hidden field
    $('#barangay').on('change', function() {
        var selectedCaption = $("#barangay option:selected").text();
        var capitalizedText = capitalizeWords(selectedCaption.toLowerCase());
        $('input[name=baranggay]').val(capitalizedText);
    });

    $('#region').ph_locations({
        'location_type': 'regions'
    });
    $('#province').ph_locations({
        'location_type': 'provinces'
    });
    $('#city').ph_locations({
        'location_type': 'cities'
    });
    $('#barangay').ph_locations({
        'location_type': 'barangays'
    });

    $('#region').ph_locations('fetch_list');
});
</script>
<script>
    function goToTab(tabId) {
        // Kunin ang tab na may angkop na ID
        var tab = document.querySelector('a[href="' + tabId + '"]');

        // Kung ang tab na ito ay nakita
        if (tab) {
            // I-click ang tab para pumunta doon
            tab.click();
        } else {
            // Kung hindi nakita ang tab, mag-error o walang mangyayari
            console.error('Tab not found:', tabId);
        }
    }

    function goToAddressTab() {
        goToTab('#address');
    }

    function goToBasicInfoTab() {
        goToTab('#basic_info');
    }
    function goToCredentialTab() {
        goToTab('#credential');
    }
    function goToGuardianTab() {
        goToTab('#guardian');
    }
    function goToEducationTab() {
        goToTab('#education');
    }
</script>

