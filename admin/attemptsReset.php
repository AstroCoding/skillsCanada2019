<?php
  session_start();
  session_destroy();
  session_start();
  $_SESSION['attempts'] = 0;
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
  <div class="row mt-4">
    <div class="col-md-3">
    </div>
    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          <?php
            echo "Uh oh, you have tried to login to many times. Please wait 5 seconds for a button to appear below.";
          ?>
          <script>
            setTimeout(() => {
              let button = "<a href='./index.php' class='btn btn-block btn-danger mt-2'>RETURN TO LOGIN</a>";
              $("body").append(button);
            }, 5000);
          </script>
        </div>
      </div>
    </div>
    <div class="col-md-3">
    </div>
  </div>
  </body>
</head>
</html>