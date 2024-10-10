<?Php
include('dbConnection.php');

$id = $_GET['id'];
// echo $id;

$sql = "SELECT * FROM `student` WHERE id=$id";

$result = $conn->query($sql);

$student = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $student[] = $row;
    }
}

echo json_encode($student);

$conn->close();


?>

