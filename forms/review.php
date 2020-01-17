<div class="row mt-4 mb-4 pl-2 pr-2">
  <div class="col-md-12">
    <div class="card">
      <?php
        if ($_POST) {
          if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['review']) && isset($_POST['rating'])) {

        ?>
            <div class="card-header">
              <h4 class="card-title">Thank you, <?php echo "{$_POST['name']}"; ?></h4>
            </div>
            <div class="card-body">
              <div class="card-text">Your Review:<br>
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-3"><h4 class="card-title"><?php echo "{$_POST['name']}"; ?></h4></div>
                      <div class="col-md-7"><p class="card-text"><?php echo "{$_POST['review']}"; ?></p></div>
                      <div class="col-md-2"><p class="card-text"><?php echo "{$_POST['rating']}"; if($_POST['rating'] == 1) { echo " star"; } else {  echo " stars"; }?></p></div>
                      <?php
                        include("./forms/db_login.php");

                        $stmt = $pdo->prepare("INSERT INTO `pending-reviews` (`name`, `review`, `rating`, `email`) VALUES (?, ?, ?, ?)");
                        $stmt->execute(array($_POST['name'], $_POST['review'], $_POST['rating'], $_POST['email']));
                      ?>
                    </div>
                  </div>
                </div>
                <a href="./?review" class="btn btn-block btn-secondary mt-2">RETURN TO THE REVIEW PAGE</a>
              </div>
            </div>
          <?php } else {?>
            <div class="card-header">
              <h4 class="card-title">Uh Oh!</h4>
            </div>
            <div class="card-body">
              <div class="card-text">It seems that all of the inputs weren't filled in. Don't wory, just quickly pop back to the <a href="./?review">review page</a> and resubmit the form.</div>
            </div>
          <?php }
        } else {?>
          <div class="card-header">
            <h4 class="card-title">Uh Oh!</h4>
          </div>
          <div class="card-body">
            <div class="card-text">An error occured with the form submition. Please resubmit the form from the <a href="./?review">review page</a>.</div>
          </div>
      <?php }
      ?>
    </div>
  </div>
</div>