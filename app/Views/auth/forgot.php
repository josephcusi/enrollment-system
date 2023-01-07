
<!DOCTYPE html>
<!-- === Coding by CodingLab | www.codinglabweb.com === -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?=base_url()?>/dist/img/dormehiLogo.png" type="image/icon">
    <title>DORMEHI | Enrollment</title>
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
        <?php if(!empty(session()->getFlashdata('fail'))) : ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
        <?php endif ?>

        <?php if(!empty(session()->getFlashdata('success'))) : ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
        <?php endif ?>


        <div class="forms">
            <div class="form login">
              <div class="logo" style="background-image: url('<?=base_url()?>/cssjs/img/dormehiLogo.png');"></div>
                  <span class="title">DORMEHI</span>

                  <form action="<?= site_url('forgot-password') ?>" method="post">
                  <?= csrf_field(); ?>
                    <div class="input-field">
                        <input type="text" placeholder="Email" name="email" value="<?= old('email') ?>">
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    <span class="text-danger"><?= isset($validation) ? display_error($validation, 'email') : '' ?></span>
                    <div class="input-field button">
                    <button type = submit value = "Send Reset Link" class="btn btn-success toastsDefaultSuccess">
                  Send Reset Link
                </button>
                    </div>
                </form>

                <div class="login-signup">
                    <span class="text">Go back to login?
                        <a href="<?php echo base_url('login');?>" class="text signup-link">Login</a>
                    </span>
                </div>
            </div>

        </div>
    </div>

</body>
</html>
