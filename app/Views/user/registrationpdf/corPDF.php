<!DOCTYPE html>
<html>

<head>
    <title>Certificate of Registration</title>
    <style>
    /* CSS code */
    .container {
        max-width: 800px;
        margin: auto;

        padding: 20px;
        background-color: #fff;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        display: grid;
        grid-template-columns: 3fr 1fr;
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
    </style>


</head>

<body>
    <div class="container">
        <div class="header">
            <img alt="BCC Logo" class="logo"
                src="https://bccwebportal.com/cssjs/img/logoBCC.jpg" alt="Logo">
        </div>

        <div class="left-side">
            <p><strong>Student No.:</strong><?= $user_data['lrn'] ?></p>
            <p><strong>Student Name:</strong>
                <?= $user_data['firstname'] . ' ' . $user_data['middlename'] . ' ' . $user_data['lastname'] ?>
            </p>
            <p><strong>Address :</strong>
                <?= $user_data['street'] . ', ' . $user_data['baranggay'] . ', ' . $user_data['city'] . ', ' . $user_data['prov_add'] ?>
            </p>

            <p><strong>Birthday :</strong> <?php
                $formattedDate = date('F d, Y', strtotime($user_data['birthday']));
                ?> <?= $formattedDate?><span><strong> Age:</strong>
                    <?= $user_data['age'] ?></span><span><strong> Gender:</strong>
                    <?= $user_data['gender'] ?></span></p>
            <p><strong>Civil Status:</strong> <?= $user_data['civil_status'] ?><span><strong> Religion:</strong>
                    <?= $user_data['religion'] ?></span><span><strong> PWD:</strong> NO</span></p>
            <p><strong>Nationality:</strong> <?= $user_data['nationality'] ?></p>
            <p><strong>Course/Year:</strong> <?= $user_data['title'] ?> / <?= $user_data['year_level'] ?></p>
        </div>

        <div class="right-side" style="position: absolute;top:6.6%;padding-left: 70%;">
            <p><strong>Date:</strong><?php
                $formattedDate = date('F d, Y', strtotime($user_data['student_created_at']));
                ?> <?= $formattedDate?></p>
            <p><strong>Academic Year:</strong> <?= $user_data['year'] ?></p>
            <p><strong>Term:</strong> <?= $user_data['semester'] ?></p>
            <p><strong>Indigenous People:</strong> <?= !empty($user_data['ip']) ? $user_data['ip'] : "NONE";?></p>
            <p><strong>Telephone:</strong> <?= $user_data['contact'] ?></p>
            <p><strong>Remarks:</strong> Excellent</p>
        </div>

        <div class="dashed" style=" grid-column: 1 / span 2;
        text-align: center;
        border-bottom: 1px dashed #000;
        padding-bottom: 10px;"></div>
        <br>
        <div class="left-side">
            <table style="width: 75%;
        border-collapse: collapse;">
                <thead>
                    <tr>
                        <th>Subject Code</th>
                        <th>Subject Description</th>
                        <th>Units</th>
                        <th>Prof Signature</th>
                        <th>Room</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $ids = explode(",", $user_data['subject_id']);
                foreach($subject as $sub):
                    foreach($ids as $id) :
                        if($id == $sub['id']): ?>
                    <tr>
                        <td><?= $sub['subject']?></td>
                        <td><?= $sub['subject_title']?></td>
                        <td><?= $sub['unit']?></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <?php endif; endforeach; endforeach; ?>
                </tbody>
            </table>
            <div class="signature" style="position:fixed;top:40.1%">
                <p style="position:fixed;top:44%;left:9%">
                    <?= $user_data['firstname'] . ' ' . $user_data['middlename'] . ' ' . $user_data['lastname'] ?>
                </p>
                <p>___________________________</p>
                <p style="position:fixed;top:46%;left:9%">Student Signature</p>
                </p>
            </div>
            <div class="signature1" style="position:fixed;top:48.2%">
                <p style="position:fixed;top:44%;left:46%">
                    <?= $registrar['firstname'] . ' ' . $registrar['middlename'] . ' ' . $registrar['lastname'] ?></p>
                <p>___________________________</p>
                <p style="position:fixed;top:46%;left:47%">Registar</p>
                </p>
            </div>
        </div>
        <div class="right-side" style="position: absolute;
        right: 20px;
        top: 31.8%;
        transform: translateY(-50%);">
            <table>
                <thead>
                    <tr>
                        <th>ASSESSMENT</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            Admission Fee:
                            <br>Entrance Fee:
                            <br>Guidance Fee : <strong>400.00</strong>
                            <br>Laboratory Fee:
                            <br>Library Fee : <strong>300.00</strong>
                            <br>Handbook Fee:
                            <br>Med & Dental Fee : <strong>300.00</strong>
                            <br>School ID Fee:
                            <br>Registration Fee : <strong>100.00</strong>
                            <br>Athletic Fee : <strong>400.00</strong>
                            <br>Computer Fee : <strong>100.00</strong>
                            <br>Cultural Fee : <strong>300.00</strong>
                            <br>Development Fee : <strong>850.00</strong>
                            <br>
                            <p style="font-size:12px;">Tuition Fee 165/unit:<span
                                    style="font-size:15px;"><strong>3,465.00</strong></span></p>
                            <strong>Total : 6,115.00</strong>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="dashed"
            style="position: fixed; top: 49%; left: 2.7%; width: 95%; height: 1px; z-index: 9999; text-align: center; border-bottom: 1px dashed #000; padding-bottom: 10px;">
        </div>
        <div class="header" style="position: fixed;top:51%;
    left: 32%;">
            <img alt="BCC Logo" class="logo"
                src="https://bccwebportal.com/cssjs/img/logoBCC.jpg" alt="Logo">
        </div>

        <div class="left-side" style="position: fixed;top:57%;">
            <p><strong>Student No.:</strong> <?= $user_data['lrn'] ?></p>
            <p><strong>Student Name:</strong>
                <?= $user_data['firstname'] . ' ' . $user_data['middlename'] . ' ' . $user_data['lastname'] ?>
            </p>
            <p><strong>Address:</strong>
                <?= $user_data['street'] . ', ' . $user_data['baranggay'] . ', ' . $user_data['city'] . ', ' . $user_data['prov_add'] ?>
            </p>
            <p><strong>Birthday:</strong><?php
                $formattedDate = date('F d, Y', strtotime($user_data['birthday']));
                ?> <?= $formattedDate?><span><strong> Age:</strong>
                    <?= $user_data['age'] ?></span><span><strong> Gender:</strong>
                    <?= $user_data['gender'] ?></span></p>
            <p><strong>Civil Status:</strong> <?= $user_data['civil_status'] ?><span><strong> Religion:</strong>
                    <?= $user_data['religion'] ?></span><span><strong> PWD:</strong> NO</span></p>
            <p><strong>Nationality:</strong> <?= $user_data['nationality'] ?></p>
            <p><strong>Course/Year:</strong> <?= $user_data['title'] ?> / <?= $user_data['year_level'] ?></p>
        </div>

        <div class="right-side" style="position: fixed;top:57%;padding-left: 70%;">
            <p><strong>Date:</strong><?php
                $formattedDate = date('F d, Y', strtotime($user_data['student_created_at']));
                ?> <?= $formattedDate?></p>
            <p><strong>Academic Year:</strong> <?= $user_data['year'] ?></p>
            <p><strong>Term:</strong> <?= $user_data['semester'] ?></p>
            <p><strong>Indigenous People:</strong> <?= $user_data['ip'] ?></p>
            <p><strong>Telephone:</strong> <?= $user_data['contact'] ?></p>
            <p><strong>Remarks:</strong> Excellent</p>
        </div>
        <div class="dashed"
            style="position: fixed; top: 68%; left: 2.7%; width: 95%; height: 1px; z-index: 9999; text-align: center; border-bottom: 1px dashed #000; padding-bottom: 10px;">
        </div>
        <br>
        <div class="left-side" style="position: fixed;top:70%;">
            <table style="position: fixed;margin: 2%;width: 71.8%;
        border-collapse: collapse;top:68.8%">
                <thead>
                    <tr>
                        <th>Subject Code</th>
                        <th>Subject Description</th>
                        <th>Units</th>
                        <th>Prof Signature</th>
                        <th>Room</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $ids = explode(",", $user_data['subject_id']);
                foreach($subject as $sub):
                    foreach($ids as $id) :
                        if($id == $sub['id']): ?>
                    <tr>
                        <td><?= $sub['subject']?></td>
                        <td><?= $sub['subject_title']?></td>
                        <td><?= $sub['unit']?></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <?php endif; endforeach; endforeach; ?>
                </tbody>
            </table>
            <div class="signature" style="position:fixed;top:91%">
                <p style="position:fixed;top:95%;left:9%">
                    <?= $user_data['firstname'] . ' ' . $user_data['middlename'] . ' ' . $user_data['lastname'] ?>
                </p>
                <p>___________________________</p>
                <p style="position:fixed;top:97%;left:9%">Student Signature</p>
                </p>
            </div>
            <div class="signature1" style="position:fixed;top:99.1%">
                <p style="position:fixed;top:95%;left:46%">
                    <?= $registrar['firstname'] . ' ' . $registrar['middlename'] . ' ' . $registrar['lastname'] ?></p>
                <p>___________________________</p>
                <p style="position:fixed;top:97%;left:46%">Registrar</p>
            </div>
        </div>
        <div class="right-side" style="position: fixed;
        right: 20px;
        top: 81.6%;
        transform: translateY(-50%);">
            <table>
                <thead>
                    <tr>
                        <th>ASSESSMENT</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            Admission Fee:
                            <br>Entrance Fee:
                            <br>Guidance Fee : <strong>400.00</strong>
                            <br>Laboratory Fee:
                            <br>Library Fee : <strong>300.00</strong>
                            <br>Handbook Fee:
                            <br>Med & Dental Fee : <strong>300.00</strong>
                            <br>School ID Fee:
                            <br>Registration Fee : <strong>100.00</strong>
                            <br>Athletic Fee : <strong>400.00</strong>
                            <br>Computer Fee : <strong>100.00</strong>
                            <br>Cultural Fee : <strong>300.00</strong>
                            <br>Development Fee : <strong>850.00</strong>
                            <br>
                            <p style="font-size:12px;">Tuition Fee 165/unit:<span
                                    style="font-size:15px;"><strong>3,465.00</strong></span></p>
                            <strong>Total : 6,115.00</strong>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>