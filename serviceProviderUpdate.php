<?php
include "./database/dbfuntionalities.php";
if (!isset($_SESSION)) {
    session_start();
}

$centeremail = $centername = $centeraddress = "";
$centerid = $_SESSION['centerid'];

showCenterProfile($centerid, $centername, $centeraddress, $centeremail);

$err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['logout'])) {

        session_unset();
        session_destroy();
        header("location:homepage.php");

    } else {

        $err = updatecenter($centerid, $_POST['centername'], $_POST['centeraddress'], $_POST['centeremail']);
        header("location:serviceproviderDashboard.php");
    }


}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Information Edit</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@100;200;300;400;500;600;700&family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="css/parentinfoedit.css">
</head>

<body>
    <!-- ---------IMPORTING NAVBAR------------  -->

    <?php include "./shared/navbar.php"; ?>

    <!-- ---------BANNER PART START------------  -->

    <section id="banner">
        <div class="container">
            <h1>Children Vaccine Management System</h1>
            <!-- <h3>Profile</h3> -->
            <br><br><br>

            <div class="useredit m-auto">
                <header>User Profile Edit</header>
                <span style="color:red">
                    <?php echo $err; ?>
                </span>


                <form class="form" method="POST">
                    <div class="input-box">
                        <label>Center Name</label>
                        <input type="text" name="centername" value='<?php echo $centername; ?>'
                            placeholder="Enter the center name" required />
                    </div>
                    <div class="input-box">
                        <label>Center Address</label>
                        <input type="text" name="centeraddress" value='<?php echo ($centeraddress) ?>'
                            placeholder="Enter center address" required />
                    </div>

                    <div class="input-box">
                        <label>Center Email</label>
                        <input type="email" name="centeremail" value='<?php echo $centeremail ?>'
                            placeholder="Enter center email" required />
                    </div>



                    <button type="submit" name="update">Update</button>
                </form>
            </div>


        </div>
    </section>

    <!-- ---------BANNER PART END------------  -->


</body>

</html>