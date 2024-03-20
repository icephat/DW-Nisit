<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php


require ("connection_connect.php");





// Open uploaded CSV file with read-only mode
$csvFile = fopen($_FILES['file']['tmp_name'], 'r');

// Skip the first line
fgetcsv($csvFile);

// Parse data from CSV file line by line        
while (($getData = fgetcsv($csvFile, 10000, ",")) !== FALSE) {
    // Get row data
    // $studentId = $getData[1];
    // $title = $getData[2];
    // $name = $getData[3];
    // $startYear = $getData[4];
    // $accession = $getData[5];

    $groupName = $getData[0];
    $groupType = $getData[1];

    $kuSubjectId = $getData[2];
    $subjectName = $getData[3];
    $totalCredits = $getData[4];

    $lacCredits = $getData[5];
    $labCredits = $getData[6];

    $lacHrs = $getData[7];
    $labHrs = $getData[8];

    $planYear = $getData[9];
    $semester = $getData[10];




    $sql = "SELECT subjectGroupId FROM subjectgroup WHERE groupName = '$groupName' AND groupType = $groupType";
    $result = $conn->query($sql);
    $subjectGroup = $result->fetch_assoc();

    if (!isset ($subjectGroup)) {
        mysqli_query($conn, "INSERT INTO subjectGroup (groupName,groupType) VALUES ('$groupName',$groupType)");


        $result = $conn->query($sql);
        $subjectGroup = $result->fetch_assoc();

    }

    $subjectGroupId = $subjectGroup["subjectGroupId"];







    // If user already exists in the database with the same email
    $query = "SELECT subjectId FROM subject WHERE kuSubjectId = '$kuSubjectId'";

    $check = mysqli_query($conn, $query);

    if ($check->num_rows > 0) {
        mysqli_query($conn, "UPDATE subject SET subjectName = '$subjectName' WHERE kuSubjectId = '" . $kuSubjectId . "'");
    } else {

        mysqli_query($conn, "INSERT INTO subject (subjectGroupId, kuSubjectId, subjectName, totalCredits, lacCredits,labCredits,lacHrs,labHrs,planYear,semester) 
        VALUES ($subjectGroupId,'$kuSubjectId','$subjectName',$totalCredits,$lacCredits,$labCredits,$lacHrs,$labHrs,$planYear,$semester)");
    }
}

// Close opened CSV file
fclose($csvFile);

//  header("Location: index.php");

echo "<script>
                $(document).ready(function() {
                    Swal.fire({
                        title: 'สำเร็จ',
                        text: 'เพิ่มข้อมูลสำเร็จ!',
                        icon: 'success',
                        timer: 5000,
                        showConfirmButton: false
                    });
                })
            </script>";

header("refresh:2; url=../views/home.php");




require ("connection_close.php");






?>