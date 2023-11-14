<!-- SESSION NEEDED - Parent Phone & ID , Login status-->

<?php
include "./database/dbfuntionalities.php";
include "./routing/route.php";

if (!isset($_SESSION)) {
    session_start();
}

$err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pemail = $_POST["pemail"];
    $ppassword = $_POST["ppassword"];


    $err = parentLogin($pemail, $ppassword);
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parents Login</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@100;200;300;400;500;600;700&family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="css/Parentlogin.css">
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

                    <form class="loginform" method="post">
                        <input class="loginno" name="pemail" type="email" placeholder="Enter your email address."
                            required></br>
                        <input class="loginpass" name="ppassword" type="password" placeholder="Enter your password"
                            required><br>
                        <span style="color:red">
                            <?php echo $err; ?>
                        </span>
                        <div class="logindetails">
                            <div class="passforgettext">
                                <a href="parentrepass.php"><u>Forget Password? Click here.</u></a>
                            </div>
                            <div class="loginbtn">
                                <button type="submit">Login</button>
                            </div>
                        </div>
                    </form>

                    <a class="registernow" href="parentreg.php">Registration Now!</a>
                </div>
            </div>


        </div>
    </section>

    <!-- ---------BANNER PART END------------  -->

</body>

</html>