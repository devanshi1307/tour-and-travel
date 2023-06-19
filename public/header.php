<!DOCTYPE html>
<head>
<link href="assets/css/theme.css" rel="stylesheet" />
<link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicons/favicon.ico">
    <link rel="manifest" href="assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">

</head>

<body>
<main class="main" id="top">
      <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3 d-block" data-navbar-on-scroll="data-navbar-on-scroll">
        <div class="container"><a class="navbar-brand" href="index.html"><img class="d-inline-block" src="assets/img/gallery/logo.png" width="50" alt="logo" /><span class="fw-bold text-primary ms-2">voyage</span></a>
          <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
          <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto pt-2 pt-lg-0 font-base">
              <!-- <li class="nav-item px-2"><a class="nav-link fw-medium active" aria-current="page" href="#destinations"><span class="nav-link-icon text-800 me-1 fas fa-map-marker-alt"></span><span class="nav-link-text">Locations </span></a></li> -->
              <li class="nav-item px-2"><a class="nav-link" href="flights.php"> <span class="nav-link-icon text-800 me-1 fas fa-plane"></span><span class="nav-link-text">Flights</span></a></li>
              <li class="nav-item px-2"><a class="nav-link" href="ticket.php"> <span class="nav-link-icon text-800 me-1 fas fa-hotel"></span><span class="nav-link-text">E-Tickets</span></a></li>
              <!-- <li class="nav-item px-2"><a class="nav-link" href="#hotels"> <span class="nav-link-icon text-800 me-1 fas fa-hotel"></span><span class="nav-link-text">Hotels</span></a></li> -->
              <li class="nav-item px-2"><a class="nav-link" href="#activities"><span class="nav-link-icon text-800 me-1 fas fa-bolt"></span><span class="nav-link-text">Activities</span></a></li>
            </ul>
         
              <button class="btn btn-voyage-outline order-0" type="button"><a href="support.php">Support</a></button>
              
              <?php
            if(isset($_SESSION['userId'])) {
                echo '
                <ul  class="nav navbar-nav navbar-right">
                    <li class="nav-item mr-3">
                            
                            <h5 class=" text-light">
                            <i class="ml-1 fa fa-user text-light"></i>
                            '.$_SESSION['userUid'].'
                            </h5>
                    </li>          
                    <li class="nav-item ml-3">
                        <form action="includes/logout.inc.php" class="logout_form" method="POST">
                        <button class="astext"  type="submit">
                            <h5> Logout </h5>                            
                            </button>
                        </form> 
                    </li>                       
                </ul>    ';
            } else {
                echo '
                <div class="dropdown "
                    style="margin-right:70px">
                <a  href="login.php" ><button class="btn btn-login btn-secondary " type="button" aria-haspopup="true" aria-expanded="false">
                    Login                            
                </button>
                </a>
                </div>';
            }
            ?>
           
          </div>
        </div>
      </nav>
      <section class="mt-7 py-0">
        <div class="bg-holder w-50 bg-right d-none d-lg-block" style="background-image:url(assets/img/gallery/hero-section-1.png);">
        </div>
</main>
</body>
</html>