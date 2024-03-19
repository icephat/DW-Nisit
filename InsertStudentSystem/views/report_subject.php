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
    include_once '../function/reportSubject.php';


    $semesterYear = getSemesterYearPresent();
    ?>

    <?php include ('./layout.php'); ?>
    <!--**********************************
            Content body start
        ***********************************-->
    <div class="content-body">
        <br>
        <form>
            <div class="row">
                <!-- <div class="col-sm-4 mx-auto">

                    <label>รายวิชา</label>
                    <select class="form-control">
                        <option value="">ทุกหลักสูตร</option>
                        <option value="">หลักสูตร 60</option>
                        <option value="">หลักสูตร 65</option>
                    </select>

                </div> -->
                <div class="col-sm-4 mx-auto">

                    <label>ปีการศึกษา</label>
                    <select class="form-control">
                        <option value="">ทุกปีการศึกษา</option>
                        <option value="">2566</option>
                        <option value="">2565</option>
                        <option value="">2564</option>
                        <option value="">2563</option>
                    </select>

                </div>
                <div class="col-sm-3 mx-auto">

                    <button type="button" class="btn mb-1 btn-info text-center" style="margin-top: 32px;">ดูผล</button>

                </div>
            </div>


        </form>

        <br>

        <div class="col-sm-12 mx-auto">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">ผลการเรียนแยกตามรายวิชา</h6>

                </div>
                <div class="card-body ">
                    <div class="row" style="padding: 5px;">
                        <div class="col-sm-6">

                            <canvas id="myChart"></canvas>
                        </div>
                        <div class="col-sm-6 mx-auto">
                            <div class="table-responsive">
                                <table class="table table-striped" cellspacing="0" style="color: black;">
                                    <thead style=" ">
                                        <tr>
                                            <th><span>ชื่อรายวิชา</span></th>
                                            <th style=" text-align: center; "><span>A-D</span></th>
                                            <th style="text-align: center; "><span>F</span>
                                            </th>
                                            <th style="text-align: center;"><span>W</span></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $subjectADWFs = getCountSubjectGradeAtoZAndWAndFBySemesterYear($semesterYear);
                                        ?>
                                        <?php
                                        foreach ($subjectADWFs as $subjectADWF) {
                                            ?>

                                            <tr>
                                                <td>
                                                    <?php echo $subjectADWF["subjectName"] ?>
                                                </td>
                                                <td style=" text-align: center;">
                                                    <?php echo $subjectADWF["subjectPass"] ?> คน
                                                </td>
                                                <td style=" text-align: center;">
                                                    <?php echo $subjectADWF["subjectNotPass"] ?> คน
                                                </td>
                                                <td style=" text-align: center;">
                                                    <?php echo $subjectADWF["subjectDrop"] ?> คน
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                        <!-- <tr>
                                            <td>Discrete Mathematics</td>
                                            <td style=" text-align: center;">50 คน</td>
                                            <td style=" text-align: center;">3 คน</td>
                                            <td style=" text-align: center;">10 คน</td>
                                        </tr>
                                        <tr>
                                            <td>Data Structures and Algorithms I</td>
                                            <td style=" text-align: center;">55 คน</td>
                                            <td style=" text-align: center;">3 คน</td>
                                            <td style=" text-align: center;">5 คน</td>
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
                    <h6 class="m-0 font-weight-bold text-primary">ผลการเรียนแยกตามรายวิชา</h6>

                </div>
                <div class="card-body ">
                    <div class="row" style="padding: 5px;">
                        <div class="col-sm-6">

                            <canvas id="myChart2"></canvas>
                        </div>
                        <div class="col-sm-6 mx-auto">
                            <div class="table-responsive">
                                <table class="table table-striped" cellspacing="0" style="color: black;">
                                    <thead style=" ">
                                        <tr>
                                            <th><span>ชื่อรายวิชา</span></th>
                                            <th style=" text-align: center; "><span>A</span></th>
                                            <th style="text-align: center; "><span>B,B+</span>
                                            </th>
                                            <th style="text-align: center;"><span>C,C+</span></th>
                                            <th style="text-align: center;"><span>D,D+</span></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $subjectAtoDs = getCountSubjectGradeAtoDBySemesterYear($semesterYear);
                                        ?>
                                        <?php
                                        foreach ($subjectAtoDs as $subjectAtoD) {
                                            ?>
                                            <tr>
                                                <td>
                                                    <?php echo $subjectAtoD["subjectName"] ?>
                                                </td>
                                                <td style=" text-align: center;">
                                                    <?php echo $subjectAtoD["A"] ?> คน
                                                </td>
                                                <td style=" text-align: center;">
                                                    <?php echo $subjectAtoD["B"] ?> คน
                                                </td>
                                                <td style=" text-align: center;">
                                                    <?php echo $subjectAtoD["C"] ?> คน
                                                </td>
                                                <td style=" text-align: center;">
                                                    <?php echo $subjectAtoD["D"] ?> คน
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                        <!-- <tr>
                                            <td>Discrete Mathematics</td>
                                            <td style=" text-align: center;">19 คน</td>
                                            <td style=" text-align: center;">20 คน</td>
                                            <td style=" text-align: center;">8 คน</td>
                                            <td style=" text-align: center;">3 คน</td>
                                        </tr>
                                        <tr>
                                            <td>Data Structures and Algorithms I</td>
                                            <td style=" text-align: center;">19 คน</td>
                                            <td style=" text-align: center;">20 คน</td>
                                            <td style=" text-align: center;">8 คน</td>
                                            <td style=" text-align: center;">8 คน</td>
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
                    <h6 class="m-0 font-weight-bold text-primary">จำนวนนิสิตลงทะเบียน</h6>
                </div>

                <div class="card-body ">
                    <div class="row" style="padding: 20px;">
                        <div class="col-sm-12 mx-auto float-right">
                            <div class="table-responsive">
                                <table class="table table-striped" cellspacing="0" style="color: black;">
                                    <thead style=" ">
                                        <tr>
                                            <th colspan="2">ชื่อรายวิชา</th>
                                            <th colspan="3" style=" text-align: center;">
                                                ปีการศึกษา</th>
                                            <!--<th rowspan="1" style=" text-align: center;">คงเหลือ(คน)
                                            </th>-->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td></td>
                                            <?php

                                            for ($i = $semesterYear - 3; $i <= $semesterYear; $i++) {
                                                ?>
                                                <td style=" text-align: center;">
                                                    <?php echo $i ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                            <!-- <td style=" text-align: center;">2564</td>
                                            <td style=" text-align: center;">2565 </td>
                                            <td style=" text-align: center;">2566</td> -->
                                            <!--<td style=" text-align: center;"></td>-->
                                        </tr>
                                        <?php

                                        $subjectRegisInYears = getCountRigisSubjectBySemesterYear($semesterYear);

                                        foreach ($subjectRegisInYears as $subjectRegisInYear) {
                                            ?>

                                            <tr>
                                                <td><?php echo $subjectRegisInYear["subjectName"] ?></td>
                                                <td style=" text-align: center;"><?php echo $subjectRegisInYear["one"] ?> คน</td>
                                                <td style=" text-align: center;"><?php echo $subjectRegisInYear["two"] ?> คน</td>
                                                <td style=" text-align: center;"><?php echo $subjectRegisInYear["three"] ?> คน </td>
                                                <td style=" text-align: center;"><?php echo $subjectRegisInYear["four"] ?> คน</td>
                                                <!--<td style=" text-align: center;">0 คน</td>-->
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
                    <h6 class="m-0 font-weight-bold text-primary">จำนวนนิสิตที่ผ่าน</h6>
                </div>

                <div class="card-body ">
                    <div class="row" style="padding: 20px;">
                        <div class="col-sm-12 mx-auto float-right">
                            <div class="table-responsive">
                                <table class="table table-striped" cellspacing="0" style="color: black;">
                                    <thead style=" ">
                                        <tr>
                                            <th colspan="2">ชื่อรายวิชา</th>
                                            <th colspan="3" style=" text-align: center;">
                                                ปีการศึกษา</th>
                                            <!--<th rowspan="1" style=" text-align: center;">คงเหลือ(คน)
                                            </th>-->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td></td>
                                            <?php

                                            for ($i = $semesterYear - 3; $i <= $semesterYear; $i++) {
                                                ?>
                                                <td style=" text-align: center;">
                                                    <?php echo $i ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                            <!--<td style=" text-align: center;"></td>-->
                                        </tr>
                                        <?php

                                        $subjectRegisInYears = getCountRigisPassSubjectBySemesterYear($semesterYear);

                                        foreach ($subjectRegisInYears as $subjectRegisInYear) {
                                            ?>

                                            <tr>
                                            <td><?php echo $subjectRegisInYear["subjectName"] ?></td>
                                                <td style=" text-align: center;"><?php echo $subjectRegisInYear["one"] ?> คน</td>
                                                <td style=" text-align: center;"><?php echo $subjectRegisInYear["two"] ?> คน</td>
                                                <td style=" text-align: center;"><?php echo $subjectRegisInYear["three"] ?> คน </td>
                                                <td style=" text-align: center;"><?php echo $subjectRegisInYear["four"] ?> คน</td>
                                                <!--<td style=" text-align: center;">0 คน</td>-->
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
                    <h6 class="m-0 font-weight-bold text-primary">จำนวนนิสิตที่ไม่ผ่าน</h6>
                </div>

                <div class="card-body ">
                    <div class="row" style="padding: 20px;">
                        <div class="col-sm-12 mx-auto float-right">
                            <div class="table-responsive">
                                <table class="table table-striped" cellspacing="0" style="color: black;">
                                    <thead style=" ">
                                        <tr>
                                            <th colspan="2">ชื่อรายวิชา</th>
                                            <th colspan="3" style=" text-align: center;">
                                                ปีการศึกษา</th>
                                            <!--<th rowspan="1" style=" text-align: center;">คงเหลือ(คน)
                                            </th>-->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td></td>
                                            <?php

                                            for ($i = $semesterYear - 3; $i <= $semesterYear; $i++) {
                                                ?>
                                                <td style=" text-align: center;">
                                                    <?php echo $i ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                            <!--<td style=" text-align: center;"></td>-->
                                        </tr>
                                        <?php

                                        $subjectRegisInYears = getCountRigisNotPassSubjectBySemesterYear($semesterYear);

                                        foreach ($subjectRegisInYears as $subjectRegisInYear) {
                                            ?>

                                            <tr>
                                            <td><?php echo $subjectRegisInYear["subjectName"] ?></td>
                                                <td style=" text-align: center;"><?php echo $subjectRegisInYear["one"] ?> คน</td>
                                                <td style=" text-align: center;"><?php echo $subjectRegisInYear["two"] ?> คน</td>
                                                <td style=" text-align: center;"><?php echo $subjectRegisInYear["three"] ?> คน </td>
                                                <td style=" text-align: center;"><?php echo $subjectRegisInYear["four"] ?> คน</td>
                                                <!--<td style=" text-align: center;">0 คน</td>-->
                                            </tr>
                                            <?php
                                        }
                                        ?>


                                        <!--<tr>
                                            <th scope='row' >ทุกรุ่น</th>
                                            <td style="font-weight: bold; text-align: center;">63 คน</td>
                                            <td style="font-weight: bold; text-align: center;">63 คน</td>
                                            <td style='font-weight: bold; text-align: center;'>63 คน</td>
                                            <td style='font-weight: bold; text-align: center;'>63 คน</td>
                                            <td style=" font-weight: bold; text-align: center;"></td>
                                        </tr>-->



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

    </div>

    <script>

        var ctx = document.getElementById("myChart");
        ctx.height = 150;
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["Electronics Fundamentals", "Discrete Mathematics", "Data Structures and Algorithms I"],
                datasets: [
                    {
                        label: "เกรด A-D",
                        data: [30, 50, 55],
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
                        label: "เกรด F",
                        data: [20, 3, 3],
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
                        label: "เกรด W",
                        data: [13, 10, 5],
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
                labels: ["Electronics Fundamentals", "Discrete Mathematics", "Data Structures and Algorithms I"],
                datasets: [
                    {
                        label: "เกรด A",
                        data: [10, 19, 19],
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
                        label: "เกรด B,B+",
                        data: [9, 20, 20],
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
                        label: "เกรด C,C+",
                        data: [7, 8, 8],
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
                        label: "เกรด D,D+",
                        data: [4, 3, 8],
                        backgroundColor: '#ffe4b5',
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