<?php

function getGradeRangeSoryByGeneretionBySemesterYearAndStudentYear($semesterYear,$studentYear){
    
    require("connection_connect.php");
   

    $gradeRanges = [];

    $sql = "SELECT kuId,COUNT(CASE WHEN gpa >= 3.25 THEN studentId END) as blue,COUNT(CASE WHEN gpa >= 2.00 AND gpa <= 3.24 THEN studentId END) as green,COUNT(CASE WHEN gpa >= 1.75 AND gpa <= 1.99 THEN studentId END) as orange,COUNT(CASE WHEN gpa >= 0.00 AND gpa <= 1.74 THEN studentId END) as red
    FROM student NATURAL JOIN (SELECT studentId,ROUND(IFNULL(SUM(CASE WHEN  gradeAlias != 'P' AND gradeAlias != 'NP' AND gradeAlias != 'W' THEN totalCredits*gradeNumber END),0)/IFNULL(SUM(CASE WHEN gradeAlias != 'P' AND gradeAlias != 'NP' AND gradeAlias != 'W' THEN totalCredits END),1),2) AS gpa
    FROM semester NATURAL JOIN fact3_grade NATURAL JOIN subject 
    WHERE studentYear = $studentYear AND semesterYear <= $semesterYear
    GROUP BY studentId) AS A
    GROUP BY kuId"; 
    //echo "$sql";
    $result = $conn->query($sql);

    while ($my_row = $result->fetch_assoc()) {

        $gradeRanges[] = $my_row;
    }


    require("connection_close.php");

    return $gradeRanges;
}

function getGradeMMASortByGeneretionBySemesterYear($semesterYear){

    require("connection_connect.php");

    $gradeMMAs = [];

    $sql = "SELECT kuId,MAX(gpaxAvg) AS maxGPAX,MIN(gpaxAvg) AS minGPAX,ROUND(AVG(gpaxAvg),2) AS avgGPAX
    FROM student NATURAL JOIN fact1_grade NATURAL JOIN semester
    WHERE semesterYear <= $semesterYear
    GROUP BY kuId";
    //echo print_r($conn);
    
    $result = $conn->query($sql);
    

    while ($my_row = $result->fetch_assoc()) {

        $gradeMMAs[] = $my_row;
    }

    require("connection_close.php");

    return $gradeMMAs;

}

function getGradeMMASortByRoundBySemesterYear($semesterYear){

    require("connection_connect.php");

    $gradeMMAs = [];

    $sql = "SELECT accessionNo,MAX(gpaxAvg) AS maxGPAX,MIN(gpaxAvg) AS minGPAX,ROUND(AVG(gpaxAvg),2) AS avgGPAX
    FROM student NATURAL JOIN fact1_grade NATURAL JOIN semester
    WHERE semesterYear <= $semesterYear
    GROUP BY accessionNo";
    //echo print_r($conn);
    
    $result = $conn->query($sql);
    

    while ($my_row = $result->fetch_assoc()) {

        $gradeMMAs[] = $my_row;
    }

    require("connection_close.php");

    return $gradeMMAs;

}

function getGradeMMASortByRoundBySemesterYearAndGeneretion($semesterYear,$startYear){

    require("connection_connect.php");

    $gradeMMAs = [];

    $sql = "SELECT accessionNo,MAX(gpaxAvg) AS maxGPAX,MIN(gpaxAvg) AS minGPAX,ROUND(AVG(gpaxAvg),2) AS avgGPAX
    FROM student NATURAL JOIN fact1_grade NATURAL JOIN semester
    WHERE semesterYear <= $semesterYear AND startYear = $startYear
    GROUP BY accessionNo";
    //echo print_r($conn);
    
    $result = $conn->query($sql);
    

    while ($my_row = $result->fetch_assoc()) {

        $gradeMMAs[] = $my_row;
    }

    require("connection_close.php");

    return $gradeMMAs;

}



?>