<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php 
        function playlist_card($playlist){
            $id = $playlist['playlistid'];
            ?>
            <div class="col-sm-6 col-md-4 col-lg-2 card border-0 playlist-card" data-playlist-id="<?php echo $id; ?>">
                <img src="<?php echo $playlist["image"]; ?>" class="card-img-top" style="height:200px;width:200px" alt="">
                <div class="card-body">
                    <h4><?php echo $playlist["playlistname"]; ?></h4>
                </div>
            </div>
            <?php
        }

        function artist_card($artist){
            ?>
            <div class="col-md-2 col-sm-6">
                <div class="card  border-0 rounded-3">
                    <div class="img-hover border border-4 border-black rounded-circle">
                        <img src="assets/images/img.jpeg" class="card-img-top rounded-circle img-hover " alt="playlist image">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Playlist name</h5>
                    </div>
                </div>
            </div>
            <?php
        }
    ?>

    <script src="js/jquery-3.7.1.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
