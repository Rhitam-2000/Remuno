<?php
        require_once("../db_connect.php");
        $qry = "select * from playlist";
        $result = $conn->query($qry);
        $data=[];
        while ($row = $result->fetch_assoc()) {
            array_push($data, $row);
        }
        echo json_encode($data);
    ?>