
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?=base_url()?>/cssjs/img/bccLogo.png" type="image/icon">
    <title>BCC | Enrollment</title>
    <style>
    body {
        background-image: url('<?=base_url()?>/cssjs/img/bgg.jpg');
    }
    </style>

    <!-- ===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    
    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="<?=base_url()?>/cssjs/css/stylestyle.css" type="text/css" media="all" />
    <style>
    body {
        background-image: url('<?=base_url()?>/cssjs/img/bgg.jpg');
    }
      .captcha-container {
            width: 100%; 
            text-align: center; 
            height:50px;
        }

        .g-recaptcha {
            display: inline-block; 
            margin: 0 auto; 
        }
    </style>

    <!-- ===== CSS ===== -->
    <!--<title>Login & Registration Form</title>-->
      <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
    <div class="container glass">
        <script src="<?= base_url()?>/dist/js/sweetalert.js"></script>
        <?php if(!empty(session()->getFlashdata('incorrect_email'))) : ?>
        <script>
        swal({
            title: "Invalid Email or Password!",
            text: "Please enter your correct email or password.",
            icon: "error",
            buttons: false,
            timer: 5000,
        });
        </script>
        <?php endif ?>

        <?php if(!empty(session()->getFlashdata('incorrect_pass'))) : ?>
        <script>
        swal({
            title: "Invalid Email or Password!",
            text: "Please enter your correct email or password.",
            icon: "error",
            buttons: false,
            timer: 5000,
        });
        </script>
        <?php endif ?>

        <?php if(!empty(session()->getFlashdata('notverify'))) : ?>
        <script>
        swal({
            title: "Email Not Verified!",
            text: "Your email is not verified yet. Check your email.",
            icon: "error",
            buttons: false,
            timer: 5000,
        });
        </script>
        <?php endif ?>

        <?php if(!empty(session()->getFlashdata('register'))) : ?>
        <script>
        swal({
            title: "Registration Successfully!",
            text: "Please check your email to verify your account.",
            icon: "success",
            buttons: false,
            timer: 6000,
            
        });
        </script>
        <?php endif ?>

        <?php if(!empty(session()->getFlashdata('verify'))) : ?>
        <script>
        swal({
            title: "Verification Successfully!",
            text: "You can now login to your account.",
            icon: "success",
            buttons: false,
            timer: 5000,
        });
        </script>
        <?php endif ?>

        <?php if(!empty(session()->getFlashdata('passwordreset'))) : ?>
        <script>
        swal({
            title: "Password Reset Successfully!",
            text: "You successfully change your password",
            icon: "success",
            buttons: false,
            timer: 5000,
        });
        </script>
        <?php endif ?>

        <?php if(!empty(session()->getFlashdata('sheesh'))) : ?>
        <script>
        swal({
            title: "Can't Proceed!",
            text: "You cant access to this page. Please login first.",
            icon: "warning",
            buttons: false,
            timer: 5000,
        });
        </script>
        <?php endif ?>

        <?php if(!empty(session()->getFlashdata('logoutz'))) : ?>
        <script>
        swal({
            title: "Logout Successfully!",
            text: "You successfully logout your account.",
            icon: "success",
            buttons: false,
            timer: 5000,
        });
        </script>
        <?php endif ?>

        <?php if (!empty(session()->getFlashdata('updated'))) : ?>
          <script>
          swal({
              title: "Successfuly Updated!",
              text: "You successfuly updated your data.",
              icon: "success",
              timer: 5000,
              buttons: false
          });
          </script>
          <?php endif ?>

        <?php if(!empty(session()->getFlashdata('saveprofile'))) : ?>
        <script>
        swal({
            title: "Credential Uploaded!",
            text: "Credential received. Account pending approval. Wait for email notification before logging in.",
            icon: "success",
            buttons: false,
            timer: 5000,
        });
        </script>
        <?php endif ?>

        <?php if(!empty(session()->getFlashdata('notApp'))) : ?>
        <script>
        swal({
            title: "Can't Proceed!",
            text: "Account under review. You'll be notified by email upon approval. Please wait before logging in.",
            icon: "warning",
            buttons: false,
            timer: 5000,
        });
        </script>
        <?php endif ?>

        <?php if (!empty(session()->getFlashdata('success'))) : ?>
        <script>
        swal({
            title: "Updated!",
            text: "You successfuly updated your password.",
            icon: "success",
            timer: 5000,
            buttons: false
        });
        </script>
        <?php endif ?>
        
        <?php if (!empty(session()->getFlashdata('updatess'))) : ?>
        <script>
        swal({
            title: "Updated!",
            text: "You successfuly updated your education type.",
            icon: "success",
            timer: 5000,
            buttons: false
        });
        </script>
        <?php endif ?>

        <?php if (!empty(session()->getFlashdata('change'))) : ?>
        <script>
        swal({
            title: "Updated!",
            text: "You successfuly updated school year/semester.",
            icon: "success",
            timer: 5000,
            buttons: false
        });
        </script>
        <?php endif ?>



        <div class="forms">
           
            <div class="form login">
                     <span class="text">
                       <a href="<?php echo base_url('landing');?>"><i class="fa fa-home w3-xlarge" style = "color:maroon;margin-top:-10px;"></i></a>
                    </span>
                <div class="logo" style="background-image: url('<?=base_url()?>/cssjs/img/bccLogo.png');"></div>
                <span class="title">Baco Community College</span>
                <form id="loginForm" action="<?= base_url('my_profile'); ?>" method="post">
                    <?= csrf_field(); ?>
                    <div class="input-field">
                        <input type="text" placeholder="Email/School ID" name="email" value="<?= set_value('email')?>" required>
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    <span
                        class="text-danger"><?= isset($validation) ? display_error($validation, 'email') : '' ?></span>
                    <div class="input-field">
                        <input type="password" class="password" placeholder="Password" name="password" value="<?= set_value('password')?>" required>
                        <i class="uil uil-lock icon"></i>
                            <i class="fa fa-eye"  style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%);" id="togglePassword" onclick="togglePassword()"></i>
                    </div>
                    <span
                        class="text-danger"><?= isset($validation) ? display_error($validation, 'password') : '' ?></span>
                    <div class="checkbox-text">
                        <div class="checkbox-content">
                            <input type="checkbox" id="logCheck">
                            <label for="logCheck" class="text">Remember me</label>
                        </div>
                        <a href="<?php echo base_url('forgot');?>" class="text">Forgot password?</a>
                    </div>
                    <!--<div class="input-field">-->
                    <!--    <div class="captcha-container">-->
                    <!--        <div id="recaptcha" class="g-recaptcha" data-sitekey="6Lf2j2IoAAAAAHtP1A9BucQOqP4ctggUdv6n3Ql9"></div>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <div class="input-field button">

                        <button value="Login" class="btn btn-success toastsDefaultSuccess" id="loginButton">
                            Login
                        </button>
                    </div>
                </form>
                  
                <div class="login-signup">
                  
                    <span class="text">Not a member?
                        <a href="<?php echo base_url('account_registration');?>" class="text signup-link">Signup Now</a>
                    </span>
                   
     
                </div>
            </div>

        </div>
    </div>
        <script>
    function validateCaptcha() {
        var response = grecaptcha.getResponse();
        if (response.length === 0) {
          
            swal({
            title: "Opsss!",
            text: " Please complete the CAPTCHA before logging in.",
            icon: "warning",
            timer: 4000,
            buttons: false
        });
            return false;
        } else {

            return true;
        }
    }

    document.getElementById('loginForm').onsubmit = function () {
        return validateCaptcha();
    };
</script>
      <script>
        function onSubmit() {
            grecaptcha.execute();
            return false;
        }
    </script>
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
<!-- Include jQuery library -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    $(document).ready(function () {
        $("#loginForm").submit(function () {
            // Disable the button
            $("#loginButton").prop("disabled", true);

            // Change the text to a spinning loader
            $("#loginButton").html('Logging in...');

            return true; // Allow the form submission to continue
        });
    });
</script>

    
</body>

</html>