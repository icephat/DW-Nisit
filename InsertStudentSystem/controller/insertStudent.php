<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php


require("connection_connect.php");





// Open uploaded CSV file with read-only mode
$csvFile = fopen($_FILES['file']['tmp_name'], 'r');

// Skip the first line
fgetcsv($csvFile);

// Parse data from CSV file line by line        
while (($getData = fgetcsv($csvFile, 10000, ",")) !== FALSE) {
    // Get row data
    $studentId = $getData[1];
    $title = $getData[2];
    $name = $getData[3];
    $startYear = $getData[4];
    $accession = $getData[5];


    //echo $title."<br>";
    if($title == "นาย"){
        $gender = "ชาย";
    }elseif($title == "น.ส."){
        $gender = "หญิง";
    }

    //$gender = $getData[3];
    //$generetion = $getData[4];
    //$departmentCode = $getData[5];

    // If user already exists in the database with the same email
    $query = "SELECT studentId FROM student WHERE studentId = '$studentId'";

    $check = mysqli_query($conn, $query);

    if ($check->num_rows > 0) {
        //mysqli_query($conn, "UPDATE student SET title = '$title' , name = '$name' , genderId = $genderId , generetionId = $generetionId , departmentId = $departmentId WHERE studentId = '" . $studentId . "'");
    } else {

        mysqli_query($conn, "INSERT INTO student (studentId, kuId, studentName, accessionNo, startYear,gender) 
        VALUES ('$studentId','$startYear','$name',$accession,$startYear,'$gender')");
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




require("connection_close.php");






?>