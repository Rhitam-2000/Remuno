<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Playlist</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .songs img{
            height: 150px;
        }
        .H{
            width:%;
        }
    </style>
</head>
<body class="bg-dark text-white">
<div class="row">
<div class="sidebar col-md-3">  
    <?php
    include_once "Sidebar.html";
    ?>
</div>

<div class="playlist col-md-9">
    <header class="mt-5">
    <img class="img-fluid img-thumbnail-border-0" src="./Images/Attention_(Charlie_Puth_song)_single_cover.svg.png" alt="Attention">
    <h1>My Playlist</h1>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum dolore harum voluptatibus explicabo ullam, aut reiciendis nemo facilis fugiat. Dolorem labore eligendi iure error id?</p>
    </header>

    <div class="container mt-5">
        <div class="songs">
            <table border=1 style="width:100%" class="table-dark table-sm">
                <tr>
                    <th></th>
                    <th class="H">Name</th>
                    <th class="H">Artist</th>
                    <th class="H">Time</th>
                </tr>
                <tr>
                    <td><img class="simg" src="./Images/Attention_(Charlie_Puth_song)_single_cover.svg.png" alt="Attention"></td>
                    <td>Attention</td>
                    <td>Charlie Puth</td>
                    <td>03:54</td>
                </tr>
            </table>
        </div>
    </div>
</div>
</div>


<!-- Bootstrap JS and Popper.js (required for Bootstrap's JavaScript plugins) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
