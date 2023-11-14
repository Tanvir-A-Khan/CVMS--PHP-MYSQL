<?php
if (!isset($_SESSION)) {
  session_start();

}
// $_SESSION["status"] = NULL;

if (!isset($_SESSION["stat"])) {
  $_SESSION["stat"] = NULL;
}

if ($_SESSION["stat"] == "center") {
  header("Location:serviceproviderDashboard.php");
}

if ($_SESSION["stat"] == "parent") {
  header("Location:parentprofile.php");
}

?>