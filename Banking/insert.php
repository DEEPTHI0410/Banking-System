<!DOCTYPE html>
<html>

<head>
    <title>Creating user</title>
</head>

<body>
    <?php


    $conn = mysqli_connect("localhost", "root", "", "bank");

    if ($conn === false) {
        die("ERROR: Could not connect. "
            . mysqli_connect_error());
    }


    $userName = $_REQUEST['userName'];
    $balance = $_REQUEST['balance'];
    $email = $_REQUEST['email'];


    $sql = "INSERT INTO users VALUES ('0','$userName','$email','$balance')";

    if (mysqli_query($conn, $sql)) {

        echo "<script> alert('The user data is sucessfully stored');
                               window.location='createUser.php';
                     </script>";
    } else {
        echo "ERROR: Hush! Sorry $sql. "
            . mysqli_error($conn);
    }

    mysqli_close($conn);
    ?>

</body>

</html>