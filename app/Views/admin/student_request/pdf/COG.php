<!DOCTYPE html>
<html>

<head>
    <title>Certificate of Grade</title>
    <style>
            @page {
        margin: 0 !important;
        padding: 0 !important;
    }
    body {
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        background-color: white;


    }

    .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        height: 257mm;
        width: 187mm;
    }

    .logo {
        display: block;
        margin-left: 13%;
        max-width: 500px;
        padding: 10px;
    }

    h1 {
        font-size: 18px;
        font-weight: bold;
        text-align: center;
        color: black;
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    }

    h2 {
        font-size: 19px;
        font-weight: bold;
        text-align: center;
        margin-bottom: 20px;
        color: black;
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;


    }

    p {
        font-size: 18px;
        margin-bottom: 10px;
        line-height: 1.5;
        margin-left: 10px;
        margin-right: 10px;
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        color: black;
    }

    .bold {
        font-weight: bold;
    }

    .date {
        margin-top: 30px;
        text-align: center;
        font-size: 16px;
        color: #555;
    }

    .signature {
        display: block;
        margin-top: 20px;
        max-width: 400px;
        padding: 10px;
        float: right;
        margin-right: 1px;
        text-align: center;
    }

    .signature h1 {
        font-size: 14px;
        margin-bottom: 5px;
        font-weight: bold;
        color: black;
        font-family: Arial, Helvetica, sans-serif;
    }

    .signature img {
        max-width: 150px;
        margin-bottom: 10px;
    }

    .dashed {
        position: fixed;
        top: 21%; 
        left: 2.7%; 
        width: 95%; 
        height: 1px; 
        z-index: 9999; 
        text-align: center; 
        border-bottom: 4px double red; 
        padding-bottom: 10px;
    }

    .table {
        width: 90%;
        margin: 10;
        border-collapse: collapse;
        border: none;
        
    }

    .table th,
    .table td {
        padding: 5px;
        border: none;
        text-align: center;
    }

    .table th {
        background-color: rgba(0, 0, 0, 0);
    }

    .table tr:nth-child(even) {
        background-color: rgba(0, 0, 0, 0);
    }

    .table tr:hover {
        background-color: rgba(0, 0, 0, 0);
    }
    
    </style>
</head>

<body>
    <div class="container">

        <img alt="BCC Logo" class="logo"
            src="https://bccwebportal.com/cssjs/img/logoBCC.jpg" alt="Logo">
        <h1 style="font-size: 21px;">OFFICE OF THE COLLEGE REGISTRAR</h1>
        <br>
        <div class="dashed"></div>
        <br>
        <br>
        <h2>C E R T I F I C A T I O N  OF  G R A D E S</h2>
        <br>

        <p align="justify"><span style="color:white;">------</span><span>This is to certify</span> that <span
                style="font-weight: bold;">Mr./Ms.
                <?=$cog['firstname'] .' ' . $cog['middlename'] . ' ' . $cog['lastname'] ?></span> is a student of
            <?=$cog['title']?> (<?=$cog['strand']?>) has obtained the following grades for <?=$cog['semester']?>, F.Y.
            <?=$cog['year']?>.
        </p>
        <br>
        <table class="table table-bordered table">
            <thead>
                <tr>
                    <th>Subjects</th>
                    <th>Grade</th>
                    <th>Units</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $ids = array_combine(explode(',', $cog['subject_id']), explode(',', $cog['subject_grade']));
                    foreach($subject as $sub):
                        if(isset($ids[$sub['id']])):
                ?>
                <tr>
                    <td><?= $sub['subject']?></td>
                    <td><?=$ids[$sub['id']]?></td>
                    <td><?=$sub['unit']?></td>
                </tr>
                <?php endif;endforeach;?>


            </tbody>
        </table>
        <br>
        <br>
        <h2 style="font-size:17px;text-align: left;">General Average: <?= $cog['total_grading']?>
        </h2>
        <br>
        <p align="justify"><span style="color:white;">------</span>Issued upon his/her request this <?php
$schedule = $cred['schedule'];
$formattedDate = date('F d, Y', strtotime($schedule));
?>

            <?=$formattedDate?> at Baco, Oriental Mindoro, for whatever legal purpose it may serve.</p>
        <div class="signature">
            <h1 style="font-size:16px;" ><?=$registrar['firstname'] .' ' . $registrar['middlename'] . ' ' . $registrar['lastname'] ?></h1>
            <h2 style="font-size:16px;">College Registrar</h2>
        </div>
    </div>
</body>

</html>
<!-- <html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CERTIFICATE OF REGISTRATION</title>
    <style>
   

    header {
      
        align-items: center;
        justify-content: center;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
    }

     .logo {
        max-width: 100%;
        min-width: 1000%;
        margin-left:-17%;
       
    }
    

    .container {
        max-width: 800px;
        margin: auto;
        
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
		display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }
    .container h2{
        font-size:20px;
        font-weight:bold;
        margin-top:-1%;
       
    }
    .container h4{
      
        font-weight:bold;
        margin-top:-2%;
       
    }
    .container h3{
        font-size:12px;
        font-weight:bold;
        text-align:left;
    }
    p {
        font-size:12px;
        font-weight:bold;
        text-align:right;
        margin-top:-4%;
    }
    .name{
        font-size:12px;
        font-weight:bold;
        text-align:left;
        margin-top:-2%;
    }
    .num{
        font-size:12px;
        font-weight:bold;
        text-align:left;
    }
    .sex{
        font-size:12px;
        font-weight:bold;
        text-align:left;
        margin-left:35%;
        margin-top:-6.5%;

    }
    .sexx{
        font-size:12px;
        font-weight:bold;
        text-align:left;
        margin-left:35%;
       
    }
    
   
    .program{
        font-size:12px;
        font-weight:bold;
        text-align:left;
        margin-top:-2%;
        margin-left:70%;
        margin-top:-6.5%
    }
    .major{
        font-size:12px;
        font-weight:bold;
        text-align:left;
        margin-left:70%;
        margin-top:-2%
    }
    .sub{
        margin-left:50%;
        font-weight: bold;
        
    }
    .unit{
        text-align: right;
        margin-top:-5.2%;
        font-weight: bold;
    }
    .registrar{
        text-align:left;
        margin-top:3%;
    }
    .dashed{
        border-top: 3px dashed black;
    }


.left-side p, .right-side p {
  margin: 0;
  padding: 5px;
}
    table {
        border-collapse: collapse;
        width: 100%;
        margin-top: 20px;
        margin-bottom: 20px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    table td,
    table th {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: center;
        font-size:10px;
        font-weight:bold;
        text-transform:uppercase;
    }
  
    table th {
        background-color: #f2f2f2;
        background:rgb(77, 14, 14);
        color:white;
        
    }

    @media screen and (max-width: 768px) {
        .container {
            padding: 10px;
        }

        header {
            padding: 10px;
        }

        table td,
        table th {
            font-size: 8px;
        }
    }
    </style>
</head>

<body>
  
    
   
        
       
        
        
        
        <div class="container">
			<div class="left-side">
			  <h2>cogent Information</h2>
			  <p><strong>cogent ID:</strong> 12345</p>
			  <p><strong>Name:</strong> John Doe</p>
			  <p><strong>Age:</strong> 20</p>
			  <p><strong>Sex:</strong> Male</p>
			  <p><strong>Course:</strong> Computer Science</p>
			</div>
			<div class="right-side">
			  <h2>Additional Information</h2>
			  <p><strong>Date:</strong> June 4, 2023</p>
			  <p><strong>Remarks:</strong> Excellent</p>
			  <p><strong>Term:</strong> Spring 2023</p>
			</div>
		  </div> -->







<!-- <hr class = "dashed">
        <br>

        <h3>REGISTRAR'S COPY<p>FM-REGO-02<br> Revision: 02<br>February 2, 2022</p></h3>
        
        <img style = " max-width: 60%;min-width: 60%;margin-top:-8%;" src="https://scontent.fmnl26-1.fna.fbcdn.net/v/t39.30808-6/340986614_756826879356212_3161900533143930457_n.jpg?_nc_cat=108&ccb=1-7&_nc_sid=730e14&_nc_eui2=AeF82_mazt833FobQqddsSaND-OYufHWqWUP45i58dapZVT5ykCkLAiIxvFMwJGdUNVaOiuBUF2lEuBxJTqf819v&_nc_ohc=dQUtluMv6aMAX_ofJcb&_nc_zt=23&_nc_ht=scontent.fmnl26-1.fna&oh=00_AfBJC43lJSMgPWTwhs9tQCRDGTlmaKNXCq3G2Arezreolw&oe=643ACC21">
        
        <h2>CERTIFICATE OF REGISTRATION</h2>
        <h4>First Semester, AY 2022-2023</h4>
        <br>
        <p class = "num">ID Number: MCC2020-0890<span style = "color:white;">-----------------------</span><span>Sex: Bading</span><span style = "color:white;">--------------------------------------------------</span><span>Program: BSIT</span><br>Name: CUSI, JOSEPH S.<span style = "color:white;">---------------------------</span><span>Year Level: 3</span><span style = "color:white;">-------------------------------------------------</span><span>Major: None</span></p>
        
     
        
        <table>
            <thead >
                <tr>
                    <th>COURSE CODE</th>
                    <th>COURSE DESCRIPTION</th>
                    <th>UNITS</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        CSCI102
                    </td>
                    <td>Introduction to Computer Science</td>
                    <td>3</td>
                </tr>
                <tr>
                    <td>MATH101</td>
                    <td>College Algebra</td>
                    <td>3</td>
                </tr>
                <tr>
                    <td>ENGL101</td>
                    <td>College English</td>
                    <td>3</td>
                </tr>
            </tbody>
        </table>
        <br>
        <p class = "sub">Total Subject: 3<span style = "color:white;">-----------</span> <span>Total Units: 9</span></p>
        
        
        
        <p class = "registrar">Registrar's Office</p> -->


<!-- </div>

</body>

</html> -->