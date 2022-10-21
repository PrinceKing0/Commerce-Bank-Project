<?php

$fName = $_POST["fName"];
$lName = $_POST["lName"];
$loginName = $_POST["eMail"];
$loginPw = $_POST["pWord"];
$loginPw2 = $_POST["pWordDup"];
$loginPwHash = password_hash($_POST["pWord"], PASSWORD_DEFAULT);

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

mysqli_stmt_bind_param($stmt, "ssss", $fName, $lName, $loginName, $loginPwHash);

if (!(strlen($loginPw) >= 8)) {
    header("Location: /signin-passinvalid.html");
}

else if (!(preg_match('/[A-Z]/', $loginPw) > 0)) {
    header("Location: /signin-passinvalid.html");
}

else if (!(preg_match('/[a-z]/', $loginPw) > 0)) {
    header("Location: /signin-passinvalid.html");
}

else if (!(preg_match('`[0-9]`',$loginPw) > 0)) {
    header("Location: /signin-passinvalid.html");
}

else if ($loginPw != $loginPw2) {
    header("Location: /signin-passinvalid.html");
}

else {
    try {
        mysqli_stmt_execute($stmt);
        echo "Record Saved";
        header("Location: /index.php");
    }
    catch (Exception $e) {
        if ($e->getCode() == 1062) {
            echo "Duplicate entry.", "<br>";
        }
        echo $e->getCode();
    }
}

?>