<div class="row mt-4 mb-4">
  <div class="col-md-12">
    <div class="card">
      <?php
        if ($_POST) {
          if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['message'])) {
            $message = "{$_POST['name']} - {$_POST['subject']}:\n{$_POST['message']}\nPlease contact: {$_POST['email']}";
            mail("exampleemail@gmail.com", $_POST['subject'], $message);
        ?>
            <div class="card-header">
              <h4 class="card-title">Thank you, <?php echo "{$_POST['name']}"; ?></h4>
            </div>
            <div class="card-body">
              <div class="card-text">We will get in contact with you the moment we read your email.<br><br>The email we will recieve will look as follows:<br><?php echo str_replace("\n", "<br>", $message); ?></div>
            </div>
          <?php } else {?>
            <div class="card-header">
              <h4 class="card-title">Uh Oh!</h4>
            </div>
            <div class="card-body">
              <div class="card-text">It seems that all of the inputs weren't filled in. Don't wory, just quickly pop back to the <a href="./?contact">contact page</a> and resubmit the form.</div>
            </div>
          <?php }
        } else {?>
          <div class="card-header">
            <h4 class="card-title">Uh Oh!</h4>
          </div>
          <div class="card-body">
            <div class="card-text">An error occured with the form submition. Please resubmit the form from the <a href="./?contact">contact page</a>.</div>
          </div>
      <?php }
      ?>
    </div>
  </div>
</div>