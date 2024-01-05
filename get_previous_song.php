<?php 
    session_start();
    if($_SERVER['REQUEST_METHOD'] === "POST") {
        $id = $_POST['id'];
        $plid = $_POST['plid'];

        require_once('db_connect.php');

        $qry = "SELECT * FROM belong WHERE playlistid = $plid";
        $result = $conn->query($qry);   
        $data = [];

        while($row = $result->fetch_assoc()) {
            array_push($data, $row['songid']);
        }

        $ind = array_search($id, $data);

        $pre=($ind ==0) ?  count($data)-1:(($ind - 1) % (count($data))) ;
        echo $data[$pre];
    }
?>
