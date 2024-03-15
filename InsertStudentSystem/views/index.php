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

</head>

<body>

    <?php include('./layout.php'); ?>

    <!--**********************************
            Content body start
        ***********************************-->
    <div class="content-body">

        <div class="container-fluid mt-3">
            <div class="row">
                <div class="col-sm-6 mx-auto">
                    <a href="./student_gen.php" class="card" style="border-radius: 100px;">
                        <div class="card-body t1 text-center" style="background-color: lightgray; ">
                            <a href="./student_gen.php">
                                <fieldset style=" groove lightgray">
                                    <img src="./images/school.png" style="width: 150px; height: 150px" ><br>
                                </fieldset>
                            </a>
                        </div>
                        <div class="card-footer text-center">
                            <a  href="./student_gen.php" style="color: black;  text-decoration:none; font-size: 18px;">แยกตามรุ่น</a>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 mx-auto">
                    <a href="./student_couse.php" class="card" style="border-radius: 100px;">
                        <div class="card-body t1 text-center" style="background-color: lightgray; ">
                            <a href="./student_couse.php">
                                <fieldset style=" groove lightgray">
                                    <img src="./images/school.png" style="width: 150px; height: 150px" ><br>
                                </fieldset>
                            </a>
                        </div>
                        <div class="card-footer text-center">
                            <a  href="./student_couse.php" style="color: black;  text-decoration:none; font-size: 18px;">แยกตามหลักสูตร</a>
                        </div>
                    </a>
                </div>

            </div>
        </div>
        
        <!-- #/ container -->
    </div>
    <!--**********************************
            Content body end
        ***********************************-->


    <!--**********************************
            Footer start
        ***********************************-->

    <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
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