<?php 
include('dbConnection.php');


$id = $_POST['id'];

$sql = "DELETE FROM student WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo json_encode("Record deleted successfully");
} else {
    echo json_encode("Error: " . $conn->error);
}

$conn->close();