<?php
session_start();
require_once('db_connect.php');

if (isset($_SESSION['id'])) {
    $userID = $_SESSION['id'];

    $sql = "SELECT email, username ,password FROM user WHERE userid = $userID";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $email = $row['email'];
            $username = $row['username'];
            $password=$row['password'];
        }
    } else {
        echo "0 results";
    }
} else {
   
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/profile-style.css" rel="stylesheet">
    <style>
 

  .btn.bg-purple:hover {
    background-color: blue;
    color: white; 
  }
</style>
</head>
<body>
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="p-3 py-5 text-center">
                    <div class="profile-photo-container">
                        <img class="rounded-circle mt-3" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg" alt="Profile Picture">
                        <button class="btn btn-sm btn-secondary edit-profile-btn">Edit</button>
                    </div>
                    <div class="mb-3 mt-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email"  value="<?php echo $email; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username"  value="<?php echo $username; ?>">
                    </div>
                    <!-- <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" value="<?php echo $password; ?>">
                    </div> -->
                    <div class="text-center">
                            <!-- Button to change password -->
                            <a href="change_password.php" class="btn bg-purple">Change Password</a>
                            <a href="logout.php" class="btn bg-purple">Log out</a>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

  

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>