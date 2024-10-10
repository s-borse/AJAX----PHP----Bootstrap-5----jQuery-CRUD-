<?php 
include('dbConnection.php');


$sql = "SELECT *  FROM student";

$result = $conn->query($sql);

$student = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $student[] = $row;
    }
}

echo json_encode($student);

$conn->close();



