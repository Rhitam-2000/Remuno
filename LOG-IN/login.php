<?php
    if(isset($_POST['submit']))
    {
        if(!empty($_POST['username']) && !empty($_POST['password']))
        {
        $username = $_POST['username'];
        $password = $_POST['password']; 
    }
    //require_once "db-connect.php";
    $query=mysqli_query($con,"SELECT * FROM users WHERE Name='".$username."' AND Password='".$password."'");
        $numrows=mysqli_num_rows($query);
        if($numrows!=0)
        {
        while($row=mysqli_fetch_assoc($query))
        {
        $dbusername=$row['Name'];
        $dbpassword=$row['Password'];
        }
        if($username == $dbusername && $password == $dbpassword)
        {
        session_start();

        $_SESSION['sess_user']=$username;
        header("Location: home.php");
        }
        }

         else 
         {
        echo "Invalid username or password!";
        }
    } 
    else 
    {
        echo "All fields are required!";
    }
    ?>


    


    

