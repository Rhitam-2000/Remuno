<?php
require_once("db-connect.php");



$uploadDir = "songs/"; 
$targetFile = $uploadDir . basename($_FILES["file"]["name"]);

if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
    
    $title = $_POST['name'];
    $artist = $_POST['artist'];

    $sql = "INSERT INTO song (sname, sartist, path) VALUES (?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $title, $artist, $targetFile);

    if ($stmt->execute()) {
        echo "Song uploaded successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Error uploading the file.";
}

$conn->close();
?>
