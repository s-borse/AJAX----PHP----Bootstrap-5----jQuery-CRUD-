<?php

include('dbConnection.php');

$data = stripslashes(file_get_contents("php://input"));
// $mydata = json_decode($data, true);

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

if (!empty($name) && !empty($email) && !empty($password)) {
    $sql = " INSERT INTO `student`( `name`, `email`, `password`) VALUES ('$name','$email','$password') ";
    if ($conn->query($sql) == TRUE) {
        echo "Student Saved Successfully";
    } else {
        echo "Unable to Save Student";
    }
} else {
    echo "Fill All Fields";
}
?>