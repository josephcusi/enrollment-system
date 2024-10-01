<!DOCTYPE html>
<html>

<head>
    <title>Enrollment Form</title>
    <style>
    /* CSS code */
    .container {
        max-width: 800px;
        margin: auto;
        padding: 20px;
        background-color: #fff;
        display: grid;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        height: 285mm;
        width: 187mm;
        gap: 20px;
    }

    .left-side p,
    .right-side p {
        margin: 0;
        padding: 1px;
    }

    .header {
        grid-column: 1 / span 2;
        text-align: center;

    }

    .left-side th,
    .left-side td {
        border: 1px solid #000;
        padding: 1px;
    }

    .left-side th {
        background-color: #f2f2f2;
    }

    .right-side table {
        border-collapse: collapse;
    }

    .right-side th,
    .right-side td {
        border: 1px solid #000;
        padding: 1px;
    }

    .right-side th {
        background-color: #f2f2f2;
    }

    .signature {
        margin-top: 60px;
    }

    .signature1 {
        margin-top: -48px;
        margin-bottom: 10px;
        margin-left: 280px;
    }

    @page {
        margin: 0 !important;
        padding: 0 !important;
    }

    .logo {
        max-width: 300px;
    }

    .fixed-position {
        grid-column: 1 / span 2;
        text-align: center;
        border-bottom: 1px dashed #000;
        padding-bottom: 10px;
    }

    .box-container {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .box {
        width: 10px;
        height: 10px;
        border: 1px solid black;
        margin: 0 5px;
    }

    .form-row {
        display: flex;
        align-items: center;
        margin-bottom: 0px;
    }

    .school-year-label {
        margin-right: 10px;
    }

    .address {
        position: absolute;
        bottom: 20px;
        left: 20px;
        width: 43%;
        border-bottom: 1px solid black;
        font-size: 10px;
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        padding-bottom: -1px;
        margin-left: -20px;
    }

    .semester {
        position: absolute;
        bottom: 20px;
        left: 20px;
        width: 43%;

        font-size: 10px;
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        padding-bottom: -1px;
        margin-left: -20px;
    }

    .addresss {
        position: absolute;
        bottom: 20px;
        left: 20px;
        font-size: 15px;
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        padding-bottom: 5px;
        margin-left: -20px;
    }

    .level {
        position: absolute;
        bottom: 4.5px;
        left: 185px;
        width: 37%;
        border-bottom: 1px solid black;
        font-size: 10px;
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        padding-bottom: -1px;
        margin-left: -20px;
    }

    .parent-signature {
        position: absolute;
        top: 330px;
        left: 40px;
        font-size: 12px;
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    }

    .parent-name {
        position: absolute;
        top: 360px;
        left: 40px;
        font-size: 12px;
        font-weight: bold;
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    }

    .date {
        position: absolute;
        bottom: 20px;
        right: 20px;
        font-size: 12px;
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <img      src="https://bccwebportal.com/cssjs/img/logoBCC.jpg" alt="BCC Logo"
                class="logo">

            <h1 style="font-size:15px;padding-bottom:5px;">MODIFIED BASIC EDUCATION ENROLLMENT FORM</h1>
        </div>
        <div>
            <div class="left-side"
                style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; margin-top: -1%; margin-left: 5.5%; font-size: 12px;">
                <p>School Year:<span style="font-weight:bold"><?= $datas['year']?></span></p>
                <p>Grade Level to enroll:<span style="font-weight:bold"><?= $datas['year_level']?></span></p>
            </div>

            <div class="right-side"
                style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; position: absolute; top:9.9%; padding-left: 60%; margin-left: -26%; font-size: 12px;">
                <div class="form-row">
                    <div class="box"><?= !empty($datas['lrn'])?'':'/';?></div>
                    <p for="school-year" class="school-year-label" style="margin-top:-10%;margin-left:5%;">NO LRN</p>
                    <div class="box" style="margin-top:-10%;margin-left:30%;"><?= empty($datas['lrn'])?'':'/';?>
                    </div>
                    <p for="school-year" class="school-year-label" style="margin-top:-14%;margin-left:33%;">WITH LRN</p>
                    <div class="box"></div>
                    <p for="school-year" class="school-year-label" style="margin-top:-10%;margin-left:5%;">Returning
                        (balik-aral)</p>
                </div>
                <h1
                    style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; font-size: 15px; margin-left: -49%;">
                    INSTRUCTIONS:
                    <span style="font-size:12px; font-style:italic; font-weight:normal;">Print legibly all information
                        required in CAPITAL letters. Submit accomplished form to the<br>
                        Person-in-Charge/Registrar/Class Adviser. Use black or blue pen only </span>
                </h1>

                <h1 style="font-size:15px;margin-left:-7%;">STUDENT INFORMATION</h1>
                <div class="left-side"
                    style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; margin-top: -1%;margin-left:-49%; font-size: 12px;">
                    <p>PSA Birth Certificate No. (if available upon registration)
                        <?php if(empty($datas['birth_cert'])):?>
                        <span style=font-weight:bold>No</span>
                        <?php else:?>
                        <span style=font-weight:bold>Yes</span>
                        <?php endif;?>
                    </p>
                    <p>Learner Reference Number (LRN):<span style="font-weight:bold"><?= $datas['lrn']?></span>
                    </p>
                </div>
                <br>

                <div class="left-side"
                    style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; margin-top: -1%;margin-left:-50%; font-size: 12px;">
                    <p style="padding:5px;">LAST NAME :<span style="color:white;">aaaaaaaaaa</span><span
                            style="font-weight:bold"><?= $datas['lastname']?></span></p>
                    <p style="padding:5px;">FIRST NAME:<span style="color:white;">aaaaaaaaaa</span><span
                            style="font-weight:bold"><?= $datas['firstname']?></span></p>
                    <p style="padding:5px;">MIDDLE NAME :<span style="color:white;">ssssssss</span><span
                            style="font-weight:bold"><?= $datas['middlename']?></span></p>
                    <p style="padding:5px;">EXTENSION NAME e.g Jr., III (if available) </p>
                </div>

                <div class="left-side"
                    style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; margin-top: -1%;margin-left:-50%; font-size: 12px;">
                    <p style="padding:5px;">DATE OF BIRTH:<span style="font-weight:bold">
                            <?php
                    $user = $datas['birthday'];
                    $formattedDate = date('F d, Y', strtotime($user));
                    ?> <?=$formattedDate?>
                        </span></p>
                </div>
                <div class="right-side"
                    style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; position: absolute; top:33%; padding-left: 65%; margin-left: -60%; font-size: 12px;">
                    <div class="form-row">
                        <p for="school-year" class="school-year-label" style="margin-top:-80%;">SEX:</p>
                        <div class="box" style="margin-top:-80%;margin-left:17%;">
                            <?= ($datas['gender'] === 'Male')?'/':'';?></div>
                        <p for="school-year" class="school-year-label" style="margin-top:-90%;margin-left:25%;">MALE</p>
                        <div class="box" style="margin-top:-80%;margin-left:45%;">
                            <?= ($datas['gender'] === 'Female')?'/':'';?></div>
                        <p for="school-year" class="school-year-label" style="margin-top:-80%;margin-left:52%;">FEMALE
                        </p>
                        <p for="school-year" class="school-year-label" style="margin-top:-80%;margin-left:75%;">AGE:
                            <span style=font-weight:bold;><?= $datas['age']?></span>
                        </p>
                    </div>
                    <div style="margin-top:-80%;">
                        <div style="margin-top:-75%;">
                            <h1
                                style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; font-size: 15px; margin-left: -118%;">
                                <span style="font-size:12px; font-style:italic; font-weight:normal;">Belonging to any
                                    indigenous people (ip)<br>Community indigineous Cultural Community?</span>
                            </h1>
                            <div>
                                <div class="right-side"
                                    style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; position: absolute; top:-11.5%; padding-left: 60%; margin-left: -60%; font-size: 12px;">
                                    <div class="form-row">
                                        <div class="box"><?= empty($datas['ip'])?'/':'';?></div>
                                        <p for="school-year" class="school-year-label"
                                            style="margin-top:-90%;margin-left:100%;">NO</p>
                                        <div class="box" style="margin-top:-90%;margin-left:340%;">
                                            <?= !empty($datas['ip'])?'/':'';?></div>
                                        <p for="school-year" class="school-year-label"
                                            style="margin-top:-90%;margin-left:440%;">YES</p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="position:absolute; bottom:520px;">
                    <p
                        style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; margin-top: -400%; margin-left: -183%; font-size: 12px;">
                        Mother Tongue:<span style="font-weight:bold"><?= $datas['nationality'];?></span></p>
                </div>
                <div class="addresss" style="position:absolute; bottom:997px; left:275px;font-weight:bold;">
                    ADDRESS
                </div>
                <div class="address" style="position:absolute; bottom:975px; left:275px;width: 63%;">
                    House Number and Street <br><span style="font-size:12px;"><?= $datas['street'];?><span>
                </div>
                <div class="address" style="position:absolute; bottom:948px; left:275px;width: 63%;">
                    Barangay <br><span style="font-size:12px;"><?= $datas['baranggay'];?><span>
                </div>

                <div class="address" style="position:absolute; bottom:920px; left:275px;width: 63%;">
                    City/Municipality/Province/Country <br><span
                        style="font-size:12px;"><?= $datas['city'] . ', ' . $datas['prov_add'];?><span>
                </div>
                <div class="address" style="position:absolute; bottom:920px; left:750px;width: 5%;">
                    Zip Code <br><span style="font-size:12px;"><?= $datas['zipcode'];?><span>
                </div>
                <div class="addresss" style="position:absolute; bottom:892px; left:275px;font-weight:bold;">
                    PARENT'S/GUARDIANS INFORMATION
                </div>
                <div class="address" style="position:absolute; bottom:867px; left:275px;width:30%;">
                    Father's Name (last name, first name, middle name) <br><span
                        style="font-size:12px;"><?= $datas['father_name'];?><span>
                </div>
                <div class="address" style="position:absolute; bottom:867px; left:597px; width: 30%;">
                    Mother's name (last name, first name, middle name) <br><span
                        style="font-size:12px;"><?= $datas['mother_name'];?><span>
                </div>
                <div class="address" style="position:absolute; bottom:837px; left:275px;width:30%;">
                    Guardian's Name (last name, first name, middle name) <br><span
                        style="font-size:12px;"><?= $datas['guardian_name'];?><span>
                </div>
                <div class="address" style="position:absolute; bottom:802px; left:275px;width:30%;font-size:12px;">
                    Telephone No.<br><span style="font-size:12px;"><?= $datas['guardian_contact'];?><span>
                </div>
                <div class="address" style="position:absolute; bottom:802px; left:597px; width: 30%;font-size:12px;">
                    Cellphone No.<br><span style="font-size:12px;"><?= $datas['guardian_contact'];?><span>
                </div>
                <div class="addresss" style="position:absolute; bottom:767px; left:315px;font-weight:bold;">
                    For Returning Learners (Balik-Aral) and Those Who Shall Transfer/Move In
                </div>

                <div class="addresss" style="position:absolute; bottom:743px; left:275px; width:30%;font-size:14px;">
                    Last Grade Level Completed: <span class="level"
                        style="bottom:1325px; left:210px; font-size:14px;font-weight: bold;"><span>
                </div>
                <div class="addresss" style="position:absolute; bottom:743px; left:597px; width: 30%;font-size:14px;">
                    Last School Year Completed:<span class="level"
                        style="bottom:1325px; left:210px;width:35%;font-size:14px;font-weight: bold;"><span>
                </div>
                <div class="address" style="position:absolute; bottom:714px; left:275px;font-size:14px;width:33%;">
                    School Name <br><span style="font-size:14px;"><span>
                </div>
                <div class="address" style="position:absolute; bottom:713px; left:732px;font-size:14px;width:9%;">
                    School ID <br><span style="font-size:14px;"><span>
                </div>
                <div class="addresss" style="position:absolute; bottom:690px; left:275px; width: 21%;font-size:14px;">
                    School Address <span class="level" style="bottom:1325px; left:125px;width:250%;font-size:14px;">
                        <span>
                </div>

                <div class="addresss" style="position:absolute; bottom:666px; left:425px;font-weight:bold;">
                    FOR LEARNERS IN SENIOR HIGH SCHOOL
                </div>
                <div class="addresss" style="position:absolute; bottom:642px; left:275px;">
                    Semester:
                </div>
                <div class="semester" style="position:absolute; bottom:618px; left:590px;width:16%;font-size:14px;">
                    <div class="box-container">
                        <div class="box" style="margin-top:-28%;margin-left:-155%;"></div>
                        <p for="semester" class="school-year-label" style="margin-top:-17%;margin-left:-144%;">1st
                            Semester</p>
                    </div>
                </div>
                <div class="semester" style="position:absolute; bottom:618px; left:700px;width:16%;font-size:14px;">
                    <div class="box-container">
                        <div class="box" style="margin-top:-28%;margin-left:-155%;"></div>
                        <p for="semester" class="school-year-label" style="margin-top:-17%;margin-left:-144%;">2nd
                            Semester</p>
                    </div>
                </div>
                <div class="addresss" style="position:absolute; bottom:620px; left:275px; width: 21%;font-size:14px;">
                    Track: <span class="level"
                        style="bottom:1325px; left:65px;width:120%;font-size:14px;font-weight: bold;">
                        <span>
                </div>
                <div class="addresss" style="position:absolute; bottom:620px; left:572px; width: 21%;font-size:14px;">
                    Strand(if any): <span class="level"
                        style="bottom:1325px;width: 112%;left:110px;font-size:14px;font-weight: bold;"><span>
                </div>
                <div class="addresss" style="position:absolute; bottom:597px; left:395px;font-weight:bold;">
                    PREFERRED DISTANCE LEARNING MODALITYFIES
                </div>
                <div class="semester" style="position:absolute; bottom:570px; left:275px;width:16%;font-size:14px;">
                    <div class="box-container">
                        <div class="box"></div>
                        <label for="semester" class="school-year-label">Modular (Print)</label>
                    </div>
                </div>
                <div class="semester" style="position:absolute; bottom:570px; left:445px;width:16%;font-size:14px;">
                    <div class="box-container">
                        <div class="box"></div>
                        <label for="semester" class="school-year-label">Online</label>
                    </div>
                </div>
                <div class="semester" style="position:absolute; bottom:570px; left:570px;width:20%;font-size:14px;">
                    <div class="box-container">
                        <div class="box"></div>
                        <label for="semester" class="school-year-label">Radio-Based Instruction</label>
                    </div>
                </div>
                <div class="semester" style="position:absolute; bottom:570px; left:755px;width:16%;font-size:14px;">
                    <div class="box-container">
                        <div class="box"></div>
                        <label for="semester" class="school-year-label">Blended (combination)</label>
                    </div>
                </div>
                <div class="semester" style="position:absolute; bottom:534px; left:275px;width:16%;font-size:14px;">
                    <div class="box-container">
                        <div class="box"></div>
                        <label for="semester" class="school-year-label">Modular (Digital)</label>
                    </div>
                </div>
                <div class="semester" style="position:absolute; bottom:534px; left:445px;width:16%;font-size:14px;">
                    <div class="box-container">
                        <div class="box">educational</div>
                        <label for="semester" class="school-year-label">Educational TV</label>
                    </div>
                </div>
                <div class="addresss" style="position:absolute; bottom:446px; left:205;font-size:14px; ">
                    <span style="color:white;">........</span>I hereby certify that the above information given are true
                    and correct to the best of my knowledge<br> and I allow the Department of Education to use my
                    child's details to create and/or update his/her learner<br> profile in the Learner Information
                    System. The information herein shall be treated as confidential in<br> compliance with the Data
                    Privacy Act of 2012.
                </div>
                <div class="address" style="position:absolute; bottom:405px; left:275px;font-size:14px;width:33%;">
                    <br><span style="font-size:14px;"><span>
                </div>
                <div class="address" style="position:absolute; bottom:405px; left:617px;font-size:14px;width:29%;">
                    <br><span style="font-size:14px;"><span>
                </div>
                <div class="addresss" style="position:absolute; bottom:385px; left:288px; width: 30%;font-size:14px;">
                    Signature over printed name guardian/parents
                </div>
                <div class="addresss" style="position:absolute; bottom:385px; left:745px; width: 30%;font-size:14px;">
                    Date
                </div>

                <div class="addresss" style="position:absolute; bottom:325px; left:275px; width: 21%;font-size:14px;">
                    Adviser: <span style=" font-weight: bold;"><span>
                </div>
                <div class="addresss" style="position:absolute; bottom:300px; left:275px; width: 21%;font-size:14px;">
                    Date Enrolled: <span style="font-weight: bold;">
                        <?php
                    $user = $datas['student_created_at'];
                    $formattedDate = date('F d, Y', strtotime($user));
                    ?> <?=$formattedDate?>
                        <span>
                </div>
            </div>
        </div>
</body>

</html>