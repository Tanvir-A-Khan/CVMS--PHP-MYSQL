<?php
include "./database/dbfuntionalities.php";
if (!isset($_SESSION)) {
    session_start();
}
$err = "";

$listofupcommingvaccines = $cname = $cbirthdate = $cbirthplace = $pid = "";

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    if (isset($_GET['CID'])) {

        $err = getChildren($_GET['CID'], $cname, $cbirthplace, $cbirthdate, $pid);
    }
    if (isset($_GET['ADD'])) {
        header("Location:showvaccinelistforscheduling.php");
    }
}

if (isset($_SESSION['upcomingvaccineid'])) {

    $vid = $_SESSION['upcomingvaccineid'];

}

$_SESSION['upcomingvaccineid'] = NULL;

// echo $_SESSION['CID'];
$listoftakenvaccines = "";

if (isset($_SESSION['CID'])) {

    $listofupcommingvaccines = getUpcomingVaccineSchedule($_SESSION['CID'], "False");
    $err = getChildren($_SESSION['CID'], $cname, $cbirthplace, $cbirthdate, $pid);
    $listoftakenvaccines = getTakenVaccineSchedule($_SESSION['CID']);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // echo 'working';

    foreach ($_POST as $key => $value) {

        $_SESSION['vaccinate'];
        $temp = $key;

        // echo $key;

    }

    // if chilcked on certificate
    if ($temp[0] == 't') {
        $temp = ltrim($temp, $temp[0]);
        $_SESSION['tvaccineid'] = $temp;

        header("Location:Certificate/certificate.php");

        // call gencertificate
        echo $temp;

    } else { /// vaccinate
        $temp = ltrim($temp, $temp[0]);
        $_SESSION['vaccinate'] = $temp;
        vaccinate($_SESSION['vaccinate']);
        header("Refresh:0");

    }

}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vaccine Management</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@100;200;300;400;500;600;700&family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="css/vaccinemanagement.css">
</head>

<body>
    <!-- ---------IMPORTING NAVBAR------------  -->

    <?php include "./shared/navbar.php"; ?>

    <!-- ---------BANNER PART START------------  -->

    <section id="banner">
        <div class="container">
            <h1>Children Vaccine Schedule Management System</h1>
            <h3>Vaccine Schedule Management</h3>
            <br><br><br>

            <div class="search">
                <div class="searchpng">
                    <img src="images/search.png" alt="">
                </div>
                <form action="" method="get">
                    <input type="text" name="CID" class="form-control" placeholder="Search using children ID">
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
                <span style="color:red">
                    <?php echo $err; ?>
                </span>
            </div>

            <div class="straightline"></div>

            <div class="children_info_display">
                <p>Name:
                    <?php
                    echo $cname;
                    ?>
                </p>
                <p>Date of Birth:
                    <?php echo $cbirthdate; ?>
                </p>
                <p>Birth Place:
                    <?php echo $cbirthplace; ?>
                </p>
                <p>Father's Name:
                    <?php echo $pid; ?>
                </p>
                <p>Mother's Name:
                    <?php echo $pid; ?>
                </p>
            </div>

            <!-- ////////////code need to be added here/ -->
            <div class="managementpart">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="takenvaccine">
                            <h6>Taken Vaccine</h6>
                            <div class="takenvaccinetable">
                                <form action="schedulemanagement.php" method="post">

                                    <table>
                                        <tr>
                                            <th>SI No.</th>
                                            <th> Vaccine Name</th>
                                            <th> Dose </th>
                                            <th> Date </th>
                                            <th> Center Name</th>
                                            <th>Certificate</th>
                                        </tr>

                                        <?php
                                        echo $listoftakenvaccines;
                                        ?>

                                    </table>
                                </form>
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="upcomingvaccine">
                            <h6>Up Coming Vaccine</h6>

                            <div class="upcomingvaccinetable">
                                <form action="" method="POST">
                                    <table>
                                        <tr>
                                            <th>SI No.</th>
                                            <th> Vaccine Name</th>
                                            <th> Dose </th>
                                            <th> Price </th>
                                            <th> Date </th>
                                            <th> Center Name</th>
                                            <th> Action </th>
                                        </tr>

                                        <?php
                                        echo $listofupcommingvaccines;
                                        ?>

                                    </table>
                                </form>
                            </div>
                        </div>
                        <form action="" method="GET">
                            <button type="SUBMIT" name="ADD">Add Schedule</button>
                            <a href="./chart.php">Report & Analysis</a>
                        </form>

                    </div>

                </div>
            </div>

        </div>
    </section>

    <!-- ---------BANNER PART END------------  -->


</body>

</html>