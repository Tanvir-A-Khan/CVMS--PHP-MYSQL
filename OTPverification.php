<?php
include "./database/dbfuntionalities.php";
include "./PHPMailer/send_email.php";

if (!isset($_SESSION)) {
  session_start();
}
$fathersname = $_SESSION["fathersname"];
$mothersname = $_SESSION["mothersname"];
$email = $_SESSION["email"];
$address = $_SESSION["address"];
$mobile = $_SESSION["mobile"];
$nid = $_SESSION["nid"];
$password1 = $_SESSION["password1"];


if ($_SESSION['landed'] == false) {
  genandsend($email);
  $_SESSION['landed'] = true;
}

$verification_otp = $_SESSION['verification_otp'];
// echo $verification_otp . ' <br> ';

// sendotp($email, $verification_otp);

// $err = parentReg($fathersname, $mothersname, $address, $email, $mobile, $nid, $password1);

$err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $inp = $_POST["otp"];

  // if(isset())
  if (isset($_POST["resend"])) {
    genandsend($email);
  } elseif ($inp != $verification_otp) {
    // echo $inp;

    echo "OTP didn't matched";

  } else {
    parentReg($fathersname, $mothersname, $address, $email, $mobile, $nid, $password1);

    // Clearing all the sessions
    session_destroy();
    // Headed towards congratulations page
    header("location:accountcreated.php");
  }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Verification</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@100;200;300;400;500;600;700&family=Roboto:wght@100;300;400;500;700;900&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="css/verification.css">
</head>

<body>


  <!-- ---------BANNER PART START------------  -->

  <section id="banner">
    <div class="container">
      <h1>Children Vaccine Management System</h1>
      <div class="verification">
        <h3>Verification Code</h3>
        <p>Please enter the verification code sent to <b>
            <?php echo $email; ?>
          </b></p>
        <div class="vericode">
          <form action="" method="POST">

            <input class="codeno" type="number" name="otp">

        </div>
        <div class="resendOTP">
          <p>Didn’t receive any OTP? <br><br>
            <!-- <a href="OTPverification.php">Resend OTP?</a> -->
            <button type="submit" name="resend"> Resend OTP </button>
          </p>
        </div>
        <button class="submitbtn" type="submit">Submit</button>
        </form>
      </div>
    </div>
  </section>

  <!-- ---------BANNER PART END------------  -->

</body>

</html>