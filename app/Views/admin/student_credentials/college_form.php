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

    .left-sidez th,
    .left-sidez td {
        border: 1px solid #000;
        padding: 5px;
    }

    .left-sidez th {
        background-color: #f2f2f2;
    }

    .right-sidez table {
        border-collapse: collapse;
    }

    .right-sidez th,
    .right-sidez td {
        border: 1px solid #000;
        padding: 1px;
    }

    .right-sidez th {
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

        <div class="left-side"style="position: absolute;top:7.6%;">
          <p><strong>[ ]</strong> New Student </p>
          <p style = "padding-bottom:5px;"><strong>[ ]</strong> Old Student
          </p>

            <p>Student No.: <span style="font-size:14px;border-bottom: 1px solid black;font-size:14px;">
            <?php if($datas['state'] == "Enrolled"):?>
                <?= $datas['lrn'] ?>
            <?php else: ?>
            <?php endif;?>
            </span></p>
        
          <p>Student Name:
                <span style = "position:absolute;width: 120%; left:40%;font-size:14px;"><?= $datas['lastname'] ?></span>
                <span style = "position:absolute;width: 120%; left:90%;font-size:14px;" ><?= $datas['firstname'] ?></span>
                <span style = "position:absolute;width: 120%; left:150%;font-size:14px;"><?= $datas['middlename'] ?></span>
            </p>
            <p style="position:absolute; top:6.2%; left:40%; font-size:14px;"><strong>Lastname</strong></p>
            <p style="position:absolute; top:6.2%; left:90%; font-size:14px;"><strong>Firstname</strong></p>
            <p style="position:absolute; top:6.2%; left:150%; font-size:14px;"><strong>Middlename</strong></p>
            <div class="dashed"
            style="position: fixed; top: 13.1%; left: 15.5%; width: 50%; height: 1px; z-index: 9999; text-align: center; border-bottom: 1px solid #000; padding-bottom: 10px;">
        </div>

        <br>
            <p>Address :
                <span style = "position:absolute;width: 131.5%; font-size:14px;"><?= $datas['street'] . ', ' . $datas['baranggay'] . ', ' . $datas['city'] . ', ' . $datas['prov_add'] ?></span>
            </p>
            <div class="dashed"
            style="position: fixed; top: 16.1%; left: 10.5%; width: 55%; height: 1px; z-index: 9999; text-align: center; border-bottom: 1px solid #000; padding-bottom: 10px;">
        </div>

            <p>Birthday :
                <span style="font-size:14px;border-bottom: 1px solid black;font-size:14px;"> <?php
                    $formattedDate = date('F d, Y', strtotime($datas['birthday']));
                    ?><?= $formattedDate?>
                </span>
                <span style=" position:fixed; left: 29.7%;">
                    Age: 
                    <span style="border-bottom: 1px solid black;font-size:14px;font-size:14px;"> 
                    <?= $datas['age'] ?>
                    </span>
                </span>
                <span style="position:fixed; left: 40%;">
                    Gender: 
                    <span style="border-bottom: 1px solid black;font-size:14px;"> 
                    <?= $datas['gender'] ?>
                    </span>
                </span>
                <span style="position:fixed; left: 53%;">
                    PWD : 
                    <span style="border-bottom: 1px solid black;font-size:14px;"> 
                    N/A
                    </span>
                </span>
            </p>
                
            <p >Course: <span style="font-size:14px;"><?= $datas['title'] ?></span><span style="position: fixed;left:53.5%;">Year: </span><span style="border-bottom: 1px solid black;position: fixed; left:59%;font-size:14px;"><?= $datas['year_level'] ?></span></p>
        </div>
        <div class="dashed"
            style="position: fixed; top: 19.2%; left:9.3%; width: 42.5%; height: 1px; z-index: 9999; text-align: center; border-bottom: 1px solid #000; padding-bottom: 10px;">
        </div>

        <div class="right-side" style="position: absolute;top:10%;padding-left: 70%;">
            <p>Date:<span style = "border-bottom: 1px solid black;font-size:14px;"><?php
                $formattedDate = date('F d, Y', strtotime($datas['student_created_at']));
                ?> <?= $formattedDate?></span></p>
            <p>Academic Year:<span style = "border-bottom: 1px solid black;font-size:14px;"> <?= $datas['year'] ?></span></p>
            <p>Semester:<span style = "border-bottom: 1px solid black;font-size:14px;"> <?= $datas['semester'] ?></span></p>
            <p>Civil Status: <span style = "border-bottom: 1px solid black;font-size:14px;"><?= $datas['civil_status'] ?></span></p>
            <p> Religion:
                    <span style = "border-bottom: 1px solid black;font-size:14px;"><?= $datas['religion'] ?></span></p>
            <p>Indigenous People:<span style = "border-bottom: 1px solid black;font-size:14px;"><?= !empty($datas['ip']) ? $datas['ip'] : "n/a";?></span></p>
            <p>Telephone:<span style = "border-bottom: 1px solid black;font-size:14px;"><?= $datas['contact'] ?></span></p>
            <p style = "margin-left:-230px;"><strong>SUBJECT LOAD</strong></p>
        </div>


        <br>
        <div class="left-sidez" style="position: absolute;top:23.5%;">
            <table style="width: 114%;
        border-collapse: collapse;">
                <thead>
                    <tr>
                        <th>Subject Code</th>
                        <th>Description</th>
                        <th>Units</th>
                        <th>Section Code</th>
                        <th>Room</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $ids = explode(",", $datas['subject_id']);
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
                    <?php endif; endforeach; endforeach;?>
                     
                </tbody>
            </table>

            <div class="left-side"style="position: absolute;top:25%;">
              <p ><strong style = "color:white;">............. </strong>Noted by: <span style = "font-weight:;"></span></p>

            </div>
              <div class="right-side" style="position: absolute;top:25%;padding-left: 60%;width:55%;">
                  <p>Approved by:<span style ="font-weight:;"></span></p>
              </div>
            <div class="signature" style="position:fixed;top:46.1%;left:17%;">
                <p style="position:fixed;top:50.5%;left:21%">
                  <?= $registrar['firstname'] . ' ' . $registrar['middlename'] . ' ' . $registrar['lastname'] ?></p>
                </p>
                <p>______________________</p>
                <p style="position:fixed;top:52%;left:22%">Program Head</p>
                </p>
            </div>
             <div class="signature1" style="position:fixed;top:54.2%;left:26%;">
                <p style="position:fixed;top:50.5%;left:64%">
                    <?= $registrar['firstname'] . ' ' . $registrar['middlename'] . ' ' . $registrar['lastname'] ?></p>
                <p>______________________</p>
                <p style="position:fixed;top:52%;left:64%">College Registrar</p>
                </p>
            </div>
        </div>
        <div class="right-side" style="position: absolute;top:56%;padding-left: 67%;">
          <p style = "margin-left:-230px;"><strong>ACADEMIC BACKGROUND</strong></p>
        </div>
        <div class="left-side"style="position: absolute;top:58%;">
            <p>Elementary Completed at:<span style = "position:absolute;width: 267%;
        border-bottom: 1px solid black;font-size:14px;"><?= $datas['elem_school'] ?></span></p>
            <p>JHS Course Completed at:
                <span style = "position:absolute;width: 262%;
            border-bottom: 1px solid black;font-size:14px;"><?= $datas['high_school'] ?></span>
            </p>
            <p>SHS Course Completed at:
                <span style = "position:absolute;width: 262%;
            border-bottom: 1px solid black;font-size:14px;"><?= $datas['senior_high_school'] ?></span>
            </p>
            <p>College/Program Course at:<span style = "position:absolute;width: 262%;
        border-bottom: 1px solid black;font-size:14px;"> Baco Community College / <?= $datas['strand'] ?></span><span></p>
      </div>
      <div class="right-side" style="position: absolute;top:58%;padding-left: 80%;">
          <p> SY:<span style = "border-bottom: 1px solid black;font-size:14px;"><?= $datas['elem_year'] ?></span></p>
          <p> SY:<span style = "border-bottom: 1px solid black;font-size:14px;"><?= $datas['high_year'] ?></span></p>
          <p> SY:<span style = "border-bottom: 1px solid black;font-size:14px;"><?= $datas['senior_high_year'] ?></span></p>
          <p> SY:<span style = "border-bottom: 1px solid black;font-size:14px;"><?= $datas['year'] ?></span></p>
      </div>

      <div class="right-side" style="position: absolute;top:65%;padding-left: 64%;">
        <p style = "margin-left:-230px;"><strong>PERSONAL INFORMATION</strong></p>
      </div>
        <!-- father side -->
      <div class="left-side"style="position: absolute;top:67%;">
      <p>
        Birthplace:<span style="border-bottom: 1px solid black; font-size:14px; margin-right: 20px;"> <?= $datas['birthplace'] ?></span>
        Civil Status:<span style="border-bottom: 1px solid black; font-size:14px; margin-right: 20px;"><?= $datas['civil_status'] ?></span>
        Citizenship:<span style="border-bottom: 1px solid black; font-size:14px;"> <?= $datas['nationality'] ?></span>
    </p>

        <p>
        Father's Name: 
        <span style="position: absolute; width: 70%; border-bottom: 1px solid black;font-size:14px;">
        <?= $datas['father_name'] ?><span style="display: inline-block; margin-left: 25px;"></span>
        </span>
        </p>
          <p style = "position:absolute;width: 73%; left:21%; font-size:12px"><strong>Last Name <span style=" display:inline-block; margin-left: 50px; "></span> First Name <span style=" display:inline-block; margin-left: 50px; "></span> Middle Name</strong></span></p>
          <br>

          <p>Father's Place of Residence:<span style = "position:absolute;width: 58%;border-bottom: 1px solid black;font-size:14px;"><?= $datas['father_address'] . ' , ' . $datas['zipcode'] ?></span></p>
          <p style = "position:absolute;width: 73%; left:34%; font-size:12px"><strong>Street <span style=" display:inline-block; margin-left: 20px; "></span> Barangay <span style=" display:inline-block; margin-left: 20px; "></span> Town/City <span style=" display:inline-block; margin-left: 20px; "></span> Province <span style=" display:inline-block; margin-left: 20px; "></span> zipcode</strong></span></p>
      </div>
      
      <p style="position: absolute;top:69%;left:69.5%;">Phone No.:<span style = "border-bottom: 1px solid black;font-size:14px;"> <?= $datas['father_contact'] ?></span></p>
      
      <div class="right-side" style="position: absolute;top:68.6%;padding-left: 67%;">
          <p>Living:<span style = "">______</span></p>
      </div>
      <div class="right-side" style="position: absolute;top:68.5%;padding-left: 79%;">
          <p>Decease:<span style = "">______</span></p>
      </div>
      <div class="right-side" style="position: absolute;top:71.5%;padding-left: 67%;">
          <p>Occupation:<span style = "border-bottom: 1px solid black;font-size:14px;"><?= $datas['father_occupation'] ?></span></p>
      </div>
        <!-- father side end -->

        <!-- mother side -->

      <div class="left-side"style="position: absolute;top:75%;">
          <p>Mother's Name:
            <span style = "position:absolute;width: 233%;border-bottom: 1px solid black;font-size:14px;">
            <?= $datas['mother_name']?><span style="display: inline-block; margin-left: 50px;"></span>
            </span>
        </p>
          <br>
          <p>Mother's Place of Residence:<span style = "font-size:14px;position:absolute;width: 192%;border-bottom: 1px solid black;"><?= $datas['mother_address'] . ' , ' . $datas['zipcode']?></span></p>
          <p style = "position:absolute;width: 180%; left:100%; font-size:12px"><strong>Street <span style=" display:inline-block; margin-left: 20px; "></span> Barangay <span style=" display:inline-block; margin-left: 20px; "></span> Town/City <span style=" display:inline-block; margin-left: 20px; "></span> Province <span style=" display:inline-block; margin-left: 20px; "></span> zipcode</strong></span></p>
      </div>
      <p style = "position:absolute; top:75.6%;width: 73%; left:16.5%; font-size:12px"><strong>Last Name <span style=" display:inline-block; margin-left: 50px; "></span> First Name <span style=" display:inline-block; margin-left: 50px; "></span> Middle Name</strong></span></p>
      <div class="right-side" style="position: absolute;top:75%;padding-left: 67%;">
          <p>Living:<span style = "">______</span></p>
      </div>
      <div class="right-side" style="position: absolute;top:75%;padding-left: 79%;">
          <p>Decease:<span style = "">______</span></p>
      </div>
      <div class="right-side" style="position: absolute;top:78%;padding-left: 67%;">
          <p>Occupation:<span style = "border-bottom: 1px solid black;font-size:14px;"><?= $datas['mother_occupation'] ?></span></p>
      </div>
        <!-- mother side end -->
        <p style="position: absolute;top:75.5%;left:69.5%;">Phone No.: <span style = "font-size:14px;border-bottom: 1px solid black;"><?= $datas['mother_contact'] ?></span></p>
        <!-- guardian -->
        <div class="right-side" style="position: absolute;top:82%;padding-left: 67%;">
          <p style = "margin-left:-230px;"><strong>Guardian Information</strong></p>
        </div>
        <div class="left-side" style="position: absolute; top: 84%;">
  <p>Guardian's Name:
    <span style="font-size: 14px; border-bottom: 1px solid black; margin-right: 30px;">
      <?= $datas['guardian_name'] ?>
    </span>
    <span>Address:
      <span style="border-bottom: 1px solid black; font-size: 14px; margin-right: 30px;">
        <?= $datas['guardian_address'] ?>
      </span>
    </span>
    <span style="margin-right: 30px;">Relationship:</span>
  </p>
  <p style="position: absolute; top: 1.5%; left: 44%;">
    Phone No.:
    <span style="border-bottom: 1px solid black; margin-left: 5px;font-size: 14px;">
      <?= $datas['guardian_contact'] ?>
    </span>
  </p>
  <p style="position: absolute; top: 1.5%; left: 74%;">
    Occupation:
    <span style="font-size: 14px; border-bottom: 1px solid black; margin-left: 5px;">
      <?= $datas['guardian_occupation'] ?>
    </span>
  </p>
  <br><br><br>
  <p>
    <span style="color: white;">----------------</span>
    I hereby certify that information written are true and correct to the best of my knowledge.
  </p>
</div>

          <!-- guardian end-->
          <div class="signature" style="position:fixed;top:88%;left:35%;">
              <p style="position:fixed;top:92.5%;left:42%">
                  <?= $datas['firstname'] . ' ' . $datas['middlename'] . ' ' . $datas['lastname'] ?>
              </p>
              <p>___________________________</p>
              <p style="position:fixed;top:94%;left:37%">Signature over printed name</p>
              </p>
          </div>
        </div>


</body>

</html>