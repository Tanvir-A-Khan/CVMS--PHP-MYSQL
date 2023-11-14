<!-- SESSION NEEDED -  Center ID, Login Status -->

<?php

include "./database/dbfuntionalities.php";
include "./routing/route.php";

if (!isset($_SESSION)) {
    session_start();
}

$err = "";

// checking if the login is pressed with both input
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "working";
    $centerpassword = $_POST["password"];
    $centeremail = $_POST["email"];
    // storing the status message after doing the DB operation
    $err = centerLogin($centeremail, $centerpassword);

}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service Provider Login</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@100;200;300;400;500;600;700&family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="css/serviceproviderlogin.css">
</head>

<body>
    <!-- ---------IMPORTING NAVBAR------------  -->

    <?php include "./shared/navbar.php"; ?>

    <!-- ---------BANNER PART START------------  -->

    <section id="banner">
        <div class="container">
            <div class="col-lg-8 m-auto">
                <h1>Children Vaccine Management System</h1>
                <div class="loginzone">
                    <form class="loginform" method="POST">
                        <input class="loginno" type="email" name="email" placeholder="Center Email" required></br>
                        <input class="loginpass" type="password" name="password" placeholder="Enter your password"
                            required><br>
                        <span style="color:red">
                            <?php echo $err; ?>
                        </span>
                        <div class="logindetails">
                            <div class="passforgettext">
                                <a href="serviceproviderrepass.php"><u>Forget Password? Click here.</u></a>
                            </div>

                            <div class="loginbtn">
                                <button type="submit">Login</button>
                            </div>
                    </form>

                    <!-- <a href="..."><p>Login</p></a> -->
                </div>
                <a class="registernow" href="serviceproviderreg.php">Registration Now!</a>
            </div>
            <!-- <div class="footerpart">
                <div class="straightline"></div>
            </div> -->
        </div>


        </div>
    </section>

    <!-- ---------BANNER PART END------------  -->

</body>

</html>