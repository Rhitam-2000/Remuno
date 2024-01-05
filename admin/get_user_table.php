<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/bootstrap.min.css">
</head>
<body>
    <table class="table table-striped">
        <tr>
            <td>PLaylist id</td>
            <td>playlist name</td>
            <td>image</td>
        </tr>
        <?php
        require_once("../db_connect.php");
        $qry = "select * from user";
        $result = $conn->query($qry);
        while ($row = $result->fetch_assoc()) {
    ?>
        <tr>
            <td><?php echo $row['userid'];?></td>
            <td><?php echo $row['email'];?></td>
            <td><?php echo $row['username'];?></td>
        </tr>
    <?php
        }

        ?>
    </table>

</body>
</html>
