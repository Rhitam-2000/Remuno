<?php
require_once('header.php');
require_once('play.php');
$sid = 0;
if (isset($_GET['sid'])) {
    $sid = $_GET['sid'];
}

display_footer($sid);
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

            }
            getPlaylistContent($plid);
        } else {
            require_once('card-load.php');
        }
        ?>
    </div>
    
    <script src="javascript/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</body>
</html>  