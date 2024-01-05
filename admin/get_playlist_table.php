<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/bootstrap.min.css">
</head>
<body>
<div class="mx-auto">
        <button class="btn btn-primary" onClick="songPlaylist()">Add new Playlist</button>
    </div>
    <table class="table table-striped">
        <tr>
            <td>PLaylist id</td>
            <td>playlist name</td>
            <td>image</td>
            <td>Update</td>
            <td>Delete</td>
        </tr>
        <?php
        require_once("../db_connect.php");
        $qry = "select * from playlist";
        $result = $conn->query($qry);
        while ($row = $result->fetch_assoc()) {
    ?>
        <tr>
            <td><?php echo $row['playlistid'];?></td>
            <td><?php echo $row['playlistname'];?></td>
            <td><img src="../<?php echo $row['image'];?>" height="50px" width="50px" alt=""></td>
            <td><button class="btn btn-primary" onclick="playlistUpdate(<?php echo $row['playlistid'];?>)">Update</button></td>
        </tr>
    <?php
        }

        ?>
    </table>

</body>
</html>
