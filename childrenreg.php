<?php

  include "./database/dbfuntionalities.php";

  if(!isset($_SESSION)){
    session_start();
  }
  if(isset($_POST['logout'])) {
     
    session_unset();
    session_destroy();
    header("location:homepage.php");
    
  }
  
  if(isset($_POST['addchild'])){
    
    $pid = $_SESSION['pid'];
    $cname = $_POST['cname'];
    $cbirthplace = $_POST['cbirthplace'];
    $cbirthdate = $_POST['cbirthdate'];
    
    
    addChildren($pid, $cname, $cbirthplace, $cbirthdate);
    header("location:parentprofile.php");

  } 


  // echo $_SESSION['pid'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Children Registration</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@100;200;300;400;500;600;700&family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="css/childrenreg.css">
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
                    <div class="registrationzone">
                        <div class="registrationheader">
                            <h3>Children Registration</h3>
                        </div>

                        <form class="registrationform" method="POST">
                            <input class="registration" type="text" name="cname" placeholder="Child Name" required></br>
                            <input class="registration" type="text" name="cbirthplace" placeholder="Birth Place"
                                required><br>
                            <input class="registration" type="date" name="cbirthdate" placeholder="Date of Birth"
                                required></br>

                            <div class="submitbtn">
                                <input type="submit" name="addchild">
                                <!-- <a href=""><p>Submit</p></a> -->
                            </div>
                        </form>

                    </div>
                </div>

                <div class="col-lg-6">

                    <div class="registrationpart">
                        <div class="registrationdetails">
                            <p>This is especially important for those children
                                who not only can’t be vaccinated but may be more
                                susceptible to the diseases we vaccinate against.
                                No single vaccine provides 100% protection, and
                                herd immunity does not provide full protection to
                                those who cannot safely be vaccinated. But with
                                herd immunity, these children will have substantial
                                protection, thanks to those around them being
                                vaccinated. <br>
                                <br>
                                Vaccinating not only protects yourself, but also
                                protects those in the community who are unable
                                to be vaccinated. If you are able to, get
                                vaccinated.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ---------BANNER PART END------------  -->

</body>

</html>