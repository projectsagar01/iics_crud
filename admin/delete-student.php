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
   DELETE STUDENT
========================= */

$sql = "DELETE FROM students WHERE id = ?";

$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}

$stmt->bind_param("i", $id);


if ($stmt->execute()) {

    header("Location: students.php");
    exit;

} else {

    die("Delete failed: " . $stmt->error);
}