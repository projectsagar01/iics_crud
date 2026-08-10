<?php
$conn = new mysqli("localhost", "root", "", "php");
if ($conn->connect_failed){
    die("database connection failed: " . $conn->connect_error);
}else{
    echo "Database connected Successfully";
}
?>