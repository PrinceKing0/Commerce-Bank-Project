<?php
$mysqli = require __DIR__ . "\database.php";
$result1 = mysqli_query($mysqli, "SELECT * FROM fundraisers ORDER BY amount DESC LIMIT 5");
while($row1 = mysqli_fetch_array($result1)) {
    echo print_r($row1);
    echo "<br>";
}
echo "<br> <br>";

$counter = 0;
$result3 = mysqli_query($mysqli, "SELECT * FROM fundraisers ORDER BY amount DESC LIMIT 5");
while($row3 = mysqli_fetch_array($result3)) {
    $goal[] = $row3['amount'];
    echo ($goal[$counter]);
    $counter++;
    echo "<br>";
}
echo "<br> <br>";

$result2 = mysqli_query($mysqli, "SELECT * FROM fundraisers WHERE userId=2");
while($row2 = mysqli_fetch_array($result2)) {
    echo print_r($row2);
    echo "<br>";
}
echo "<br> <br>";