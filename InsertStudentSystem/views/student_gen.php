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


                <div class="col-sm-12 mx-auto" >
                    <div class="card shadow mb-4">

                        <div class="card-header  py-3">
                            <h6 class="m-0 font-weight-bold text-primary">ช่วงเกรดตามรุ่น</h6>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 mx-auto">
                                <div class="card">

                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold ">ช่วงเกรดนิสิตปีที่ 1</h6>
                                        <?php $gradeRange1s = getGradeRangeSoryByGeneretionBySemesterYearAndStudentYear($semesterYear,1); ?>
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
                                        <?php $gradeRange2s = getGradeRangeSoryByGeneretionBySemesterYearAndStudentYear($semesterYear,2); ?>
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
                                        <?php $gradeRange3s = getGradeRangeSoryByGeneretionBySemesterYearAndStudentYear($semesterYear,3); ?>
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
                                        <?php $gradeRange4s = getGradeRangeSoryByGeneretionBySemesterYearAndStudentYear($semesterYear,4); ?>
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

                                <div id="grade"></div>
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
                                            
                                            ?>

                                            <?php
                                            foreach($gpaMMAs as $gpaMMA){
                                            ?>

                                            <tr style="font-weight: normal;">
                                                <td style=" text-align: center;"><?php echo  $gpaMMA["kuId"] ?></td>
                                                <td style=" text-align: center;"><?php echo  $gpaMMA["maxGPAX"]?></td>
                                                <td style=" text-align: center;"><?php echo  $gpaMMA["minGPAX"]?></td>
                                                <td style=" text-align: center;"><?php echo  $gpaMMA["avgGPAX"]?></td>
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
                        <h6 class="m-0 font-weight-bold text-primary">จำนวนนิสิตตาม Tcas ตามรุ่น (คน)</h6>

                    </div>
                    <div class="card-body ">
                        <div class="row" style="padding: 20px;">
                            <div class="col-sm-6">

                                <canvas id="myChart2"></canvas>
                            </div>
                            <div class="col-sm-6 float-right">
                                <div class="table-responsive">
                                    <table class="table table-striped" cellspacing="0" style="color: black;">
                                        <thead style=" ">
                                            <tr>
                                                <th style=" text-align: center; ">รุ่น</th>
                                                <th style="text-align: right; "><span>รอบที่ 1</span>
                                                </th>
                                                <th style="text-align: right;"><span>รอบที่ 2</span></th>
                                                <th style="text-align: right;">รอบที่ 3</th>
                                                <th style="text-align: right;">รอบที่ 4</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td style=" text-align: center;">รุ่น 63</td>
                                                <td style=" text-align: right;">15</td>
                                                <td style=" text-align: right;">20</td>
                                                <td style=" text-align: right;">13</td>
                                                <td style=" text-align: right;">15</td>
                                            </tr>
                                            <tr>
                                                <td style=" text-align: center;">รุ่น 64</td>
                                                <td style=" text-align: right;">16</td>
                                                <td style=" text-align: right;">22</td>
                                                <td style=" text-align: right;">18</td>
                                                <td style=" text-align: right;">7</td>
                                            </tr>
                                            <tr>
                                                <td style=" text-align: center;">รุ่น 65</td>
                                                <td style=" text-align: right;">14</td>
                                                <td style=" text-align: right;">25</td>
                                                <td style=" text-align: right;">16</td>
                                                <td style=" text-align: right;">8</td>
                                            </tr>
                                            <tr>
                                                <td style=" text-align: center;">รุ่น 66</td>
                                                <td style=" text-align: right;">18</td>
                                                <td style=" text-align: right;">21</td>
                                                <td style=" text-align: right;">14</td>
                                                <td style=" text-align: right;">10</td>
                                            </tr>


                                            <tr>
                                                <th scope='row' style=" text-align: center; ">ทุกรุ่น</th>
                                                <td style="font-weight: bold; text-align: right;">63 คน
                                                </td>
                                                <td style='font-weight: bold; text-align: right;'>88 คน
                                                </td>
                                                <td style='font-weight: bold; text-align: right;'>61 คน
                                                </td>
                                                <td style='font-weight: bold; text-align: right;'>40 คน
                                                </td>
                                            </tr>

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
                        <h6 class="m-0 font-weight-bold text-primary">อัตราการคงอยู่</h6>

                    </div>
                    <div class="card-body ">
                        <div class="row" style="padding: 20px;">
                            <div class="col-sm-6">

                                <canvas id="percent"></canvas>
                            </div>
                            <div class="col-sm-6 float-right">
                                <div class="table-responsive">
                                    <table class="table table-striped" cellspacing="0" style="color: black;">
                                        <thead style=" ">
                                            <tr>
                                                <th style=" text-align: center; ">รุ่นการศึกษา</th>
                                                <th style="text-align: center; "><span>จำนวนรับเข้า</span>
                                                </th>
                                                <th style="text-align: center;"><span>จำนวนคงอยู่</span></th>
                                                <th style="text-align: center;">ร้อยละ</th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr>
                                                <th style=" text-align: center;  ">รุ่น 63</th>
                                                <td style=" text-align: center;">
                                                    63 คน
                                                </td>
                                                <td style=" text-align: center;">
                                                    63 คน
                                                </td>
                                                <td style=" text-align: center;">100</td>

                                            </tr>

                                            <tr>
                                                <th style=" text-align: center;  ">รุ่น 64</th>
                                                <td style=" text-align: center;">
                                                    63 คน
                                                </td>
                                                <td style=" text-align: center;">
                                                    50 คน
                                                </td>
                                                <td style=" text-align: center;">79.36</td>

                                            </tr>
                                            <tr>
                                                <th style=" text-align: center;  ">รุ่น 65</th>
                                                <td style=" text-align: center;">
                                                    63 คน
                                                </td>
                                                <td style=" text-align: center;">
                                                    60 คน
                                                </td>
                                                <td style=" text-align: center;">95.23</td>

                                            </tr>
                                            <tr>
                                                <th style=" text-align: center;  ">รุ่น 66</th>
                                                <td style=" text-align: center;">
                                                    63 คน
                                                </td>
                                                <td style=" text-align: center;">
                                                    55 คน
                                                </td>
                                                <td style=" text-align: center;">87.30</td>

                                            </tr>




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
                        <h6 class="m-0 font-weight-bold text-primary">อัตราพ้นสภาพ</h6>

                    </div>
                    <div class="card-body ">
                        <div class="row" style="padding: 20px;">
                            <div class="col-sm-6">

                                <canvas id="percent2"></canvas>
                            </div>
                            <div class="col-sm-6 float-right">
                                <div class="table-responsive">
                                    <table class="table table-striped" cellspacing="0" style="color: black;">
                                        <thead style=" ">
                                            <tr>
                                                <th style=" text-align: center; ">รุ่นการศึกษา</th>
                                                <th style="text-align: center; "><span>จำนวนรับเข้า</span>
                                                </th>
                                                <th style="text-align: center;"><span>จำนวนพ้นสภาพ</span></th>
                                                <th style="text-align: center;">ร้อยละ</th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr>
                                                <th style=" text-align: center;  ">รุ่น 63</th>
                                                <td style=" text-align: center;">63 คน </td>
                                                <td style=" text-align: center;">0 คน</td>
                                                <td style=" text-align: center;">0</td>

                                            </tr>
                                            <tr>
                                                <th style=" text-align: center;  ">รุ่น 64</th>
                                                <td style=" text-align: center;">63 คน </td>
                                                <td style=" text-align: center;">13 คน</td>
                                                <td style=" text-align: center;">20.63</td>

                                            </tr>
                                            <tr>
                                                <th style=" text-align: center;  ">รุ่น 65</th>
                                                <td style=" text-align: center;">63 คน </td>
                                                <td style=" text-align: center;">3 คน</td>
                                                <td style=" text-align: center;">4.76</td>

                                            </tr>
                                            <tr>
                                                <th style=" text-align: center;  ">รุ่น 66</th>
                                                <td style=" text-align: center;">63 คน </td>
                                                <td style=" text-align: center;">8 คน</td>
                                                <td style=" text-align: center;">12.69</td>

                                            </tr>




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
        var ctx = document.getElementById("pee1");
        var myChart = new Chart(ctx, {
            //type: 'bar',
            //type: 'line',
            type: 'bar',
            data: {
                labels: ["รุ่น 63", "รุ่น 64", "รุ่น 65", "รุ่น 66"],
                datasets: [{
                    label: '3.25-4.00',
                    data: [3, 4, 2, 3],
                    backgroundColor: "#00bfff",
                    borderWidth: 0
                },
                {
                    label: '2.00-3.24',
                    data: [5, 2, 4, 3],
                    backgroundColor: "#98fb98",
                    borderWidth: 0
                },
                {
                    label: '1.75-1.99',
                    data: [1, 2, 3, 3],
                    backgroundColor: '#ffa07a',
                    borderWidth: 0
                },
                {
                    label: '0.00-1.74',
                    data: [1, 2, 1, 1],
                    backgroundColor: '#f08080',
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
        var ctx = document.getElementById("pee2");
        var myChart = new Chart(ctx, {
            //type: 'bar',
            //type: 'line',
            type: 'bar',
            data: {
                labels: ["รุ่น 63", "รุ่น 64", "รุ่น 65", "รุ่น 66"],
                datasets: [{
                    label: '3.25-4.00',
                    data: [4, 5, 3],
                    backgroundColor: "#00bfff",
                    borderWidth: 0
                },
                {
                    label: '2.00-3.24',
                    data: [4, 1, 3],
                    backgroundColor: "#98fb98",
                    borderWidth: 0
                },
                {
                    label: '1.75-1.99',
                    data: [2, 3, 4],
                    backgroundColor: '#ffa07a',
                    borderWidth: 0
                },
                {
                    label: '0.00-1.74',
                    data: [0, 1, 0],
                    backgroundColor: '#f08080',
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
        var ctx = document.getElementById("pee3");
        var myChart = new Chart(ctx, {
            //type: 'bar',
            //type: 'line',
            type: 'bar',
            data: {
                labels: ["รุ่น 63", "รุ่น 64", "รุ่น 65", "รุ่น 66"],
                datasets: [{
                    label: '3.25-4.00',
                    data: [4, 5],
                    backgroundColor: "#00bfff",
                    borderWidth: 0
                },
                {
                    label: '2.00-3.24',
                    data: [4, 1],
                    backgroundColor: "#98fb98",
                    borderWidth: 0
                },
                {
                    label: '1.75-1.99',
                    data: [2, 3],
                    backgroundColor: '#ffa07a',
                    borderWidth: 0
                },
                {
                    label: '0.00-1.74',
                    data: [0, 1],
                    backgroundColor: '#f08080',
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
        var ctx = document.getElementById("pee4");
        var myChart = new Chart(ctx, {
            //type: 'bar',
            //type: 'line',
            type: 'bar',
            data: {
                labels: ["รุ่น 63", "รุ่น 64", "รุ่น 65", "รุ่น 66"],
                datasets: [{
                    label: '3.25-4.00',
                    data: [4],
                    backgroundColor: "#00bfff",
                    borderWidth: 0
                },
                {
                    label: '2.00-3.24',
                    data: [4],
                    backgroundColor: "#98fb98",
                    borderWidth: 0
                },
                {
                    label: '1.75-1.99',
                    data: [2],
                    backgroundColor: '#ffa07a',
                    borderWidth: 0
                },
                {
                    label: '0.00-1.74',
                    data: [0],
                    backgroundColor: '#f08080',
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
        var ctx = document.getElementById("pee4plus");
        var myChart = new Chart(ctx, {
            //type: 'bar',
            //type: 'line',
            type: 'bar',
            data: {
                labels: ["รุ่น 63", "รุ่น 64", "รุ่น 65", "รุ่น 66"],
                datasets: [{
                    label: '3.25-4.00',
                    data: [0],
                    backgroundColor: "#00bfff",
                    borderWidth: 0
                },
                {
                    label: '2.00-3.24',
                    data: [0],
                    backgroundColor: "#98fb98",
                    borderWidth: 0
                },
                {
                    label: '1.75-1.99',
                    data: [0],
                    backgroundColor: '#ffa07a',
                    borderWidth: 0
                },
                {
                    label: '0.00-1.74',
                    data: [0],
                    backgroundColor: '#f08080',
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
        var ctx = document.getElementById("grade");
        var data = [];
        var generationData = {
            y: [3.33, 2.74, 2.15],
            type: 'box',
            name: "รุ่น 63"
        };
        data.push(generationData);
        var generationData2 = {
            y: [3.26, 2.64, 2.02],
            type: 'box',
            name: "รุ่น 64"
        };
        data.push(generationData2);
        var generationData3 = {
            y: [3.36, 2.67, 1.98],
            type: 'box',
            name: "รุ่น 65"
        };
        data.push(generationData3);
        var generationData4 = {
            y: [3.35, 2.69, 2.03],
            type: 'box',
            name: "รุ่น 66"
        };
        data.push(generationData4);

        Plotly.newPlot('grade', data);
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