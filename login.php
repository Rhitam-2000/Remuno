<?php 
    session_start();
    if(isset($_POST['submit']))
    {
        $email=$_POST['email'];
        $password=$_POST['password'];
        require_once('db-connect.php');
        $qry="SELECT * FROM user WHERE email='$email' AND password='$password' ";
        $res=$conn->query($qry);
        if($data=$res->fetch_assoc())
        {
            $_SESSION['userid']=$data['userid'];
            $_SESSION['email']=$data['email'];
            $_SESSION['name']=$data['name'];
            header('location:index.php');
        }
    }
    require_once('header.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in</title>
    <link rel="stylesheet" href="assets/bootstrap.min.css" />
</head>

<body>
    <section class="vh-100 d-flex align-items-center justify-content-center" style="background: #31304D">
        <div class="card w-25 p-4">
            <h3 class="my-4 text-center">Sign up</h3>
            <form action="login.php" method="post">
                <div class="form-outline mb-4 mx-4">
                    <input type="email" name="email" class="form-control p-2" placeholder="Email">
                </div>
                <div class="form-outline mb-4 mx-4">
                    <input type="password" name="password" class="form-control p-2" placeholder="Password">
                </div>
                <div class="form-outline mb-4 mx-4">
                    <input type="submit" name="submit" class="btn btn-primary form-control p-2" value="Log in">
                </div>
                <div class="form-outline text-center">
                <a href="" class="btn text-decoration-none ">Forgot password</a>
                
                </div>
                <div class="form-outline text-center">
                <a href="" class="btn btn-primary">Sign up</a>
                </div>
            </form>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
</body>

</html>
