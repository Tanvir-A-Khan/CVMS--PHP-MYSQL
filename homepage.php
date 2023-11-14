<?php
include "./database/dbcreate.php";
if (!isset($_SESSION)) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Children Vaccine Management</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@100;200;300;400;500;600;700&family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="css/homepage.css">
</head>

<body>
    <!-- ---------IMPORTING NAVBAR------------  -->

    <?php include "./shared/navbar.php"; ?>



    <section id="banner">
        <div class="container">
            <div class="col-lg-10 m-auto">
                <div class="banner-details text-center">
                    <h1>Children Vaccine Management System</h1>
                    <p>Vaccines save millions of lives each year and are among the most cost-effective health
                        interventions ever developed. Immunization has led to the eradication of smallpox, an 80 percent
                        reduction in childhood deaths from measles over the past decade and the near-eradication of
                        polio. <br> <br> <br>
                        Despite these great strides, there remains an urgent need to reach all children with life-saving
                        vaccines. One in five children worldwide is not fully protected with even the most basic
                        vaccines. Tens of thousands of other children suffer from severe or permanently disabling
                        illnesses. </p>
                    <div class="banner-btn">
                        <button class="bbtnone" onclick="window.location.href='Parentlogin.php';">
                            Login as Parents
                        </button>
                        <button class="bbtntwo" onclick="window.location.href='serviceproviderlogin.php';">Login as
                            Service Provider</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

</html>