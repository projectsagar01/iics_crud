<?php
    session_start();
    if(!isset($_SESSION["user_id"]) || $_SESSION["role"] !== "admin")
        {header("Location: ../auth/login.php");
    exist;
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

<h1>
    Welcome, <?php echo $_SESSION["username"]; ?>
</h1>
        <h1>
            Admin dashboard
            Welcome, Sagar
        </h1>

<div>
    <h1><a href="students.php">all student</a></h1><br>
    <h1><a href="add-student.php">add students</a></h1><br>
    <h1><a href="edit-student.php">edit students</a></h1><br>
    <h1>
        <a href="../auth/logout.php">Logout</a>
    </h1>

</div>
</body>
</html>