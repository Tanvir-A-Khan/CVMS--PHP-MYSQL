<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Created!</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@100;200;300;400;500;600;700&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="css/accountcreated.css">
</head>
<body>
    <nav class="navbar navbar-expand">
        <div class="container">
          <a class="navbar-brand" href="#">
            <img src="images/logo.png" alt="Logo">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav m-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="vaccineinfo.php">Vaccine Information</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Contact Us</a>
              </li>
              <!-- <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Service</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Protfolio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Price</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Blog</a>
              </li> -->
            </ul>
          </div>
          <div class="navbtn">
            <button onclick="window.location.href='homepage.php';">Login</button>
          </div>
        </div>
      </nav>

    <!-- ---------BANNER PART START------------  -->

<section id="banner">
      <div class="container">
        <h1>Children Vaccine Management System</h1>
        <div class="accountreated">
            <div class="accountreatedimg">
                <img src="images/congratulationimg.png" alt="">
            </div>
            <h4>Congratulations...!</h4>
            <p>Your account has been created. Now, <a href="homepage.php">Log In.</a></p>
            <button class="donebtn" onclick="window.location.href='homepage.php';">Done</button>
        </div>
      </div>
  </section>
  
  <!-- ---------BANNER PART END------------  -->
    
</body>
</html>