<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/bootstrap.min.css">
</head>
<body>
    <div class="mx-auto my-2 d-flex justify-content-center">
        <button class="btn btn-primary text-center" onClick="songAdd()">Add new Song</button>
    </div>
    <table class="table table-striped">
        <tr>
            <td>Song id</td>
            <td>Name</td>
            <td>Artist</td>
            <td>Update</td>
            <td>Delete</td>
        </tr>
        <?php
        require_once("../db_connect.php");
        $qry = "select * from song";
        $result = $conn->query($qry);
        $songs = [];
        while ($row = $result->fetch_assoc()) {
    ?>
        <tr>
            <td><?php echo $row['songid'];?></td>
            <td><?php echo $row['sname'];?></td>
            <td><?php echo $row['sartist'];?></td>
            <td><button class="btn btn-primary">Update</button></td>
            <td><button class="btn btn-danger" onclick="songDelete(<?php echo $row['songid']?>)">Delete</button></td>
        </tr>
    <?php
        }

        ?>
    </table>
        <script src="../assets/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
