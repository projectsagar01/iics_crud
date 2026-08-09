<?php

session_start();

if (!isset($_SESSION["user_id"]) || $_SESSION["role"] !== "admin") {
    header("Location: ../auth/login.php");
    exit;
}

require_once "../config/database.php";


/* =========================
   GET STUDENT ID
========================= */

if (!isset($_GET["id"]) || empty($_GET["id"])) {
    die("Student ID is missing.");
}

$id = (int) $_GET["id"];


/* =========================
   UPDATE STUDENT
========================= */

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $name = $_POST["name"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $course = $_POST["course"];


    $sql = "UPDATE students
            SET name = ?, email = ?, username = ?, course = ?
            WHERE id = ?";

    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param(
        "ssssi",
        $name,
        $email,
        $username,
        $course,
        $id
    );


    if ($stmt->execute()) {

        header("Location: students.php");
        exit;

    } else {

        die("Update failed: " . $stmt->error);
    }
}


/* =========================
   GET STUDENT DATA
========================= */

$sql = "SELECT * FROM students WHERE id = ?";

$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}

$stmt->bind_param("i", $id);

$stmt->execute();

$result = $stmt->get_result();


if ($result->num_rows !== 1) {
    die("Student not found.");
}

$student = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Student</title>

</head>

<body>

<h1>Edit Student</h1>


<form method="POST">


    <!-- Name -->

    <label>Name:</label>

    <input
        type="text"
        name="name"
        value="<?php echo htmlspecialchars($student["name"]); ?>"
        required
    >

    <br><br>


    <!-- Email -->

    <label>Email:</label>

    <input
        type="email"
        name="email"
        value="<?php echo htmlspecialchars($student["email"]); ?>"
        required
    >

    <br><br>


    <!-- Username -->

    <label>Username:</label>

    <input
        type="text"
        name="username"
        value="<?php echo htmlspecialchars($student["username"]); ?>"
        required
    >

    <br><br>


    <!-- Course -->

    <label>Course:</label>

    <input
        type="text"
        name="course"
        value="<?php echo htmlspecialchars($student["course"]); ?>"
        required
    >

    <br><br>


    <button type="submit">
        Update Student
    </button>

</form>


<br>

<a href="students.php">
    Back to Students
</a>

</body>

</html>
