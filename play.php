<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Playing components</title>
    <link rel="stylesheet" href="assets/bootstrap.min.css" />
    <link rel="stylesheet" href="css/q.css" />
    <script
      src="https://kit.fontawesome.com/63580e7368.js"
      crossorigin="anonymous"
    ></script>
    <style>
      .footer{
        width:100%;
        position: absolute;
        bottom: 0;
        left:0;
      }
    </style>
  </head>

  <body>
    <?php 
    function display_footer($songid){
      require_once("db-connect.php");
      $qry="SELECT * FROM song where songid=$songid";
      $res=$conn->query($qry);
      $name="";
      $id="";
      $path="";
      $author="";
      if($data=$res->fetch_assoc()){
        $name=$data["sname"];
        $id=$data["songid"];
        $path=$data["path"];
        $author=$data["sartist"];
      }
      ?>
    <div class="footer">
    <audio  id="song">
      <source id="song-source"
        src="<?php echo $path;?>"
      />
    </audio>
    <div class="container-fluid p-2 row">
      <div class="col-4 d-none d-md-flex">
        <div class="box">
          <img src="assets/images/img.jpeg" class="img-fluid" alt="Your Image" />
        </div>
        <div>
          <h2><?php echo $name;?></h2>
          <p><?php echo $author;?></p>
        </div>
      </div>

      <div class="col-12 col-md-6 row">
        <div class="w-100 mx-auto text-center col-12">
          <a href="#" class="btn btn-danger"
            ><i class="fa-solid fa-backward-fast"></i
          ></a>
          <button
            id="controlIcon"
            href="#"
            onclick="playPause()"
            class="btn btn-lg btn-circle btn-danger"
          >
            <i id="ctrl" class="fa-solid fa-play"></i>
          </button>
          <button href="#" class="btn btn-danger" id="controlIcon">
            <i class="fa-solid fa-backward-fast fa-rotate-180"></i>
          </button>
        </div>
        <div class="col-12">
          <input id="progress" type="range" class="form-range" />
        </div>
      </div>
    </div>
    <script src="javascript/media-play.js"></script>
    </div>
    <?php
    }
    ?>
  </body>
</html>
