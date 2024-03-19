<?php

function getSemesterYearPresent(){
    
    require_once("connection_connect.php");

    $sql = "SELECT MAX(semesterYear) AS semesterYear FROM semester";
    $result = $conn->query($sql);
    $semester = $result->fetch_assoc();

    require_once("connection_close.php");

    return $semester["semesterYear"];
}
?>