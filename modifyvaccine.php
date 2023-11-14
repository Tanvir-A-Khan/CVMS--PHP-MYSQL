<?php
include "./database/dbfuntionalities.php";
if (!isset($_SESSION)) {
    session_start();
}


$vaccineid = $_SESSION['vaccineid'];
$centerid = $_SESSION['centerid'];
$vaccinename = "";
$vaccineamount = "";
$vaccinemanufacturer = "";
$vaccineagelimit = "";
$vaccineprice = "";
$vaccinedose = "";
$vaccinedescription = "";

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

$err = "";

// Update the vaccine database 
if (isset($_GET['submit'])) {

    $centerid = $_SESSION['centerid'];
    $vaccinename = $_GET['vaccinename'];
    $vaccineamount = $_GET['vaccineamount'];
    $vaccinemanufacturer = $_GET['vaccinemanufacturer'];
    $vaccineagelimit = $_GET['vaccineagelimit'];
    $vaccineprice = $_GET['vaccineprice'];
    $vaccinedose = $_GET['vaccinedose'];
    $vaccinedescription = $_GET['vaccinedescription'];

    $err = updatevaccine(
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

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Vaccine</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@100;200;300;400;500;600;700&family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="css/addvaccine.css">
</head>

<body>
    <!-- ---------IMPORTING NAVBAR------------  -->

    <?php include "./shared/navbar.php"; ?>

    <!-- ---------BANNER PART START------------  -->

    <section id="banner">
        <div class="container">
            <h1>Children Vaccine Management System</h1>
            <h3>Modify Vaccine Information</h3>
            <br><br><br>
            <div class="straightline"></div>
            <div class="straightlinet"></div>

            <div class="vaccinestocktable">
                <form action="" method="GET">
                    <table>
                        <tr class="header">
                            <th>Field</th>
                            <th>Input</th>
                        </tr>
                        <tr class="bodytable">
                            <th>Vaccine Name</th>
                            <th><input name="vaccinename" value="<?php echo $vaccinename; ?>" required></input></th>
                        </tr>
                        <tr class="bodytable">
                            <th>Manufacture</th>
                            <th><input name="vaccinemanufacturer" value="<?php echo $vaccinemanufacturer; ?>"
                                    required></input></th>
                        </tr>
                        <tr class="bodytable">
                            <th>Amount</th>
                            <th><input type="number" name="vaccineamount" value="<?php echo $vaccineamount; ?>"
                                    required></input></th>
                        </tr>
                        <tr class="bodytable">
                            <th>Age Limit</th>
                            <th><input type="number" name="vaccineagelimit" value="<?php echo $vaccineagelimit; ?>"
                                    required></input>
                            </th>
                        </tr>
                        <tr class="bodytable">
                            <th>Price</th>
                            <th><input type="number" name="vaccineprice" value="<?php echo $vaccineprice; ?>"
                                    required></input></th>
                        </tr>
                        <tr class="bodytable">
                            <th>Dose</th>
                            <th><input type="number" name="vaccinedose" value="<?php echo $vaccinedose; ?>"
                                    required></input></th>
                        </tr>
                        <tr class="bodytable">
                            <th>Details</th>
                            <th><input name="vaccinedescription" value="<?php echo $vaccinedescription; ?>"></input>
                            </th>
                        </tr>
                        <tr>
                            <span style="color:red">
                                <?php echo $err; ?>
                            </span>
                        </tr>
                    </table>
                    <div class="sbutton">


                        <input type="submit" name="submit" value="Update">

                    </div>

                </form>

            </div>


        </div>

    </section>

    <!-- ---------BANNER PART END------------  -->


</body>

</html>