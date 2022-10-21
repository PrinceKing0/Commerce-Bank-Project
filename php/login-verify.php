<?php
session_start();
$mysqli = require __DIR__ . "\database.php";
$sql = sprintf("SELECT * FROM login_info WHERE username = '%s'", $mysqli->real_escape_string($_POST["loginName"]));
$isInvalid = false;

$result = $mysqli->query($sql);
$user = $result->fetch_assoc();

if ($user) {
    if (!(password_verify($_POST["loginPw"], $user["password"]))) {
        $isInvalid = true;
    }
}
else {
    $isInvalid = true;
}

if ($isInvalid) {
    header("Location: /login-invalid.html");
    exit();
}

$_SESSION["user_id"] = $user["id"];
header("Location: /index.php");