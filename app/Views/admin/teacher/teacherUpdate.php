<div class="modal fade" id="teacherUpdate">
    <div class="modal-dialog modal-xl" style="font-family:poppins">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Teacher Update</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="<?= base_url('TeacherUpdate')?>" method="post" enctype="multipart/form-data">
                    <div class="card-body p-0">
                        <div class="bs-stepper">
                            <div class="bs-stepper-header mx-auto" style="width:85%" role="tablist">
                                <!-- your steps here -->
                                <div class="step" data-target="#logins-part">
                                    <button type="button" class="step-trigger" role="tab" aria-controls="logins-part"
                                        id="logins-part-trigger">
                                        <span class="bs-stepper-circle" style="background-color:maroon;">1</span>
                                        <span class="bs-stepper-label" style="font-family:poppins;">Information</span>
                                    </button>
                                </div>
                                <div class="line" style="background-color:maroon;"></div>
                                <div class="step" data-target="#information-part">
                                    <button type="button" class="step-trigger" role="tab"
                                        aria-controls="information-part" id="information-part-trigger">
                                        <span class="bs-stepper-circle" style="background-color:maroon;">2</span>
                                        <span class="bs-stepper-label" style="font-family:poppins;">Credentials</span>
                                    </button>
                                </div>
                            </div>
                            <div class="bs-stepper-content mx-auto" style="width:70%">
                                <?php if(session()->has('validation')){
                    $errorFlash = session()->getFlashdata('validation');} ?>

                                <!-- your steps content here -->
                                <div id="logins-part" class="content" role="tabpanel"
                                    aria-labelledby="logins-part-trigger">
                                    <br>
                                    <br>
                                    <br>
                                    <div class="form-group row" style="font-family: Poppins;">
                                        <img class="profile-user-img img-fluid img-circle"
                                            style="width:50px; height:50px;margin-left:30px; background-image:url(../../dist/img/profile.jpg); border-color:maroon; background-size:cover;">
                                        <div class="col-sm-10">
                                            <input type="hidden" name="id" class="id">
                                            <input type="file" name="profile_picture" class="form-control">
                                            <span
                                                class="text-danger"><?= isset($errorFlash) ? display_error($errorFlash, 'profile_picture') : '' ?></span>
                                        </div>
                                    </div>
                                    <div class="form-group row" style="font-family: Poppins;">
                                        <label class="col-sm-2 col-form-label"
                                            style="font-family: Poppins;">Department</label>
                                        <div class="col-sm-10">
                                            <select class="form-control Teacherdepartment" id="inputCivil"
                                                name="department">
                                                <?php foreach($strand as $strands):?>
                                                <option type="text" class="form-control" style="font-family: Poppins;"
                                                    id="inputCivil">
                                                    <?= $strands['strand']?>
                                                </option>
                                                <?php endforeach;?>
                                                <option type="text" class="form-control" style="font-family: Poppins;"
                                                    id="inputCivil">
                                                    SHS
                                                </option>
                                                <option type="text" class="form-control" style="font-family: Poppins;"
                                                    id="inputCivil">
                                                    NONE
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row" style="font-family: Poppins;">
                                        <label class="col-sm-2 col-form-label" style="font-family: Poppins;">Last
                                            Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="lastname" class="form-control Teacherlastname"
                                                placeholder="Last Name">
                                            <input type="hidden" name="teacher_id"
                                                class="form-control Teacherteacher_id">
                                            <span
                                                class="text-danger"><?= isset($errorFlash) ? display_error($errorFlash, 'lastname') : '' ?></span>
                                        </div>
                                    </div>
                                    <div class="form-group row" style="font-family: Poppins;">
                                        <label class="col-sm-2 col-form-label" style="font-family: Poppins;">First
                                            Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="firstname" class="form-control Teacherfirstname"
                                                placeholder="First Name">
                                            <span
                                                class="text-danger"><?= isset($errorFlash) ? display_error($errorFlash, 'firstname') : '' ?></span>
                                        </div>
                                    </div>
                                    <div class="form-group row" style="font-family: Poppins;">
                                        <label class="col-sm-2 col-form-label" style="font-family: Poppins;">Middle
                                            Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="middlename" class="form-control Teachermiddlename"
                                                placeholder="Middle Name">
                                            <span
                                                class="text-danger"><?= isset($errorFlash) ? display_error($errorFlash, 'middlename') : '' ?></span>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-primary"
                                        style="float:right;font-family:poppins;background-color:maroon;border-color:maroon;border-radius:20px"
                                        onclick="stepper.next()">Next</button>

                                </div>
                            </div>
                            <div class="bs-stepper-content mx-auto" style="width:70%">

                                <div id="information-part" class="content" role="tabpanel"
                                    aria-labelledby="information-part-trigger">
                                    <div class="form-group row" style="font-family: Poppins;">
                                        <label class="col-sm-2 col-form-label"
                                            style="font-family: Poppins;">Designation</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="designation"
                                                class="form-control Teacherdesignation" placeholder="Designation">
                                            <span
                                                class="text-danger"><?= isset($errorFlash) ? display_error($errorFlash, 'newEmail') : '' ?></span>
                                        </div>
                                    </div>
                                    <div class="form-group row" style="font-family: Poppins;">
                                        <label class="col-sm-2 col-form-label" style="font-family: Poppins;">School
                                            ID</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="teacher_school_id"
                                                class="form-control Teacherteacher_school_id" placeholder="Teacher ID">
                                            <span
                                                class="text-danger"><?= isset($errorFlash) ? display_error($errorFlash, 'newEmail') : '' ?></span>
                                        </div>
                                    </div>
                                    <div class="form-group row" style="font-family: Poppins;">
                                        <label class="col-sm-2 col-form-label"
                                            style="font-family: Poppins;">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" name="newEmail" class="form-control Teacheremail"
                                                placeholder="Email">
                                            <span
                                                class="text-danger"><?= isset($errorFlash) ? display_error($errorFlash, 'newEmail') : '' ?></span>
                                        </div>
                                    </div>
                                    <div class="form-group row" style="font-family: Poppins;">
                                        <label class="col-sm-2 col-form-label"
                                            style="font-family: Poppins;">Password</label>
                                        <div class="col-sm-10">
                                            <input type="password" name="newPassword" class="form-control"
                                                placeholder="Password">
                                            <span
                                                class="text-danger"><?= isset($errorFlash) ? display_error($errorFlash, 'newPassword') : '' ?></span>
                                        </div>
                                    </div>
                                    <div class="form-group row" style="font-family: Poppins;">
                                        <label class="col-sm-2 col-form-label" style="font-family: Poppins;">Confirm
                                            Password</label>
                                        <div class="col-sm-10">
                                            <input type="password" name="confnewPassword" class="form-control"
                                                placeholder="Password">
                                            <span
                                                class="text-danger"><?= isset($errorFlash) ? display_error($errorFlash, 'confnewPassword') : '' ?></span>
                                        </div>
                                    </div>
                                    <div class="a" style="float:right;">
                                        <button type="button" class="btn btn-primary"
                                            style="font-family:poppins;background-color:maroon;border-color:maroon;border-radius:20px"
                                            onclick="stepper.previous()">Previous</button>
                                        <button type="submit" class="btn btn-primary"
                                            style="font-family:poppins;background-color:maroon;border-color:maroon;border-radius:20px">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->

                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
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
            const teacher_school_id = $(this).data('teacher_school_id');
            const designation = $(this).data('designation');
            const department = $(this).data('department');
            const teacher_id = $(this).data('teacher_id');
            // // sa modal
            $('.id').val(id);
            $('.Teacherprofile_pics').val(profile_picture);
            $('.Teacherlastname').val(lastname);
            $('.Teacherfirstname').val(firstname);
            $('.Teachermiddlename').val(middlename);
            $('.Teacherdepartment').val(department);
            $('.Teacherdesignation').val(designation);
            $('.Teacherteacher_id').val(teacher_id);
            $('.Teacherteacher_school_id').val(teacher_school_id);
            $('.Teacheremail').val(email);
            $('.Teacherpassword').val(password).trigger('change');
            // Call Modal
            $('#teacherUpdate').modal('show');
        });
    });
    </script>