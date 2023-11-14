<?php
include "./database/dbfuntionalities.php";

if (!isset($_SESSION)) {
    session_start();
}
if (isset($_POST['logout'])) {

    session_unset();
    session_destroy();
    header("location:homepage.php");

}

$err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fathersname = $_SESSION["fathersname"] = $_POST["fathersname"];
    $mothersname = $_SESSION["mothersname"] = $_POST["mothersname"];
    $email = $_SESSION["email"] = $_POST["email"];
    $address = $_SESSION["address"] = $_POST["address"];
    $mobile = $_SESSION["mobile"] = $_POST["mobile"];
    $nid = $_SESSION["nid"] = $_POST["nid"];
    $password1 = $_SESSION["password1"] = $_POST["password1"];
    $password2 = $_POST["password2"];

    if (isset($_POST['submitted'])) {

        if ($password1 != $password2) {

            $err = "Passwords do not match";

        } else {
            // Bypass OTP
            // $err = parentReg($fathername, $mothername, $paddress, $pemail, $pphone, $pnid, $ppassword);

            // check error and send otp to the email
            // if everything all right redirect to OTP verification
            $err = errorCheck($fathersname, $mothersname, $address, $email, $mobile, $nid, $password1);


        }
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
    <link rel="stylesheet" href="css/parentreg.css">
</head>

<body>
    <!-- ---------IMPORTING NAVBAR------------  -->

    <?php include "./shared/navbar.php"; ?>

    <!-- ---------BANNER PART START------------  -->
    <!-- Upload the profile picture -->


    <section id="banner">
        <div class="container">
            <h1>Children Vaccine Management System</h1>
            <div class="row">
                <div class="col-lg-5">
                    <div class="registrationpart">
                        <div class="registrationdetails">
                            <p>Create a free account for your children to protect from severe or permanently disabling
                                illnesses. Have
                                already an account? <a href="Parentlogi.php">Login here</a></p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="registrationzone">
                        <header>Registration Form</header>
                        <form class="form" method="POST">
                            <div class="input-box">
                                <label>Father's Name</label>
                                <input type="text" name="fathersname" placeholder="Enter full name" required />
                            </div>
                            <div class="input-box">
                                <label>Mother's Name</label>
                                <input type="text" name="mothersname" placeholder="Enter full name" required />
                            </div>

                            <div class="input-box">
                                <label>Email Address</label>
                                <input type="text" name="email" placeholder="Enter email address" required />
                            </div>

                            <div class="column">
                                <div class="input-box">
                                    <label>Phone Number</label>
                                    <input type="number" name="mobile" placeholder="Enter phone number" required />
                                </div>
                                <div class="input-box">
                                    <label>NID</label>
                                    <input type="number" name="nid" placeholder="Enter your NID" required />
                                </div>
                            </div>

                            <div class="input-box address">
                                <label>Address</label>
                                <input type="text" name="address" placeholder="Enter your address" required />
                            </div>

                            <div class="input-box">
                                <label>Password</label>
                                <input type="password" name="password1" placeholder="Enter your password" required />
                            </div>

                            <div class="input-box">
                                <label>Confirm Password</label>
                                <input type="password" name="password2" placeholder="Re-enter your password" required />
                            </div>

                            <span style="color:red">
                                <?php echo $err; ?>
                            </span>

                            <button type="submit" name="submitted">Submit</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- ---------BANNER PART END------------  -->

</body>

</html>