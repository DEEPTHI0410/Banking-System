<?php

include 'config.php';


$sql = " SELECT * FROM users ";
$result = $conn->query($sql);
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>User Details</title>
    <link rel="stylesheet" href="css/userDetails.css">
</head>

<body>
    <?php
    include 'navbar.php'
    ?>
    <section>
        <h1>User Details</h1>
        <table>
            <tr>
                <th>User ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Balance</th>
            </tr>

            <?php
            while ($rows = $result->fetch_assoc()) {
            ?>
                <tr>
                    <td><?php echo $rows['id']; ?></td>
                    <td><?php echo $rows['userName']; ?></td>
                    <td><?php echo $rows['email']; ?></td>
                    <td><?php echo $rows['balance']; ?></td>
                </tr>
            <?php
            }
            ?>
        </table>
    </section>
    <?php
    include 'footer.php'
    ?>
</body>

</html>