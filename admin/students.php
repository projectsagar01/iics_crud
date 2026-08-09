<?php

session_start();

if (!isset($_SESSION["user_id"]) || $_SESSION["role"] !== "admin") {
    header("Location: ../auth/login.php");
    exit;
}

require_once "../config/database.php";

$sql = "SELECT * FROM students";
$result = $conn->query($sql);

if (!$result) {
    die("Query Error: " . $conn->error);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students</title>
</head>

<body>

<h1>Students</h1>

<a href="add-student.php">Add Student</a>

<br><br>

<table border="1">

    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Username</th>
        <th>Course</th>
        <th>Action</th>
    </tr>

    <?php while ($student = $result->fetch_assoc()) { ?>

        <tr>

            <td>
                <?php echo $student["id"]; ?>
            </td>

            <td>
                <?php echo $student["name"]; ?>
            </td>

            <td>
                <?php echo $student["email"]; ?>
            </td>

            <td>
                <?php echo $student["username"]; ?>
            </td>

            <td>
                <?php echo $student["course"]; ?>
            </td>

            <td>

                <a href="edit-student.php?id=<?php echo $student["id"]; ?>">
                    Edit
                </a>

                |

                <a href="delete-student.php?id=<?php echo $student["id"]; ?>">
                    Delete
                </a>

            </td>

        </tr>

    <?php } ?>

</table>

</body>
</html>