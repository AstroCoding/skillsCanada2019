<?php
  session_start();
  if (!isset($_SESSION['loggedIn'])) {
    $_SESSION['loggedIn'] = false;
  }

  include("../forms/db_login.php");

  if ($_SERVER['QUERY_STRING'] == "logout") {
    session_destroy();
    $_SESSION['loggedIn'] = false;
    header("Location: index.php");
  }
?>

<!doctype html>
<html lang="en">
  <head>
    <title>W&TC: Admin Portal</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="../assets/css/bootstrap.css">

    <!-- Font Awesome 5 -->
    <link rel="stylesheet" href="../assets/font-awesome-4.7.0/css/font-awesome.css">

    <!-- Page Styles -->
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="shortcut icon" href="../assets/images/walrus-head.png" type="image/x-icon">

    <script src="../assets/js/jquery-3.4.1.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
  </head>
  <body>
    <?php
      if (!$_SESSION['loggedIn']) {
        $_SESSION['loggedIn'] = false;
        include("./login.php");
      } else {
        switch($_SERVER["QUERY_STRING"]) {
          case "pending":
            include("./pending.php");
            break;

          case "approved":
            include("./approved.php");
            break;

          case "loggedIn":
            include("./loggedIn.php");
            break;

          default:
            include("./loggedIn.php");
            break;
        }
      }
    ?>
  </body>

  <?php
  $pdo = null;
  ?>
</html>