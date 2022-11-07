<?php
$mysqli = require __DIR__ . "\database.php";
?>

<html>
    <head>
        <title>Last 10 Results</title>
    </head>
    <body>
        <table>
        <thead>
            <tr>
                <td>Name</td>
                <td>Goal</td>
                <td>Amount</td>
            </tr>
        </thead>
        <tbody>
        <?php
            $results = mysqli_query($mysqli, "SELECT * FROM fundraisers");
            while($row = mysqli_fetch_array($results)) {
            ?>
                <tr>
                    <td>
                        <form action="display-id.php" id="signin" method="post">
                            <button class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;" <a href="#"
                                class="trigger-btn" data-toggle="modal"><?php echo $row['name']?>
                            </button>
                            <input type="hidden" name="rowId" value=<?php echo $row['id']?>>
                        </form>
                    </td>
                    <td><?php echo $row['goal']?></td>
                    <td><?php echo $row['amount']?></td>
                </tr>

            <?php
            }
            ?>
            </tbody>
            </table>
    </body>
</html>