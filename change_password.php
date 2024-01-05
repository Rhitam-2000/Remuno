<?php
session_start();
require_once('db_connect.php'); // Include the database connection script

if (isset($_POST['update'])) {
    $userId = $_SESSION['id']; // Replace 'user' with the actual session variable holding user ID
    $oldPassword = $_POST['old_password'];
    $newPassword = $_POST['new_password'];
    $confirmPassword = $_POST['confirm_password'];

    // Retrieve user's current password from the database (in plaintext)
    $sql = "SELECT password FROM users WHERE id = '$userId'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $currentPassword = $row['password'];

        // Verify old password against the stored password
        if ($oldPassword === $currentPassword) {
            // Check if new password matches confirmation
            if ($newPassword === $confirmPassword) {
                // Update the password in the database
                $updateSql = "UPDATE users SET password = '$newPassword' WHERE id = '$userId'";
                $conn->query($updateSql);

                if ($conn->affected_rows > 0) {
                    $_SESSION['success'] = "Password updated successfully";
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

header('location: profile.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background:  linear-gradient(#020024 0%, #c237dc 87%,#c3178b 100%); /* Change gradient colors */
            color: white;
        }

        .bg-color {
            background-color: rgba(255, 255, 255, 0.5); 
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Box shadow */
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="bg-color">
            <h2>Change Password</h2>
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
                <button type="submit" class="btn btn-primary" name="update">Update</button>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS, Popper.js, and jQuery (optional) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
