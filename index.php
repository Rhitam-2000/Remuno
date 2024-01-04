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
    <section id="header">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <!-- <a class="navbar-brand" href="#">Navbar scroll</a> -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
        <li class="nav-item">
          <button class="nav-link active" aria-current="page" id="homebtn">Home</button>
        </li>
        <li class="nav-item">
          <button class="nav-link" href="#">playlist</button>
        </li>
        <li class="nav-item dropdown">
          <button class="nav-link " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            favroutes
          </button>
        </li>
      </ul>
    </div>
    <?php 
      if(isset($_SESSION["id"]))
      {
        ?>
        <div class="loginbtn" id="profilebtn"><?php echo "cirlce".$_SESSION['login_user']?></div>
        <?php
      }else{
    ?>
    <div class="loginbtn" id="loginbtn">Login/signup</div>
    <?php }?>
  </div>
</nav>
    </section>
    <section id="content">
    <?php 
      include_once("homepage.php");
    ?>
    </section>
    <section id="player" data-songid="" data-playlistid="">
    <audio  id="song">
      <source id="song-source"
        src=""
        
      />
    </audio>
    <div class="container-fluid p-2 row">
      <div class="col-4 d-none d-md-flex">
        <div class="box-2">
          <!-- <img src="assets/images/img.jpeg" class="img-fluid w-10" alt="Your Image" /> -->
        </div>
        <div>
          <!-- <h2><?php echo $name;?></h2> -->
          <!-- <p><?php echo $author;?></p> -->
        </div>
      </div>

      <div class="col-12 col-md-6 row">
      <div class="col-12">
          <input id="progress" type="range" class="form-range" />
        </div>
        <div class="w-100 mx-auto text-center col-12">

          <button onclick="loadPreviousSong()" class="btn btn-danger"
            ><i class="fa-solid fa-backward-fast"></i
          ></button>
          <button
            id="controlIcon"
            href="#"
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