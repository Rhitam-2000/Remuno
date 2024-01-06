
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/bootstrap.min.css">
</head>
<body>
<div class="container w-50 my-5 mx-auto bg-body-secondary p-5 rounded-2">
    <form class="form"action="" method="post" enctype="multipart/form-data">
        <label for="Name" class="form-label">Name</label>
        <input type="text" class="form-control" name='name'>
        <label for="image"  class="form-label">Image</label>
        <input type="text" name="id" value="1" style="display:none">
        <input type="file" class="form-control" name="image">
        <input type="submit" name="submit" class="form-control my-3 bg-primary" value="submit">
    </form>
</div>
</body>
</html>

