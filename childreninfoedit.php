<?php
include "./database/dbfuntionalities.php";

if (!isset($_SESSION)) {
    session_start();
}

$err = "";

// variables to get the values [using pass by refference]
$cname = "";
$cbp = "";
$cdob = "";
$pid = "";

// echo $_SESSION['CID'];

/// Getting the values for the placeholders
getChildren($_SESSION['CID'], $cname, $cbp, $cdob, $pid);


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // echo $_POST['cname'] . $_POST['cbirthplace'] . $_POST['cbirthdate'];
    if (isset($_POST['logout'])) {

        session_unset();
        session_destroy();
        header("location:homepage.php");

    } else {
        childrenUpdate($_SESSION['CID'], $_POST['cname'], $_POST['cbirthplace'], $_POST['cbirthdate']);

    }

}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Child Information Edit</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@100;200;300;400;500;600;700&family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="css/childreninfoedit.css">
</head>

<body>
    <!-- ---------IMPORTING NAVBAR------------  -->

    <?php include "./shared/navbar.php"; ?>

    <!-- ---------BANNER PART START------------  -->

    <section id="banner">
        <div class="container">
            <h1>Children Vaccine Management System</h1>
            <h3>Profile</h3>
            <br><br><br>

            <div class="childinfoedit">
                <form method="POST">
                    <h3>Children Profile Edit</h3>

                    <label class="form-label"><b>Child Name</b></label>
                    <input type="text" name="cname" value="<?php echo $cname; ?>" placeholder="Enter Child name"
                        class="form-control" required>

                    <label class="form-label"><b>Birth Place</b></label>
                    <input type="text" name="cbirthplace" value="<?php echo $cbp; ?>" placeholder="Enter Birth Place"
                        class="form-control" required>

                    <label class="form-label"><b>Date of Birth</b></label>
                    <input type="date" name="cbirthdate" value="<?php echo $cdob; ?>" placeholder=" Enter Date of Birth"
                        class="form-control" required>


                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>


        </div>
    </section>

    <!-- ---------BANNER PART END------------  -->


</body>

</html>