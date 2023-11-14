<?php
include "./database/dbfuntionalities.php";
if (!isset($_SESSION)) {
    session_start();
}
// echo $_SESSION['CID'];

$listofvaccines = showAllDoseWiseVaccineDate($_SESSION['centerid'], $_SESSION['upcomingvaccineid']);

$vaccineid = $_SESSION['upcomingvaccineid'];
$centerid = $_SESSION['centerid'];


$cid = $_SESSION['CID'];
$vaccinename = "1";
$vaccinedose = 1;
$vaccineprice = 12;
$vaccinedate = "2000/12/12";
$centername = "1";
$centeraddress = "1";
$centeremail = "1";
$centeremail = "1";

$vaccineamount = $vaccinemanufacturer = $vaccineagelimit = $vaccinedescription = "";


showCenterProfile(
    $centerid,
    $centername,
    $centeraddress,
    $centeremail
);
showvaccine(
    $centerid,
    $vaccineid,
    $vaccinename,
    $vaccineamount,
    $vaccinemanufacturer,
    $vaccineagelimit,
    $vaccineprice,
    $vaccinedose,
    $vaccinedescription
);

// echo "Center ID: $centerid";
// echo "Vaccine ID: $vaccineid";
// echo "Vaccine Name: $vaccinename";
// echo "Vaccine Amount: $vaccineamount";
// echo "Vaccine Manufacturer: $vaccinemanufacturer";
// echo "Vaccine Age Limit: $vaccineagelimit";
// echo "Vaccine Price: $vaccineprice";
// echo "Vaccine Dose: $vaccinedose";
// echo "Vaccine Description: $vaccinedescription";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $count = $_SESSION['vaccinedose'];

    for ($i = 1; $i <= $count; $i++) {

        addUpcomingVaccineSchedule($cid, $vaccinename, $i, $vaccineprice, $_POST[$i], $centername, "False");

        // echo $cid . '<br>';
        // echo $vaccinename . '<br>';
        // echo $_POST[$i] . '<br>';
        // echo $vaccineprice . '<br>';
        // echo $vaccinedate . '<br>';
        // echo $centername . '<br>';
        // echo $isgiven . '<br>';


    }

    header("Location:schedulemanagement.php");


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
            <h3>Schedule Management</h3>
            <br><br><br>
            <div class="straightline"></div>


            <div class="vaccinestocktable">
                <form action="" method="post">
                    <table>
                        <tr class="header">
                            <th>Dose</th>

                            <th>Vaccine ID</th>
                            <th>Vaccine Name</th>
                            <th>Manufacturer</th>
                            <th>Amount</th>
                            <th>Age Limit</th>
                            <th>Price</th>
                            <th>Details</th>
                            <th>Date</th>


                        </tr>

                        <?php
                        echo $listofvaccines;
                        ?>

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
                    <tr>
                        <button onclick="window.location.href='serviceproviderDashboard.php';">Update Schedule</button>
                    </tr>;
                </form>
            </div>
            <!-- HERE WAS THE button -->


        </div>

    </section>

    <!-- ---------BANNER PART END------------  -->


</body>

</html>