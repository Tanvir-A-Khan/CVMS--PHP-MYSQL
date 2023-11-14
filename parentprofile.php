<!-- SESSION NEEDED -  Parent ID, Login Status -->

<?php
include "./database/dbfuntionalities.php";

if (!isset($_SESSION)) {
    session_start();
}

/// Searching key
$pid = $_SESSION["pid"];
/// STORING  VARIABLES
$fathersname = "_";
$mothersname = "_";
$paddress = "_";
$pemail = "_";
$pnid = "_";
$pphone = "";


// echo $pid;

getParentProfile($fathersname, $mothersname, $paddress, $pemail, $pnid, $pphone, $pid);

/// STORING THE LIST OF CHILDREN IN THIS VAR WITH ALL CSS AND HTML
$listofchildren = showChildrenList($_SESSION["pid"]);


if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $temp = "";
    foreach ($_POST as $key => $value) {

        $_SESSION['CID'] = $key;
        $temp = $key;
    }

    if ($temp[0] == 's') {
        // header("Location:childreninfoedit.php");
        $temp = ltrim($temp, $temp[0]);
        echo $temp;
        $_SESSION['CID'] = $temp;
        header("Location:schedulemanagementforparents.php");

    } else {
        header("Location:childreninfoedit.php");
        // header("Location:childreninfoedit.php");

    }

    // $_SESSION['CID'] = $_POST[0];



}





?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php echo $fathersname; ?> Profile
    </title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@100;200;300;400;500;600;700&family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="css/parentprofile.css">
</head>

<body>

    <!-- ---------IMPORTING NAVBAR------------  -->

    <?php include "./shared/navbar.php"; ?>

    <!-- ---------BANNER PART START------------  -->

    <section id="banner">
        <div class="container">
            <h1>Children Vaccine Management System</h1>
            <h3>Parent Profile</h3>
            <br><br><br>
            <div class="row">
                <div class="col-lg-2">
                    <div class="userdisplay">
                        <p>Father's name: </p>
                        <p>Mother's name: </p>
                        <p>Address:</p>
                        <p>Email:</p>
                        <p>NID:</p>
                        <p>Phone:</p>
                    </div>
                    <button class="editbtn" onclick="window.location.href='parentinfoedit.php';">
                        <strong>Edit</strong> </button>
                </div>
                <div class="col-lg-4">
                    <div class="userinfodisplay">
                        <?php
                        echo '<p>' . $fathersname . ' </p>';
                        echo '<p>' . $mothersname . '</p>';
                        echo '<p>' . $paddress . '</p>';
                        echo '<p>' . $pemail . '</p>';
                        echo '<p>' . $pnid . '</p>';
                        echo '<p>' . $pphone . '</p>';
                        ?>
                    </div>

                </div>

                <div class="col-lg-6">
                    <div class="registrationpart">
                        <div class="header">
                            <p>List of Children</p>
                            <button class="adchild" onclick="window.location.href='childrenreg.php';"><b>Add</b>
                            </button>
                        </div>


                        <!-- THIS PORTION OF THE CODE IS EXPLAINED IN THE dbfuntionalities FILE -->
                        <?php
                        echo
                            $listofchildren;
                        ;
                        ?>
                        <!-- <div class="onec">
                            <div class="onectext">
                                <h6>1. Tanvir</h6>
                                <p>ID:230700080</p>
                                <p>Birth Place:230700080</p>
                                <p>Birth Date:230700080</p>
                            </div>
                            <div class="onecbtn">
                                <button class="schedule">Schedule</button>
                                <button class="edit">Edit</button>
                            </div>
                        </div>


                        <div class="twoc">
                            <div class="onectext">
                                <h6>2. Tanvir Ahmed Khan</h6>
                                <p>ID:230700080</p>
                                <p>Birth Place:230700080</p>
                                <p>Birth Date:230700080</p>
                            </div>
                            <div class="onecbtn">
                                <button class="schedule">Schedule</button>
                                <button class="edit">Edit</button>
                            </div>
                        </div> -->

                        <!-- <div class="threec"></div>
                        <div class="fourc"></div> -->





                    </div>
                </div>
    </section>

    <!-- ---------BANNER PART END------------  -->


</body>

</html>