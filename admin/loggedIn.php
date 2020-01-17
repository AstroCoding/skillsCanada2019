<nav class="navbar navbar-expand-sm navbar-dark bg-dark mb-4">
    <a class="navbar-brand" href="../?home">Walrus & The Carpenter</a>
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
        aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars" aria-hidden="true" style="color: white;"></i></button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link" href="./?loggedIn"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-table" aria-hidden="true"></i> Reviews</a>
                <div class="dropdown-menu" aria-labelledby="dropdownId">
                    <a class="dropdown-item" href="./?pending">Pending</a>
                    <a class="dropdown-item" href="./?approved">Approved</a>
                </div>
            </li>
          <li class="nav-item">
              <a class="nav-link" href="./?logout"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a>
          </li>
        </ul>
    </div>
</nav>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">
            This would be a home page
          </h4>
        </div>
        <div class="card-body">
          <p class="card-text">
            However, the homepage isn't the requriement for this competition.<br>
            Please use the menu above to go to the reveiw pages.
          </p>
        </div>
      </div>
      <div class="col-md-12 mt-4">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">
            Reviews
          </h4>
        </div>
        <div class="card-body">
          <p class="card-text">
            This card talks about the review pages. Inside it are two more cards, each with a link and quick discription.
            <div class="card-deck">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Pending Reviews <i class="fa fa-table" aria-hidden="true"></i></h4>
                  <p class="card-text">Check out and approve any pending reviews here:</p>
                  <a href="./?pending" class="btn btn-secondary btn-block">Pending Reviews</a>
                </div>
              </div>
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Approved Reviews <i class="fa fa-table" aria-hidden="true"></i></h4>
                  <p class="card-text">Check out and remove any approved reviews here:</p>
                  <a href="./?approved" class="btn btn-secondary btn-block">Approved Reviews</a>
                </div>
              </div>
            </div>
          </p>
        </div>
      </div>
    </div>
  </div>
</div>