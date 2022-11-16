<?php
session_start();
$mysqli = require __DIR__ . "\database.php";

$userId = $_POST["userId"];
$oldPass = $_POST["oldPass"];
$newPass2 = $_POST["newPass2"];
$newPassNoHash = $_POST["newPass1"];
$newPass = password_hash($_POST["newPass1"], PASSWORD_DEFAULT);

function userCheck1($sqliThing2, $inId, $inPass) {
    $result = mysqli_query($sqliThing2, "SELECT password FROM login_info WHERE id='$inId'");
    $num_rows = mysqli_fetch_array($result);
    return password_verify($inPass, $num_rows["password"]);
}

function passCheck($inPass1, $inPass2) {
    if (!(strlen($inPass1) >= 8)) {
        return false;
    }
    
    else if (!(preg_match('/[A-Z]/', $inPass1) > 0)) {
        return false;
    }

    else if (!(preg_match('/\W/', $inPass1) > 0)) {
        return false;
    }
    
    else if (!(preg_match('/[a-z]/', $inPass1) > 0)) {
        return false;
    }
    
    else if (!(preg_match('`[0-9]`',$inPass1) > 0)) {
        return false;
    }

    else if ($inPass1 != $inPass2) {
        return false;
    }

    else {
        return true;
    }
}

if (userCheck1($mysqli, $userId, $oldPass)) {
    if (passCheck($newPassNoHash, $newPass2)) {
        $sqlInsert = "UPDATE login_info SET password=? WHERE id=?";
        $stmt = mysqli_stmt_init($mysqli);
        if (! mysqli_stmt_prepare($stmt, $sqlInsert)) {
            die(mysqli_error($mysqli));
        }
        mysqli_stmt_bind_param($stmt, "si", $newPass, $userId);
        mysqli_stmt_execute($stmt);
        header("Location: /index.php");
    }
    else {
        //header("Location: /bad-resetpass.html");
        header("Location: /bad-newpass.php");
    }
}
else {
    header("Location: /bad-oldpass.php");
}