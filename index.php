<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="assets/bootstrap.min.css">
    <script src="js/jquery-3.7.1.js"></script>
    <script
      src="https://kit.fontawesome.com/63580e7368.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <section id="header bg-purple">
    <nav class="navbar navbar-expand-lg bg-purple  ">
  <div class="container-fluid">
    <!-- <a class="navbar-brand" href="#">Navbar scroll</a> -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <img class="img-fluid d-none d-md-block"height="20px"width="100px"
          src="assets/remonu.png" alt="">
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
        <li class="nav-item">
          <button class="nav-link active text-light" aria-current="page" id="homebtn"><span class="d-block">Home</span></button>
        </li>
        <li class="nav-item">
          <button class="nav-link text-light" id="playlistbtn">playlist</button>
        </li>
        <li class="nav-item dropdown">
          <button class="nav-link text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            favroutes
          </button>
        </li>
      </ul>
    </div>
    <?php
    if (isset($_SESSION["id"])) {
      ?>
         <div class="loginbtn text-light nav-link dropdown-toggle" id="profilebtn" aria-expanded="false">
    <i class="fa-regular fa-user"></i><?php echo $_SESSION['login_user'] ?>
  </div>
  <ul class="dropdown-menu" aria-labelledby="profilebtn">
    <li><a class="dropdown-item" href="#">Action</a></li>
    <li><a class="dropdown-item" href="#">Another action</a></li>
    <li><hr class="dropdown-divider"></li>
    <li><a class="dropdown-item" href="#">Something else here</a></li>
  </ul>
    </div>
          <?php

    } else {
      ?>
      <button class=" btn btn-dark loginbtn text-lgiht" id="loginbtn">Login/signup</button>
    <?php } ?>
  </div>
</nav>
    </section>

    <section id="content">
    <?php
    include_once("homepage.php");
    ?>
    </section>
    <section id="footer">
     <?php require_once("footer.php"); ?>
    </section>
    <section id="player"  data-songid="" data-playlistid="">
    <audio  id="song" >
      <source id="song-source"
        src=""/>
    </audio>
    <div class="container-fluid p-2 row">
      <div class="col-4 d-none d-md-flex justify-content-center align-items-center">
       
        <div>
          <h5 id="song-name"></h5> 
          <p id="song-artist"></p>
        </div>
      </div>

      <div class="col-12 col-md-6 row">
      <div class="col-12">
          <input id="progress" type="range" class="form-range"  />
        </div>
        <div class="w-100 mx-auto text-center col-12">

          <button onclick="loadPreviousSong()" class="btn btn-danger"
            ><i class="fa-solid fa-backward-fast"></i
          ></button>
          <button
            id="controlIcon"
            onclick="playPause()"
            class="btn btn-lg btn-circle btn-danger"
          >
            <i id="ctrl" class="fa-solid fa-play"></i>
          </button>
          <button onclick="loadNextSong()" class="btn btn-danger" id="nextbtn">
            <i class="fa-solid fa-backward-fast fa-rotate-180"></i>
          </button>
        </div>
        
      </div>
    </div>
    <!-- <script src="javascript/media-play.js"></script> -->
    
    </section>
    <script src="js/main.js"></script>
    <script src="js/media-play.js"></script>
    <script src="assets/bootstrap.bundle.min.js"></script>
</body>
</html>