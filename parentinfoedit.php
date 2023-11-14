<?php
include "./database/dbfuntionalities.php";
if (!isset($_SESSION)) {
    session_start();
}

$fathersname = "_";
$mothersname = "_";
$paddress = "_";
$pemail = "_";
$pnid = "_";
$pphone = "";
$pid = $_SESSION["pid"];


// echo $pid;

getParentProfile($fathersname, $mothersname, $paddress, $pemail, $pnid, $pphone, $pid);
$err = "";


if (isset($_POST['update'])) {

    // echo "working";
    //        parentUpdate($fathername, $mothername, $paddress, $pemail, $pphone, $pnid, $pid);
    $err = parentUpdate($_POST['fathersname'], $_POST['mothersname'], $_POST['paddress'], $_POST['pphone'], $_POST['pnid'], $_SESSION['pid']);

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
                        <label>Father's Name</label>
                        <input type="text" name="fathersname" value='<?php echo $fathersname; ?>'
                            placeholder="Enter your fathers name" required />
                    </div>
                    <div class="input-box">
                        <label>Mother's Name</label>
                        <input type="text" name="mothersname" value='<?php echo ($mothersname) ?>'
                            placeholder="Enter your mothers name" required />
                    </div>

                    <div class="column">
                        <div class="input-box">
                            <label>Phone Number</label>
                            <input type="number" name="pphone" value='<?php echo $pphone ?>'
                                placeholder="Enter your phone no" required />
                        </div>
                        <div class="input-box">
                            <label>NID</label>
                            <input type="text" name="pnid" value='<?php echo $pnid ?>' placeholder="Enter your NID"
                                required />
                        </div>
                    </div>

                    <div class="input-box address">
                        <label>Address</label>
                        <input type="text" name="paddress" value='<?php echo $paddress ?>'
                            placeholder="Enter your address" required />
                    </div>

                    <button type="submit" name="update">Update</button>
                </form>
            </div>


        </div>
    </section>

    <!-- ---------BANNER PART END------------  -->


</body>

</html>