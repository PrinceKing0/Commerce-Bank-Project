<?php

$loginName = $_POST["loginName"];
$loginPw = $_POST["loginPw"];
if(isset($_POST["remember"])) {
    $remember = 1;
}
else {
    $remember = 0;
}

$host = "localhost";
$dbname = "classproj_db1";
$username = "root";
$password = "";

$conn = mysqli_connect($host, $username, $password, $dbname);

if (mysqli_connect_errno()) {
    die("Connection error: " . mysqli_connect_error());
}

$sql = "INSERT INTO login_info (username, password, remember)
    VALUES (?, ?, ?)";

$stmt = mysqli_stmt_init($conn);

if (! mysqli_stmt_prepare($stmt, $sql)) {
    die(mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "ssi", $loginName, $loginPw, $remember);

mysqli_stmt_execute($stmt);

echo "Record Saved";

?>