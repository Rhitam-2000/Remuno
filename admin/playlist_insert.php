<?php
if (isset($_POST['submit'])) {
    require_once('../db_connect.php');
    $name = $_POST['name'];
    $id = $_POST['id'];
    $tagetDir = '../playlist/';
    $dir='playlist/';
    $targetFile = $tagetDir . basename($_FILES['image']['name']);
    $imagePath=$dir.basename($_FILES['image']['name']);
    if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
        $qry = "INSERT INTO playlist (playlistname, userid, image) VALUES ('$name', '$id', '$imagePath')";
        $res = $conn->query($qry);
        if ($res) {
            echo "<script>alert('Inserted successfully')</script>";
        } else {
            echo "<script>alert('Error')</script>";
        }
    }
}
?>