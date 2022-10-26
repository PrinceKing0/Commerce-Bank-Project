<?php
session_start();
$mysqli = require __DIR__ . "\database.php";
$sql = sprintf("SELECT * FROM login_info WHERE username = '%s'", $mysqli->real_escape_string($_POST["email"]));
echo $sql;