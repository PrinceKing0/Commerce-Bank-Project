<?php
session_start();
$mysqli = require __DIR__ . "\database.php";
$sql = sprintf("SELECT * FROM login_info WHERE username = '%s'", $mysqli->real_escape_string($_POST["email"]));
$isInvalid = false;

function otpCheck($sqliThing) {
    $tempOtp = rand(100,999);
    $result = mysqli_query($sqliThing, "SELECT * FROM otp_table WHERE otp='$tempOtp'");
    $num_rows = mysqli_num_rows($result);
    if ($num_rows) {
        otpCheck($sqliThing);
    }
    else {
        return $tempOtp;
    }
}

function userCheck($sqliThing, $userArr) {
    $tempOtp = rand(100,999);
    $result = mysqli_query($sqliThing, "SELECT * FROM otp_table WHERE userId='$userArr[id]'");
    $num_rows = mysqli_num_rows($result);
    if ($num_rows) {
        return true;
    }
    else {
        return false;
    }
}

$result = $mysqli->query($sql);
$user = $result->fetch_assoc();
$otp = otpCheck($mysqli);

if (!$user) {
    $isInvalid = true;
}

if ($isInvalid) {
    header("Location: /otp-wrong.html");
}
else {
    $userId = $user["id"];
    $mailTo = $user["username"];
    $subject = "OTP";
    $body = "WARNING, this one time passcode lasts until it is used.
    $otp";
    $headers = "From:test1@localhost";
    if (mail($mailTo, $subject, $body, $headers)) {
        if (userCheck($mysqli, $user)) {
            $sqlInsert = "UPDATE otp_table SET otp=? WHERE userId=?";
            $stmt = mysqli_stmt_init($mysqli);
            if (! mysqli_stmt_prepare($stmt, $sqlInsert)) {
                die(mysqli_error($mysqli));
            }
            mysqli_stmt_bind_param($stmt, "ii", $otp, $userId);
            mysqli_stmt_execute($stmt);
        }
        else {
            $sqlInsert = "INSERT INTO otp_table (userId, otp)
            VALUES (?, ?)";
            $stmt = mysqli_stmt_init($mysqli);
            if (! mysqli_stmt_prepare($stmt, $sqlInsert)) {
                die(mysqli_error($mysqli));
            }
            mysqli_stmt_bind_param($stmt, "ii", $userId, $otp);
            mysqli_stmt_execute($stmt);
        }
    }
    else {
        echo "fail";
    }
}