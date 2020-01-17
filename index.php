<!doctype html>
<html lang="en">
  <head>
    <title>Walrus & The Carpenter</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="./assets/css/bootstrap.css">

    <!-- Font Awesome 5 -->
    <link rel="stylesheet" href="./assets/font-awesome-4.7.0/css/font-awesome.css">

    <!-- Page Styles -->
    <link rel="stylesheet" href="./assets/css/styles.css">
    <link rel="shortcut icon" href="./assets/images/walrus-head.png" type="image/x-icon">

    <script src="./assets/js/jquery-3.4.1.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
  </head>
  <body>
    <header>
      <?php
        if ($_SERVER['QUERY_STRING'] != "home" && $_SERVER['QUERY_STRING'] != "") {
          echo "<div class='float-left pt-0 mt-0'><a href='./?home'><img src='./assets/images/walrus-carpenter-logo.png' alt='logo' style='height: 50px;'></a></div>";
        }
      if ($_SERVER['QUERY_STRING'] == "home" || $_SERVER['QUERY_STRING'] == "" ) {?>
      <div id="phone-number"><h2><i class="fa fa-phone" aria-hidden="true" style="font-size: x-large"></i> 555.123.4567</h2></div>
      <div id="social-media">
        <a href="#facebook" style="padding: 5px 15px"><i class="fa fa-facebook" aria-hidden="true"></i></i></a>
        <a href="#twitter"><i class="fa fa-twitter" aria-hidden="true"></i></i></a>
        <a href="#instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
      </div>
      <?php } else { ?>
      <div class="text-right" id="general-bar">
        <a href="./?home" <?php if($_SERVER['QUERY_STRING'] == "home") {echo 'class="btn btn-primary"';} else {echo 'class="btn btn-secondary"';} ?>>Home</a>
        <a href="./?menu" <?php if($_SERVER['QUERY_STRING'] == "menu" || $_SERVER['QUERY_STRING'] == "lunch" || $_SERVER['QUERY_STRING'] == "dinner") {echo 'class="btn btn-primary"';} else {echo 'class="btn btn-secondary"';} ?>>Menu</a>
        <a href="./?about" <?php if($_SERVER['QUERY_STRING'] == "about") {echo 'class="btn btn-primary"';} else {echo 'class="btn btn-secondary"';} ?>>About</a>
        <a href="./?locations" <?php if($_SERVER['QUERY_STRING'] == "locations") {echo 'class="btn btn-primary"';} else {echo 'class="btn btn-secondary"';} ?>>Locations</a>
        <a href="./?contact" <?php if($_SERVER['QUERY_STRING'] == "contact") {echo 'class="btn btn-primary"';} else {echo 'class="btn btn-secondary"';} ?>>Contact Us</a>
        <a href="./?gallery" <?php if($_SERVER['QUERY_STRING'] == "gallery") {echo 'class="btn btn-primary"';} else {echo 'class="btn btn-secondary"';} ?>>Gallery</a>
        <a href="./?jobs" <?php if($_SERVER['QUERY_STRING'] == "jobs") {echo 'class="btn btn-primary"';} else {echo 'class="btn btn-secondary"';} ?>>Jobs</a>
        <a href="./?review" <?php if($_SERVER['QUERY_STRING'] == "review" || $_SERVER['QUERY_STRING'] == "reviewForm" || $_SERVER['QUERY_STRING'] == "reviewMore") {echo 'class="btn btn-primary"';} else {echo 'class="btn btn-secondary"';} ?>>Review</a>
      </div>
      <?php } ?>
      <div class="burger">
        <button type="button" onclick="$('.slide').slideToggle();"><i class="fa fa-bars" aria-hidden="true"></i></button>
      </div>
      <script>
        $(document).ready(function () {
          $(".slide").hide();
        });
      </script>
      <div class="slide">
        <div class="links text-center">
          <a href="./?home" class="btn btn-secondary btn-block">Home</a><hr>
          <h5 class="mb-0">Menu:</h5><a href="./?lunch" class="btn btn-info btn-block">Lunch</a> <a href="./?dinner" class="btn btn-info btn-block">Dinner</a><hr>
          <a href="./?about" class="btn btn-secondary btn-block">About</a>
          <a href="./?locations" class="btn btn-secondary btn-block">Locations</a>
          <a href="./?contact" class="btn btn-secondary btn-block">Contact Us</a>
          <a href="./?gallery" class="btn btn-secondary btn-block">Gallery</a>
          <a href="./?jobs" class="btn btn-secondary btn-block">Jobs</a>
          <hr>
          <a href="./?review" class="btn btn-secondary btn-block">Review</a>
          <br><br>
        </div>
      </div>
    </header>
    <main>
      <?php
        switch ($_SERVER['QUERY_STRING']) {
          case "home":
           include("./pages/home.php");
            break;

          case "menu":
            $menuType = "lunch";
            include("./pages/menu.php");
            break;

          case "lunch":
            $menuType = "lunch";
            include("./pages/menu.php");
            break;

          case "dinner":
            $menuType = "dinner";
            include("./pages/menu.php");
            break;

          case "gallery":
            include("./gallery/index.php");
            break;

          case "locations":
            include("./pages/WIP.php");
            break;

          case "jobs":
            include("./pages/WIP.php");
            break;

          case "about":
            include("./pages/about.php");
            break;

          case "contact":
            include("./pages/contact.php");
            break;

          case "emailForm":
            include("./forms/contact.php");
            break;

          case "reviewForm":
            include("./forms/review.php");
            break;

          case "review":
            include("./pages/review.php");
            break;

          case "reviewMore":
            include("./pages/reviewMore.php");
            break;

          default:
            $menuType = "lunch";
            include("./pages/home.php");
            break;
        }
      ?>
    </main>
    <div class="row mt-2">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div class="col-md-12 justify-center-center">
              <div class="row">
                <div class="col-md-4">
                  <p>555.123.4567</p>
                  <p>5644 Perry Blvd NW,<br>
                  Halifax, NS<br>
                  B3K 2B5</p>
                  <p>Mon-Fri:<br>10AM-12PM<br>
                  Sat:<br>9AM-1AM<br>
                  Sun:<br>11AM - 10PM</p>
                  <a href="./?locations">Change Location</a>
                </div>
                <div class="col-md-8 text-right" style="border: 1px solid grey">
                  <img class="float-right" src="../assets/images/map.jpg" alt="GoogleMap">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer class="pt-2 pl-2 pr-2">
      <div class="links text-center row">
        <div class="col-md-1"></div>
        <div class="col-md-4">
          <a href="./?menu">Menu</a> |
          <a href="./?about">About</a> |
          <a href="./?locations">Locations</a>
        </div>
        <div class="col-md-2">
          <a href="./?review">Reviews</a>
        </div>
        <div class="col-md-4">
          <a href="./?contact">Contact Us</a> |
          <a href="./?gallery">Gallery</a> |
          <a href="./?jobs">Jobs</a>
        </div>
        <div class="col-md-1"></div>
      </div>
      <div class="copyright text-center">
        <p class="mb-0">Copyright 2019 - Walrus & The Carpenter</p>
      </div>
      <div id="social-media" class="text-right">
        <a href="#facebook"><i class="fa fa-facebook" aria-hidden="true"></i></i></a>
        <a href="#twitter"><i class="fa fa-twitter" aria-hidden="true"></i></i></a>
        <a href="#instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
      </div>
    </footer>
    <?php
      $pdo = null;
    ?>
  </body>
</html>