<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Playlist-song</title>
    <link rel="stylesheet" href="assets/bootstrap.min.css">
    <script src="js/jquery-3.7.1.js"></script></head>
    <link rel="stylesheet" href="css/style.css">
    <style>
        .flex{
            display: flex;
    justify-content: center;
    align-items: center;
        }
        .w-60{
            width:60%;
        }
    </style>
<body>
    
<?php
require_once('db_connect.php');
      
function getSong($row,$conn)
{
    // var_dump($row);
    ?>
        <tr onclick="playSong(<?php echo $row['songid'].','.$row['playlistid'];?>)">
            <td><img class="img-fluid box1" src="<?php echo $row['image'] ?>" alt=""></td>
            <td><?php echo $row['sname'];?></td>
            <td><?php echo $row['artist'];?></td>
            <td></td>
        </tr>
    <?php  
}
if ($_SERVER["REQUEST_METHOD"]==="POST") {

    $id = $_POST['id'];
    $sql="SELECT * FROM playlist where playlistid=$id";
    $result=$conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $playlistname = $row["playlistname"];
        $image= $row["image"];
    }
    ?>
    <div class="row vh-75 my-5">
        
        <div class="col-md-6 flex">
            <div class="w-60">
                <img class="img-fluid w-100" src="<?php echo $image;?>" alt="">
                <h2 class="text-center"><?php echo $playlistname;?></h2>
            </div>
        </div>
    <div class="col-md-6">
    <?php
    $qry="select b.songid as songid,p.playlistid as playlistid,s.sname as sname,s.sartist as artist,s.path as path,p.image as image  from belong as b,playlist as p,song as s where p.playlistid=$id and b.playlistid=$id and b.songid=s.songid";
    $result = $conn->query($qry);
    ?>
    <table class="table  table-hover">
        <tr>
            <td></td>
            <td class="col">Name</td>
            <td class="col">Artist</td>
            <td></td>
        </tr>
    <?php
    while( $row = $result->fetch_assoc())
{
    getSong($row,$conn);
}    
}
?>
</table>

</div>
</div>
<script src="js/media-play.js"></script>
</body>
</html>
