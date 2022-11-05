<?php
session_start();
$mysqli = require __DIR__ . "\database.php";
$userId = $_SESSION["user_id"];
$title = $_POST["title"];
$description = $_POST["description"];
$goal = $_POST["amount"];

$sql1 = "INSERT INTO fundraisers (userId, name, goal, description)
    VALUES (?, ?, ?, ?)";

$stmt1 = mysqli_stmt_init($mysqli);

if (! mysqli_stmt_prepare($stmt1, $sql1)) {
    die(mysqli_error($mysqli));
}

mysqli_stmt_prepare($stmt1, $sql1);
mysqli_stmt_bind_param($stmt1, "ssis", $userId, $title, $goal, $description);
mysqli_stmt_execute($stmt1);
header("Location: /please-close.html");