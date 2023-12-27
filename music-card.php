<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music card</title>
    <link rel="stylesheet" href="assets/bootstrap.min.css" />
</head>
<body>
    
</body>
</html>
<?php

  function music_card($plid, $name, $image_path = 'assets/images/disk.png')
  {
?>
        <div class="card" style="width: 18rem;" id="<?php echo $plid; ?>" onclick="loadPlayListDetails(<?php echo $plid;?>)">
            <img src="<?php echo $image_path; ?>" class="card-img-top" alt="...">
            <div class="card-body">
            <h5 class="card-title"><?php echo $name; ?></h5>
            </div>
        </div>
<?php

  }

?>
<script src="javascript/main.js"></script>