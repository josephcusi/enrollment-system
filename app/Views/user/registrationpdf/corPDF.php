<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CERTIFICATE OF REGISTRATION</title>
    <style>
    body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        font-size: 16px;
        line-height: 1.5;
        color: #333;
        background-color: #f9f9f9;
    }

    header {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
    }

     .logo {
        max-width: 60%;
        min-width: 60%;
        margin-top:-17%;
       
    }
    

    .container {
        max-width: 800px;
        margin: auto;
        text-align: center;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
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
        
        <h3>STUDENT'S COPY<p>FM-REGO-02<br> Revision: 02<br>February 2, 2022</p></h3>
        
        <img style = " max-width: 60%;min-width: 60%;margin-top:-8%;" src="https://scontent.fmnl26-1.fna.fbcdn.net/v/t39.30808-6/340986614_756826879356212_3161900533143930457_n.jpg?_nc_cat=108&ccb=1-7&_nc_sid=730e14&_nc_eui2=AeF82_mazt833FobQqddsSaND-OYufHWqWUP45i58dapZVT5ykCkLAiIxvFMwJGdUNVaOiuBUF2lEuBxJTqf819v&_nc_ohc=dQUtluMv6aMAX_ofJcb&_nc_zt=23&_nc_ht=scontent.fmnl26-1.fna&oh=00_AfBJC43lJSMgPWTwhs9tQCRDGTlmaKNXCq3G2Arezreolw&oe=643ACC21">
        
        <h2>CERTIFICATE OF REGISTRATION</h2>
        <h4><?= $user_data[0]['semester']?>, AY <?= $user_data[0]['year']?></h4>
        <br>
        <p class = "num">ID Number: <?= $user_data[0]['lrn']?><span style = "color:white;">-----------------------</span><span>Sex: <?= $user_data[0]['gender']?></span><span style = "color:white;">--------------------------------------------------</span><span>Program: <?= $user_data[0]['strand']?></span><br>Name: <?= $user_data[0]['lastname'] . ', ' . $user_data[0]['firstname'] . ' ' . $user_data[0]['middlename']?><span style = "color:white;">---------------------------</span><span>Year Level: <?= $user_data[0]['year_level']?></span><span style = "color:white;">-------------------------------------------------</span><span>Major: None</span></p>
        
     
        
        <table>
            <thead >
                <tr>
                    <th>COURSE CODE</th>
                    <th>COURSE DESCRIPTION</th>
                    <th>UNITS</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($user_data as $user):?>
                <tr>
                    <td><?= $user['subject']?></td>
                    <td><?= $user['subject_title']?></td>
                    <td><?= $user['unit']?></td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
        <br>
        <p class = "sub">Total Subject: 3<span style = "color:white;">-----------</span> <span>Total Units: 9</span></p>
        
        
    
        <p class = "registrar">Registrar's Office</p>
        
        

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
        
      
    </div>

</body>

</html>