<?php
session_start();
require_once('db_connect.php');

if (isset($_POST['update'])) {
    $userId = $_SESSION['id'];
    $oldPassword = $_POST['old'];
    $newPassword = $_POST['new'];
    $confirmPassword = $_POST['retype']; 

  
    $sql = "SELECT password FROM user WHERE userid = '$userId'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $currentPassword = $row['password'];

        
        if ($oldPassword === $currentPassword) {
            
            if ($newPassword === $confirmPassword) {
              
                $updateSql = "UPDATE user SET password = '$newPassword' WHERE userid = '$userId'";
                $conn->query($updateSql);

                if ($conn->affected_rows > 0) {
                    $_SESSION['success'] = "Password updated successfully";
                    header('location: profile.php');
                } else {
                    $_SESSION['error'] = "Error updating password";
                }
            } else {
                $_SESSION['error'] = "New password and confirmation do not match";
            }
        } else {
            $_SESSION['error'] = "Incorrect old password";
        }
    } else {
        $_SESSION['error'] = "User not found";
    }

    $conn->close();

   
    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: purple;
            color: #333;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }

        .bg-color {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        button {
            width: 100%;
        }
        .btn.bg-purple {
    background-color: purple;
    color: white; 
  }
        .btn.bg-purple:hover {
    background-color: blue;
    color: white; 
  }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 bg-color">
                <h2>Change Password</h2>
                 <!-- Display error message -->
                 <?php if(isset($_SESSION['error'])): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $_SESSION['error']; ?>
                    </div>
                    <?php unset($_SESSION['error']); ?>
                <?php endif; ?>
                <form action="change_password.php" method="post">
                    <div class="form-group">
                        <label for="old">Old Password:</label>
                        <input type="password" class="form-control" id="old" name="old" required>
                    </div>
                    <div class="form-group">
                        <label for="new">New Password:</label>
                        <input type="password" class="form-control" id="new" name="new" required>
                    </div>
                    <div class="form-group">
                        <label for="retype">Confirm New Password:</label>
                        <input type="password" class="form-control" id="retype" name="retype" required>
                    </div>
                    <button type="submit" class="btn bg-purple" name="update">Update</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
