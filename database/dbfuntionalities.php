<!-- 

CREATED BY  - TANVIR AHMED KHAN
DATE        - 08/2023
DURATION    - 2 WEEKS 

-->

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "CVMS";

// <-- -------------- ADDING FUNCTIONALITIES ADDING FUNCTIONALITIES ADDING FUNCTIONALITIES ADDING FUNCTION ALITIESADDING FUNCTIONALITIES ----------- -->


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//                                              PARENT FUNCTIONALITIES 
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/// ALL SESSIONS WILL BE HANDLED HERE
if (!isset($_SESSION)) {
  session_start();
}


// Connecting Variable___________________________________________
$conn = new mysqli($servername, $username, $password, $dbname);

function errorCheck($fathername, $mothername, $paddress, $pemail, $pphone, $pnid, $ppassword)
{

  $sql = "SELECT pid FROM Parents WHERE pemail='$pemail'";
  $result = $GLOBALS['conn']->query($sql);

  if ($result->num_rows > 0) {
    return "Email already exists";
  }

  $sql = "SELECT pid FROM Parents WHERE pphone='$pphone'";
  $result = $GLOBALS['conn']->query($sql);
  if ($result->num_rows > 0) {
    return "Phone number already exists";
  }


  $sql = "SELECT pid FROM Parents WHERE pnid='$pnid'";
  $result = $GLOBALS['conn']->query($sql);
  if ($result->num_rows > 0) {
    return "NID already exists";
  }
  $_SESSION['landed'] = false;
  header("Location:OTPverification.php");


}


// ROUTED
function parentReg($fathername, $mothername, $paddress, $pemail, $pphone, $pnid, $ppassword)
{

  $sql = "SELECT pid FROM Parents WHERE pemail='$pemail'";
  $result = $GLOBALS['conn']->query($sql);

  if ($result->num_rows > 0) {
    return "Email already exists";
  }

  $sql = "SELECT pid FROM Parents WHERE pphone='$pphone'";
  $result = $GLOBALS['conn']->query($sql);
  if ($result->num_rows > 0) {
    return "Phone number already exists";
  }

  $sql = "SELECT pid FROM Parents WHERE pnid='$pnid'";
  $result = $GLOBALS['conn']->query($sql);
  if ($result->num_rows > 0) {
    return "NID already exists";
  }

  $sql = "INSERT INTO Parents (fathername, mothername, 
  paddress, pemail, pphone, pnid, ppassword)
  VALUES ('$fathername','$mothername', '$paddress','$pemail','$pphone','$pnid','$ppassword')";


  if ($GLOBALS['conn']->query($sql) === TRUE) {
    header("Location:Parentlogin.php");
    return "Registration Successful";
  }
  return "Registration Unsuccessful";

}

// parentReg("AH RONY","Rehnuma Ferdous","Dhaka","ahrony@gmail.com","012345","1234567789","LOVEBIRDS");

// ROUTED
function parentLogin($pemail, $ppassword)
{
  $sql = "SELECT ppassword, pid FROM Parents WHERE pemail='$pemail'";
  $result = $GLOBALS['conn']->query($sql);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if ($row['ppassword'] === $ppassword) {

      // MEMORISING THE VARIABLES USING SESSION

      $_SESSION["pid"] = $row['pid'];

      $_SESSION["stat"] = "parent";

      header("Location:parentprofile.php");
      return "Login Successful";

    } else {
      return "Wrong Password";
    }
  } else {
    return "Phone number doesnt existis";
  }

}
function checkemail($pemail)
{
  $sql = "SELECT * FROM Parents WHERE pemail='$pemail'";
  $result = $GLOBALS['conn']->query($sql);

  if ($result->num_rows == 0) {

    return "Wrong Email";
  }

}

// ROUTED
// parentLogin("redgmail","LOVEBIRDS");
$conn = new mysqli($servername, $username, $password, $dbname);
function parentUpdate($fathername, $mothername, $paddress, $pphone, $pnid, $pid)
{
  $sql = "SELECT pid FROM Parents WHERE pphone='$pphone'";
  $result = $GLOBALS['conn']->query($sql);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if ($row['pid'] != $pid)
      return "Phone number already in use";
  }

  $sql = "SELECT pid FROM Parents WHERE pnid='$pnid'";
  $result = $GLOBALS['conn']->query($sql);
  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if ($row['pid'] != $pid)
      return "NID already in use";
  }

  $sql = "UPDATE Parents SET fathername='$fathername', mothername='$mothername', paddress='$paddress', pphone='$pphone', pnid='$pnid'  WHERE pid='$pid' ";

  if ($GLOBALS['conn']->query($sql) === TRUE) {

    header("Location:parentprofile.php");
    return "Record Updated";
  }
  return "Unable to Update";

}

// parentEdit("Redwan Hasan Mollik","Jui Jahan Ritu","Dhaka","redgmail","012345","1234567789","LOVEBIRDS",1);


// ROUTED
function resetParentPass($pemail, $ppassword)
{

  $sql = "SELECT pid FROM Parents WHERE pemail='$pemail'";
  $result = $GLOBALS['conn']->query($sql);
  if ($result->num_rows == 0) {
    return "Email doesn't exists";
  }



  $sql = "UPDATE Parents SET ppassword = '$ppassword' WHERE pemail='$pemail'";
  if ($GLOBALS['conn']->query($sql) === TRUE) {
    header("Location:parentprofile.php");
    return "Record Updated";
  } else {
    return "Unable to Update due to technical error";
  }
}

// No routing needed
function getParentProfile(&$fathersname, &$mothersname, &$paddress, &$pemail, &$pnid, &$pphone, &$pid)
{

  $sql = "SELECT fathername, mothername, paddress, pemail, pnid, pphone  FROM Parents WHERE pid='$pid'";

  // storing the result of the query in the query variable
  $result = $GLOBALS['conn']->query($sql);
  // converting the result into an array
  $row = $result->fetch_assoc();

  $fathersname = $row['fathername'];
  $mothersname = $row['mothername'];
  $paddress = $row['paddress'];
  $pemail = $row['pemail'];
  $pnid = $row['pnid'];
  $pphone = $row['pphone'];

}
// getParentProfile($fathersname,$mothersname,$paddress,$pemail,$pnid,$pphone,$pid);


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//                                              CHILDREN FUNCTIONALITIES FOR PARENTS
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


// Routed
// ADDING CHILDREN TO THE DB
function addChildren($pid, $cname, $cbirthplace, $cbirthdate)
{

  $sql = "INSERT INTO Childrens (pid, cname, cbirthplace, cbirthdate)
  VALUES ('$pid','$cname','$cbirthplace','$cbirthdate')";

  if ($GLOBALS['conn']->query($sql) === TRUE) {
    header("Location:parentprofile.php");
    echo "New record created successfully<br>";
  } else {
    echo "Error: " . $sql . "<br>" . $GLOBALS['conn']->error;
  }
}


// NO ROUTING NEEDED
function showChildrenList($pid)
{

  $sql = "SELECT cid,cname, cbirthplace, cbirthdate  FROM Childrens WHERE pid='$pid' ORDER BY cbirthdate ASC";

  $result = $GLOBALS['conn']->query($sql);
  // converting the result into an array
  // $row = $result->fetch_assoc();

  $count = 1;

  $listofchildren = "";


  // output data of each row
  while ($row = $result->fetch_assoc()) {

    // twoc
    $listofchildren .= '<div class="';


    // for adding different backgroud CSS
    $case = "onec";

    if ($count % 2 == 1) {
      $case = "twoc";
    }

    $listofchildren .= $case;

    $listofchildren .= '"><div class="onectext"> <h6>';

    $listofchildren .= $count++ . ". " . $row["cname"] . '</h6>
        <p>' . "CID: " . $row["cid"] . '</p>
        <p>' . "Birthplace: " . $row["cbirthplace"] . '</p>
        <p>' . " Birth Date: " . $row["cbirthdate"] . "</p>";

    $listofchildren .= '</div>
      <div class="onecbtn">
      <form method="POST">
          <button class="schedule" name=' . 's' . $row["cid"] . '>Schedule</button>
          <button class="edit" name=' . $row["cid"] . '>Edit</button>
        </div>
      </div>';



  }


  if ($count == 1) {

    $listofchildren .= "Click on Add button to add children to the list";

  }

  return $listofchildren;


}


function childrenUpdate($cid, $cname, $cbp, $cdob)
{
  $sql = "UPDATE Childrens SET cname = '$cname', cbirthplace='$cbp', cbirthdate = '$cdob' WHERE cid='$cid'";

  if ($GLOBALS['conn']->query($sql) === TRUE) {

    header("Location:parentprofile.php");
    return "Record Updated";
  }
  return "Unable to Update";




}




//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//                                              CLINIC FUNCTIONALITITS
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


function getChildren($cid, &$cname, &$cbirthplace, &$cbirthdate, &$pid)
{


  $sql = "SELECT cname, cbirthplace, cbirthdate, pid  FROM Childrens WHERE cid='$cid'";

  $result = $GLOBALS['conn']->query($sql);
  // converting the result into an array
  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $cname = $row['cname'];
    $cbirthplace = $row['cbirthplace'];
    $cbirthdate = $row['cbirthdate'];
    $pid = $row['pid'];
    $_SESSION['CID'] = $cid;
    return "Correct Children ID";
    // return "NID doesn't exists";
  } else {
    $_SESSION['CID'] = 0;
    return "Wrong Children ID";
  }

}

function centerReg($centername, $centeraddress, $centeremail, $centerpassword)
{

  $sql = "SELECT centeremail FROM Centers WHERE centername='$centername'";
  $result = $GLOBALS['conn']->query($sql);

  if ($result->num_rows > 0) {
    return "Email already exists";
  }

  $sql = "SELECT centername FROM Centers WHERE centeremail='$centeremail'";
  $result = $GLOBALS['conn']->query($sql);
  if ($result->num_rows > 0) {
    return "Center name already exists";
  }

  $sql = "INSERT INTO Centers (centername, centeraddress, centeremail, centerpassword)
  VALUES ('$centername','$centeraddress', '$centeremail','$centerpassword')";


  if ($GLOBALS['conn']->query($sql) === TRUE) {
    header("Location:serviceproviderlogin.php");
    return "Registration Successful";
  }
  return "Registration Unsuccessful";

}


function centerLogin($centeremail, $centerpassword)
{
  $sql = "SELECT centerpassword, centerid FROM Centers WHERE centeremail='$centeremail'";
  $result = $GLOBALS['conn']->query($sql);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if ($row['centerpassword'] == $centerpassword) {

      $_SESSION['stat'] = "center";

      $_SESSION['centerid'] = $row['centerid'];

      header("Location:serviceproviderDashboard.php");
      return "Login Successful";

    } else {
      return "Wrong Password";
    }
  } else {

    return "Email doesn't exists";

  }

}
// centerLogin($centeremail,$centerpassword)

function showCenterProfile(&$centerid, &$centername, &$centeraddress, &$centeremail)
{
  $sql = "SELECT centername, centeraddress, centeremail FROM Centers WHERE centerid='$centerid'";

  $result = $GLOBALS['conn']->query($sql);
  // converting the result into an array
  $row = $result->fetch_assoc();

  $centername = $row['centername'];
  $centeraddress = $row['centeraddress'];
  $centeremail = $row['centeremail'];

  // $_SESSION["centerid"] = $centerid;

}

function updatecenter($centerid, $centername, $centeraddress, $centeremail)
{
  $sql = "SELECT centerid FROM Centers WHERE centeremail='$centeremail'";
  $result = $GLOBALS['conn']->query($sql);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if ($row['centerid'] != $centerid)
      return "This email is already in use";
  }
  $sql = "SELECT centerid FROM Centers WHERE centername='$centername'";
  $result = $GLOBALS['conn']->query($sql);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if ($row['centerid'] != $centerid)
      return "This centername is already in use";
  }

  $sql = "UPDATE Centers Set centeremail='$centeremail', centername='$centername', centeraddress='$centeraddress' WHERE centerid='$centerid'";

  if ($GLOBALS['conn']->query($sql) === TRUE) {

    header("Location:serviceproviderDashboard.php");
    return "Record Updated";
  }
  return "Unable to Update";

}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//                                              VACCINE FUNCTIONALITITS
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function addvaccine($centerid, $vaccineid, $vaccinename, $vaccineamount, $vaccinemanufacturer, $vaccineagelimit, $vaccineprice, $vaccinedose, $vaccinedescription)
{

  $sql = "INSERT INTO Vaccines (centerid, vaccineid, vaccinename, vaccineamount, vaccinemanufacturer, vaccineagelimit, vaccineprice, vaccinedose, vaccinedescription)
  VALUES ('$centerid','$vaccineid', '$vaccinename','$vaccineamount','$vaccinemanufacturer','$vaccineagelimit','$vaccineprice','$vaccinedose','$vaccinedescription')";

  if ($GLOBALS['conn']->query($sql) === TRUE) {
    header("Location:vaccinestockmanagement.php");
    return "Registration Successful";
  }
  return "Registration Unsuccessful";

}
function showvaccine($centerid, $vaccineid, &$vaccinename, &$vaccineamount, &$vaccinemanufacturer, &$vaccineagelimit, &$vaccineprice, &$vaccinedose, &$vaccinedescription)
{

  $sql = "SELECT centerid, vaccineid, vaccinename, vaccineamount, vaccinemanufacturer, vaccineagelimit, vaccineprice, vaccinedose, vaccinedescription FROM Vaccines WHERE centerid='$centerid' AND vaccineid='$vaccineid'";

  $result = $GLOBALS['conn']->query($sql);
  // converting the result into an array
  $row = $result->fetch_assoc();



  $vaccinename = $row['vaccinename'];
  $vaccineamount = $row['vaccineamount'];
  $vaccinemanufacturer = $row['vaccinemanufacturer'];
  $vaccineagelimit = $row['vaccineagelimit'];
  $vaccineprice = $row['vaccineprice'];
  $vaccinedose = $row['vaccinedose'];
  $vaccinedescription = $row['vaccinedescription'];

}

function updatevaccine($centerid, $vaccineid, &$vaccinename, &$vaccineamount, &$vaccinemanufacturer, &$vaccineagelimit, &$vaccineprice, &$vaccinedose, &$vaccinedescription)
{

  try {
    $sql = "UPDATE Vaccines SET vaccinename='$vaccinename', vaccineamount='$vaccineamount', vaccinemanufacturer='$vaccinemanufacturer',
     vaccineagelimit='$vaccineagelimit', vaccineprice='$vaccineprice', vaccinedose='$vaccinedose', vaccinedescription='$vaccinedescription' WHERE centerid='$centerid' AND vaccineid='$vaccineid'";
    if ($GLOBALS['conn']->query($sql) === TRUE) {

      header("Location:vaccinestockmanagement.php");
      return "Record Updated";
    }
    return "Unable to Update";

  } catch (Exception) {

    return "Vaccine name cannot be same";

  }



}

function showAllVaccines($centerid)
{

  $sql = "SELECT  vaccineid, vaccinename, vaccineamount, vaccinemanufacturer, vaccineagelimit, vaccineprice, vaccinedose, vaccinedescription  FROM Vaccines WHERE centerid='$centerid' ORDER BY vaccineamount DESC";

  $result = $GLOBALS['conn']->query($sql);
  // converting the result into an array
  // $row = $result->fetch_assoc();

  $count = 1;

  $listofvaccines = "";


  // output data of each row
  while ($row = $result->fetch_assoc()) {

    $id = $row['vaccineid'];
    $listofvaccines .= '<tr class="bodytable">
    <th>' . $count++ . '</th>
    <th>' . $row['vaccineid'] . '</th>
    <th>' . $row['vaccinename'] . '</th>
    <th>' . $row['vaccinemanufacturer'] . '</th>
    <th>' . $row['vaccineamount'] . '</th>
    <th>' . $row['vaccineagelimit'] . '</th>
    <th>' . $row['vaccineprice'] . '</th>
    <th>' . $row['vaccinedose'] . '</th>
    <th>' . $row['vaccinedescription'] . '</th>
    <th>  <input type="submit" name = ' . "$id" . '  value="Edit"></th> </tr>';


  }


  if ($count == 1) {

    $listofvaccines .= "<h1>Click on Add button to add children to the list</h>";

  }

  return $listofvaccines;


}




function showAllDoseWiseVaccineDate($centerid, $vaccineid)
{

  $sql = "SELECT  vaccinename, vaccineamount, vaccinemanufacturer, vaccineagelimit, vaccineprice, vaccinedose, vaccinedescription  FROM Vaccines WHERE centerid='$centerid' AND vaccineid='$vaccineid' ORDER BY vaccineamount DESC";

  $result = $GLOBALS['conn']->query($sql);
  // converting the result into an array
  // $row = $result->fetch_assoc();

  $count = 1;

  $listofvaccines = "";


  // output data of each row
  $row = $result->fetch_assoc();

  $_SESSION['vaccinedose'] = $row['vaccinedose'];



  for ($d = 1; $d <= $row['vaccinedose']; $d++) {

    $listofvaccines .= '<tr class="bodytable">

      <th>' . $d . '</th>
    <th>' . $vaccineid . '</th>
    <th>' . $row['vaccinename'] . '</th>
    <th>' . $row['vaccinemanufacturer'] . '</th>
    <th>' . $row['vaccineamount'] . '</th>
    <th>' . $row['vaccineagelimit'] . '</th>
    <th>' . $row['vaccineprice'] . '</th>
    <th>' . $row['vaccinedescription'] . '</th>
    <th>' . ' <input type="date" name=' . $d . ' /required> ' . '</th>
    </tr>';
  }

  return $listofvaccines;


}

function showAllVaccinesForSchedule($centerid)
{

  $sql = "SELECT  vaccineid, vaccinename, vaccineamount, vaccinemanufacturer, vaccineagelimit, vaccineprice, vaccinedose, vaccinedescription  FROM Vaccines WHERE centerid='$centerid' ORDER BY vaccineamount DESC";

  $result = $GLOBALS['conn']->query($sql);
  // converting the result into an array
  // $row = $result->fetch_assoc();

  $count = 1;

  $listofvaccines = "";



  // output data of each row
  while ($row = $result->fetch_assoc()) {

    $id = $row['vaccineid'];
    $listofvaccines .= '<tr class="bodytable">
    <th>' . $count++ . '</th>
    <th>' . $row['vaccineid'] . '</th>
    <th>' . $row['vaccinename'] . '</th>
    <th>' . $row['vaccinemanufacturer'] . '</th>
    <th>' . $row['vaccineamount'] . '</th>
    <th>' . $row['vaccineagelimit'] . '</th>
    <th>' . $row['vaccineprice'] . '</th>
    <th>' . $row['vaccinedose'] . '</th>
    <th>' . $row['vaccinedescription'] . '</th>
    <th>  <input type="submit" name = ' . "$id" . '  value="ADD"></th> </tr>';


  }


  if ($count == 1) {

    $listofvaccines .= "Click on Add button to add children to the list";

  }

  return $listofvaccines;


}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//                                              VACCINE SCHEDULING
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



function addUpcomingVaccineSchedule($cid, $vaccinename, $vaccinedose, $vaccineprice, $vaccinedate, $centername, $isgiven)
{
  $sql = "INSERT INTO upcomingSchedule (cid, vaccinename, vaccinedose, vaccineprice, vaccinedate, centername, isgiven )
  VALUES ('$cid','$vaccinename', '$vaccinedose','$vaccineprice','$vaccinedate','$centername','$isgiven')";

  if ($GLOBALS['conn']->query($sql) === TRUE) {
    // header("Location:vaccinestockmanagement.php");
    return "Update Successful";
  }
  return "Update Unsuccessful";


}
// addUpcomingVaccineSchedule($cid, $vaccinename, $vaccinedose, $vaccineprice, $vaccinedate, $centername, $isgiven);

function getUpcomingVaccineSchedule($cid, $isgiven)
{

  $sql = "SELECT  uvaccineid, vaccinename, vaccinedose, vaccineprice, vaccinedate, vaccineprice, centername  FROM upcomingSchedule WHERE cid='$cid' AND isgiven='False'   ";

  $result = $GLOBALS['conn']->query($sql);

  $count = 1;

  $listofschedules = "";

  while ($row = $result->fetch_assoc()) {

    $listofschedules .= '<tr >
    <th>' . $count++ . '</th>
    <th>' . $row['vaccinename'] . '</th>
    <th>' . $row['vaccinedose'] . '</th>
    <th>' . $row['vaccineprice'] . '</th>
    <th>' . $row['vaccinedate'] . '</th>
    <th>' . $row['centername'] . '</th>
    <th>  <input type="submit" name ="' . 'u' . $row['uvaccineid'] . '"  value="VACCINATE" style="background: greenyellow;"></th> </tr>';


  }

  return $listofschedules;

}

function vaccinate($uvaccineid)
{

  $sql = "SELECT vaccinename,vaccinedose,vaccineprice,vaccinedate,centername FROM  upcomingSchedule WHERE  uvaccineid='$uvaccineid'";

  $result = $GLOBALS['conn']->query($sql);
  // converting the result into an array
  $row = $result->fetch_assoc();

  $vaccinename = $row['vaccinename'];
  $vaccinedose = $row['vaccinedose'];
  $vaccineprice = $row['vaccineprice'];
  $vaccinedate = date("Y-m-d");
  $centername = $row['centername'];
  $cid = $_SESSION['CID'];

  $sql = "INSERT INTO takenVaccines (cid , vaccinename, vaccinedose, tvaccinedate, centername )
  VALUES ( '$cid' , '$vaccinename', '$vaccinedose','$vaccinedate','$centername')";

  if ($GLOBALS['conn']->query($sql) === TRUE) {
    // header("Location:vaccinestockmanagement.php");
    // return "Update Successful";
  }



  $sql = "UPDATE upcomingSchedule SET isgiven='True'  WHERE uvaccineid='$uvaccineid' ";

  if ($GLOBALS['conn']->query($sql) === TRUE) {

    // header("Location:parentprofile.php");
    return "Record Updated";
  }
  return "Unable to Update";

}


function getCertificate(
  &$tvaccineid,
  &$cid,
  &$vaccinename,
  &$vaccinedose,
  &$vaccinedate,
  &$centername,
  &$childname
) {


  $sql = "SELECT cid,vaccinename,vaccinedose,tvaccinedate,centername FROM  takenVaccines WHERE  tvaccineid='$tvaccineid'";

  $result = $GLOBALS['conn']->query($sql);
  // converting the result into an array
  $row = $result->fetch_assoc();

  $cid = $row['cid'];
  $vaccinename = $row['vaccinename'];
  $vaccinedose = $row['vaccinedose'];
  $vaccinedate = $row['tvaccinedate'];
  $centername = $row['centername'];

  $sql = "SELECT cname FROM  Childrens WHERE  cid='$cid'";
  $result = $GLOBALS['conn']->query($sql);
  // converting the result into an array
  $row = $result->fetch_assoc();

  $childname = $row['cname'];


}


function getTakenVaccineSchedule($cid)
{

  $sql = "SELECT tvaccineid, vaccinename, vaccinedose, tvaccinedate, centername FROM takenVaccines WHERE cid='$cid' ";

  $result = $GLOBALS['conn']->query($sql);

  $count = 1;

  $listofschedules = "";

  while ($row = $result->fetch_assoc()) {

    $listofschedules .= '<tr >
    <th>' . $count++ . '</th>
    <th>' . $row['vaccinename'] . '</th>
    <th>' . $row['vaccinedose'] . '</th>
    <th>' . $row['tvaccinedate'] . '</th>
    <th>' . $row['centername'] . '</th>
    <th>  <input type="submit" name ="' . 't' . $row['tvaccineid'] . '"  value="Certificate" style="background: yellow;"></th> </tr>';


  }

  return $listofschedules;

}

function getTakenVaccineScheduleforparents($cid)
{

  $sql = "SELECT tvaccineid, vaccinename, vaccinedose, tvaccinedate, centername FROM takenVaccines WHERE cid='$cid' ";

  $result = $GLOBALS['conn']->query($sql);

  $count = 1;

  $listofschedules = "";

  while ($row = $result->fetch_assoc()) {

    $listofschedules .= '<tr >
    <th>' . $count++ . '</th>
    <th>' . $row['vaccinename'] . '</th>
    <th>' . $row['vaccinedose'] . '</th>
    <th>' . $row['tvaccinedate'] . '</th>
    <th>' . $row['centername'] . '</th>
    </tr>';
    // <th>  <input type="submit" name ="' . $row['tvaccineid'] . '"  value="Certificate" style="background: yellow;"></th> 


  }

  return $listofschedules;

}
function getUpcomingVaccineScheduleforparents($cid, $isgiven)
{

  $sql = "SELECT  uvaccineid, vaccinename, vaccinedose, vaccineprice, vaccinedate, vaccineprice, centername  FROM upcomingSchedule WHERE cid='$cid' AND isgiven='False'   ";

  $result = $GLOBALS['conn']->query($sql);

  $count = 1;

  $listofschedules = "";

  while ($row = $result->fetch_assoc()) {

    $listofschedules .= '<tr >
    <th>' . $count++ . '</th>
    <th>' . $row['vaccinename'] . '</th>
    <th>' . $row['vaccinedose'] . '</th>
    <th>' . $row['vaccineprice'] . '</th>
    <th>' . $row['vaccinedate'] . '</th>
    <th>' . $row['centername'] . '</th>
    </tr>';


  }

  return $listofschedules;

}


function getchartinfo($cid)
{
  //NEET TO FIX THIS BUG

  $sql = "SELECT  upcomingSchedule.vaccinename, upcomingSchedule.vaccinedose, upcomingSchedule.vaccinedate, takenVaccines.tvaccinedate 
  FROM upcomingSchedule INNER JOIN takenVaccines 
  ON upcomingSchedule.isgiven='true' AND upcomingSchedule.cid=takenVaccines.cid AND  takenVaccines.cid='$cid' ";


  $result = $GLOBALS['conn']->query($sql);

  $count = 1;
  $n = $result->num_rows;

  $listofschedules = array();

  while ($row = $result->fetch_assoc()) {

    // echo $row['vaccinename'];
    // echo $row['vaccinedose'];
    // echo $row['vaccinedate'] . ' === ';
    // echo $row['tvaccinedate'] . '<br>';

    $listofschedules[] = array('name' => $row['vaccinename'], 'dose' => $row['vaccinedose'], 'date1' => $row['vaccinedate'], 'date2' => $row['tvaccinedate']);

    if ($count * $count == $n) {
      break;
    }
    $count++;



  }

  // $vaccines = [
  //   ['name' => 'Vaccine A', 'dose' => 1, 'date1' => '2023-01-01', 'date2' => '2023-03-01'],
  //   ['name' => 'Vaccine A', 'dose' => 2, 'date1' => '2023-03-01', 'date2' => '2023-08-01'],
  //   ['name' => 'Vaccine A', 'dose' => 3, 'date1' => '2023-03-01', 'date2' => '2023-08-01'],
  //   ['name' => 'Vaccine A', 'dose' => 4, 'date1' => '2023-04-01', 'date2' => '2025-10-01']
  //   // Add more data entries as needed
  // ];

  // return $vaccines;
  return $listofschedules;
}



?>