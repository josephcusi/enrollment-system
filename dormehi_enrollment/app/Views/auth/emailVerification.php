
<!DOCTYPE html>
<!-- === Coding by CodingLab | www.codinglabweb.com === -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="<?=base_url()?>/cssjs/css/style.css" type="text/css" media="all" />

    <!-- ===== CSS ===== -->
    <!--<title>Login & Registration Form</title>-->
</head>
<body>
    <div class="container glass">
        <?php if(!empty(session()->getFlashdata('fail'))) : ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
        <?php endif ?>

        <?php if(!empty(session()->getFlashdata('success'))) : ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
        <?php endif ?>

        <div class="forms">
            <div class="form login">
              <div class="logo"></div>
                  <span class="title">DORMEHI</span>
                  <form action="<?= base_url('Verification'); ?>" method="post">
                  <?= csrf_field(); ?>
                    <div class="input-field">
                        <input type="text" placeholder="OTP" name="otp">
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    <span class="text-danger"><?= isset($validation) ? display_error($validation, 'otp') : '' ?></span>
                    <div class="input-field button">
                    <button value="Login">Verify</button>
                    </div>
                </form>

                <div class="login-signup">
                    <span class="text">Not a member?
                        <a href="<?php echo base_url('Register');?>" class="text signup-link">Signup Now</a>
                    </span>
                </div>
            </div>

        </div>
    </div>

</body>
</html>
