<?php include 'config.php';


if (isset($_POST['submit'])) {
    $from = $_POST['id'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];

    $sql = "SELECT * from users where id=$from";
    $query = mysqli_query($conn, $sql);
    $sql1 = mysqli_fetch_array($query);
    $sql = "SELECT * from users where id=$to";
    $query = mysqli_query($conn, $sql);
    $sql2 = mysqli_fetch_array($query);

    if (($amount) < 0) {
        echo '<script type="text/javascript">';
        echo ' alert("Can"t transfer negative amount")';
        echo '</script>';
    } else if ($amount > $sql1['balance']) {

        echo '<script type="text/javascript">';
        echo ' alert("Insufficient Balance")';
        echo '</script>';
    } else if ($amount == 0) {

        echo "<script type='text/javascript'>";
        echo "alert('Can't transfer zero')";
        echo "</script>";
    } else if ($sql2['id'] == $sql1['id']) {

        echo '<script type="text/javascript">';
        echo ' alert("Amount cant be transferred between same users")';
        echo '</script>';
    } else {

        $newbalance = $sql1['balance'] - $amount;
        $sql = "UPDATE users set balance=$newbalance where id=$from";
        mysqli_query($conn, $sql);


        $newbalance = $sql2['balance'] + $amount;
        $sql = "UPDATE users set balance=$newbalance where id=$to";
        mysqli_query($conn, $sql);

        $sender = $sql1['userName'];
        $receiver = $sql2['userName'];
        $sql = "INSERT INTO transaction(`sender`, `receiver`, `amount`) VALUES ('$sender','$receiver','$amount')";
        $query = mysqli_query($conn, $sql);

        if ($query) {
            echo "<script> alert('Transaction Successful');
                                     window.location='transferHistory.php';
                           </script>";
        }

        $newbalance = 0;
        $amount = 0;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transfer Money</title>
</head>

<body>

    <?php include 'navbar.php'; ?>

    <form method="post" class="tabletext">

        <div style="margin-top: 110px;height:300px;width:500px;margin-left:500px;">

            <label style="color : black;"><b>Transfer from:</b></label>
            <select name="id" class="form-control" required>
                <option value="" disabled selected>Choose the person to transfer money from</option>
                <?php
                include 'config.php';
                $sql = "SELECT * FROM users";
                $result = mysqli_query($conn, $sql);
                if (!$result) {
                    echo "Error " . $sql . "<br>" . mysqli_error($conn);
                }
                while ($rows = mysqli_fetch_assoc($result)) {
                ?>
                    <option class="table" value="<?php echo $rows['id']; ?>">

                        <?php echo $rows['userName']; ?> - Balance:
                        <?php echo $rows['balance']; ?>

                    </option>
                <?php
                }
                ?>
                <div>


            </select>

            <br><br><br>
            <label style="color : black;"><b>Transfer To:</b></label>
            <select name="to" class="form-control" required>
                <option value="" disabled selected>Choose for whom you want to transfer money</option>
                <?php
                include 'config.php';
                $sql = "SELECT * FROM users";
                $result = mysqli_query($conn, $sql);
                if (!$result) {
                    echo "Error " . $sql . "<br>" . mysqli_error($conn);
                }
                while ($rows = mysqli_fetch_assoc($result)) {
                ?>
                    <option class="table" value="<?php echo $rows['id']; ?>">

                        <?php echo $rows['userName']; ?> - Balance:
                        <?php echo $rows['balance']; ?>

                    </option>
                <?php
                }
                ?>
                <div>
            </select>
            <br><br><br>
            <label style="color : black;"><b>Amount to be transferred:</b></label>
            <input type="number" class="form-control" name="amount" required>
            <br><br>
            <div class="text-center">
                <button class="btn mt-3" name="submit" type="submit" id="myBtn" value="1" style="background-color:#343a40;color:white">Transfer</button>
            </div>

        </div>

    </form>

    <?php include 'footer.php'; ?>


</body>

</html>