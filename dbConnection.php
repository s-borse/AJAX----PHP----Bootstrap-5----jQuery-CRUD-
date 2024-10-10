<?php

$sevrname = "localhost";
$username = "root";
$password = "";
$dbname = "jqajax";

$conn = new mysqli($sevrname, $username, $password, $dbname);

if($conn->connect_error){
    die(" Connection Failed ");
}

?>