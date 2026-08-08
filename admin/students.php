<?php
session_start();
if(!isset($_SESSION["user_id"]) || $_SESSION["role"] !== "admin"){
    header("Location: ../auth/login.php");
    exit;
    }
    
    require_once "../config/database.php";
$sql = "SELECT * FROM students";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <table  border = "1">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>username</th>
                    <th>Course</th>
                </tr>
        <?php while($student = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $student["id"]; ?></td>
            <td><?php echo $student["name"]; ?></td>
            <td><?php echo $student["email"]; ?></td>
            <td><?php echo $student["username"]; ?></td>
            <td><?php echo $student["course"]; ?></td>
        </tr>
        <?php } ?>
        </table>

</body>
</html>