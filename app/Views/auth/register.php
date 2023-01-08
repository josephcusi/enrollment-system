
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?=base_url()?>/dist/img/dormehiLogo.png" type="image/icon">
    <title>DORMEHI | Enrollment</title>

    <!-- ===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="<?=base_url()?>/cssjs/css/style.css" type="text/css" media="all" />
    <style>
        body{
            background-image: url('<?=base_url()?>/cssjs/img/bgg.jpg');
        }
    </style>

    <!--<title>Login & Registration Form</title>-->
</head>

<body>
    <div class="container glass">
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      <?php if(!empty(session()->getFlashdata('fail'))) : ?>
      <script>swal("Ooppss!", "Something went wrong.", "error");</script>
      <?php endif ?>
        <div class="forms">
            <div class="form signup">
                <div class="logo" style="background-image: url('<?=base_url()?>/cssjs/img/dormehiLogo.png');"></div>
                <span class="title">DORMEHI</span>

                <form action="<?= base_url('/store'); ?>" method="post">
                    <?= csrf_field(); ?>
                    <div class="input-field">
                            <input type="text" name="lrn" placeholder="Student LRN">
                            <i class="uil uil-user icon"></i>
                    </div>
                    <span class="text-danger"><?= isset($validation) ? display_error($validation, 'lrn') : '' ?></span>
                        <div class="input-field">
                            <input type="text" name="lastname" placeholder="Last Name"
                                >
                            <i class="uil uil-user icon"></i>
                        </div>
                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'lastname') : '' ?></span>
                        <div class="input-field">
                            <input type="text" name="firstname" placeholder="First Name">
                            <i class="uil uil-user icon"></i>
                        </div>
                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'firstname') : '' ?></span>
                        <div class="input-field">
                            <input type="text" name="middlename" placeholder="Middle Name">
                            <i class="uil uil-user icon"></i>
                        </div>
                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'middlename') : '' ?></span>
                        <div class="input-field">
                            <input type="text" name="email" placeholder="Email" >
                            <i class="uil uil-envelope icon"></i>
                        </div>
                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'email') : '' ?></span>
                        <div class="input-field">
                            <input type="password" name="password" class="password" placeholder="Password"
                              >
                            <i class="uil uil-lock icon"></i>
                        </div>
                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'password') : '' ?></span>
                        <div class="input-field">
                            <input type="password" name="passwordConf" class="password" placeholder="Confirm a password"
                               >
                            <i class="uil uil-lock icon"></i>
                        </div>
                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'passwordConf') : '' ?></span>

                        <div class="checkbox-text">
                            <div class="checkbox-content">
                                <input type="checkbox" id="termCon">
                                <label for="termCon" class="text">I accepted all terms and conditions</label>
                            </div>
                        </div>

                        <div class="input-field button">
                            <button value="Signup">Signup</button>
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
    <script src="script.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>

</html>
