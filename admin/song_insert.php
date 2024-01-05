<?php
require_once("../db_connect.php");


$dir="songs/";
$uploadDir = "../songs/"; 
$targetFile = $uploadDir . basename($_FILES["file"]["name"]);
$target=$dir.basename($_FILES["file"]["name"]);

if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
    
    $title = $_POST['name'];
    $artist = $_POST['artist'];

    $sql = "INSERT INTO song (sname, sartist, path) VALUES (?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $title, $artist,$target );

    if ($stmt->execute()) {
        echo "<script>alert(Song uploaded successfully!)</script>";
        $qry="select songid from song where sname='$title'";
        $res=$conn->query($qry);
        $row=$res->fetch_assoc();
        $id=$row['songid'];
        $plid=$_POST['playlist'];
        $qry="insert into belong valus($plid,$id)";
        header("location:index.php");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "<script>alert(Error Uploading file!)</script>";
}

$conn->close();
?>
