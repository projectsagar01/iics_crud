<?php
require_once "database.php";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $course = $_POST["course"];
    echo "connection";
    $sql = "INSERT INTO students (name, email, username, password, course)
        VALUES (?, ?, ?, ?, ?)";


$stmt = $conn->prepare($sql);

if ($stmt) {

    $stmt->bind_param(
        "sssss",
        $name,
        $email,
        $username,
        $password,
        $course
    );

    $stmt->execute();

    echo "Student Added Successfully!<br>";

} else {

    die("Prepare failed: " . $conn->error);

}}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>add</h1>
    <form action="add.php" method="post">
        Name: <input type="text" name="name"><br><br>
        Email: <input type="email" name="email"><br><br>
        Username: <input type="text" name="username"><br><br>
        Password: <input type="password" name="password"><br><br>
        Course: <input type="text" name="course"><br><br>
        <input type="submit" value="Add Student">
    </form>
</body>
</html>