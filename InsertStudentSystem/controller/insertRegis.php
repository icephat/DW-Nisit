<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php


require ("connection_connect.php");


$year = $_POST["semesterYear"];
$part = $_POST["semesterPart"];


echo $year . " " . $part . "<br>";


$studentIds = [];


// Open uploaded CSV file with read-only mode
// $csvFile = fopen("D:\CPEKU\Project66\\regis_csv\\".$year."_1_regis.csv", 'r');
$csvFile = fopen($_FILES['file']['tmp_name'], 'r');
$fp = file($_FILES['file']['tmp_name']);
echo count($fp) . "<br>";
// Skip the first line
fgetcsv($csvFile);





$queryCheck = "SELECT semesterId FROM semester WHERE semesterPart = $part AND semesterYear = $year";
$check = mysqli_query($conn, $queryCheck);
if ($check->num_rows == 0) {
    $sqlInsertSemester = "insert into semester(semesterYear,semesterPart) values ($year,$part)";
    mysqli_query($conn, $sqlInsertSemester);
}




$querySemester = "SELECT * FROM semester WHERE semesterYear = " . $year . " AND semesterPart = $part";
$result = $conn->query($querySemester); //mysqli_query($conn, $querySemester);
$semester = $result->fetch_assoc();
$semesterId = $semester["semesterId"];

$i = 0;

$mainSQL = "INSERT INTO fact3-grade(studentId,semesterId,subjectId,gradeAlias,gradeNumber,sudentYear) VALUES ";

while (($getData = fgetcsv($csvFile, 1000000, ",")) !== FALSE) {

    $num = count($getData);
    //echo $num."<br>";

    $studentId = $getData[0];
    $kuSubjectId = $getData[1];
    $gradeAlias = $getData[5];







    //echo $studentId . "<br>";



    if (!in_array($studentId, $studentIds)) {
        $studentIds[] = $studentId;
    }


    if ($gradeAlias == 'W' or $gradeAlias == 'P') {
        $gradeNumber = 0;
    } elseif ($gradeAlias == "A") {
        $gradeNumber = 4;
    } elseif ($gradeAlias == "B+") {
        $gradeNumber = 3.5;
    } elseif ($gradeAlias == "B") {
        $gradeNumber = 3;
    } elseif ($gradeAlias == "C+") {
        $gradeNumber = 2.5;
    } elseif ($gradeAlias == "C") {
        $gradeNumber = 2;
    } elseif ($gradeAlias == "D+") {
        $gradeNumber = 1.5;
    } elseif ($gradeAlias == "D") {
        $gradeNumber = 1;
    } elseif ($gradeAlias == "F") {
        $gradeNumber = 0;
    }

    //echo $gradeAlias."$gradeNumber<br>";

    if(strlen($kuSubjectId) >7){
        $kuSubjectId = substr($kuSubjectId, 1, 8);
    }
    
    $kuSubjectId = substr_replace($kuSubjectId, "0", 0, 0);




    //หา subjectId
    echo $kuSubjectId."<br>";
    $sqlCourseListSQL = "SELECT subjectId FROM subject WHERE kuSubjectId = '$kuSubjectId'";
    $resultTCourseList = $conn->query($sqlCourseListSQL);
    $subject = $resultTCourseList->fetch_assoc();
    //echo "$sqlCourseListSQL<br>";

    if (!isset ($subject)) {
        //echo "เข้าพละ<br>";

        $subjectNewCode = substr_replace($kuSubjectId, "XXX", 5);
        $sqlCourseListSQL = "SELECT subjectId FROM subject WHERE kuSubjectId = '$subjectNewCode'";
        $resultTCourseList = $conn->query($sqlCourseListSQL);
        $subject = $resultTCourseList->fetch_assoc();

        if (!isset ($subject)) {

            //echo "เข้าเสรี<br>";
            $subjectNewCode = substr_replace($kuSubjectId, "XXXXXXXX", 0);
            $sqlCourseListSQL = "SELECT subjectId FROM subject WHERE kuSubjectId = '$subjectNewCode'";
            $resultTCourseList = $conn->query($sqlCourseListSQL);
            $subject = $resultTCourseList->fetch_assoc();
            //echo $sqlCourseListSQL."<br>";
            //echo "$studentId : ".$courseList["courseListId"]."<br>";

        }

    }

    $subjectId = $subject["subjectId"];

    $queryCheck = "SELECT * FROM fact3_grade WHERE studentId = '" . $studentId . "' AND subjectId = " . $subjectId . "" . " AND semesterId = " . $semesterId;
    $check = mysqli_query($conn, $queryCheck);

    // $subSQL = "('$studentId',$semesterId,$courseListId,'$subjectCode',$secLecture,$secLecture,'$gradeAlias',$gradeNumber,$creditRegis,$typeRegisId,$studyYear,$part,$year,'$partName')";
    // echo "$subSQL<br>";

    if ($check->num_rows > 0) {
        //echo "$queryCheck <br>";
    } else {

        $studentYearSQL = "SELECT 2500+startYear AS startYear FROM student WHERE studentId = '$studentId'";
        $resultTStudentYear = $conn->query($studentYearSQL);
        $studentYear = $resultTStudentYear->fetch_assoc();

        $studyYear = $year- $studentYear["startYear"] + 1;




        $sql = "INSERT INTO fact3_grade(studentId,semesterId,subjectId,gradeAlias,gradeNumber,studentYear) VALUES ('$studentId',$semesterId,$subjectId,'$gradeAlias',$gradeNumber,$studyYear)";

        // $subSQL = "('$studentId',$semesterId,$courseListId,'$subjectCode',$secLecture,$secLecture,'$gradeAlias',$gradeNumber,$creditRegis,$typeRegisId,$studyYear,$part,$year,'$partName')";
        // echo "$subSQL<br>";

        //$mainSQL = $mainSQL.$subSQL.",";


        echo "$sql <br>";





        mysqli_query($conn, $sql);
    }





    //echo $studentId . " " . $subjectCode . " " . $subjectCourse . " " . $room . " " . $secLecture . " " . $secLab . " " . $gradeAlias . " " . $gradeNumber . " " . $typeRegis . " " . $classTimeLectureNum . " " . $classTimeLabNum . "<br>";

    // $query = "SELECT regisId FROM fact_regis WHERE subjectCode = '" . $subjectCode . "' AND subjectCourse = '".$subjectCourse."'";

    // $check = mysqli_query($conn, $query);
}

fclose($csvFile);

// echo print_r(($studentIds));


foreach ($studentIds as $studentId) {



    $gpaSQL = "SELECT SUM(totalCredits) AS gpaTotalCredits,IFNULL(SUM(CASE WHEN gradeNumber != 0 THEN totalCredits END),0) AS gpaPassCredits
    ,IFNULL(SUM(CASE WHEN gradeNumber = 0 AND gradeAlias != 'P' THEN totalCredits END),0) AS gpaFailCredits
    ,ROUND(IFNULL(SUM(CASE WHEN gradeAlias != 'F' AND gradeAlias != 'P' AND gradeAlias != 'NP' AND gradeAlias != 'W' THEN totalCredits*gradeNumber END),0)/IFNULL(SUM(CASE WHEN gradeAlias != 'F' AND gradeAlias != 'P' AND gradeAlias != 'NP' AND gradeAlias != 'W' THEN totalCredits END),1),2) AS gpaPass
    ,ROUND(IFNULL(SUM(CASE WHEN  gradeAlias != 'P' AND gradeAlias != 'NP' AND gradeAlias != 'W' THEN totalCredits*gradeNumber END),0)/IFNULL(SUM(CASE WHEN gradeAlias != 'P' AND gradeAlias != 'NP' AND gradeAlias != 'W' THEN totalCredits END),1),2) AS gpaAvg
    FROM fact3_grade NATURAL JOIN subject NATURAL JOIN subjectgroup
    WHERE studentId = '$studentId' AND semesterId = $semesterId;";
    $resultGPA = $conn->query($gpaSQL);
    $gpa = $resultGPA->fetch_assoc();

    $gpaAvg = $gpa["gpaAvg"];
    $gpaPass = $gpa["gpaPass"];
    $gpaTotalCredits = $gpa["gpaTotalCredits"];
    $gpaPassCredits = $gpa["gpaPassCredits"];
    $gpaFailCredits = $gpa["gpaFailCredits"];

    //echo print_r($gpa) . "<br>";

    $gpaxSQL = "SELECT SUM(totalCredits) AS gpaxTotalCredits,IFNULL(SUM(CASE WHEN gradeNumber != 0 THEN totalCredits END),0) AS gpaxPassCredits,
    IFNULL(SUM(CASE WHEN gradeNumber = 0 AND gradeAlias != 'P' THEN totalCredits END),0) AS gpaxFailCredits,
    ROUND(IFNULL(SUM(CASE WHEN gradeAlias != 'F' AND gradeAlias != 'P' AND gradeAlias != 'NP' AND gradeAlias != 'W' THEN totalCredits*gradeNumber END),0)/IFNULL(SUM(CASE WHEN gradeAlias != 'F' AND gradeAlias != 'P' AND gradeAlias != 'NP' AND gradeAlias != 'W' THEN totalCredits END),1),2) AS gpaxPass,
    ROUND(IFNULL(SUM(CASE WHEN  gradeAlias != 'P' AND gradeAlias != 'NP' AND gradeAlias != 'W' THEN totalCredits*gradeNumber END),0)/IFNULL(SUM(CASE WHEN gradeAlias != 'P' AND gradeAlias != 'NP' AND gradeAlias != 'W' THEN totalCredits END),1),2) AS gpaxAvg
    FROM fact3_grade NATURAL JOIN subject NATURAL JOIN subjectgroup
    WHERE studentId = '$studentId';";
    $resultGPAX = $conn->query($gpaxSQL);
    $gpax = $resultGPAX->fetch_assoc();

    $gpaxAvg = $gpax["gpaxAvg"];
    $gpaxPass = $gpax["gpaxPass"];
    $gpaxTotalCredits = $gpax["gpaxTotalCredits"];
    $gpaxPassCredits = $gpax["gpaxPassCredits"];
    $gpaxFailCredits = $gpax["gpaxFailCredits"];

    //echo print_r($gpax) . "<br>";

    $gpaGroupSQL = "SELECT subjectGroupId,groupName,groupType,ROUND(IFNULL(SUM(CASE WHEN  semesterId = $semesterId AND gradeAlias != 'P' AND gradeAlias != 'NP' AND gradeAlias != 'W' THEN totalCredits*gradeNumber END),0)/IFNULL(SUM(CASE WHEN gradeAlias != 'P' AND gradeAlias != 'NP' AND gradeAlias != 'W' THEN totalCredits END),1),2) AS gpaAvg,ROUND(IFNULL(SUM(CASE WHEN  gradeAlias != 'P' AND gradeAlias != 'NP' AND gradeAlias != 'W' THEN totalCredits*gradeNumber END),0)/IFNULL(SUM(CASE WHEN gradeAlias != 'P' AND gradeAlias != 'NP' AND gradeAlias != 'W' THEN totalCredits END),1),2) AS gpaxAvg
    FROM fact3_grade NATURAL JOIN subject NATURAL JOIN subjectgroup
    WHERE studentId = '$studentId'
    GROUP BY subjectGroupId;";
    $resultGPAGroup = $conn->query($gpaGroupSQL);

    //$gpax = $resultGPAGroup->fetch_assoc();

    while ($my_row = $resultGPAGroup->fetch_assoc()) {

        $subjecGroupId = $my_row["subjectGroupId"];
        $gpa = $my_row["gpaAvg"];
        $gpax = $my_row["gpaxAvg"];

        $fact2SQL = "INSERT INTO fact2_grade_summary(studentId,semesterId,subjectGroupId,gpa,gpax) VALUES ('$studentId',$semesterId,$subjecGroupId,$gpa,$gpax)";
        //echo $fact2SQL . "<br>";
        mysqli_query($conn, $fact2SQL);

        //echo print_r($my_row);
    }

    $fact1SQL = "INSERT INTO fact1_grade(studentId,semesterId,gpaAvg,gpaPass,gpaTotalCredits,gpaPassCredit,gpaFailCredit,gpaxAvg,gpaxPass,gpaxTotalCredits,gpaxPassCredit,gpaxFailCredits)
    VALUES ('$studentId',$semesterId,$gpaAvg,$gpaPass,$gpaTotalCredits,$gpaPassCredits,$gpaFailCredits,$gpaxAvg,$gpaxPass,$gpaxTotalCredits,$gpaxPassCredits,$gpaxFailCredits)";
    //echo $fact1SQL . "<br>";
    mysqli_query($conn, $fact1SQL);






}
require ("connection_close.php");
//  header("Location: index.php");

echo "<script>
                $(document).ready(function() {
                    Swal.fire({
                        title: 'สำเร็จ',
                        text: 'เพิ่มข้อมูลสำเร็จ!',
                        icon: 'success',
                        showConfirmButton: false
                    });
                })
            </script>";

// header("refresh:2; url=../views/home.php");











?>