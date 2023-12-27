<?php
require_once('header.php');
require_once('db_connect.php');
require_once('play.php');
$sid = 0;
if (isset($_GET['sid'])) {
    $sid = $_GET['sid'];
}
$qry = "SELECT * FROM song where songid=$sid";
$res = $conn->query($qry);
$name = "";
$id = "";
$path = "";
$author = "";
if ($data = $res->fetch_assoc()) {
    // var_dump($data);
    $name = $data["sname"];
    $id = $data["songid"];
    $path = $data["path"];
    $author = $data["sartist"];
}

display_footer($sid,$path,$name,$author);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HomePage</title>
    <link rel="stylesheet" href="assets/bootstrap.min.css" />
</head>
<body class="vh-100">
    <div class="content" id="content">
        <?php
        if (isset($_GET['plid'])) {
            require_once('load_playlist.php');
            $plid = $_GET['plid'];
            if (isset($_GET['sid'])) {
                $sid = $_GET['sid'];
            }
            getPlaylistContent($plid,$conn);
        } else {
            require_once('card-load.php');
        }
        ?>
    </div>
    
    <script src="javascript/main.js"></script>
    <!-- <script src="javascript/media-play.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</body>
</html>  