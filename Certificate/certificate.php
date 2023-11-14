<?php
include ".././database/dbfuntionalities.php";

if (!isset($_SESSION)) {
  session_start();
}
// if (isset($_SESSION))
//   echo $_SESSION['tvaccineid'];

$tvaccineid = $_SESSION['tvaccineid'];
$cid = "";
$vaccinename = "___";
$vaccinedose = "";
$vaccinedate = "";
$centername = "";
$childname = "";

getCertificate(
  $tvaccineid,
  $cid,
  $vaccinename,
  $vaccinedose,
  $vaccinedate,
  $centername,
  $childname
);


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vaccine Certificate</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      text-align: center;
    }

    .certificate {
      max-width: 500px;
      margin: 0 auto;
      border: 2px solid #333;
      padding: 20px;
      background-color: #f9f9f9;
    }

    .certificate h2 {
      margin-bottom: 10px;
      color: #333;
    }

    .certificate p {
      color: #555;
    }

    .vaccine-info {
      margin-top: 20px;
      font-weight: bold;
    }

    .vaccine-info p {
      margin: 5px 0;
    }
  </style>
</head>

<body>
  <div class="certificate">
    <h2>Vaccine Certificate</h2>
    <p>This certificate is to certify that</p>
    <h3>
      <?php echo $childname; ?>
    </h3>
    <p>has received the vaccine of Dose -
      <?php echo $vaccinedose; ?>:
    </p>
    <div class="vaccine-info">
      <p>Date:
        <?php echo $vaccinedate; ?>
      </p>
      <p>Vaccine Name:
        <?php echo $vaccinename; ?>
      </p>

    </div>
    <p>Authorized by:</p>
    <h3>
      <?php echo $centername; ?>
    </h3>
  </div>
  <button onclick="window.print()">Print this page</button>
</body>

</html>