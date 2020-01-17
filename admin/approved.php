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
                    <a class="dropdown-item" href="./?pending">Pending</a>
                    <a class="dropdown-item active" href="./?approved">Approved</a>
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
    <h1>Approved Reviews:</h1>
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
        </tr>
        </thead>
        <tbody>
        <?php
            $stmt = $pdo->prepare("SELECT * FROM `walrus-reviews` ORDER BY `date_updated` DESC");
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
                <td><button type='button' class='btn btn-secondary' data-toggle='modal' data-target='#pen_del{$row['id']}'>
                    Delete
                </button></td>
                </tr>";

                echo "
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
    function deleteRow(id) {
        let true_id = $("table.table").find("tbody").find(`tr#row${id}`).children("td:eq(0)").text(), true_name = $("table.table").find("tbody").find(`tr#row${id}`).children("td:eq(1)").text();
        let data = {
            "type": "app_del",
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
    </script>
    </div>
</div>
</div>