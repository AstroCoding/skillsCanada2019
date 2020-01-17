<nav class="navbar navbar-expand-sm navbar-dark bg-dark mb-4">
    <a class="navbar-brand" href="../?home">Walrus & The Carpenter</a>
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
        aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars" aria-hidden="true" style="color: white;"></i></button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item">
                <a class="nav-link" href="./?loggedIn"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
            </li>
            <li class="nav-item active dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-table" aria-hidden="true"></i> Reviews</a>
                <div class="dropdown-menu" aria-labelledby="dropdownId">
                    <a class="dropdown-item active" href="./?pending">Pending</a>
                    <a class="dropdown-item" href="./?approved">Approved</a>
                </div>
            </li>
          <li class="nav-item">
              <a class="nav-link" href="./?logout"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a>
          </li>
        </ul>
    </div>
</nav>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-12 pl-2 pr-2">
      <h1>Pending Reviews:</h1>
      <table class="table">
        <thead>
          <tr>
            <th>id</th>
            <th>Name</th>
            <th>Review</th>
            <th>Rating</th>
            <th>Email</th>
            <th>Date</th>
            <th></th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php
            $stmt = $pdo->prepare("SELECT * FROM `pending-reviews` ORDER BY `date_updated` DESC");
            $stmt->execute();

            $result = $stmt->fetchAll();

            if (count($result) > 0) {
              foreach($result as $row) {
                echo "
                <tr id='row{$row['id']}'>
                  <td scope='row'>{$row['id']}</td>
                  <td>{$row['name']}</td>
                  <td>{$row['review']}</td>
                  <td>{$row['rating']}</td>
                  <td>{$row['email']}</td>
                  <td>{$row['date_updated']}</td>
                  <td><button type='button' class='btn btn-secondary' data-toggle='modal' data-target='#pen_app{$row['id']}'>
                    Approve
                  </button></td>
                  <td><button type='button' class='btn btn-secondary' data-toggle='modal' data-target='#pen_del{$row['id']}'>
                    Delete
                  </button></td>
                  <td><button type='button' class='btn btn-secondary' data-toggle='modal' data-target='#pen_edit{$row['id']}'>
                    Edit
                  </button></td>
                </tr>";

                echo "
                <div class='modal fade' id='pen_app{$row['id']}' tabindex='-1' role='dialog' aria-labelledby='modelTitleId' aria-hidden='true'>
                  <div class='modal-dialog' role='document'>
                    <div class='modal-content'>
                        <div class='modal-header'>
                            <h5 class='modal-title'>Are You Sure?</h5>
                              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                              </button>
                          </div>
                      <div class='modal-body'>
                        <div class='container-fluid'>
                          Once you do this, you will not be able to undo it.
                        </div>
                      </div>
                      <div class='modal-footer'>
                        <button type='button' class='btn btn-primary' onclick='approveRow({$row['id']});'>Approve</button>
                        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class='modal fade' id='pen_del{$row['id']}' tabindex='-1' role='dialog' aria-labelledby='modelTitleId' aria-hidden='true'>
                  <div class='modal-dialog' role='document'>
                    <div class='modal-content'>
                        <div class='modal-header'>
                            <h5 class='modal-title'>Are You Sure?</h5>
                              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                              </button>
                          </div>
                      <div class='modal-body'>
                        <div class='container-fluid'>
                          Once you do this, you will not be able to undo it.
                        </div>
                      </div>
                      <div class='modal-footer'>
                        <button type='button' class='btn btn-primary' onclick='deleteRow({$row['id']});'>Delete</button>
                        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class='modal fade' id='pen_edit{$row['id']}' tabindex='-1' role='dialog' aria-labelledby='modelTitleId' aria-hidden='true'>
                  <div class='modal-dialog' role='document'>
                    <div class='modal-content'>
                        <div class='modal-header'>
                            <h5 class='modal-title'>Edit:</h5>
                              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                              </button>
                          </div>
                      <div class='modal-body'>
                        <div class='container-fluid'>
                          <div class='form-group'>
                            Name:
                            <input type='text' class='form-control' placeholder='Name' value='{$row['name']}' id='name'>
                            Review:
                            <input type='text' class='form-control' placeholder='Review' value='{$row['review']}' id='review'>
                            Rating:
                            <input type='number' class='form-control' placeholder='Rating' min='0' max='5' step='0.5' id='rating' value='{$row['rating']}'>
                            Email:
                            <input type='email' class='form-control' placeholder='Email' value='{$row['email']}' id='email'>
                            Date:
                            <input type='text' class='form-control' placeholder='Timestamp' value='{$row['date_updated']}' id='date'>
                          </div>
                        </div>
                      </div>
                      <div class='modal-footer'>
                        <button type='button' class='btn btn-primary' onclick='editRow({$row['id']});'>Edit</button>
                        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                      </div>
                    </div>
                  </div>
                </div>";
              }
            } else {
              echo "
              <tr>
                <td scope='row'>0</td>
                <td>No</td>
                <td>Reviews</td>
                <td>Currently.</td>
                <td>Sorry</td>
                <td>for that.</td>
              </tr>";
            }
          ?>
        </tbody>
      </table>

      <script>
        function approveRow(id) {
          let true_id = $("table.table").find("tbody").find(`tr#row${id}`).children("td:eq(0)").text(), true_name = $("table.table").find("tbody").find(`tr#row${id}`).children("td:eq(1)").text(), true_review = $("table.table").find("tbody").find(`tr#row${id}`).children("td:eq(2)").text(), true_rating = $("table.table").find("tbody").find(`tr#row${id}`).children("td:eq(3)").text(), true_email = $("table.table").find("tbody").find(`tr#row${id}`).children("td:eq(4)").text(), true_date = $("table.table").find("tbody").find(`tr#row${id}`).children("td:eq(5)").text();
          let data = {
            "type": "pen_app",
            "id": true_id,
            "name": true_name,
            "review": true_review,
            "rating": true_rating,
            "email": true_email,
            "date": true_date,
          };

          $.ajax({
            type: "POST",
            url: "./reviews.php",
            data: data,
            success: function (response) {
              console.log(response);
              $(`div#pen_app${id}`).modal("hide");
              location.reload();
            }
          });
        }
        function deleteRow(id) {
          let true_id = $("table.table").find("tbody").find(`tr#row${id}`).children("td:eq(0)").text(), true_name = $("table.table").find("tbody").find(`tr#row${id}`).children("td:eq(1)").text();
          let data = {
            "type": "pen_del",
            "id": true_id,
            "name": true_name
          };

          $.ajax({
            type: "POST",
            url: "./reviews.php",
            data: data,
            success: function (response) {
              console.log(response);
              $(`div#pen_del${id}`).modal("hide");
              location.reload();
            }
          });
        }
        function editRow(id) {
          let true_name = $(`div#pen_edit${id}`).find(".modal-dialog").find(".modal-body").find(".container-fluid").find("div.form-group").find("input:eq(0)").val(),
          true_review = $(`div#pen_edit${id}`).find(".modal-dialog").find(".modal-body").find(".container-fluid").find("div.form-group").find("input:eq(1)").val(),
          true_rating = $(`div#pen_edit${id}`).find(".modal-dialog").find(".modal-body").find(".container-fluid").find("div.form-group").find("input:eq(2)").val(),
          true_email = $(`div#pen_edit${id}`).find(".modal-dialog").find(".modal-body").find(".container-fluid").find("div.form-group").find("input:eq(3)").val(),
          true_date = $(`div#pen_edit${id}`).find(".modal-dialog").find(".modal-body").find(".container-fluid").find("div.form-group").find("input:eq(4)").val();

          let data = {
            "type": "pen_edit",
            "id": id,
            "name": true_name,
            "review": true_review,
            "rating": true_rating,
            "email": true_email,
            "date": true_date
          };

          $.ajax({
            type: "POST",
            url: "./reviews.php",
            data: data,
            success: function (response) {
              console.log(response);
              $(`div#pen_edit${id}`).modal("hide");
              location.reload();
            }
          });
        }
      </script>
    </div>
  </div>
</div>
