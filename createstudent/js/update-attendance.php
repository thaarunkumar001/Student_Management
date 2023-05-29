<?php
$connection = mysqli_connect('localhost', 'root', '', 'student_attandance');



if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}


$name = $_POST['name']; // Retrieve the 'name' parameter from the request



$sql = "UPDATE `sdata` SET `attendance` = 1 WHERE rollNo = '$name'";
$result = mysqli_query($connection, $sql);



if ($result) {
    echo "Attendance updated successfully";
} else {
    echo "Error updating attendance: " . mysqli_error($connection);
}



mysqli_close($connection);
?>