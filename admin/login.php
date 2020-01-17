<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-md-2"></div>
    <div class="col-md-8 text-center"><img src="../assets/images/walrus-head.png" alt="Website Logo" style="height: 25vh; width: auto;"></div>
    <div class="col-md-2"></div>
  </div>
  <div class="row mb-4">
    <div class="col-md-12">
      <div class="card mt-4">
        <div class="card-body">
          <h4 class="card-title">
            Walrus & The Carpenter: Admin Portal - Log In
          </h4>
          <p class="card-text">
            <form method="post" action="#">
              <div class="form-group">
                <label for="username"><strong>Username</strong></label>
                <input type="text" class="form-control" name="username" id="username" placeholder="Username" required>
              </div>
              <div class="form-group">
                <label for="password"><strong>Password</strong></label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
              </div>
              <input type="submit" class="btn btn-block btn-primary" name="subLogin" value="Login">
            </form>
          </p>
          <a href="../?home" class="btn btn-secondary btn-block">Return to Website</a>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <?php
        if (isset($_POST['subLogin'])) {
          if (isset($_POST['username']) && isset($_POST['password'])) {
            //echo "<div class='alert alert-success' role='alert'><h4 class='alert-heading'>Success.</h4><p>It looks as if you're good.</p><p class='mb-0'>Thank You.</p></div>";

            if ($_SESSION['attempts'] >= 5) {
              header("Location: ./attemptsReset.php");
            }

            $stmt = $pdo->prepare("SELECT * FROM `login-information` WHERE `username` = ?");
            $stmt->execute([$_POST['username']]);

            $result = $stmt->fetchAll();

            if (count($result) > 0) {
              foreach($result as $row) {
                $data = [$row['id'], $row['username'], $row['hashed'], $row['plain'], $row['date_updated']];
              }

              if ($_POST['password'] == $data[3]) {
                $hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);

                $stmt = $pdo->prepare("UPDATE `login-information` SET `plain`=?, `hashed`=? WHERE `username` = ?");
                $stmt->execute(["", $hashedPassword, $_POST['username']]);
                echo "<div class='alert alert-success' role='alert'><h4 class='alert-heading'>Success</h4><p>Thank you for your patience.</p><p class='mb-0'>We are logging you in.</p></div>";
                $_SESSION['loggedIn'] = true;
                $_SESSION['attempts'] = 0;
                sleep(1.5);
                header("Location: index.php");
              } else if (password_verify($_POST['password'], $data[2])) {
                echo "<div class='alert alert-success' role='alert'><h4 class='alert-heading'>Success</h4><p>Thank you for your patience.</p><p class='mb-0'>We are logging you in.</p></div>";
                $_SESSION['loggedIn'] = true;
                $_SESSION['attempts'] = 0;
                sleep(1.5);
                header("Location: index.php");
              } else {
                $left = 5 - $_SESSION['attempts'];
                echo "<div class='alert alert-danger' role='alert'><h4 class='alert-heading'>Uh Oh!</h4><p>Username and/or Password is incorrect.</p><p class='mb-0'>Try again please. Attempts Left: " . $left . "</p></div>";
                $_SESSION['attempts'] += 1;
              }
            } else {
              $left = 5 - $_SESSION['attempts'];
              echo "<div class='alert alert-danger' role='alert'><h4 class='alert-heading'>Uh Oh!</h4><p>Username and/or Password is incorrect.</p><p class='mb-0'>Try again please. Attempts Left: " . $left . "</p></div>";
              $_SESSION['attempts'] += 1;
            }

          } else {
            echo "<div class='alert alert-danger' role='alert'><h4 class='alert-heading'>Uh Oh!</h4><p>Username and/or Password is incorrect.</p><p class='mb-0'>Try again please.</p></div>";
          }
        }
      ?>
    </div>
  </div>
</div>