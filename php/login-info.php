<?php

$fName = $_POST["fName"];
$lName = $_POST["lName"];
$loginName = $_POST["eMail"];
$loginPw = password_hash($_POST["pWord"], PASSWORD_DEFAULT);

$host = "localhost";
$dbname = "classproj_db1";
$username = "root";
$password = "";

$conn = mysqli_connect($host, $username, $password, $dbname);

if (mysqli_connect_errno()) {
    die("Connection error: " . mysqli_connect_error());
}

$sql = "INSERT INTO login_info (firstName, lastName, username, password)
    VALUES (?, ?, ?, ?)";

$stmt = mysqli_stmt_init($conn);

if (! mysqli_stmt_prepare($stmt, $sql)) {
    die(mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "ssss", $fName, $lName, $loginName, $loginPw);

mysqli_stmt_execute($stmt);

echo "Record Saved";
//echo $_SERVER['DOCUMENT_ROOT'];
header("Location: /index.html");

?>