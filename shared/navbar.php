<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['stat'])) {
    $_SESSION['stat'] = NULL;
}

if (isset($_POST['logout'])) {
    // remove all session variables
    session_unset();
    // destroy the session
    session_destroy();

    header("location:homepage.php");

}


?>


<nav class="navbar navbar-expand">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="images/logo.png" alt="Logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="homepage.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="vaccineinfo.php">Vaccine Information</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Contact Us</a>
                </li>



            </ul>
        </div>

        <?php
        // if the status is set the logout button will appear
        if ($_SESSION['stat'] == "parent") {
            echo
                '
            <div >
            <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="parentprofile.php"> Parent Profile</a>
                </li>
                <form method="post">
                    <input type="submit" name="logout" value="Logout" />
                </form>
            </ul>

            </div>
            ';
        } elseif ($_SESSION['stat'] == "center") {

            echo
                '
            <div >
            <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="serviceProviderDashboard.php">Center Profile</a>
                </li>
                <form method="post">
                    <input type="submit" name="logout" value="Logout" />
                </form>
            </ul>

            </div>
            ';
        }

        ?>

    </div>
</nav>