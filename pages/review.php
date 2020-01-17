<?php
  include("./forms/db_login.php");
?>

<div class="container-fluid mt-4 mb-4">
  <div class="row">
    <div class="col-md-12">
      <div class="card mb-2">
        <div class="card-header">
          <h4 class="card-title">Some of our Reviews</h4>
        </div>
        <div class="card-body">
          <div class="container-fluid">
            <?php
              $stmt = $pdo->prepare("SELECT * FROM `walrus-reviews` ORDER BY `date_updated` DESC LIMIT 5");
              $stmt->execute();

              $result = $stmt->fetchAll();

              if (count($result) > 0) {
                foreach($result as $row) {
                  $data[$row['id']] = [$row['id'], $row['name'], $row['review'], $row['rating'], $row['email'], $row['date_updated']];

                  if ($row['rating'] < 0) {
                    $row['rating'] = 0;
                  } else if ($row['rating'] > 5) {
                    $row['rating'] = 5;
                  }

                  if ($row['rating'] == 1) {
                    $stars = "star";
                  } else {
                    $stars = "stars";
                  }

                  $row['name'] = explode(" ", $row['name']);


                  $row['date_updated'] = date('F j, Y', strtotime($row['date_updated']));

                  echo("<div class='card mb-2'>
                  <div class='card-body' id='review{$row['id']}'>
                    <div class='row'>
                      <div class='col-md-3'><h4 class='card-title'>{$row['name'][0]} {$row['name'][1][0]}.</h4><p>{$row['date_updated']}</p></div>
                      <div class='col-md-7'><p class='card-text'><strong>Review:</strong><br>{$row['review']}</p></div>
                      <div class='col-md-2'><p class='card-text'>{$row['rating']} " . $stars . "</p>
                      ");
                  for($i = 0; $i < floor($row['rating']); $i++) {
                    echo "<i class='fa fa-star' style='color: gold; -webkit-text-stroke: black 0.5px;' aria-hidden='true'></i>";
                  }
                  if ($row['rating'] == 0.5 || $row['rating'] == 1.5 || $row['rating'] == 2.5 || $row['rating'] == 3.5 || $row['rating'] == 4.5) {
                    echo "<i class='fa fa-star-half' style='color: gold; -webkit-text-stroke: black 0.5px;' aria-hidden='true'></i>";
                  }
                  echo("</div>
                    </div>
                  </div>
                  </div>");
                }
              } else {
                echo '<p>No reviews haev been posted yet.</p>';
              }
            ?>
            <p class="card-text">
              <div class="row">
                <div class="col-md-3">
                  <strong>Average Rating:</strong><br>
                  <?php
                    $stmt = $pdo->prepare("SELECT * FROM `walrus-reviews` ORDER BY `date_updated` DESC LIMIT 25");
                    $stmt->execute();

                    $result = $stmt->fetchAll();

                    if (count($result) > 0) {
                      $starAvg = 0;
                      foreach($result as $row) {
                        $starAvg += $row['rating'];
                      }
                      $average = $starAvg / (count($result));

                      if ($row['rating'] < 0) {
                        $row['rating'] = 0;
                      } else if ($row['rating'] > 5) {
                        $row['rating'] = 5;
                      }

                      if ($row['rating'] == 1) {
                        $stars = "star.";
                      } else {
                        $stars = "stars.";
                      }

                      echo round($average, 2) . " $stars";
                    } else {
                      echo '<p>No reviews haev been posted yet.</p>';
                    }
                  ?>
                </div>
                <div class="col-md-9">
                  <a href="./?reviewMore" class="btn btn-primary btn-block">See More</a>
                </div>
              </div>
            </p>
          </div>
        </div>
      </div>

      <div class="card mb-2">
        <div class="card-header">
          <h4 class="card-title">Write us a Review!</h4>
        </div>
        <div class="card-body">
          <p class="card-text">We need to know how we can improve and where we are doing our best, so please give us a review.<br>All input is helpful and if we need to, we will get in contact with you if you request so.</p>
        </div>
      </div>

      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Review Form</h4>
        </div>
        <div class="card-body">
          <form action="./?reviewForm" method="POST">
            <div class="form-group">
              <label for="name">Your Name</label>
              <input type="text" class="form-control" name="name" id="name" placeholder="Your First and Last Name" required>
              <small id="nameHelpId" class="form-text text-muted">We ask for your last name in order to address you formally if needed. The final review will only show the first letter of your last name to protect your identity.</small>
            </div>
            <div class="form-group">
              <label for="subject">You Rating (#/5)</label>
              <input type="number" class="form-control" name="rating" id="rating" placeholder="5" step="0.5" min="0" max="5" required>
              <small id="nameHelpId" class="form-text text-muted">Please only pick whole numbers or 0.5 increments.</small>
            </div>
            <div class="form-group">
              <label for="message">Review</label>
              <input type="text" class="form-control" name="review" id="review" placeholder="What would you like to tell us?" required>
            </div>
            <div class="form-group">
              <label for="email">Your Email</label>
              <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelpId" placeholder="Your Email" required>
              <small id="emailHelpId" class="form-text text-muted">We ask for your email so we can contact you if needed. We do not share any of the information in which we have requested from you today.</small>
            </div>
            <div class="form-group">
              <input type="submit" class="btn btn-block btn-primary" value="SUBMIT">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>