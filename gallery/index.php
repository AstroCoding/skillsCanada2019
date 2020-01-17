<div class="row">
  <div class="col-md-12 mb-2 ml-2 mr-2">
    <div class="card">
      <div class="card-header"><h4>The Gallery</h4></div>
      <div class="card-body">
        <div class="card-text">Welcome to the gallery. Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet eaque adipisci debitis id nobis, enim illum officiis laboriosam quod qui voluptate consequuntur cum! Fuga ratione dicta saepe possimus doloribus non.</div>
      </div>
    </div>
  </div>
  <div class="col-md-12 ml-4">
    <button type="button" class="box text-left" data-toggle="modal" data-target="#modelId" onclick="setImg(0);">
      <img src="./assets/images/walrus-photo-1.jpg" alt="Image 1">
    </button>
    <button type="button" class="box text-left" data-toggle="modal" data-target="#modelId" onclick="setImg(1);">
      <img src="./assets/images/walrus-photo-2.jpg" alt="Image 1">
    </button>
    <button type="button" class="box text-left" data-toggle="modal" data-target="#modelId" onclick="setImg(2);">
      <img src="./assets/images/walrus-photo-3.jpg" alt="Image 1">
    </button>
    <button type="button" class="box text-left" data-toggle="modal" data-target="#modelId" onclick="setImg(3);">
      <img src="./assets/images/walrus-photo-4.jpg" alt="Image 1">
    </button>
    <button type="button" class="box text-left" data-toggle="modal" data-target="#modelId" onclick="setImg(4);">
      <img src="./assets/images/walrus-photo-5.jpg" alt="Image 1">
    </button>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Browse Images</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="desktop-buttons left">
                <button onclick="prevImage();"><i class="fa fa-caret-left" aria-hidden="true"></i></button>
              </div>
              <div class="text-center"><img id="modalImg" src="./assets/images/walrus-photo-1.jpg" alt="Image"></div>
              <div class="desktop-buttons right">
                <button onclick="nextImage();"><i class="fa fa-caret-right" aria-hidden="true"></i></button>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 text-center justify-center-center mobile-buttons"><button onclick="prevImage();"><i class="fa fa-caret-left" aria-hidden="true"></i></button><button onclick="nextImage();"><i class="fa fa-caret-right" aria-hidden="true"></i></button></div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
  $('#exampleModal').on('show.bs.modal', event => {
    var button = $(event.relatedTarget);
    var modal = $(this);
    // Use above variables to manipulate the DOM
  });

  let backgrounds = ["./assets/images/walrus-photo-1.jpg", "./assets/images/walrus-photo-2.jpg", "./assets/images/walrus-photo-3.jpg", "./assets/images/walrus-photo-4.jpg", "./assets/images/walrus-photo-5.jpg"];


  function setImg(arrayVal) {
    $("#modalImg").attr("src", `${backgrounds[arrayVal]}`);
  };

  var $imgnum = 0, maximgs = backgrounds.length - 1, imageTimer = setInterval(nextImage, 10000);

  function nextImage() {
    $("#modalImg").fadeToggle("fast");
    $(".left").find("button").attr("onclick", "");
    $(".right").find("button").attr("onclick", "");
    $(".mobile-button").find("button:eq(0)").attr("onclick", "");
    $(".mobile-button").find("button:eq(1)").attr("onclick", "");

    setTimeout(() => {
      if ($imgnum >= 0 && $imgnum < maximgs) {
        $imgnum += 1;
      } else if ($imgnum == maximgs) {
        $imgnum = 0;
      }
      $("#modalImg").attr("src", `${backgrounds[$imgnum]}`);
      $("#modalImg").fadeToggle("fast");
      clearInterval(imageTimer);
      imageTimer = setInterval(nextImage, 10000);
      $(".left").find("button").attr("onclick", "prevImage();");
      $(".right").find("button").attr("onclick", "nextImage();");
      $(".mobile-button").find("button:eq(0)").attr("onclick", "prevImage();");
      $(".mobile-button").find("button:eq(1)").attr("onclick", "nextImage();");
    }, 190);
  }

  function prevImage() {
    $("#modalImg").fadeToggle("fast");
    $(".left").find("button").attr("onclick", "");
    $(".right").find("button").attr("onclick", "");
    $(".mobile-button").find("button:eq(0)").attr("onclick", "");
    $(".mobile-button").find("button:eq(1)").attr("onclick", "");

    setTimeout(() => {
      if ($imgnum > 0 && $imgnum <= maximgs) {
        $imgnum -= 1;
      } else if ($imgnum == 0) {
        $imgnum = maximgs;
      }
      $("#modalImg").attr("src", `${backgrounds[$imgnum]}`);
      $("#modalImg").fadeToggle("fast");
      clearInterval(imageTimer);
      imageTimer = setInterval(nextImage, 10000);
      $(".left").find("button").attr("onclick", "prevImage();");
      $(".right").find("button").attr("onclick", "nextImage();");
      $(".mobile-button").find("button:eq(0)").attr("onclick", "prevImage();");
      $(".mobile-button").find("button:eq(1)").attr("onclick", "nextImage();");
    }, 190);
  }
</script>