<?php
include "./database/dbfuntionalities.php";
if (!isset($_SESSION)) {
  session_start();
}
/// Declaring the SESSIONS for further processing
$centerid = $_SESSION['centerid'];
$centeremail = $centername = $centeraddress = "";


showCenterProfile($centerid, $centername, $centeraddress, $centeremail);

// if (isset($_POST['logout'])) {

//   echo "logout working";
//   session_unset();
//   session_destroy();
//   header("location:homepage.php");

// }

if (isset($_POST['editcenter'])) {
  // echo "working";
  header("location:serviceProviderUpdate.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Service Provider Profile</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@100;200;300;400;500;600;700&family=Roboto:wght@100;300;400;500;700;900&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="css/serviceproviderDashboard.css">
</head>

<body>
  <!-- ---------IMPORTING NAVBAR------------  -->

  <?php include "./shared/navbar.php"; ?>

  <!-- ---------BANNER PART START------------  -->

  <section id="banner">
    <div class="container">
      <h1>Children Vaccination Management System</h1>
      <h3>Center Profile</h3>
      <br><br><br>

      <div class="row">
        <div class="col-lg-2">
          <div class="userdisplay">
            <p>Center ID: </p>
            <p>Center Name: </p>
            <p>Center Address:</p>
            <p>Center Email:</p>

          </div>
          <form method="POST">

            <button class="editbtn" type="submit" name="editcenter"><img src="images/edit.png" alt=""></button>
          </form>

        </div>
        <div class="col-lg-4">
          <div class="userinfodisplay">
            <?php
            echo '<p>' . $centerid . ' </p>';
            echo '<p>' . $centername . '</p>';
            echo '<p>' . $centeraddress . '</p>';
            echo '<p>' . $centeremail . '</p>';
            ?>
          </div>

        </div>

        <!-- <div class="servicedisplay">
        <p>Clinic ID:
          <?php echo $centerid ?>
        </p>
        <p>Clinic name:
          <?php echo $centername ?>
        </p>
        <p>Address:
          <?php echo $centeraddress ?>
        </p>
        <p>Email:
          <?php echo $centeremail ?>
        </p>
      </div> -->

        <div class="servicedo">
          <button class="vaccinemanagbtn" onclick="window.location.href='schedulemanagement.php';">Make Vaccine
            Schedule</button>
          <button class="vaccinestockmanagbtn" onclick="window.location.href='vaccinestockmanagement.php';">Vaccine
            Stock
            Management</button>

        </div>
      </div>
  </section>

  <!-- ---------BANNER PART END------------  -->


</body>

</html>