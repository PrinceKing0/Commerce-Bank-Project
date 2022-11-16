<?php
session_start();
$mysqli = require __DIR__ . "\database.php";
$otp = $_POST["oneTp"];
$newPassNoHash = $_POST["pWord10"];
$newPass = password_hash($_POST["pWord10"], PASSWORD_DEFAULT);

function otpCheck1($sqliThing, $inOtp) {
    $result = mysqli_query($sqliThing, "SELECT * FROM otp_table WHERE otp='$inOtp'");
    $num_rows = mysqli_num_rows($result);
    if ($num_rows) {
        return($result);
    }
    else {
        return false;
    }
}

function userCheck1($sqliThing2, $inId) {
    $result = mysqli_query($sqliThing2, "SELECT * FROM login_info WHERE id='$inId'");
    $num_rows = mysqli_num_rows($result);
    if ($num_rows) {
        return($result);
    }
    else {
        return false;
    }
}

function passCheck($inPass) {
    if (!(strlen($inPass) >= 8)) {
        return false;
    }
    
    else if (!(preg_match('/[A-Z]/', $inPass) > 0)) {
        return false;
    }

    else if (!(preg_match('/\W/', $inPass) > 0)) {
        return false;
    }
    
    else if (!(preg_match('/[a-z]/', $inPass) > 0)) {
        return false;
    }
    
    else if (!(preg_match('`[0-9]`',$inPass) > 0)) {
        return false;
    }

    else {
        return true;
    }
}

$otpTable = otpCheck1($mysqli, $otp);
if (passCheck($newPassNoHash)) {
    if ($otpTable) {
        $userTable = userCheck1($mysqli, mysqli_fetch_column($otpTable, 1));
        $userTableId = mysqli_fetch_column($userTable, 0);
        if ($userTable) {
            $row = mysqli_fetch_array($userTable);
            $sqlInsert = "UPDATE login_info SET password=? WHERE id=?";
            $stmt = mysqli_stmt_init($mysqli);
            if (! mysqli_stmt_prepare($stmt, $sqlInsert)) {
                die(mysqli_error($mysqli));
            }
            mysqli_stmt_bind_param($stmt, "si", $newPass, $userTableId);
            mysqli_stmt_execute($stmt);
            $sql = "DELETE FROM otp_table WHERE userId='".$userTableId."'";
            mysqli_query($mysqli, $sql);
            header("Location: /login.html");
        }
        else {
            echo "Bad Id";
        }
    }
    else {
        header("Location: /bad-resetotp.html");
    }
}
else {
    //header("Location: /bad-resetpass.html");
    echo $newPassNoHash;
    echo "<br>";
    echo preg_match('/\W/', $newPassNoHash);
}