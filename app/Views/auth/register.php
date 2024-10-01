<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?=base_url()?>/cssjs/img/bccLogo.png" type="image/icon">
    <title>BCC | Enrollment</title>

    <!-- ===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css">

    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="<?=base_url()?>/cssjs/css/stylestyle.css" type="text/css" media="all" />
    <style>
    body {
        background-image: url('<?=base_url()?>/cssjs/img/bgg.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: center center;
    }
    </style>


    <!--<title>Login & Registration Form</title>-->
</head>

<body>
    <div class="container glass">
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <?php if(!empty(session()->getFlashdata('fail'))) : ?>
        <script>
        swal({
            title: "Ooppss!",
            text: "Something went wrong.",
            icon: "error",
            buttons: false,
            timer: 5000,
        });
        </script>
        <?php endif ?>

        <div class="forms">
            <div class="form signup">
                <span class="text">
                    <a href="<?php echo base_url('landing');?>"><i class="fa fa-home w3-xlarge"
                            style="color:maroon;margin-top:-10px;"></i></a>
                </span>
                <div class="logo" style="background-image: url('<?=base_url()?>/cssjs/img/bccLogo.png');"></div>
                <span class="title">Baco Community College</span>
                <form id="signupForm" action="<?= base_url('/store'); ?>" method="post">
                    <?= csrf_field(); ?>
                    <div class="select-field">
                        <select type="text" name="usertype" placeholder="Student LRN" required>
                            <option type="text" class="form-control" value="">Select Education</option>
                            <option type="text" class="form-control" value="COLLEGE">COLLEGE</option>
                        </select>
                        <i class="uil uil-user icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="text" name="lastname" placeholder="Last Name" id="inputField1"
                            class="capitalize-input" oninput="capitalizeFirstLetters(this)"
                            value="<?= set_value('lastname')?>" required>
                        <i class="uil uil-user icon"></i>
                    </div>
                    <span
                        class="text-danger"><?= isset($validation) ? display_error($validation, 'lastname') : '' ?></span>
                    <div class="input-field">
                        <input type="text" name="firstname" placeholder="First Name" id="inputField2"
                            class="capitalize-input" oninput="capitalizeFirstLetters(this)"
                            value="<?= set_value('firstname')?>" required>
                        <i class="uil uil-user icon"></i>
                    </div>
                    <span
                        class="text-danger"><?= isset($validation) ? display_error($validation, 'firstname') : '' ?></span>

                    <div class="input-field">
                        <input type="text" name="middlename" placeholder="Middle Name" id="inputField3"
                            class="capitalize-input" oninput="capitalizeFirstLetters(this)"
                            value="<?= set_value('middlename')?>">
                        <i class="uil uil-user icon"></i>
                    </div>
                    <span
                        class="text-danger"><?= isset($validation) ? display_error($validation, 'middlename') : '' ?></span>

                    <div class="input-field">
                        <input type="text" name="email" placeholder="Email" value="<?= set_value('email')?>" required>
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    <span
                        class="text-danger"><?= isset($validation) ? display_error($validation, 'email') : '' ?></span>
                    <div class="input-field">
                        <input type="password" name="password" class="password" placeholder="Create new Password"
                            value="<?= set_value('password')?>" required>
                        <i class="uil uil-lock icon"></i>
                        <i class="fa fa-eye"
                            style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%);"
                            id="togglePassword" onclick="togglePassword()"></i>
                    </div>
                    <span
                        class="text-danger"><?= isset($validation) ? display_error($validation, 'password') : '' ?></span>
                    <div class="input-field">
                        <input type="password" name="passwordConf" class="passwordConf" placeholder="Confirm a password"
                            value="<?= set_value('passwordConf')?>" required>
                        <i class="uil uil-lock icon"></i>
                        <i class="fa fa-eye"
                            style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%);"
                            id="togglePasswords" onclick="togglePasswords()"></i>
                    </div>
                    <span
                        class="text-danger"><?= isset($validation) ? display_error($validation, 'passwordConf') : '' ?></span>

                    <div class="checkbox-text">
                        <div class="checkbox-content">
                            <input type="checkbox" style="display:none;" id="termCon" name="agree" value="yes" required>
                            <input type="checkbox" id="termConTwo" data-toggle="modal" data-target="#new-reg">
                            <label type="button" id="termConButton" style="background-color:none;" data-toggle="modal"
                                data-target="#new-reg">I accept all terms and conditions</label>
                        </div>

                    </div>

                    <div class="input-field button" id="signupContainer">
                        <button id="signupButton" onclick="showLoadingState()">Signup</button>
                        <span id="loadingIndicator" style="display: none;"></span>
                    </div>
                </form>

                <div class="login-signup">
                    <span class="text">Already a member?
                        <a href="<?php echo base_url('login'); ?>" class="text login-link">Login Now</a>
                    </span>

                </div>
            </div>
        </div>
    </div>
    <?= $this->include('auth/modal_auth/modal_auth_reg') ?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

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
        var passwordField = document.querySelector('.passwordConf');
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
    <script>
    function capitalizeFirstLetters(inputField) {
        let inputValue = inputField.value;

        // Check if there is any input
        if (inputValue.length > 0) {
            // Capitalize the first letter of each word
            inputField.value = inputValue.replace(/\b\w/g, function(match) {
                return match.toUpperCase();
            });
        }
    }

    // Select all input fields with the class 'capitalize-input' and attach the event listener
    let inputFields = document.querySelectorAll('.capitalize-input');
    inputFields.forEach(function(input) {
        input.addEventListener('input', function() {
            capitalizeFirstLetters(input);
        });
    });
    </script>
</body>

<script>
    $(document).ready(function () {
        $("#signupForm").submit(function () {
            // Disable the button
            $("#signupButton").prop("disabled", true);

            // Change the text to a spinning loader
            $("#signupButton").html('Registering...');

            return true; // Allow the form submission to continue
        });
    });
</script>
</html>