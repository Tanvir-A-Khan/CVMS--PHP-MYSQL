<?php

include "./database/dbfuntionalities.php";
include "./PHPMailer/send_email.php";

if (!isset($_SESSION)) {
    session_start();
}
$err = "";
if (isset($_POST['pemail'])) {
    echo $_POST['pemail'];
    $_SESSION['$pemail'] = $_POST['pemail'];
    $err = checkemail($_SESSION['$pemail']);
    // echo $err;
    if ($err != "Wrong Email") {
        genandsend($email);
    }
    echo $_SESSION['verification_otp'];

}

if (isset($_POST['otp'])) {
    if ($_POST['otp'] == $_SESSION['verification_otp']) {

        // echo $_POST['otp'];
        header("location:changeparentpass.php");
        $err = 'matched';

    } else {
        $err = 'not matched';
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Re-password</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@100;200;300;400;500;600;700&family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="css/parentrepass.css">
</head>

<body>
    <!-- ---------IMPORTING NAVBAR------------  -->

    <?php include "./shared/navbar.php"; ?>

    <!-- ---------BANNER PART START------------  -->

    <section id="banner">
        <div class="container">
            <h1>Children Vaccine Management System</h1>
            <div class="registrationzone">
                <div class="registrationheader">
                    <h3>Reset your password</h3>

                </div>

                <span style="color:red">
                    <?php echo $err; ?>
                </span>
                <form class="registrationform" action="" method="POST">
                    <input class="registration" name="pemail" type="email"
                        placeholder="<?php echo $_SESSION['$pemail']; ?>"></br>

                    <div class="registrationbtn">

                        <button type="submit" name="sendotp">
                            <p>Send OTP</p>
                        </button>
                    </div>
                </form>
                <form class="registrationform" action="" method="POST">
                    <input class="registration" name="otp" type="number" placeholder="Enter OTP"></br>

                    <div class="registrationbtn">

                        <button type="submit" name="verify">
                            <p>Verify OTP</p>
                        </button>
                    </div>
                </form>




            </div>
        </div>
    </section>

    <!-- ---------BANNER PART END------------  -->

</body>

</html>