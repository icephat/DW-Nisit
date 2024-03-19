<?php

function getCountSubjectGradeAtoZAndWAndFBySemesterYear($semesterYear){

    require("connection_connect.php");

    $subjects = [];

    $sql = "SELECT kuSubjectId,subjectName,COUNT(CASE WHEN gradeAlias != 'W' AND gradeAlias != 'F' AND gradeAlias != 'NP' AND gradeAlias != 'P' THEN studentId END) AS subjectPass,COUNT(CASE WHEN gradeAlias = 'W' THEN studentId END) AS subjectDrop,COUNT(CASE WHEN gradeAlias = 'F' THEN studentId END) AS subjectNotPass
    FROM semester NATURAL JOIN fact3_grade NATURAL JOIN subject NATURAL JOIN subjectgroup
    WHERE groupType < 2 AND semesterYear <= $semesterYear
    GROUP BY kuSubjectId
    ORDER BY subjectNotPass DESC,subjectDrop DESC
    LIMIT 10;";
    //echo print_r($conn);
    
    $result = $conn->query($sql);
    

    while ($my_row = $result->fetch_assoc()) {

        $subjects[] = $my_row;
    }

    require("connection_close.php");

    return $subjects;

}

function getCountSubjectGradeAtoDBySemesterYear($semesterYear){

    require("connection_connect.php");

    $subjects = [];

    $sql = "SELECT kuSubjectId,subjectName,COUNT(CASE WHEN gradeAlias = 'A' THEN studentId END) AS A,COUNT(CASE WHEN gradeAlias = 'B' OR  gradeAlias = 'B+' THEN studentId END) AS B,COUNT(CASE WHEN gradeAlias = 'C' OR  gradeAlias = 'C+' THEN studentId END) AS C,COUNT(CASE WHEN gradeAlias = 'D' OR  gradeAlias = 'D+' THEN studentId END) AS D
    FROM semester NATURAL JOIN fact3_grade NATURAL JOIN subject NATURAL JOIN subjectgroup
    WHERE groupType < 2 AND semesterYear <= $semesterYear
    GROUP BY kuSubjectId
    ORDER BY A DESC
    limit 10;";
    //echo print_r($conn);
    
    $result = $conn->query($sql);
    

    while ($my_row = $result->fetch_assoc()) {

        $subjects[] = $my_row;
    }

    require("connection_close.php");

    return $subjects;

}

function getCountRigisSubjectBySemesterYear($semesterYear){

    require("connection_connect.php");

    $subjects = [];

    $sql = "SELECT kuSubjectId,subjectName,COUNT(CASE WHEN semesterYear = $semesterYear-3 THEN studentId END) AS one,COUNT(CASE WHEN semesterYear = $semesterYear-2 THEN studentId END) AS two,COUNT(CASE WHEN semesterYear = $semesterYear-1 THEN studentId END) AS three,COUNT(CASE WHEN semesterYear = $semesterYear THEN studentId END) AS four
    FROM semester NATURAL JOIN fact3_grade NATURAL JOIN subject NATURAL JOIN subjectgroup
    WHERE groupType < 2 AND semesterYear <= $semesterYear
    GROUP BY kuSubjectId
    ORDER BY planYear;";
    //echo print_r($conn);
    
    $result = $conn->query($sql);
    

    while ($my_row = $result->fetch_assoc()) {

        $subjects[] = $my_row;
    }

    require("connection_close.php");

    return $subjects;

}

function getCountRigisPassSubjectBySemesterYear($semesterYear){

    require("connection_connect.php");

    $subjects = [];

    $sql = "SELECT kuSubjectId,subjectName,COUNT(CASE WHEN semesterYear = $semesterYear-3 THEN studentId END) AS one,COUNT(CASE WHEN semesterYear = $semesterYear-2 THEN studentId END) AS two,COUNT(CASE WHEN semesterYear = $semesterYear-1 THEN studentId END) AS three,COUNT(CASE WHEN semesterYear = $semesterYear THEN studentId END) AS four
    FROM semester NATURAL JOIN fact3_grade NATURAL JOIN subject NATURAL JOIN subjectgroup
    WHERE groupType < 2 AND semesterYear <= $semesterYear AND gradeAlias != 'F' AND gradeAlias != 'W' AND gradeAlias != 'NP'
    GROUP BY kuSubjectId
    ORDER BY planYear;";
    //echo print_r($conn);
    
    $result = $conn->query($sql);
    

    while ($my_row = $result->fetch_assoc()) {

        $subjects[] = $my_row;
    }

    require("connection_close.php");

    return $subjects;

}

function getCountRigisNotPassSubjectBySemesterYear($semesterYear){

    require("connection_connect.php");

    $subjects = [];

    $sql = "SELECT kuSubjectId,subjectName,COUNT(CASE WHEN semesterYear = $semesterYear-3 THEN studentId END) AS one,COUNT(CASE WHEN semesterYear = $semesterYear-2 THEN studentId END) AS two,COUNT(CASE WHEN semesterYear = $semesterYear-1 THEN studentId END) AS three,COUNT(CASE WHEN semesterYear = $semesterYear THEN studentId END) AS four
    FROM semester NATURAL JOIN fact3_grade NATURAL JOIN subject NATURAL JOIN subjectgroup
    WHERE groupType < 2 AND semesterYear <= $semesterYear AND (gradeAlias = 'F' OR gradeAlias = 'W' OR gradeAlias = 'NP')
    GROUP BY kuSubjectId
    ORDER BY planYear;";
    //echo print_r($conn);
    
    $result = $conn->query($sql);
    

    while ($my_row = $result->fetch_assoc()) {

        $subjects[] = $my_row;
    }

    require("connection_close.php");

    return $subjects;

}

?>