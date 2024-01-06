<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOMEPAGE</title>
    <link rel="stylesheet" href="assets/bootstrap.min.css">
    <script src="js/jquery-3.7.1.js"></script>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="bg-dark text-light">
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
        <div>
            <div class="d-flex justify-content-between">
                <h2>Trending Songs</h2>
                <span>see all</span>
            </div>
            <div class="row">
                <?php 
                    for($i=0;$i<6;$i++) {
                        playlist_card($playlists[$i]);
                    }
                ?>
            </div>
        </div>
        <div>
            <div class="d-flex justify-content-between">
                <h2>Top Charts</h2>
                <span>see all</span>
            </div>
            <div class="row">
                <?php 
                    for($i=5;$i<=11;$i++) {
                        playlist_card($playlists[$i]);
                    }
                ?>
            </div>
        </div>
        
    </div>
    <?php ?>
    <script> src="js/main.js"</script>

</body>
</html>