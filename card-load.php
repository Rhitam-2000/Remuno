<?php 
    require_once('music-card.php');
    require_once("db_connect.php");
    // $card= new Card(); 
    $qry="SELECT * FROM playlist";
    $result=$conn->query($qry);
    while($list=$result->fetch_assoc()){
        // echo $list['playlistname'];
        music_card($list['playlistid'],$list['playlistname'],$list['image']);
    }
?>