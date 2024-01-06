<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Song Upload</title>
    <link rel="stylesheet" href="../assets/bootstrap.min.css">
    <script src="../js/jquery-3.7.1.js"></script>
</head>
<body>
    <div class="container w-50 my-5 mx-auto bg-body-secondary p-5 rounded-2">
    <form action="song_insert.php" class="form w-75 mx-auto" method="post" enctype="multipart/form-data">
        <label for="name" class="form-label">Song Title:</label>
        <input type="text" class="form-control" name="name" required>
        <label for="artist" class="form-label">Artist:</label>
        <input type="text" class="form-control" name="artist" required>
        <label for="file" class="form-label">Choose a song file:</label>
        <input type="file" class="form-control" name="file" accept=".mp3" required>
        <label for="" class="form-label">Select a playlist</label>
        <select name="playlist" class="form-select" id="playlist">     
        </select>
        <br>
        <input type="submit" class="form-control bg-primary" value="Upload Song"> 
    </form>
    </div>
    <script>
           $(document).ready(function () {
            $.get('get_playlsit_name.php',function(data)
            {
                data=JSON.parse(data)
                console.log(data);
                let options=""
                data.forEach(element => {
                  options+=`<option value="${element.playlistid}">${element.playlistname}</option>`
                });
                $('#playlist').append(options)
            })
           })
        </script>
</body>
</html>
