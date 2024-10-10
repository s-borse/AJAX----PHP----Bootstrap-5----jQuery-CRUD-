<?php
include('dbConnection.php');

$id = $_POST['id'];

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

$query = "UPDATE `student` SET `id`='$id',`name`='$name',`email`='$email',`password`='$password' WHERE `id`='$id' ";

if(mysqli_query($conn, $query)){
    echo "update successful";
}else{
    echo "Error";
}

?>