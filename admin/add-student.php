<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $course = $_POST["course"];

    echo $name . "<br>";
    echo $email . "<br>";
    echo $username . "<br>";
    echo $password . "<br>";
    echo $course;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
</head>
<body>

    <h1>Add Student</h1>

    <form action="add-student.php" method="post">

        Name:
        <input type="text" name="name">
        <br><br>

        Email:
        <input type="email" name="email">
        <br><br>

        Username:
        <input type="text" name="username">
        <br><br>

        Password:
        <input type="password" name="password">
        <br><br>

        Course:
        <input type="text" name="course">
        <br><br>

        <input type="submit" value="Add Student">

    </form>

</body>
</html>
