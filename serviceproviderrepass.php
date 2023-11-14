<?php
echo " its not updated yet. verification needed to update"
    ?>

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Re-password(SP)</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@100;200;300;400;500;600;700&family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="css/serviceproviderrepass.css">
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
                    <h3>Account's Re-password</h3>
                </div>

                <form class="registrationform" action="">
                    <input class="registration" type="number" placeholder="Center Email"></br>
                    <input class="registration" type="password" placeholder="Set a new password"><br>
                    <input class="registration" type="password" placeholder="Retype your new password"><br>
                    <!-- <input class="registration" type="text" placeholder="Address"></br>
                    <input class="registration" type="text" placeholder="Mobile no."></br>
                    <input class="registration" type="number" placeholder="NID number"><br>
                    <input class="registration" type="password" placeholder="Set a password"><br> -->


                    <div class="registrationbtn">
                        <a href="repassSuccess(P).php">
                            <p>Submit</p>
                        </a>
                    </div>
                </form>

            </div>
        </div>
    </section>

    <!-- ---------BANNER PART END------------  -->

</body>

</html>