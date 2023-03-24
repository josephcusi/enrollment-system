
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?=base_url()?>/dist/img/bccLogo.png" type="image/icon">
    <title>BCC | Enrollment</title>
    <style>
        body{
            background-image: url('<?=base_url()?>/cssjs/img/bgg.jpg');
        }
    </style>

    <!-- ===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="<?=base_url()?>/cssjs/css/style.css" type="text/css" media="all" />
    <style>
        body{
            background-image: url('<?=base_url()?>/cssjs/img/bgg.jpg');
        }
    </style>

    <!-- ===== CSS ===== -->
    <!--<title>Login & Registration Form</title>-->
</head>
<body>
    <div class="container glass">
      <script src="<?= base_url()?>/dist/js/sweetalert.js"></script>
      <?php if(!empty(session()->getFlashdata('incorrect_email'))) : ?>
      <script>swal("Invalid Email!", "Please enter your correct email.", "error");</script>
      <?php endif ?>

      <?php if(!empty(session()->getFlashdata('incorrect_pass'))) : ?>
      <script>swal("Invalid Password!", "Please enter your correct password.", "error");</script>
      <?php endif ?>

      <?php if(!empty(session()->getFlashdata('notverify'))) : ?>
      <script>swal("Email Not Verified!", "Your email is not verified yet. Check your email.", "error");</script>
      <?php endif ?>

      <?php if(!empty(session()->getFlashdata('register'))) : ?>
      <script>swal("Registration Successfully!", "Please check your email to verify your account", "success");</script>
      <?php endif ?>

      <?php if(!empty(session()->getFlashdata('verify'))) : ?>
      <script>swal("Verification Successfully!", "You can now login to your account.", "success");</script>
      <?php endif ?>

      <?php if(!empty(session()->getFlashdata('passwordreset'))) : ?>
      <script>swal("Password Reset Successfully!", "You successfully change your password", "success");</script>
      <?php endif ?>

      <?php if(!empty(session()->getFlashdata('sheesh'))) : ?>
      <script>swal("Can't Proceed!", "You cant access to this page. Please login first.", "warning");</script>
      <?php endif ?>

      <?php if(!empty(session()->getFlashdata('logoutz'))) : ?>
      <script>swal("Logout Successfully!", "You successfully logout your account.", "success");</script>
      <?php endif ?>

        <div class="forms">
            <div class="form login">
              <div class="logo" style="background-image: url('<?=base_url()?>/cssjs/img/bccLogo.png');"></div>
                  <span class="title">Baco Community College</span>
                  <form action="<?= base_url('retrieve_profile'); ?>" method="post">
                  <?= csrf_field(); ?>
                    <div class="input-field">
                        <input type="text" placeholder="Email/LRN/School ID" name="email">
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    <span class="text-danger"><?= isset($validation) ? display_error($validation, 'email') : '' ?></span>
                    <div class="input-field">
                        <input type="password" class="password" placeholder="Password" name="password" required>
                        <i class="uil uil-lock icon"></i>
                    </div>
                    <span class="text-danger"><?= isset($validation) ? display_error($validation, 'password') : '' ?></span>
                    <div class="checkbox-text">
                        <div class="checkbox-content" required>
                            <input type="checkbox" id="logCheck" required>
                            <label for="logCheck" class="text">Remember me</label>
                        </div>
                        <a href="<?php echo base_url('forgot');?>" class="text">Forgot password?</a>
                    </div>

                    <div class="input-field button">

                    <button value="Login" class="btn btn-success toastsDefaultSuccess">
                  Login
                </button>
                    </div>
                </form>

                <div class="login-signup">
                    <span class="text">Not a member?
                        <a href="<?php echo base_url('register');?>" class="text signup-link">Signup Now</a>
                    </span>
                </div>
            </div>

        </div>
    </div>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>
</html>
