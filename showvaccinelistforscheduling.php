<?php
include "./database/dbfuntionalities.php";
if (!isset($_SESSION)) {
    session_start();
}
// echo $_SESSION['centerid'];

$listofvaccines = showAllVaccinesForSchedule($_SESSION['centerid']);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    foreach ($_POST as $key => $value) {

        $_SESSION['upcomingvaccineid'] = $key;

    }

    // echo $_SESSION['upcomingvaccineid'];
    header("Location:addschedule.php");


}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vaccine Stock Management</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@100;200;300;400;500;600;700&family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="css/vaccinestockmanagement.css">
</head>

<body>
    <!-- ---------IMPORTING NAVBAR------------  -->

    <?php include "./shared/navbar.php"; ?>

    <!-- ---------BANNER PART START------------  -->

    <section id="banner">
        <div class="container">
            <h1>Children Vaccine Management System</h1>
            <h3>Create a vaccine Schedule</h3>
            <br><br><br>
            <div class="straightline"></div>


            <div class="vaccinestocktable">
                <table>
                    <tr class="header">
                        <th>SI No.</th>
                        <th>Vaccine ID</th>
                        <th>Vaccine Name</th>
                        <th>Manufacturer</th>
                        <th>Amount</th>
                        <th>Age Limit</th>
                        <th>Price</th>
                        <th>Dose</th>
                        <th>Details</th>

                        <th>ADD</th>
                    </tr>
                    <form action="" method="post">

                        <?php
                        echo $listofvaccines;
                        ?>
                    </form>

                    <!-- <tr class="bodytable">
                        <th>01</th>
                        <th>0195</th>
                        <th>Hepatitis B</th>
                        <th>Beximco</th>
                        <th>100</th>
                        <th>Birth and Above</th>
                        <th>FREE</th>
                        <th>1</th>
                        <th>Store under 20 degree celcius temprature</th>
                        <th><input type="submit" value="Add"></th>
                    </tr> -->

                </table>
            </div>

            <!-- <button onclick="window.location.href='addvaccine.php';">Add More Vaccine</button> -->


        </div>

    </section>

    <!-- ---------BANNER PART END------------  -->


</body>

</html>