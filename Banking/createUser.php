<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/createU.css">
    <title>Creating User</title>
</head>

<body>
    <header>
        <?php
        include 'navbar.php'
        ?>

    </header>

    <section>
        <div class="main" style="margin-top: 140px;width: 80%;margin-left:150px">
            <div class="row m-5 no-gutters shadow-lg">
                <div class="col-md-6 d-none d-md-block">
                    <img src="images/person2.png" alt="person" class="img-fluid" style="height:70%;width:50%;margin-left:130px;margin-top:50px" />
                </div>
                <div class="col-md-6 bg-white p-5">
                    <h4 class="pb-3">Create User</h4>
                    <div class="form-style">
                        <form action="insert.php" method="POST">
                            <div class="form-group pb-3">
                                <input type="text" placeholder="Enter Username" name="userName" class="form-control">
                            </div>
                            <div class="form-group pb-3">
                                <input type="email" placeholder="Enter your Email ID" class="form-control" name="email" aria-describedby="emailHelp">
                            </div>
                            <div class="form-group pb-3">
                                <input type="number" placeholder="Balance" name="balance" class="form-control">
                            </div>
                            <div class="pb-2">
                                <button type="submit" class="btn btn-dark w-100 font-weight-bold mt-2">Submit</button>
                            </div>
                        </form>


                    </div>

                </div>
            </div>
        </div>


    </section>

    <footer>
        <?php
        include 'footer.php'
        ?>

    </footer>

</body>

</html>