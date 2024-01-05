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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="Name">Name</label>
        <input type="text" name='name'>
        <label for="image">Image</label>
        <input type="text" name="id" value="1" style="display:none">
        <input type="file" name="image">
        <input type="submit" name="submit" value="submit">
    </form>
</body>

</html>
