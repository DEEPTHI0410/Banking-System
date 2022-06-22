<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/userDetails.css">
    <title>Transfer History</title>
</head>

<body>

    <?php
    include 'navbar.php'
    ?>

    <?php
    include 'config.php';
    $sql = " SELECT * FROM transaction ";
    $result = $conn->query($sql);
    $conn->close();
    ?>

    <?php
    include 'footer.php'
    ?>

    <section>
        <h1>Transfer History</h1>

        <table>
            <tr>
                <th>Sender </th>
                <th>Receiver</th>
                <th>Amount</th>

            </tr>

            <?php
            while ($rows = $result->fetch_assoc()) {
            ?>
                <tr>
                    <td><?php echo $rows['sender']; ?></td>
                    <td><?php echo $rows['receiver']; ?></td>
                    <td><?php echo $rows['amount']; ?></td>
                </tr>
            <?php
            }
            ?>
        </table>
    </section>


</body>

</html>