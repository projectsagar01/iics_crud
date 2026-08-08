<?php
session_start();

require_once "../config/database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $password = $_POST["password"];
    $role = $_POST["role"];

    if ($role == "admin") {

        $sql = "SELECT * FROM admins WHERE username = ?";

        $stmt = $conn->prepare($sql);

        $stmt->bind_param("s", $username);

        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows == 1) {

            $admin = $result->fetch_assoc();

            if ($password == $admin["password"]) {
               
                $_SESSION["user_id"] = $admin["id"];
                $_SESSION["username"] = $admin["username"];
                $_SESSION["role"] = "admin";
                header("Location: ../admin/dashboard.php");
            echo "Admin Login Successful!";


            } else {
                echo "Wrong Password!";
            }

        } else {
            echo "USERNAME NOT FOUND!";
        }

    } else {
        echo "Student Login abhi nahi banaya.";
    }
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="login.php" method="post">
        username: <input type="text" name="username"><br>
        password: <input type="password" name="password"><br>
        <select name="role" id="role">
            <option value="student">Student</option>
            <option value="admin">Admin</option>
        </select>


        <input type="submit" value="login">

    </form>
</body>
</html>