<?php

include "./database/dbfuntionalities.php";

if (!isset($_SESSION)) {
  session_start();
}

// if(isset($_SESSION["status"])){
//   header("Location:parentprofile.php");

// }

$err = "";

if (isset($_POST['Registration'])) {


  $centername = $_POST['centername'];
  $centeraddress = $_POST['centeraddress'];
  $centeremail = $_POST['centeremail'];
  $p1 = $_POST['p1'];
  $p2 = $_POST['p2'];

  if ($p1 != $p2) {
    $err = "Passwords didn't match";
  } else {
    $err = centerReg($centername, $centeraddress, $centeremail, $p1);

  }


}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parents Registration</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@100;200;300;400;500;600;700&family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="css/serviceproviderreg.css">
</head>

<body>
    <!-- ---------IMPORTING NAVBAR------------  -->

    <?php include "./shared/navbar.php"; ?>

    <!-- ---------BANNER PART START------------  -->

    <section id="banner">
        <div class="container">
            <h1>Children Vaccine Management System</h1>
            <div class="row">
                <div class="col-lg-6">
                    <div class="registrationpart">
                        <div class="registrationdetails">
                            <p>Create a free account for your clinic center to protect from severe or permanently
                                disabling illnesses
                                of children. Have already an account? <a href="serviceproviderlogin.php">Login here</a>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="registrationzone">
                        <div class="registrationheader">
                            <h3>Registration</h3>
                        </div>

                        <form class="registrationform" method="POST">
                            <input class="registration" type="text" name="centername" placeholder="Clinic Name"
                                required><br>
                            <input class="registration" type="text" name="centeraddress" placeholder="Address"
                                required></br>
                            <input class="registration" type="email" name="centeremail" placeholder="Email"
                                required></br>
                            <input class="registration" type="password" name="p2" placeholder="Set a password"
                                required><br>
                            <input class="registration" type="password" name="p1" placeholder="Retype your password"
                                required><br>

                            <?php echo $err; ?>
                            <div class="registrationbtn">
                                <input type="submit" value="Registration" name="Registration">
                            </div>

                            <!-- <a href="verification.php"><p>Registration</p></a> -->
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ---------BANNER PART END------------  -->

</body>

</html>