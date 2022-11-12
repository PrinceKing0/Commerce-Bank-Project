<?php
session_start();
$mysqli = require __DIR__ . "\database.php";

$userId = $_POST["userId"];
$email = $_POST["newMail"];
$lName = $_POST["newLName"];
$fName = $_POST["newFName"];

if (strlen($email) != 0) {
    $sqlInsert1 = "UPDATE login_info SET username=? WHERE id=?";
    $stmt1 = mysqli_stmt_init($mysqli);
    if (! mysqli_stmt_prepare($stmt1, $sqlInsert1)) {
        die(mysqli_error($mysqli));
    }
    mysqli_stmt_bind_param($stmt1, "si", $email, $userId);
    mysqli_stmt_execute($stmt1);
    header("Location: /index.php");
}

if (strlen($lName) != 0) {
    $sqlInsert2 = "UPDATE login_info SET lastName=? WHERE id=?";
    $stmt2 = mysqli_stmt_init($mysqli);
    if (! mysqli_stmt_prepare($stmt2, $sqlInsert2)) {
        die(mysqli_error($mysqli));
    }
    mysqli_stmt_bind_param($stmt2, "si", $lName, $userId);
    mysqli_stmt_execute($stmt2);
    header("Location: /index.php");
}

if (strlen($fName) != 0) {
    $sqlInsert3 = "UPDATE login_info SET firstName=? WHERE id=?";
    $stmt3 = mysqli_stmt_init($mysqli);
    if (! mysqli_stmt_prepare($stmt3, $sqlInsert3)) {
        die(mysqli_error($mysqli));
    }
    mysqli_stmt_bind_param($stmt3, "si", $fName, $userId);
    mysqli_stmt_execute($stmt3);
    header("Location: /index.php");
}

if ((strlen($fName) == 0) && (strlen($lName) == 0) && (strlen($email) == 0)) {
    header("Location: /settings.php");
}

/*if (passCheck($newPassNoHash, $newPass2)) {
    $sqlInsert = "UPDATE login_info SET password=? WHERE id=?";
    $stmt = mysqli_stmt_init($mysqli);
    if (! mysqli_stmt_prepare($stmt, $sqlInsert)) {
        die(mysqli_error($mysqli));
    }
    mysqli_stmt_bind_param($stmt, "si", $newPass, $userId);
    mysqli_stmt_execute($stmt);
    echo "Success!";
}*/