<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOMEPAGE</title>
    <link rel="stylesheet" href="assets/bootstrap.min.css">
    <script src="js/jquery-3.7.1.js"></script>
</head>
<body>
    <?php 
        require_once("db_connect.php");
        require_once("cards.php");
        $qry="SELECT * FROM playlist";
        $result=$conn->query($qry);
        $playlists=[];
        while($row=$result->fetch_assoc()){
            array_push($playlists,$row);
        }
    ?>
    <div class="container">
        <div><h1>Good Morning</h1></div>
        <div>
            <div class="d-flex justify-content-between">
                <h2>Trending Songs</h2>
                <span>see all</span>
            </div>
            <div class="row">
                <?php 
                    foreach ($playlists as $playlist ) {
                        playlist_card($playlist);
                    }
                ?>
            </div>
        </div>
        <div>
            <div class="d-flex justify-content-between">
                <h2>Top Songs</h2>
                <span>see all</span>
            </div>
            <div class="row">
                <?php 
                    foreach ($playlists as $playlist ) {
                        playlist_card($playlist);
                    }
                ?>
            </div>
        </div>
        <div>
            <div class="d-flex justify-content-between">
                <h2>Featured Artist</h2>
                <span>see all</span>
            </div>
            <div class="row">
                <?php 
                    foreach ($playlists as $playlist ) {
                        artist_card($playlist);   
                    }
                ?>
            </div>
        </div>
    </div>
    <?php ?>
    <script> src="js/main.js"</script>

</body>
</html>