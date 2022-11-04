<?php
session_start();
$mysqli = require __DIR__ . "\database.php";
$firstName = $_POST["firstName"];
$lastName = $_POST["lastName"];
$amount = $_POST["amount"];
$fundId = $_POST['fundId'];
$result1 = mysqli_query($mysqli, "SELECT * FROM fundraisers WHERE id = $fundId");
$row = mysqli_fetch_array($result1);
$amountIn = $amount + $row["amount"];

$sql1 = "INSERT INTO donors (firstName, lastName, fundId, amount)
    VALUES (?, ?, ?, ?)";

$stmt1 = mysqli_stmt_init($mysqli);

if (! mysqli_stmt_prepare($stmt1, $sql1)) {
    die(mysqli_error($mysqli));
}

mysqli_stmt_prepare($stmt1, $sql1);
mysqli_stmt_bind_param($stmt1, "ssii", $firstName, $lastName, $fundId, $amount);
mysqli_stmt_execute($stmt1);

$sqlInsert = "UPDATE fundraisers SET amount=? WHERE id = $fundId";
$stmt = mysqli_stmt_init($mysqli);
mysqli_stmt_prepare($stmt, $sqlInsert);
mysqli_stmt_bind_param($stmt, "i", $amountIn);
mysqli_stmt_execute($stmt);
header("Location: /index.php");