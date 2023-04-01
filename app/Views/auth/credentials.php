<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?=base_url()?>/dist/img/bccLogo.png" type="image/icon">
    <title>BCC | Enrollment</title>
    <style>
    body {
        background-image: url('<?=base_url()?>/cssjs/img/bgg.jpg');
    }
    </style>

    <!-- ===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="<?=base_url()?>/cssjs/css/style.css" type="text/css" media="all" />
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
        <?php if(!empty(session()->getFlashdata('incorrect_email'))) : ?>
        <script>
        swal("Invalid Email!", "Please enter your correct email.", "error");
        </script>
        <?php endif ?>

        <?php if(!empty(session()->getFlashdata('incorrect_pass'))) : ?>
        <script>
        swal("Invalid Password!", "Please enter your correct password.", "error");
        </script>
        <?php endif ?>

        <?php if(!empty(session()->getFlashdata('notverify'))) : ?>
        <script>
        swal("Email Not Verified!", "Your email is not verified yet. Check your email.", "error");
        </script>
        <?php endif ?>

        <?php if(!empty(session()->getFlashdata('register'))) : ?>
        <script>
        swal("Registration Successfully!", "Please check your email to verify your account", "success");
        </script>
        <?php endif ?>

        <?php if(!empty(session()->getFlashdata('verify'))) : ?>
        <script>
        swal("Verification Successfully!", "You can now login to your account.", "success");
        </script>
        <?php endif ?>

        <?php if(!empty(session()->getFlashdata('passwordreset'))) : ?>
        <script>
        swal("Password Reset Successfully!", "You successfully change your password", "success");
        </script>
        <?php endif ?>

        <?php if(!empty(session()->getFlashdata('sheesh'))) : ?>
        <script>
        swal("Can't Proceed!", "You cant access to this page. Please login first.", "warning");
        </script>
        <?php endif ?>

        <?php if(!empty(session()->getFlashdata('logoutz'))) : ?>
        <script>
        swal("Logout Successfully!", "You successfully logout your account.", "success");
        </script>
        <?php endif ?>

        <div class="forms">
            <div class="form login">
                <div class="logo" style="background-image: url('<?=base_url()?>/cssjs/img/bccLogo.png');"></div>
                <span class="title">Baco Community College</span>
                <form  action="<?=site_url('insert_credeantials')?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <br>
                    <div class="form-group row" style="font-family: Poppins;">
                        <label class="col-sm-2 col-form-label" style="font-family: Poppins;">Birth Certificate
                            <div class="input-field">
                                <input type="file" name="birth_cert" required>
                                <i class="uil uil-file icon"></i>
                            </div>
                        </label>
                        <span
                            class="text-danger"><?= isset($validation) ? display_error($validation, 'email') : '' ?></span>
                    </div>
                    <br>
                    <div class="form-group row" style="font-family: Poppins;">
                        <label class="col-sm-2 col-form-label" style="font-family: Poppins;">Form 137</label>
                        <div class="input-field">
                            <input type="file" name="form_137" required>
                            <i class="uil uil-file icon"></i>
                        </div>
                        <span
                            class="text-danger"><?= isset($validation) ? display_error($validation, 'email') : '' ?></span>
                    </div>
                    <br>
                    <div class="form-group row" style="font-family: Poppins;">
                        <label class="col-sm-2 col-form-label" style="font-family: Poppins;">Class Grade</label>
                        <div class="input-field">
                            <input type="file" name="class_card" required>
                            <i class="uil uil-file icon"></i>
                        </div>
                        <span
                            class="text-danger"><?= isset($validation) ? display_error($validation, 'email') : '' ?></span>
                    </div>
                    <br>
                    <div class="form-group row" style="font-family: Poppins;">
                        <label class="col-sm-2 col-form-label" style="font-family: Poppins;">Good Moral</label>
                        <div class="input-field">
                            <input type="file" name="good_moral" required>
                            <i class="uil uil-file icon"></i>
                        </div>
                        <span
                            class="text-danger"><?= isset($validation) ? display_error($validation, 'email') : '' ?></span>
                    </div>
                    <div class="input-field button">

                        <button value="Login" class="btn btn-success toastsDefaultSuccess">
                            Upload
                        </button>
                    </div>
                </form>
                <br>
            </div>

        </div>
    </div>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>

</html>