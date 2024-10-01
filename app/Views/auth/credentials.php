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
    <div class="container glass" style="max-width: 650px;">
        <script src="<?= base_url()?>/dist/js/sweetalert.js"></script>

        <?php if (!empty(session()->getFlashdata('incorrect_email'))) : ?>
        <script>
        swal({
            title: "Invalid Email!",
            text: "Please enter your correct email.",
            icon: "error",
            buttons: false,
        });
        </script>
        <?php endif ?>

        <?php if (!empty(session()->getFlashdata('incorrect_pass'))) : ?>
        <script>
        swal({
            title: "Invalid Password!",
            text: "Please enter your correct password.",
            icon: "error",
            buttons: false,
        });
        </script>
        <?php endif ?>

        <?php if (!empty(session()->getFlashdata('notverify'))) : ?>
        <script>
        swal({
            title: "Email Not Verified!",
            text: "Your email is not verified yet. Check your email.",
            icon: "error",
            buttons: false,
        });
        </script>
        <?php endif ?>

        <?php if (!empty(session()->getFlashdata('register'))) : ?>
        <script>
        swal({
            title: "Registration Successfully!",
            text: "Please check your email to verify your account",
            icon: "success",
            buttons: false,
        });
        </script>
        <?php endif ?>

        <?php if (!empty(session()->getFlashdata('verify'))) : ?>
        <script>
        swal({
            title: "Verification Successfully!",
            text: "You can now login to your account.",
            icon: "success",
            buttons: false,
        });
        </script>
        <?php endif ?>

        <?php if (!empty(session()->getFlashdata('passwordreset'))) : ?>
        <script>
        swal({
            title: "Password Reset Successfully!",
            text: "You successfully change your password",
            icon: "success",
            buttons: false,
        });
        </script>
        <?php endif ?>

        <?php if (!empty(session()->getFlashdata('sheesh'))) : ?>
        <script>
        swal({
            title: "Can't Proceed!",
            text: "You cant access to this page. Please login first.",
            icon: "warning",
            buttons: false,
        });
        </script>
        <?php endif ?>

        <?php if (!empty(session()->getFlashdata('logoutz'))) : ?>
        <script>
        swal({
            title: "Logout Successfully!",
            text: "You successfully logout your account.",
            icon: "success",
            buttons: false,
        });
        </script>
        <?php endif ?>


        <div class="forms">
            <div class="form login">
               <div class="logo" style="background-image: url('<?=base_url()?>/cssjs/img/bccLogo.png');"></div> 
                <span class="titles" style="">Baco Community College</span>
                <form action="<?=site_url('insert_credeantials')?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <br>
                    <?php if($user['usertype'] === 'SHS'):?>
                    <input type='text' value="<?= $user['id']?>" name="id">
                    <div class="input-field">
                        <input type="text" name="lrn" placeholder="Lrn" required>
                        <i class="uil uil-envelope icon"></i>
                        <span
                            class="text-danger"><?= isset($validation) ? display_error($validation, 'lrn') : '' ?></span>
                    </div>
                    <?php else:?>
                    <?php endif;?>
                    <br>
                   <div class="form-group">
                        <div class="input-field">
                            <input type="file" name="birth_cert" id="birth_cert" required>
                            <label for="birth_cert">Birth Certificate</label>
                            <span class="file-details" id="birth_cert_details"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-field">
                            <input type="file" name="form_137" id="form_137" required>
                            <label for="form_137">Form 137</label>
                            <span class="file-details" id="form_137_details"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-field">
                            <input type="file" name="class_card" id="class_card" required>
                            <label for="class_card">Class Grade</label>
                            <span class="file-details" id="class_card_details"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-field">
                            <input type="file" name="good_moral" id="good_moral" required>
                            <label for="good_moral">Good Moral</label>
                            <span class="file-details" id="good_moral_details"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-field">
                            <input type="file" name="brgy_certificate" id="brgy_certificate"required >
                            <label for="brgy_certificate">Barangay Certificate</label>
                            <span class="file-details" id="brgy_certificate_details"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-field">
                            <input type="file" name="2x2_picture" id="2x2_picture" required>
                            <label for="2x2_picture">2x2 Picture</label>
                            <span class="file-details" id="2x2_picture_details"></span>
                        </div>
                    </div>
                    <div class="input-field button" id ="uploadButtonID" style="background-color:#800000;">
                      <button type="submit" value="Upload" class="btn btn-success toastsDefaultSuccess" id="uploadButton" style="display: none; background-color: #800000;">Upload</button>
                    </div>
                </form>
                <a href="<?= site_url('cred_skip')?>">
                <div class="input-field button" id ="Skip_uploadButtonID" style="background-color:#800000;">
                      <button type="button" value="Upload" class="btn btn-success toastsDefaultSuccess" id="Skip_uploadButton" style="background-color: #800000;">Skip if not available</button>
                </div>
                </a>
                </form>
               
                <br>
            </div>
        </div>

    </div>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>
<style>

    .form-group .input-field {
        position: relative; /* Make the container relative */
        cursor: pointer;
        overflow: hidden;
    }

    .input-field input[type="file"] {
        position: absolute; /* Position the input absolutely */
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        opacity: 0; /* Make the input transparent */
        cursor: pointer;
    }

    .input-field label {
        position: absolute; /* Position the label absolutely */
        top: 50%;
        left: 0;
        transform: translateY(-50%);
        width: 100%;
        text-align: center;
        font-weight: bold;
    }
.form-group {
    display: flex;
    flex-wrap: wrap;
}

.form-group>div {
    flex: 1;
    margin-right: 60px;
}

.form-group>div:last-child {
    margin-right: 0;
}

.form-group label {
    flex-basis: 20%;
    font-family: Poppins;
}

.form-group .input-field {
    flex: 1;
}
</style>

<style>
    .form-group {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }

    .input-field {
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        background-color: #f1f1f1;
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 10px;
        cursor: pointer;
    }
    

    .input-field:hover {
        background-color: #e1e1e1;
    }

    .input-field input[type="file"] {
        display: none;
    }

    .input-field label {
        font-weight: bold;
    }

    .file-details {
        font-size: 14px;
        color: #555;
        margin-top: 5px;
    }

    @media (max-width: 767px) {
        .form-group {
            flex-direction: column;
        }
    }
    
</style>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const fileInputs = document.querySelectorAll('.input-field input[type="file"]');
        fileInputs.forEach(function (input) {
            input.addEventListener('change', function () {
                const fileName = this.value.split('\\').pop();
                const fileDetails = this.nextElementSibling.nextElementSibling;
                fileDetails.textContent = fileName ? 'Selected File: ' + fileName : '';
            });
        });
    });
</script>

<script>
    // Function to check if all file inputs have files selected
    function checkFileInputs() {
        const fileInputs = document.querySelectorAll('input[type="file"]');
        const uploadButton = document.getElementById('uploadButton');
        const uploadButtonID = document.getElementById('uploadButtonID');
        const Skip_uploadButton = document.getElementById('Skip_uploadButton');
        const Skip_uploadButtonID = document.getElementById('Skip_uploadButtonID');

        let allFilesSelected = true;

        for (const fileInput of fileInputs) {
            if (!fileInput.files.length) {
                allFilesSelected = false;
                break;
            }
        }

        if (allFilesSelected) {
            uploadButton.style.display = 'block'; // Show the button
            uploadButtonID.style.display = 'block'; // Show the button
            Skip_uploadButtonID.style.display = 'none'; // Show the button
            Skip_uploadButtonID.style.display = 'none'; // Show the button

        } else {
            uploadButton.style.display = 'none'; // Hide the button
            uploadButtonID.style.display = 'none'; // Show the button
            Skip_uploadButtonID.style.display = 'block'; // Show the button
            Skip_uploadButtonID.style.display = 'block'; // Show the button
        }
    }

    // Attach the checkFileInputs function to change event of file inputs
    const fileInputs = document.querySelectorAll('input[type="file"]');
    for (const fileInput of fileInputs) {
        fileInput.addEventListener('change', checkFileInputs);
    }

    // Initially check file inputs on page load
    checkFileInputs();
</script>

</html>