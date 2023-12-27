<?php
function music_song_card($song,$playlistId) {
    ?>
    <div class="card" style="width: 18rem;" onclick="changeSong(<?php echo $song['songid']; ?>,<?php echo $playlistId ?>)">
        <img class="card-img-top" src="assets/images/disk.png" alt="Card image cap">
        <div class="card-body">
            <p class="card-text"><?php echo $song["name"];?></p>
        </div>
    </div>
    <?php
}
require_once("db_connect.php");
function getPlaylistContent($playlistId,$conn) {
    $sql = "SELECT s.songid AS songid,s.sname as name, s.sartist as artist,s.path as path FROM song s INNER JOIN belong b ON s.songid = b.songid WHERE b.playlistid = $playlistId";
    
    $result =  $conn->query($sql);
    ?>
    <div class="d-flex">
        <?php
        while ($element = $result->fetch_assoc()) {
            music_song_card($element, $playlistId);
        }
        ?>
    </div>
    <?php
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $playlistId = $_POST['playlist_id'];
    getPlaylistContent($playlistId,$conn);
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/bootstrap.min.css" />
</head>
<body>
    <script src="javascript/main.js"></script>
</body>
</html>
