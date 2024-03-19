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

?>