<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chart PDF</title>
</head>

<body>
    <!-- Your chart HTML code goes here -->
    <img alt="BCC Logo" class="logo" src="https://bccwebportal.com/cssjs/img/logoBCC.jpg" alt="Logo">
    <h1 style="font-size: 21px;">OFFICE OF THE COLLEGE REGISTRAR</h1>
    <br>
    <div class="dashed"></div>
    <br>
    <br>
    <br>
    <h2>
        <?php if($data == 'data_yearly_records'):?>
        Yearly Enrolled Records
        <?php elseif($data == 'data_ip_records'):?>
        Indigenous People(IP) Records
        <?php elseif($data == 'data_gender_records'):?>
        Gender Records
        <?php elseif($data == 'data_year_level_records'):?>
        Year Level Records
        <?php elseif($data == 'data_course_records'):?>
        Course Records
        <?php endif;?>
    </h2>
    <br>
    <br>
    <div>
        <!-- LINE CHART -->
        <div class="card ">
            <div class="card-body">
                <?php if($data == 'data_yearly_records'):?>
                <img src="<?= $chartData ?>" alt="">
                <?php elseif($data == 'data_ip_records'):?>
                <img src="<?= $chartData ?>" alt="">
                <?php else:?>
                <img class="chartdata" src="<?= $chartData ?>" alt="">
                <?php endif;?>

            </div>
        </div>
        <?php if($data == 'data_yearly_records'):?>

        <?php elseif($data == 'data_ip_records'):?>

        <?php elseif($data == 'data_gender_records'):?>
        <div
            style="display: flex; justify-content: center; align-items: flex-end; height: 100vh; position: fixed; bottom: 0; width: 100%;">
            <div style="padding: 5px; text-align: center;">
                <div
                    style="color:white; border: 1px solid black; padding: 5px; display: inline-block; margin: 5px; background-color:#800000;">
                    <h3 class="one"><?= $male ?></h3>
                </div>
                <div style="padding: 5px; display: inline-block; margin: 5px;">
                    <h3 class="two">Male</h3>
                </div>

                <div
                    style="color:white; border: 1px solid black; padding: 5px; display: inline-block; margin: 5px; background-color:#212529;">
                    <h3 class="two"><?= $female ?> </h3>
                </div>
                <div style="padding: 5px; display: inline-block; margin: 5px;">
                    <h3 class="two">Female</h3>
                </div>
            </div>

        </div>
        <?php elseif($data == 'data_year_level_records'):?>
        <div
            style="display: flex; justify-content: center; align-items: flex-end; height: 100vh; position: fixed; bottom: 0; width: 100%;">
            <div style="padding: 5px; text-align: center;">
                <div
                    style="color:white; border: 1px solid black; padding: 5px; display: inline-block; margin: 5px; background-color:#800000;">
                    <h3 class="one"><?= $one ?></h3>
                </div>
                <div style="padding: 5px; display: inline-block; margin: 5px;">
                    <h3 class="two">1st Year</h3>
                </div>

                <div
                    style="color:white; border: 1px solid black; padding: 5px; display: inline-block; margin: 5px; background-color:#212529;">
                    <h3 class="two"><?= $two ?> </h3>
                </div>
                <div style="padding: 5px; display: inline-block; margin: 5px;">
                    <h3 class="two">2nd Year</h3>
                </div>

                <div
                    style="color:white; border: 1px solid black; padding: 5px; display: inline-block; margin: 5px; background-color:#F28F79;">
                    <h3 class="three"><?= $three ?></h3>
                </div>
                <div style="padding: 5px; display: inline-block; margin: 5px;">
                    <h3 class="two">3rd Year</h3>
                </div>

                <div
                    style="color:white; border: 1px solid black; padding: 5px; display: inline-block; margin: 5px; background-color:#D7DE7D;">
                    <h3 class="four"><?= $four ?></h3>
                </div>
                <div style="padding: 5px; display: inline-block; margin: 5px;">
                    <h3 class="two">4th Year</h3>
                </div>
            </div>

        </div>

        <?php elseif($data == 'data_course_records'):?>
        <div
            style="display: flex; justify-content: center; align-items: flex-end; height: 100vh; position: fixed; bottom: 0; width: 100%;">
            <div style="padding: 5px; text-align: center;">
                <div
                    style="color:white; border: 1px solid black; padding: 5px; display: inline-block; margin: 5px; background-color:#800000;">
                    <h3 class="one"><?= $abh ?></h3>
                </div>
                <div style="padding: 5px; display: inline-block; margin: 5px;">
                    <h3 class="two">ABH</h3>
                </div>

                <div
                    style="color:white; border: 1px solid black; padding: 5px; display: inline-block; margin: 5px; background-color:#212529;">
                    <h3 class="two"><?= $bpa ?> </h3>
                </div>
                <div style="padding: 5px; display: inline-block; margin: 5px;">
                    <h3 class="two">BPA</h3>
                </div>

                <div
                    style="color:white; border: 1px solid black; padding: 5px; display: inline-block; margin: 5px; background-color:#F28F79;">
                    <h3 class="three"><?= $btvted ?></h3>
                </div>
                <div style="padding: 5px; display: inline-block; margin: 5px;">
                    <h3 class="two">BTVTED</h3>
                </div>
            </div>

        </div>
        <?php endif;?>

    </div>
</body>

</html>
<style>
@page {
    margin: 2% !important;
    padding: 2% !important;
}

.logo {
    display: block;
    margin-left: 13%;
    max-width: 500px;
    padding: 10px;
}

.chartdata {
    display: block;
    margin: 0 auto;
    max-width: 200%;
    height: 50%;
    position: fixed;
    top: 60%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
}


h1 {
    font-size: 18px;
    font-weight: bold;
    text-align: center;
    color: black;
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
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

h2 {
    font-size: 20px;
    font-weight: bold;
    text-align: center;
    margin-bottom: 20px;
    color: black;
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;


}
</style>