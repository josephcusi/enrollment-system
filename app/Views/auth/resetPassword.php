<!--
<!DOCTYPE html>
<!-- === Coding by CodingLab | www.codinglabweb.com === -->
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
      <?php if(!empty(session()->getFlashdata('fail'))) : ?>
      <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
      <?php endif ?>

        <div class="forms">
            <div class="form signup">
                <div class="logo"style="background-image: url('<?=base_url()?>/cssjs/img/dormehiLogo.png');"></div>
                <span class="title">DORMEHI</span>

                <form action="<?= site_url('reset-password') ?>" method="post">
                    <?= csrf_field(); ?>
                        <div class="input-field">
                            <input type="password" name="password" class="password" placeholder="New Password"
                              >
                            <i class="uil uil-lock icon"></i>
                        </div>
                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'password') : '' ?></span>
                        <div class="input-field">
                            <input type="password" name="password_confirm" class="password" placeholder="Confirm new password"
                               >
                            <i class="uil uil-lock icon"></i>
                        </div>
                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'password_confirm') : '' ?></span>

                        <div class="input-field button">
                            <button type = "submit" value="Reset Password">Reset Password</button>
                        </div>
                </form>

            </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>
