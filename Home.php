<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="css/home.css" />
  </head>

  <body>
    <video autoplay muted loop id="myVideo">
      <source src="src/video/promo.mp4" type="video/mp4" />
      Your browser does not support HTML5 video.
    </video>
    <div class="content1">
      <img src="src/img/logoo.jpg" />
      <center>
        <h1>MISS BEAUTY</h1>
      </center>
    </div>
    <div class="content">
      <center>
        <p>
          Best beauty shopping destination to buy cosmetic products, hair
          products , skincare based on your persona & more from top beauty
          brands.This trusted beauty brand stocks a wide range of items, from
          best-selling foundations to lip color to eyeshadow palettes. Buy
          beauty products online at best prices.
        </p>
        <button class="myBtn"  style="background-color:hotpink;height:50px;width:130px;">
          <a style="text-decoration: none;" href="main.php"
            ><span>KNOW MORE</span></a>
        </button>
      </center>
    </div>

    <!-- <script>
var video = document.getElementById("myVideo");
var btn = document.getElementById("myBtn");

function myFunction() {
  if (video.paused) {
    video.play();
    btn.innerHTML = "Pause";
  } else {
    video.pause();
    btn.innerHTML = "Play";
  }
}
</script> -->
  </body>
</html>
