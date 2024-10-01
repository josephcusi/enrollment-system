<!DOCTYPE html>
<!-- === Coding by CodingLab | www.codinglabweb.com === -->
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

    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="<?=base_url()?>/cssjs/css/stylestyle.css" type="text/css" media="all" />
    <style>
    body {
        background-image: url('<?=base_url()?>/cssjs/img/bgg.jpg');
    }
    </style>

    <!-- ===== CSS ===== -->
    <!--<title>Login & Registration Form</title>-->
</head>

<body>

    <div class="container glass">
        <script src="<?= base_url()?>/dist/js/sweetalert.js"></script>
        <?php if(!empty(session()->getFlashdata('fail'))) : ?>
        <script>
        swal({
            title: "Oopss!",
            text: "The email address you entered was not found.",
            icon: "error",
            buttons: false,
            timer: 1000,
        });
        </script>
        <?php endif ?>

        <?php if(!empty(session()->getFlashdata('success'))) : ?>
        <script>
        swal({
            title: "Link sent!",
            text: "A reset link has been sent to your email address.",
            icon: "success",
            buttons: false,
            timer: 1000,
        });
        </script>
        <?php endif ?>


        <div class="forms">
            <div class="form login">
            <div class="logo" style="background-image: url('<?=base_url()?>/cssjs/img/bccLogo.png');"></div>
                <span class="title">Baco Community College</span>
                <p class="a" style="font-family: 'Poppins';font-size: 20px; text-align:center">Forgot your Password ?
                </p>
                <p class="b" style="font-family: 'Poppins';font-size: 15px; text-align:center">Enter your email and
                    we'll send you a reset link.</p>

                <form action="<?= site_url('forgot-password') ?>" method="post">
                    <?= csrf_field(); ?>
                    <div class="input-field">
                        <input type="text" placeholder="Email" name="email" value="<?= old('email') ?>">
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    <span
                        class="text-danger"><?= isset($validation) ? display_error($validation, 'email') : '' ?></span>
                    <div class="input-field button">
                        <button type=submit value="Send Reset Link" class="btn btn-success toastsDefaultSuccess">
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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>

</html>