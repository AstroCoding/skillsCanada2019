<div class="row"'>
  <div class="col-12">
    <div class="card">
      <div class="card-body" id="imgcar">
        <div class="row" id='caroCont'>
          <div class="col-md-2">
            <button type="button" onclick="this.blur(); prevImage();"><i class="fa fa-caret-left" aria-hidden="true"></i></button>
          </div>
          <div class="col-md-8 text-center">
            <div class="carOverlay">
              <div id="logo">
                <img src="./assets/images/walrus-carpenter-logo.png" alt="logo" style="width: 100%;">
              </div>
              <br>
              <div id="slogan" class="text-center" style="width: 100%;">
                <h2>This is a bad Slogan</h2>
              </div>
            </div>
          </div>
          <div class="col-md-2 text-right">
            <button type="button" onclick="this.blur(); nextImage();"><i class="fa fa-caret-right"></i></button>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  <div class="row">
    <div class="col-md-12 mt-4 text-center justify-center-center" id="a-link-container">
      <a class="link" href="./?menu">Menu</a>
      <a class="link" href="./?review">Reviews</a>
      <a class="link" href="./?locations">Locations</a>
      <a class="link" href="./?contact">Contact</a>
    </div>
  </div>
</div>

<script>
  let backgrounds = ["./assets/images/walrus-photo-1.jpg", "./assets/images/walrus-photo-2.jpg", "./assets/images/walrus-photo-3.jpg", "./assets/images/walrus-photo-6.jpg", "./assets/images/walrus-photo-4.jpg", "./assets/images/walrus-photo-5.jpg"];

  var $imgnum = 0, maximgs = backgrounds.length - 1, imageTimer = setInterval(nextImage, 10000);

  $(document).ready(function () {
    $("#imgcar").css("background-image", `url("${backgrounds[$imgnum]}")`);
  });

  function nextImage() {
    $("#imgcar").fadeToggle("slow");
    setTimeout(() => {
      if ($imgnum >= 0 && $imgnum < maximgs) {
        $imgnum += 1;
      } else if ($imgnum == maximgs) {
        $imgnum = 0;
      }
      $("#imgcar").css("background-image", `url("${backgrounds[$imgnum]}")`);
      clearInterval(imageTimer);
      imageTimer = setInterval(nextImage, 10000);
      $("#imgcar").fadeToggle("slow");
    }, 500);
  }

  function prevImage() {
    $("#imgcar").fadeToggle("slow");
    setTimeout(() => {
      if ($imgnum > 0 && $imgnum <= maximgs) {
        $imgnum -= 1;
      } else if ($imgnum == 0) {
        $imgnum = maximgs;
      }
      $("#imgcar").css("background-image", `url("${backgrounds[$imgnum]}")`);
      clearInterval(imageTimer);
      imageTimer = setInterval(nextImage, 10000);
      $("#imgcar").fadeToggle("slow");
    }, 500);
  }
</script>