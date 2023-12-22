<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Song Upload</title>
</head>
<body>
    <form action="insert.php" method="post" enctype="multipart/form-data">
        <label for="name">Song Title:</label>
        <input type="text" name="name" required><br>

        <label for="artist">Artist:</label>
        <input type="text" name="artist" required><br>

        <label for="file">Choose a song file:</label>
        <input type="file" name="file" accept=".mp3" required><br>

        <input type="submit" value="Upload Song">
    </form>
</body>
</html>
