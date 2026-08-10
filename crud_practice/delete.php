<?php
require_once "database.php";
$id = $_GET['id'];
$sql = "DELETE FROM students WHERE id = ?";
if($conn->query($sql)){
    echo "data delete sucessfylly";
    header("Location: view.php");
    exit;
}else{
    echo "data delete failed: " . $conn->error;
}

?>