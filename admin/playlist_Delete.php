<?php 
    if($_SERVER['REQUEST_METHOD']==='POST')
    {
        $id=$_POST['id'];
        $qry="select * from playlist where playlistid=$id ";
        if($conn->query($qry))
        {
            echo "<script>alert('song is deleted')</script>";
            header('location:index.php'); 
        }
        else{
            echo "<script>alert('Error while deleting the song')</script>"; 
            header('location:index.php');
        }
    }
?>