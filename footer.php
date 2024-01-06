<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer</title>
    <link rel="stylesheet" href="./css/footer-style.css">
    <link rel="stylesheet" href="assets/bootstrap.min.css">
    <script src="./js/jquery-3.7.1.js"></script>
</head>
<body>
    <!-- Remove the container if you want to extend the Footer to full width. -->

  <!-- Footer -->
  <footer 
          class="text-center text-lg-start text-white mb-5"
          style="background-color: #45526e"
          >
    <!-- Grid container -->
    <div class="container p-4 pb-0">
      <!-- Section: Links -->
      <section class="">
        <!--Grid row-->
        <div class="row">
          <!-- Grid column -->
          <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
            <h6 class="text-uppercase mb-3  font-weight-bold">
              Remuno
            </h6>
            <p class= "mb-2"> 
              Remuno is an innovative music streaming platform that offers a diverse range of genres, personalized playlists, and high-quality audio. Discover, stream, and share your favorite tunes seamlessly.
            </p>
          </div>
          <!-- Grid column -->

          <hr class="w-100 clearfix d-md-none" />

          <!-- Grid column -->
          <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
            <h6 class="text-uppercase mb-4 font-weight-bold">Products</h6>
            <p class="m-0">
              <a  class="btn footerbtn border-0 p-0">REmuno</a>
            </p>
            <p class="m-0">
              <a class="btn footerbtn border-0 p-0">Diseal</a>
            </p>
            
          </div>
          <!-- Grid column -->

          <hr class="w-100 clearfix d-md-none" />

          <!-- Grid column -->
          <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
            <h6 class="text-uppercase mb-4 font-weight-bold">
              Useful links
            </h6>
            <p class="m-0">
              <button  onclick="getprofile()" class="btn footerbtn border-0 p-0">Your Account</button>
            </p>
            <p class="m-0">
              <button  onclick="getHome()" class="btn footerbtn border-0 p-0">Home</button>
            </p>
            <p class="m-0">
              <button  onclick="getPlaylist()" class="btn footerbtn border-0 p-0">Playlist</button>
            </p>
            <p class="m-0">
              <button  onclick="getLogout()" class="btn footerbtn border-0 p-0">Logout</button>
            </p>
          </div>

          <!-- Grid column -->
          <hr class="w-100 clearfix d-md-none" />

          <!-- Grid column -->
          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
            <h6 class="text-uppercase mb-4 font-weight-bold">Contact</h6>
            <p class="m-0"><i class="fas fa-home mr-3"></i> New York, NY 10012, US</p>
            <p class="m-0"><i class="fas fa-envelope mr-3"></i> info.remuno@gmail.com</p>
            <p class="m-0"><i class="fas fa-phone mr-3"></i>+91 933104476</p>
            <p class="m-0"><i class="fas fa-print mr-3"></i>+91 7749818230</p>
            <br>
            <br>
          </div>
          <!-- Grid column -->
        </div>
        <!--Grid row-->
      </section>
      <!-- Section: Links -->

      <hr class="my-3">

      <!-- Section: Copyright -->
      <section class="p-3 pt-0 mb-5">
        <div class="row d-flex align-items-center mb-5">
          <!-- Grid column -->
          <div class="col-md-7 col-lg-8 text-center text-md-start mb-5">
            <!-- Copyright -->
            <div class="p-3">
              © 2024 Copyright:
              <a class="text-white" href=""
                 >Remuno.com</a
                >
            </div>
            <!-- Copyright -->
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-5 col-lg-4 ml-lg-0 text-center text-md-end mb-5">
            <!-- Facebook -->
            <a
               class="btn btn-outline-light btn-floating m-1"
               class="text-white"
               role="button"
               ><i class="fab fa-facebook-f"></i
              ></a>

            <!-- Twitter -->
            <a
               class="btn btn-outline-light btn-floating m-1"
               class="text-white"
               role="button"
               ><i class="fab fa-twitter"></i
              ></a>

            <!-- Google -->
            <a

               class="btn btn-outline-light btn-floating m-1"
               class="text-white"
               role="button"
               ><i class="fab fa-google"></i
              ></a>

            <!-- Instagram -->
            <a
              href="https://www.instagram.com/shubhasmita33?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw=="
               class="btn btn-outline-light btn-floating m-1"
               class="text-white"
               role="button"
               ><i class="fab fa-instagram"></i
              ></a>
          </div>
          <!-- Grid column -->
        </div>
      </section>
      <!-- Section: Copyright -->
    </div>
    <!-- Grid container -->
  </footer>
  <!-- Footer -->

<!-- End of .container -->
    <script src="assets\bootstrap.bundle.min.js"></script>
    <script src="./js/main.js"></script>
</body>
</html>