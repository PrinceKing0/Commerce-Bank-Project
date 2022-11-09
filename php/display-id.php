<?php
session_start();
$mysqli = require __DIR__ . "\database.php";
echo ($_POST['rowId']);
echo "<br>";
$rowId = $_POST['rowId'];
$result = mysqli_query($mysqli, "SELECT * FROM fundraisers WHERE id=$rowId");
$fundraiser = $result->fetch_assoc();
echo ($fundraiser["name"] . " " . $fundraiser["goal"] . " " . $fundraiser["amount"] . "<br>");
?>

<html>
    <body>
        <progress value=<?php echo $fundraiser['amount']?> max=<?php echo $fundraiser['goal']?>>
        </progress>
    </body>
</html>