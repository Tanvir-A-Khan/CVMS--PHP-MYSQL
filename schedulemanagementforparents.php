<?php
include "./database/dbfuntionalities.php";
if (!isset($_SESSION)) {
    session_start();
}
// echo $_SESSION['CID'];
$err = "";

$listofupcommingvaccines = $cname = $cbirthdate = $cbirthplace = $pid = "";



// echo $_SESSION['CID'];

if (isset($_SESSION['CID'])) {

    $listofupcommingvaccines = getUpcomingVaccineScheduleforparents($_SESSION['CID'], "False");
    $err = getChildren($_SESSION['CID'], $cname, $cbirthplace, $cbirthdate, $pid);
    $listoftakenvaccines = getTakenVaccineScheduleforparents($_SESSION['CID']);
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

            <div class="managementpart">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="takenvaccine">
                            <h6>Taken Vaccine</h6>
                            <div class="takenvaccinetable">
                                <table>
                                    <tr>
                                        <th>SI No.</th>
                                        <th> Vaccine Name</th>
                                        <th> Dose </th>
                                        <th> Date </th>
                                        <th> Center Name</th>
                                        <!-- <th>Certificate</th> -->
                                    </tr>

                                    <?php
                                    echo $listoftakenvaccines;
                                    ?>

                                    <!-- <tr>
                                        <td>1</td>
                                        <td>Peter Parker</td>
                                        <td>1st</td>
                                        <td>50$</td>
                                        <td>02-02-2022</td>
                                        <td>KJP</td>
                                        <td><button style="background: yellow;">Certificate</button></td>
                                    </tr> -->

                                </table>
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
                                            <!-- <th> Action </th> -->
                                        </tr>
                                        <!-- <tr>
                                        <td>1</td>
                                        <td>Peter Parker</td>
                                        <td>1st</td>
                                        <td>50$</td>
                                        <td>02-02-2022</td>
                                        <td>KJP</td>
                                        <td><button style="background: greenyellow;">Vaccinate</button></td>
                                    </tr> -->

                                        <?php
                                        echo $listofupcommingvaccines;
                                        ?>

                                    </table>
                                </form>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </section>
    <form action="" method="post">

        <button type="button" name="nvc">Nearest Vaccination Center</button>

    </form>

    <?php
    $count = 0;
    if (isset($_POST['nvc'])) {
        echo $count;

        if ($count & 1) {
            include './nearestvaccinationcenter.php';
        }

        $count++;


    }

    ?>


    <!-- ---------BANNER PART END------------  -->


</body>

</html>