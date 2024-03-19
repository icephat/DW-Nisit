<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        .t1:hover {
            background-color: #ececec;
            transition: all 0.5s linear;
        }
    </style>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <!-- theme meta -->
    <meta name="theme-name" content="quixlab" />

    <title>ระบบเพิ่มรายชื่อนิสิต</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- Pignose Calender -->
    <link href="./plugins/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href="./plugins/chartist/css/chartist.min.css">
    <link rel="stylesheet" href="./plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css">
    <!-- Custom Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>

<body>

    <?php
    include_once '../function/semester.php';
    include_once '../function/reportDepartment.php';


    $semesterYear = getSemesterYearPresent();

    ?>


    <?php include('./layout.php'); ?>
    <!--**********************************
            Content body start
        ***********************************-->
    <div class="content-body">
        <br>
        <div class="col-sm-12  mx-auto">
            <div class="row">


                <div class="col-sm-12 mx-auto">
                    <div class="card shadow mb-4">

                        <div class="card-header  py-3">
                            <h6 class="m-0 font-weight-bold text-primary">ช่วงเกรดตามรุ่น</h6>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 mx-auto">
                                <div class="card">

                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold ">ช่วงเกรดนิสิตปีที่ 1</h6>
                                        <?php $gradeRange1s = getGradeRangeSoryByGeneretionBySemesterYearAndStudentYear($semesterYear,1); 
                                        
                                            $pee1label = [];
                                            $pee1blues = [];
                                            $pee1greens = [];
                                            $pee1oranges = [];
                                            $pee1reds = [];

                                            //for($y; $y<$yNow; $y++){
                                            
                                            foreach ($gradeRange1s as $range) {
                                                    $sum=$range["blue"]+$range["green"]+$range["orange"]+$range["red"];
                                                    $pee1label[] = "รุ่น " . (string) $range["kuId"];
                                                // echo $range["studyGeneretion"];
                                                    $pee1blues[] = $range["blue"]*100/$sum;
                                                    $pee1greens[] = $range["green"]*100/$sum;
                                                    $pee1oranges[] = $range["orange"]*100/$sum;
                                                    $pee1reds[] = $range["red"]*100/$sum;
                                                
                                            }
                                        ?>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="pee1"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 mx-auto">
                                <div class="card">

                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold ">ช่วงเกรดนิสิตปีที่ 2</h6>
                                        <?php $gradeRange2s = getGradeRangeSoryByGeneretionBySemesterYearAndStudentYear($semesterYear,2); 
                                            $pee2label = [];
                                            $pee2blues = [];
                                            $pee2greens = [];
                                            $pee2oranges = [];
                                            $pee2reds = [];

                                            //for($y; $y<$yNow; $y++){
                                            
                                            foreach ($gradeRange2s as $range) {
                                                    $sum=$range["blue"]+$range["green"]+$range["orange"]+$range["red"];
                                                    $pee2label[] = "รุ่น " . (string) $range["kuId"];
                                                // echo $range["studyGeneretion"];
                                                    $pee2blues[] = $range["blue"]*100/$sum;
                                                    $pee2greens[] = $range["green"]*100/$sum;
                                                    $pee2oranges[] = $range["orange"]*100/$sum;
                                                    $pee2reds[] = $range["red"]*100/$sum;
                                                
                                            }
                                        
                                        
                                        ?>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="pee2"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 mx-auto">
                                <div class="card">

                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold ">ช่วงเกรดนิสิตปีที่ 3</h6>
                                        <?php $gradeRange3s = getGradeRangeSoryByGeneretionBySemesterYearAndStudentYear($semesterYear,3); 

                                            $pee3label = [];
                                            $pee3blues = [];
                                            $pee3greens = [];
                                            $pee3oranges = [];
                                            $pee3reds = [];

                                            //for($y; $y<$yNow; $y++){

                                            foreach ($gradeRange3s as $range) {
                                                    $sum=$range["blue"]+$range["green"]+$range["orange"]+$range["red"];
                                                    $pee3label[] = "รุ่น " . (string) $range["kuId"];
                                                // echo $range["studyGeneretion"];
                                                    $pee3blues[] = $range["blue"]*100/$sum;
                                                    $pee3greens[] = $range["green"]*100/$sum;
                                                    $pee3oranges[] = $range["orange"]*100/$sum;
                                                    $pee3reds[] = $range["red"]*100/$sum;
                                                
                                            }
                                                                                    
                                        ?>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="pee3"></canvas>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 mx-auto">
                                <div class="card">

                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold">ช่วงเกรดนิสิตปีที่ 4</h6>
                                        <?php $gradeRange4s = getGradeRangeSoryByGeneretionBySemesterYearAndStudentYear($semesterYear,4); 

                                            $pee4label = [];
                                            $pee4blues = [];
                                            $pee4greens = [];
                                            $pee4oranges = [];
                                            $pee4reds = [];

                                            //for($y; $y<$yNow; $y++){

                                            foreach ($gradeRange4s as $range) {
                                                    $sum=$range["blue"]+$range["green"]+$range["orange"]+$range["red"];
                                                    $pee4label[] = "รุ่น " . (string) $range["kuId"];
                                                // echo $range["studyGeneretion"];
                                                    $pee4blues[] = $range["blue"]*100/$sum;
                                                    $pee4greens[] = $range["green"]*100/$sum;
                                                    $pee4oranges[] = $range["orange"]*100/$sum;
                                                    $pee4reds[] = $range["red"]*100/$sum;
                                                
                                            }
                                        
                                        
                                        ?>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="pee4"></canvas>
                                    </div>
                                </div>
                            </div>



                        </div>



                    </div>

                </div>
            </div>




            <div class="col-sm-12 mx-auto">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">ผลการเรียนนิสิตตามรุ่น</h6>

                    </div>
                    <div class="card-body ">
                        <div class="row" style="padding: 20px;">
                            <div class="col-sm-6">

                                <div id="grade1"></div>
                            </div>
                            <div class="col-sm-6 mx-auto">
                                <div class="table-responsive">
                                    <table class="table table-striped" cellspacing="0" style="color: black;">
                                        <thead style=" ">
                                            <tr>
                                                <th style=" text-align: center; "><span>รุ่น</span></th>
                                                <th style="text-align: center; "><span>ค่าสูงสุด</span>
                                                </th>
                                                <th style="text-align: center;"><span>ค่าต่ำสุด</span></th>
                                                <th style="text-align: center;"><span>ค่าเฉลี่ย</span></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $gpaMMAs = getGradeMMASortByGeneretionBySemesterYear($semesterYear);
                                                $labelGrade1 = [];
                                                $maxGPAX1 = [];
                                                $minGPAX1 = [];
                                                $avgGPAX1 = [];
                                                $gpax1 = [];
                                            
                                            ?>

                                            <?php
                                            foreach($gpaMMAs as $gpaMMA){
                                                $labelGrade1[] = "รอบ " . (string) $gpaMMA["kuId"];
                                                $maxGPAX1[] = (float) $gpaMMA["maxGPAX"];
                                                $minGPAX1[] = (float) $gpaMMA["minGPAX"];
                                                $avgGPAX1[] = (float) $gpaMMA["avgGPAX"];
                                            ?>

                                            <tr style="font-weight: normal;">
                                                <td style=" text-align: center;">
                                                    <?php echo  $gpaMMA["kuId"] ?>
                                                </td>
                                                <td style=" text-align: center;">
                                                    <?php echo  $gpaMMA["maxGPAX"]?>
                                                </td>
                                                <td style=" text-align: center;">
                                                    <?php echo  $gpaMMA["minGPAX"]?>
                                                </td>
                                                <td style=" text-align: center;">
                                                    <?php echo  $gpaMMA["avgGPAX"]?>
                                                </td>
                                            </tr>

                                            <?php
                                            }
                                            ?>
                                            <!-- <tr style="font-weight: normal;">
                                                <td style=" text-align: center;">รุ่น 64</td>
                                                <td style=" text-align: center;">3.26</td>
                                                <td style=" text-align: center;">2.02</td>
                                                <td style=" text-align: center;">2.64</td>
                                            </tr>
                                            <tr style="font-weight: normal;">
                                                <td style=" text-align: center;">รุ่น 65</td>
                                                <td style=" text-align: center;">3.36</td>
                                                <td style=" text-align: center;">1.98</td>
                                                <td style=" text-align: center;">2.67</td>
                                            </tr>
                                            <tr style="font-weight: normal;">
                                                <td style=" text-align: center;">รุ่น 65</td>
                                                <td style=" text-align: center;">3.35</td>
                                                <td style=" text-align: center;">2.03</td>
                                                <td style=" text-align: center;">2.69</td>
                                            </tr> -->


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 mx-auto">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">ผลการเรียนนิสิตในแต่ละรอบ</h6>

                    </div>
                    <div class="card-body ">
                        <div class="row" style="padding: 20px;">
                            <div class="col-sm-6">

                                <div id="grade2"></div>
                            </div>
                            <div class="col-sm-6 mx-auto">
                                <div class="table-responsive">
                                    <table class="table table-striped" cellspacing="0" style="color: black;">
                                        <thead style=" ">
                                            <tr>
                                                <th style=" text-align: center; "><span>รอบรับเข้า</span></th>
                                                <th style="text-align: center; "><span>ค่าสูงสุด</span>
                                                </th>
                                                <th style="text-align: center;"><span>ค่าต่ำสุด</span></th>
                                                <th style="text-align: center;"><span>ค่าเฉลี่ย</span></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $gpaRoundMMAs = getGradeMMASortByRoundBySemesterYear($semesterYear);
                                                $labelGrade2 = [];
                                                $maxGPAX2 = [];
                                                $minGPAX2 = [];
                                                $avgGPAX2 = [];
                                                $gpax2 = [];
                                            ?>

                                            <?php
                                            foreach($gpaRoundMMAs as $gpaRoundMMA){

                                                $labelGrade2[] = "รอบ " . (string) $gpaRoundMMA["accessionNo"];
                                                $maxGPAX2[] = (float) $gpaRoundMMA["maxGPAX"];
                                                $minGPAX2[] = (float) $gpaRoundMMA["minGPAX"];
                                                $avgGPAX2[] = (float) $gpaRoundMMA["avgGPAX"];
                                            ?>

                                            <tr style="font-weight: normal;">
                                                <td style=" text-align: center;">
                                                    <?php echo  $gpaRoundMMA["accessionNo"] ?>
                                                </td>
                                                <td style=" text-align: center;">
                                                    <?php echo  $gpaRoundMMA["maxGPAX"]?>
                                                </td>
                                                <td style=" text-align: center;">
                                                    <?php echo  $gpaRoundMMA["minGPAX"]?>
                                                </td>
                                                <td style=" text-align: center;">
                                                    <?php echo  $gpaRoundMMA["avgGPAX"]?>
                                                </td>
                                            </tr>

                                            <?php
                                            }
                                            ?>


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 mx-auto">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">ผลการเรียนนิสิตรุ่น 60 ในแต่ละรอบ</h6>

                    </div>
                    <div class="card-body ">
                        <div class="row" style="padding: 20px;">
                            <div class="col-sm-6">

                                <div id="grade3"></div>
                            </div>
                            <div class="col-sm-6 mx-auto">
                                <div class="table-responsive">
                                    <table class="table table-striped" cellspacing="0" style="color: black;">
                                        <thead style=" ">
                                            <tr>
                                                <th style=" text-align: center; "><span>รอบรับเข้า</span></th>
                                                <th style="text-align: center; "><span>ค่าสูงสุด</span>
                                                </th>
                                                <th style="text-align: center;"><span>ค่าต่ำสุด</span></th>
                                                <th style="text-align: center;"><span>ค่าเฉลี่ย</span></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $gpaRoundMMAs = getGradeMMASortByRoundBySemesterYearAndGeneretion($semesterYear,60);
                                                $labelGrade3 = [];
                                                $maxGPAX3 = [];
                                                $minGPAX3 = [];
                                                $avgGPAX3 = [];
                                            ?>

                                            <?php
                                            foreach($gpaRoundMMAs as $gpaRoundMMA){
                                                $labelGrade3[] = "รอบ " . (string) $gpaRoundMMA["accessionNo"];
                                                $maxGPAX3[] = (float) $gpaRoundMMA["maxGPAX"];
                                                $minGPAX3[] = (float) $gpaRoundMMA["minGPAX"];
                                                $avgGPAX3[] = (float) $gpaRoundMMA["avgGPAX"];
                                            ?>

                                            <tr style="font-weight: normal;">
                                                <td style=" text-align: center;">
                                                    <?php echo  $gpaRoundMMA["accessionNo"] ?>
                                                </td>
                                                <td style=" text-align: center;">
                                                    <?php echo  $gpaRoundMMA["maxGPAX"]?>
                                                </td>
                                                <td style=" text-align: center;">
                                                    <?php echo  $gpaRoundMMA["minGPAX"]?>
                                                </td>
                                                <td style=" text-align: center;">
                                                    <?php echo  $gpaRoundMMA["avgGPAX"]?>
                                                </td>
                                            </tr>

                                            <?php
                                            }
                                            ?>


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 mx-auto">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">ผลการเรียนนิสิตรุ่น 61 ในแต่ละรอบ</h6>

                    </div>
                    <div class="card-body ">
                        <div class="row" style="padding: 20px;">
                            <div class="col-sm-6">

                                <div id="grade4"></div>
                            </div>
                            <div class="col-sm-6 mx-auto">
                                <div class="table-responsive">
                                    <table class="table table-striped" cellspacing="0" style="color: black;">
                                        <thead style=" ">
                                            <tr>
                                                <th style=" text-align: center; "><span>รอบรับเข้า</span></th>
                                                <th style="text-align: center; "><span>ค่าสูงสุด</span>
                                                </th>
                                                <th style="text-align: center;"><span>ค่าต่ำสุด</span></th>
                                                <th style="text-align: center;"><span>ค่าเฉลี่ย</span></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $gpaRoundMMAs = getGradeMMASortByRoundBySemesterYearAndGeneretion($semesterYear,61);
                                                $labelGrade4 = [];
                                                $maxGPAX4 = [];
                                                $minGPAX4 = [];
                                                $avgGPAX4 = [];
                                            ?>

                                            <?php
                                            foreach($gpaRoundMMAs as $gpaRoundMMA){
                                                $labelGrade4[] = "รอบ " . (string) $gpaRoundMMA["accessionNo"];
                                                $maxGPAX4[] = (float) $gpaRoundMMA["maxGPAX"];
                                                $minGPAX4[] = (float) $gpaRoundMMA["minGPAX"];
                                                $avgGPAX4[] = (float) $gpaRoundMMA["avgGPAX"];
                                            ?>

                                            <tr style="font-weight: normal;">
                                                <td style=" text-align: center;">
                                                    <?php echo  $gpaRoundMMA["accessionNo"] ?>
                                                </td>
                                                <td style=" text-align: center;">
                                                    <?php echo  $gpaRoundMMA["maxGPAX"]?>
                                                </td>
                                                <td style=" text-align: center;">
                                                    <?php echo  $gpaRoundMMA["minGPAX"]?>
                                                </td>
                                                <td style=" text-align: center;">
                                                    <?php echo  $gpaRoundMMA["avgGPAX"]?>
                                                </td>
                                            </tr>

                                            <?php
                                            }
                                            ?>


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 mx-auto">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">ผลการเรียนนิสิตรุ่น 62 ในแต่ละรอบ</h6>

                    </div>
                    <div class="card-body ">
                        <div class="row" style="padding: 20px;">
                            <div class="col-sm-6">

                                <div id="grade5"></div>
                            </div>
                            <div class="col-sm-6 mx-auto">
                                <div class="table-responsive">
                                    <table class="table table-striped" cellspacing="0" style="color: black;">
                                        <thead style=" ">
                                            <tr>
                                                <th style=" text-align: center; "><span>รอบรับเข้า</span></th>
                                                <th style="text-align: center; "><span>ค่าสูงสุด</span>
                                                </th>
                                                <th style="text-align: center;"><span>ค่าต่ำสุด</span></th>
                                                <th style="text-align: center;"><span>ค่าเฉลี่ย</span></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $gpaRoundMMAs = getGradeMMASortByRoundBySemesterYearAndGeneretion($semesterYear,62);
                                                $labelGrade5 = [];
                                                $maxGPAX5 = [];
                                                $minGPAX5 = [];
                                                $avgGPAX5 = [];
                                        
                                            ?>

                                            <?php
                                            foreach($gpaRoundMMAs as $gpaRoundMMA){
                                                $labelGrade5[] = "รอบ " . (string) $gpaRoundMMA["accessionNo"];
                                                $maxGPAX5[] = (float) $gpaRoundMMA["maxGPAX"];
                                                $minGPAX5[] = (float) $gpaRoundMMA["minGPAX"];
                                                $avgGPAX5[] = (float) $gpaRoundMMA["avgGPAX"];
                                            ?>

                                            <tr style="font-weight: normal;">
                                                <td style=" text-align: center;">
                                                    <?php echo  $gpaRoundMMA["accessionNo"] ?>
                                                </td>
                                                <td style=" text-align: center;">
                                                    <?php echo  $gpaRoundMMA["maxGPAX"]?>
                                                </td>
                                                <td style=" text-align: center;">
                                                    <?php echo  $gpaRoundMMA["minGPAX"]?>
                                                </td>
                                                <td style=" text-align: center;">
                                                    <?php echo  $gpaRoundMMA["avgGPAX"]?>
                                                </td>
                                            </tr>

                                            <?php
                                            }
                                            ?>


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 mx-auto">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">ผลการเรียนนิสิตรุ่น 63 ในแต่ละรอบ</h6>

                    </div>
                    <div class="card-body ">
                        <div class="row" style="padding: 20px;">
                            <div class="col-sm-6">

                                <div id="grade6"></div>
                            </div>
                            <div class="col-sm-6 mx-auto">
                                <div class="table-responsive">
                                    <table class="table table-striped" cellspacing="0" style="color: black;">
                                        <thead style=" ">
                                            <tr>
                                                <th style=" text-align: center; "><span>รอบรับเข้า</span></th>
                                                <th style="text-align: center; "><span>ค่าสูงสุด</span>
                                                </th>
                                                <th style="text-align: center;"><span>ค่าต่ำสุด</span></th>
                                                <th style="text-align: center;"><span>ค่าเฉลี่ย</span></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $gpaRoundMMAs = getGradeMMASortByRoundBySemesterYearAndGeneretion($semesterYear,63);
                                                $labelGrade6 = [];
                                                $maxGPAX6 = [];
                                                $minGPAX6 = [];
                                                $avgGPAX6 = [];
                                            ?>

                                            <?php
                                            foreach($gpaRoundMMAs as $gpaRoundMMA){
                                                $labelGrade6[] = "รอบ " . (string) $gpaRoundMMA["accessionNo"];
                                                $maxGPAX6[] = (float) $gpaRoundMMA["maxGPAX"];
                                                $minGPAX6[] = (float) $gpaRoundMMA["minGPAX"];
                                                $avgGPAX6[] = (float) $gpaRoundMMA["avgGPAX"];
                                            ?>

                                            <tr style="font-weight: normal;">
                                                <td style=" text-align: center;">
                                                    <?php echo  $gpaRoundMMA["accessionNo"] ?>
                                                </td>
                                                <td style=" text-align: center;">
                                                    <?php echo  $gpaRoundMMA["maxGPAX"]?>
                                                </td>
                                                <td style=" text-align: center;">
                                                    <?php echo  $gpaRoundMMA["minGPAX"]?>
                                                </td>
                                                <td style=" text-align: center;">
                                                    <?php echo  $gpaRoundMMA["avgGPAX"]?>
                                                </td>
                                            </tr>

                                            <?php
                                            }
                                            ?>


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 mx-auto">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">ผลการเรียนนิสิตรุ่น 64 ในแต่ละรอบ</h6>

                    </div>
                    <div class="card-body ">
                        <div class="row" style="padding: 20px;">
                            <div class="col-sm-6">

                                <div id="grade7"></div>
                            </div>
                            <div class="col-sm-6 mx-auto">
                                <div class="table-responsive">
                                    <table class="table table-striped" cellspacing="0" style="color: black;">
                                        <thead style=" ">
                                            <tr>
                                                <th style=" text-align: center; "><span>รอบรับเข้า</span></th>
                                                <th style="text-align: center; "><span>ค่าสูงสุด</span>
                                                </th>
                                                <th style="text-align: center;"><span>ค่าต่ำสุด</span></th>
                                                <th style="text-align: center;"><span>ค่าเฉลี่ย</span></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $gpaRoundMMAs = getGradeMMASortByRoundBySemesterYearAndGeneretion($semesterYear,64);
                                                $labelGrade7 = [];
                                                $maxGPAX7 = [];
                                                $minGPAX7 = [];
                                                $avgGPAX7 = [];
                                            ?>

                                            <?php
                                            foreach($gpaRoundMMAs as $gpaRoundMMA){
                                                $labelGrade7[] = "รอบ " . (string) $gpaRoundMMA["accessionNo"];
                                                $maxGPAX7[] = (float) $gpaRoundMMA["maxGPAX"];
                                                $minGPAX7[] = (float) $gpaRoundMMA["minGPAX"];
                                                $avgGPAX7[] = (float) $gpaRoundMMA["avgGPAX"];
                                            ?>

                                            <tr style="font-weight: normal;">
                                                <td style=" text-align: center;">
                                                    <?php echo  $gpaRoundMMA["accessionNo"] ?>
                                                </td>
                                                <td style=" text-align: center;">
                                                    <?php echo  $gpaRoundMMA["maxGPAX"]?>
                                                </td>
                                                <td style=" text-align: center;">
                                                    <?php echo  $gpaRoundMMA["minGPAX"]?>
                                                </td>
                                                <td style=" text-align: center;">
                                                    <?php echo  $gpaRoundMMA["avgGPAX"]?>
                                                </td>
                                            </tr>

                                            <?php
                                            }
                                            ?>


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>







        </div>

    </div>






    <script>
        var p1label = <?php echo json_encode($pee1label); ?>;

        var p1blue = <?php echo json_encode($pee1blues); ?>;
        var p1green = <?php echo json_encode($pee1greens); ?>;
        var p1orange = <?php echo json_encode($pee1oranges); ?>;
        var p1red = <?php echo json_encode($pee1reds); ?>;

        var ctx = document.getElementById("pee1");
        var myChart = new Chart(ctx, {
            //type: 'bar',
            //type: 'line',
            type: 'bar',
            data: {
                labels: p1label,
                datasets: [{
                    label: '3.25-4.00',
                    data: p1blue,
                    backgroundColor: "rgba(134, 211, 247,0.7)",
                    borderWidth: 0
                },
                {
                    label: '2.00-3.24',
                    data: p1green,
                    backgroundColor: "rgba(153, 204, 153,0.7)",
                    borderWidth: 0
                },
                {
                    label: '1.75-1.99',
                    data: p1orange,
                    backgroundColor: 'rgba(245, 123, 57,0.7)',
                    borderWidth: 0
                },
                {
                    label: '0.00-1.74',
                    data: p1red,
                    backgroundColor: 'rgba(255, 105, 98,0.7)',
                    borderWidth: 0
                }
                ]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        stacked: true,
                    },
                    y: {
                        stacked: true,
                        beginAtZero: true // เพิ่มค่านี้เพื่อให้แกน y เริ่มต้นที่ 0
                    }
                }

            }
        });
    </script>

    <script>
        var p2genh = <?php echo json_encode($pee2label); ?>;

        var p2blueh = <?php echo json_encode($pee2blues); ?>;
        var p2greenh = <?php echo json_encode($pee2greens); ?>;
        var p2orangeh = <?php echo json_encode($pee2oranges); ?>;
        var p2redh = <?php echo json_encode($pee2reds); ?>;

        var ctx = document.getElementById("pee2");
        var myChart = new Chart(ctx, {
            //type: 'bar',
            //type: 'line',
            type: 'bar',
            data: {
                labels: p2genh,
                datasets: [{
                    label: '3.25-4.00',
                    data: p2blueh,
                    backgroundColor: "rgba(134, 211, 247,0.7)",
                    borderWidth: 0
                },
                {
                    label: '2.00-3.24',
                    data: p2greenh,
                    backgroundColor: "rgba(153, 204, 153,0.7)",
                    borderWidth: 0
                },
                {
                    label: '1.75-1.99',
                    data: p2orangeh,
                    backgroundColor: 'rgba(245, 123, 57,0.7)',
                    borderWidth: 0
                },
                {
                    label: '0.00-1.74',
                    data: p2redh,
                    backgroundColor: 'rgba(255, 105, 98,0.7)',
                    borderWidth: 0
                }
                ]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        stacked: true,
                    },
                    y: {
                        stacked: true
                    }
                }

            }
        });
    </script>

    <script>
        var p3label = <?php echo json_encode($pee3label); ?>;

        var p3blue = <?php echo json_encode($pee3blues); ?>;
        var p3green = <?php echo json_encode($pee3greens); ?>;
        var p3orange = <?php echo json_encode($pee3oranges); ?>;
        var p3red = <?php echo json_encode($pee3reds); ?>;

        var ctx = document.getElementById("pee3");
        var myChart = new Chart(ctx, {
            //type: 'bar',
            //type: 'line',
            type: 'bar',
            data: {
                labels: p3label,
                datasets: [{
                    label: '3.25-4.00',
                    data: p3blue,
                    backgroundColor: "rgba(134, 211, 247,0.7)",
                    borderWidth: 0
                },
                {
                    label: '2.00-3.24',
                    data: p3green,
                    backgroundColor: "rgba(153, 204, 153,0.7)",
                    borderWidth: 0
                },
                {
                    label: '1.75-1.99',
                    data: p3orange,
                    backgroundColor: 'rgba(245, 123, 57,0.7)',
                    borderWidth: 0
                },
                {
                    label: '0.00-1.74',
                    data: p3red,
                    backgroundColor: 'rgba(255, 105, 98,0.7)',
                    borderWidth: 0
                }
                ]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        stacked: true,
                    },
                    y: {
                        max: 100,
                        stacked: true
                    }
                }

            }
        });
    </script>

    <script>
        var p4label = <?php echo json_encode($pee4label); ?>;

        var p4blue = <?php echo json_encode($pee4blues); ?>;
        var p4green = <?php echo json_encode($pee4greens); ?>;
        var p4orange = <?php echo json_encode($pee4oranges); ?>;
        var p4red = <?php echo json_encode($pee4reds); ?>;


        var ctx = document.getElementById("pee4");
        var myChart = new Chart(ctx, {
            //type: 'bar',
            //type: 'line',
            type: 'bar',
            data: {
                labels: p4label,
                datasets: [{
                    label: '3.25-4.00',
                    data: p4blue,
                    backgroundColor: "rgba(134, 211, 247,0.7)",
                    borderWidth: 0
                },
                {
                    label: '2.00-3.24',
                    data: p4green,
                    backgroundColor: "rgba(153, 204, 153,0.7)",
                    borderWidth: 0
                },
                {
                    label: '1.75-1.99',
                    data: p4orange,
                    backgroundColor: 'rgba(245, 123, 57,0.7)',
                    borderWidth: 0
                },
                {
                    label: '0.00-1.74',
                    data: p4red,
                    backgroundColor: 'rgba(255, 105, 98,0.7)',
                    borderWidth: 0
                }
                ]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        stacked: true,
                    },
                    y: {
                        max: 100,
                        stacked: true
                    }
                }

            }
        });
    </script>


    <script>

        var ctx = document.getElementById("learncos");
        var myChart = new Chart(ctx, {
            //type: 'bar',
            //type: 'line',
            type: 'bar',
            data: {
                labels: ['2563', '2564'],
                datasets: [{
                    label: 'ตามรุ่น',
                    data: [4, 5],
                    backgroundColor: "rgba(100, 197, 215,0.7)",
                    borderWidth: 0
                },
                {
                    label: ['ไม่ตามหลักสุตร'],
                    data: [5, 5],
                    backgroundColor: "rgba(118, 188, 22,0.7)",
                    borderWidth: 0
                },
                {
                    label: ['พ้นสภาพ'],
                    data: [1, 0],
                    backgroundColor: 'rgba(245, 123, 57,0.7)',
                    borderWidth: 0
                }
                ]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        stacked: true,
                    },
                    y: {
                        stacked: true
                    }
                }

            }
        });
    </script>

    <script>


        var ctx = document.getElementById("learnyear");
        var myChart = new Chart(ctx, {
            //type: 'bar',
            //type: 'line',
            type: 'bar',
            data: {
                labels: ["รุ่น 63", "รุ่น 64"],
                datasets: [
                    {
                        label: 'ตามรุ่น',
                        data: [4, 5],
                        backgroundColor: "rgba(100, 197, 215,0.7)",
                        borderWidth: 0
                    },
                    {
                        label: ['ไม่ตามหลักสุตร'],
                        data: [5, 5],
                        backgroundColor: "rgba(118, 188, 22,0.7)",
                        borderWidth: 0
                    },
                    {
                        label: ['พ้นสภาพ'],
                        data: [1, 0],
                        backgroundColor: 'rgba(245, 123, 57,0.7)',
                        borderWidth: 0
                    }
                ]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        stacked: true,
                    },
                    y: {
                        stacked: true
                    }
                }

            }
        });
    </script>

    <script>

        var ctx = document.getElementById("myChart");
        ctx.height = 150;
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["รุ่น 63"],
                datasets: [
                    {
                        label: "รอบที่ 1",
                        data: [10],
                        backgroundColor: '#bfd575',
                        borderColor: [
                            'rgba(150,186,169, 1)', //1
                            'rgba(108,158,134, 1)',
                            'rgba(66,130,100, 1)',
                            'rgba(45,117,83, 1)',
                            'rgba(27,70,49, 1)', //5
                            'rgba(0, 51, 18, 1)'
                        ],
                        borderWidth: 0
                    },
                    {
                        label: "รอบที่ 2",
                        data: [10],
                        backgroundColor: '#a4ebf3',
                        borderColor: [
                            'rgba(150,186,169, 1)', //1
                            'rgba(108,158,134, 1)',
                            'rgba(66,130,100, 1)',
                            'rgba(45,117,83, 1)',
                            'rgba(27,70,49, 1)', //5
                            'rgba(0, 51, 18, 1)'
                        ],
                        borderWidth: 0
                    }
                    ,
                    {
                        label: "รอบที่ 3",
                        data: [10],
                        backgroundColor: '#abbdee',
                        borderColor: [
                            'rgba(150,186,169, 1)', //1
                            'rgba(108,158,134, 1)',
                            'rgba(66,130,100, 1)',
                            'rgba(45,117,83, 1)',
                            'rgba(27,70,49, 1)', //5
                            'rgba(0, 51, 18, 1)'
                        ],
                        borderWidth: 0
                    },
                    {
                        label: "รอบที่ 4",
                        data: [5],
                        backgroundColor: '#f8c769',
                        borderColor: [
                            'rgba(150,186,169, 1)', //1
                            'rgba(108,158,134, 1)',
                            'rgba(66,130,100, 1)',
                            'rgba(45,117,83, 1)',
                            'rgba(27,70,49, 1)', //5
                            'rgba(0, 51, 18, 1)'
                        ],
                        borderWidth: 0
                    }
                ]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>

    <script>

        var ctx = document.getElementById("myChart2");
        ctx.height = 150;
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["รุ่น 63"],
                datasets: [
                    {
                        label: "รอบที่ 1",
                        data: [15, 16, 14, 18],
                        backgroundColor: '#bfd575',
                        borderColor: [
                            'rgba(150,186,169, 1)', //1
                            'rgba(108,158,134, 1)',
                            'rgba(66,130,100, 1)',
                            'rgba(45,117,83, 1)',
                            'rgba(27,70,49, 1)', //5
                            'rgba(0, 51, 18, 1)'
                        ],
                        borderWidth: 0
                    },
                    {
                        label: "รอบที่ 2",
                        data: [20, 22, 25, 21],
                        backgroundColor: '#a4ebf3',
                        borderColor: [
                            'rgba(150,186,169, 1)', //1
                            'rgba(108,158,134, 1)',
                            'rgba(66,130,100, 1)',
                            'rgba(45,117,83, 1)',
                            'rgba(27,70,49, 1)', //5
                            'rgba(0, 51, 18, 1)'
                        ],
                        borderWidth: 0
                    }
                    ,
                    {
                        label: "รอบที่ 3",
                        data: [13, 18, 16, 14],
                        backgroundColor: '#abbdee',
                        borderColor: [
                            'rgba(150,186,169, 1)', //1
                            'rgba(108,158,134, 1)',
                            'rgba(66,130,100, 1)',
                            'rgba(45,117,83, 1)',
                            'rgba(27,70,49, 1)', //5
                            'rgba(0, 51, 18, 1)'
                        ],
                        borderWidth: 0
                    },
                    {
                        label: "รอบที่ 4",
                        data: [15, 7, 8, 10],
                        backgroundColor: '#f8c769',
                        borderColor: [
                            'rgba(150,186,169, 1)', //1
                            'rgba(108,158,134, 1)',
                            'rgba(66,130,100, 1)',
                            'rgba(45,117,83, 1)',
                            'rgba(27,70,49, 1)', //5
                            'rgba(0, 51, 18, 1)'
                        ],
                        borderWidth: 0
                    }
                ]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.js"></script>
    <script src="https://cdn.plot.ly/plotly-2.27.0.min.js"></script>

    <script>
        var labelGrade1 = <?php echo json_encode($labelGrade1); ?>;

        var maxGPAX1 = <?php echo json_encode($maxGPAX1); ?>;
        var minGPAX1 = <?php echo json_encode($minGPAX1); ?>;
        var avgGPAX1 = <?php echo json_encode($avgGPAX1); ?>;


        var ctx = document.getElementById("grade1");
        var data1 = [];

        for (var i = 0; i < labelGrade1.length; i++) {
            var generationData1 = {
                y: [maxGPAX1[i], avgGPAX1[i], minGPAX1[i]],
                type: 'box',
                name: labelGrade1[i]
            };
            data1.push(generationData1);
        }

        Plotly.newPlot('grade1', data1);
    </script>

    <script>
        var labelGrade2 = <?php echo json_encode($labelGrade2); ?>;

        var maxGPAX2 = <?php echo json_encode($maxGPAX2); ?>;
        var minGPAX2 = <?php echo json_encode($minGPAX2); ?>;
        var avgGPAX2 = <?php echo json_encode($avgGPAX2); ?>;


        var ctx = document.getElementById("grade2");
        var data2 = [];

        for (var i = 0; i < labelGrade2.length; i++) {
            var generationData2 = {
                y: [maxGPAX2[i], avgGPAX2[i], minGPAX2[i]],
                type: 'box',
                name: labelGrade2[i]
            };
            data2.push(generationData2);
        }

        Plotly.newPlot('grade2', data2);
    </script>

    <script>
        var labelGrade3 = <?php echo json_encode($labelGrade3); ?>;

        var maxGPAX3 = <?php echo json_encode($maxGPAX3); ?>;
        var minGPAX3 = <?php echo json_encode($minGPAX3); ?>;
        var avgGPAX3 = <?php echo json_encode($avgGPAX3); ?>;


        var ctx = document.getElementById("grade3");
        var data3 = [];

        for (var i = 0; i < labelGrade3.length; i++) {
            var generationData3 = {
                y: [maxGPAX3[i], avgGPAX3[i], minGPAX3[i]],
                type: 'box',
                name: labelGrade3[i]
            };
            data3.push(generationData3);
        }

        Plotly.newPlot('grade3', data3);
    </script>

    <script>
        var labelGrade4 = <?php echo json_encode($labelGrade4); ?>;

        var maxGPAX4 = <?php echo json_encode($maxGPAX4); ?>;
        var minGPAX4 = <?php echo json_encode($minGPAX4); ?>;
        var avgGPAX4 = <?php echo json_encode($avgGPAX4); ?>;


        var ctx = document.getElementById("grade4");
        var data4 = [];

        for (var i = 0; i < labelGrade4.length; i++) {
            var generationData4 = {
                y: [maxGPAX4[i], avgGPAX4[i], minGPAX4[i]],
                type: 'box',
                name: labelGrade4[i]
            };
            data4.push(generationData4);
        }

        Plotly.newPlot('grade4', data4);
    </script>

    <script>
        var labelGrade5 = <?php echo json_encode($labelGrade5); ?>;

        var maxGPAX5 = <?php echo json_encode($maxGPAX5); ?>;
        var minGPAX5 = <?php echo json_encode($minGPAX5); ?>;
        var avgGPAX5 = <?php echo json_encode($avgGPAX5); ?>;


        var ctx = document.getElementById("grade5");
        var data5 = [];

        for (var i = 0; i < labelGrade5.length; i++) {
            var generationData5 = {
                y: [maxGPAX5[i], avgGPAX5[i], minGPAX5[i]],
                type: 'box',
                name: labelGrade5[i]
            };
            data5.push(generationData5);
        }

        Plotly.newPlot('grade5', data5);
    </script>

    <script>
        var labelGrade6 = <?php echo json_encode($labelGrade6); ?>;

        var maxGPAX6 = <?php echo json_encode($maxGPAX6); ?>;
        var minGPAX6 = <?php echo json_encode($minGPAX6); ?>;
        var avgGPAX6 = <?php echo json_encode($avgGPAX6); ?>;


        var ctx = document.getElementById("grade6");
        var data6 = [];

        for (var i = 0; i < labelGrade6.length; i++) {
            var generationData6 = {
                y: [maxGPAX6[i], avgGPAX6[i], minGPAX6[i]],
                type: 'box',
                name: labelGrade6[i]
            };
            data6.push(generationData6);
        }

        Plotly.newPlot('grade6', data6);
    </script>

    <script>
        var labelGrade7 = <?php echo json_encode($labelGrade7); ?>;

        var maxGPAX7 = <?php echo json_encode($maxGPAX7); ?>;
        var minGPAX7 = <?php echo json_encode($minGPAX7); ?>;
        var avgGPAX7 = <?php echo json_encode($avgGPAX7); ?>;


        var ctx = document.getElementById("grade7");
        var data7 = [];

        for (var i = 0; i < labelGrade7.length; i++) {
            var generationData7 = {
                y: [maxGPAX7[i], avgGPAX7[i], minGPAX7[i]],
                type: 'box',
                name: labelGrade7[i]
            };
            data7.push(generationData7);
        }

        Plotly.newPlot('grade7', data7);
    </script>




    <script>


        var ctx = document.getElementById("percent");
        var myChart = new Chart(ctx, {
            //type: 'bar',
            //type: 'line',
            type: 'bar',
            data: {
                labels: ["รุ่น 63", "รุ่น 64", "รุ่น 65", "รุ่น 66"],
                datasets: [{
                    label: "จำนวนรับเข้า",
                    data: [63, 63, 63, 63],
                    backgroundColor: '#bfd575',
                    borderColor: [
                        'rgba(150,186,169, 1)', //1
                        'rgba(108,158,134, 1)',
                        'rgba(66,130,100, 1)',
                        'rgba(45,117,83, 1)',
                        'rgba(27,70,49, 1)', //5
                        'rgba(0, 51, 18, 1)'
                    ],
                    borderWidth: 0
                },
                {
                    label: "จำนวนคงเหลือ",
                    data: [63, 50, 60, 55],
                    backgroundColor: '#a4ebf3',
                    borderColor: [
                        'rgba(150,186,169, 1)', //1
                        'rgba(108,158,134, 1)',
                        'rgba(66,130,100, 1)',
                        'rgba(45,117,83, 1)',
                        'rgba(27,70,49, 1)', //5
                        'rgba(0, 51, 18, 1)'
                    ],
                    borderWidth: 0
                },

                ]

            },

            options: {
                responsive: true,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>

    <script>


        var ctx = document.getElementById("percent2");
        var myChart = new Chart(ctx, {
            //type: 'bar',
            //type: 'line',
            type: 'bar',
            data: {
                labels: ["รุ่น 63", "รุ่น 64", "รุ่น 65", "รุ่น 66"],
                datasets: [{
                    label: "จำนวนรับเข้า",
                    data: [63, 63, 63, 63],
                    backgroundColor: '#bfd575',
                    borderColor: [
                        'rgba(150,186,169, 1)', //1
                        'rgba(108,158,134, 1)',
                        'rgba(66,130,100, 1)',
                        'rgba(45,117,83, 1)',
                        'rgba(27,70,49, 1)', //5
                        'rgba(0, 51, 18, 1)'
                    ],
                    borderWidth: 0
                },
                {
                    label: "จำนวนพ้นสภาพ",
                    data: [0, 13, 3, 8],
                    backgroundColor: 'rgb(245, 123, 57)',
                    borderColor: [
                        'rgba(150,186,169, 1)', //1
                        'rgba(108,158,134, 1)',
                        'rgba(66,130,100, 1)',
                        'rgba(45,117,83, 1)',
                        'rgba(27,70,49, 1)', //5
                        'rgba(0, 51, 18, 1)'
                    ],
                    borderWidth: 0
                },

                ]

            },

            options: {

                responsive: true,

            }
        });
    </script>

    <script src="plugins/common/common.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/gleek.js"></script>
    <script src="js/styleSwitcher.js"></script>

    <!-- Chartjs -->
    <script src="./plugins/chart.js/Chart.bundle.min.js"></script>
    <!-- Circle progress -->
    <script src="./plugins/circle-progress/circle-progress.min.js"></script>
    <!-- Datamap -->
    <script src="./plugins/d3v3/index.js"></script>
    <script src="./plugins/topojson/topojson.min.js"></script>
    <script src="./plugins/datamaps/datamaps.world.min.js"></script>
    <!-- Morrisjs -->
    <script src="./plugins/raphael/raphael.min.js"></script>
    <script src="./plugins/morris/morris.min.js"></script>
    <!-- Pignose Calender -->
    <script src="./plugins/moment/moment.min.js"></script>
    <script src="./plugins/pg-calendar/js/pignose.calendar.min.js"></script>
    <!-- ChartistJS -->
    <script src="./plugins/chartist/js/chartist.min.js"></script>
    <script src="./plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js"></script>



    <script src="./js/dashboard/dashboard-1.js"></script>

</body>

</html>