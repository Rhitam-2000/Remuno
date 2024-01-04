<?php 
    
    if($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        // var_dump($_POST);
        $id = $_POST['id'];
        require_once('db_connect.php');
        $qry = "SELECT * FROM song WHERE songid = $id";
        $result = $conn->query($qry);
        // var_dump($result);
        if($result->num_rows > 0)
        {
            $song = $result->fetch_assoc();
            echo json_encode($song);
        }
    }
?>
