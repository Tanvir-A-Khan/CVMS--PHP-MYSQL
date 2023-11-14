<?php

include "./database/dbfuntionalities.php";
include "./PHPMailer/send_email.php";

if (!isset($_SESSION)) {
    session_start();
}
echo $_SESSION['$pemail'];

if (isset($_POST['submit'])) {
    echo 'password has been changed';
    // resetParentPass($pemail, $_POST['p1']);
    header("location:repassSuccess(P).php");
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

                <form class="registrationform" action="" method="POST">
                    <input class="registration" name="p1" type="text" placeholder="Enter new password" required></br>
                    <!-- <input class="registration" name="p2" type="text" placeholder="Reenter new password" required></br> -->

                    <div class="registrationbtn">
                        <button type="submit" name="submit">
                            <p>Change Paassword</p>
                        </button>
                    </div>
                </form>

                <span style="color:red">
                    <?php echo $err; ?>
                </span>

            </div>
        </div>
    </section>

    <!-- ---------BANNER PART END------------  -->

</body>

</html>