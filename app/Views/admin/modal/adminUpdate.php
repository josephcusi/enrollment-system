<div class="modal fade" id="adminUpdate">
    <div class="modal-dialog modal-lg" style="font-family:poppins">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Admin Update</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="<?= base_url('adminUpdate'); ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PUT" />
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
                                        <div class="col-sm-12">
                                            <input type="hidden" name="id" class="form-control id">
                                            <input type="file" name="profile_picture" class="form-control">
                                            <span
                                                class="text-danger"><?= isset($errorFlash) ? display_error($errorFlash, 'profile_picture') : '' ?></span>
                                        </div>
                                    </div>
                                    <div class="form-group row" style="font-family: Poppins;">
                                        <label class="col-sm-5 col-form-label" style="font-family: Poppins;">Last
                                            Name</label>
                                        <div class="col-sm-12">
                                            <input type="text" name="lastname" class="form-control Adminlastname"
                                                placeholder="Last Name">
                                            <span
                                                class="text-danger"><?= isset($errorFlash) ? display_error($errorFlash, 'lastname') : '' ?></span>
                                        </div>
                                    </div>
                                    <div class="form-group row" style="font-family: Poppins;">
                                        <label class="col-sm-5 col-form-label" style="font-family: Poppins;">First
                                            Name</label>
                                        <div class="col-sm-12">
                                            <input type="text" name="firstname" class="form-control Adminfirstname"
                                                placeholder="First Name">
                                            <span
                                                class="text-danger"><?= isset($errorFlash) ? display_error($errorFlash, 'firstname') : '' ?></span>
                                        </div>
                                    </div>
                                    <div class="form-group row" style="font-family: Poppins;">
                                        <label class="col-sm-5 col-form-label" style="font-family: Poppins;">Middle
                                            Name</label>
                                        <div class="col-sm-12">
                                            <input type="text" name="middlename" class="form-control Adminmiddlename"
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
                                        <label class="col-sm-5 col-form-label"
                                            style="font-family: Poppins;">Email</label>
                                        <div class="col-sm-12">
                                            <input type="email" name="newEmail" class="form-control Adminemail"
                                                placeholder="Email">
                                            <span
                                                class="text-danger"><?= isset($errorFlash) ? display_error($errorFlash, 'newEmail') : '' ?></span>
                                        </div>
                                    </div>
                                    <div class="form-group row" style="font-family: Poppins;">
                                        <label class="col-sm-5 col-form-label"
                                            style="font-family: Poppins;">Password</label>
                                        <div class="col-sm-12">
                                            <input type="password" name="newPassword" class="form-control password"
                                                placeholder="Password">
                                            <span
                                                class="text-danger"><?= isset($errorFlash) ? display_error($errorFlash, 'newPassword') : '' ?></span>
                                                <i class="fa fa-eye"
                                                    style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%);"
                                                    id="togglePassword" onclick="togglePassword()"></i>
                                        </div>
                                    </div>
                                    <div class="form-group row" style="font-family: Poppins;">
                                        <label class="col-sm-5 col-form-label" style="font-family: Poppins;">Confirm
                                            Password</label>
                                        <div class="col-sm-12">
                                            <input type="password" name="confnewPassword" class="form-control confPassword"
                                                placeholder="Password">
                                            <span
                                                class="text-danger"><?= isset($errorFlash) ? display_error($errorFlash, 'confnewPassword') : '' ?></span>
                                                <i class="fa fa-eye"
                                                    style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%);"
                                                    id="togglePasswords" onclick="togglePasswords()"></i>
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
        $('.btn-editAdmin').on('click', function() {
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
            $('.Adminprofile_pics').val(profile_picture);
            $('.Adminlastname').val(lastname);
            $('.Adminfirstname').val(firstname);
            $('.Adminmiddlename').val(middlename);
            $('.Adminemail').val(email);
            $('.Adminpassword').val(password).trigger('change');
            // Call Modal
            $('#adminUpdate').modal('show');
        });
    });
    </script>

<script>
function togglePassword() {
    var passwordField = document.querySelector('.password');
    var toggleIcon = document.querySelector('#togglePassword');

    if (passwordField.type === "password") {
        passwordField.type = "text";
        toggleIcon.classList.remove("fa-eye");
        toggleIcon.classList.add("fa-eye-slash");
    } else {
        passwordField.type = "password";
        toggleIcon.classList.remove("fa-eye-slash");
        toggleIcon.classList.add("fa-eye");
    }
}
</script>
<script>
function togglePasswords() {
    var passwordField = document.querySelector('.confPassword');
    var toggleIcon = document.querySelector('#togglePasswords');

    if (passwordField.type === "password") {
        passwordField.type = "text";
        toggleIcon.classList.remove("fa-eye");
        toggleIcon.classList.add("fa-eye-slash");
    } else {
        passwordField.type = "password";
        toggleIcon.classList.remove("fa-eye-slash");
        toggleIcon.classList.add("fa-eye");
    }
}
</script>