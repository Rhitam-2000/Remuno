<?php 
    session_start();
    if($_SERVER['REQUEST_METHOD']==="POST")
    {
      $id=$_POST['id'];
      $plid=$_POST['plid'];
      
        require_once('db_connect.php');
        $qry = "SELECT * FROM belong WHERE playlistid=$plid";
        $result = $conn->query($qry);   
        $data=[];
        while($row = $result->fetch_assoc())
        {
            array_push($data,$row['songid']);
        }
        $ind = array_search($id, $data);

        // echo $ind;
        // var_dump($data);
        $nextIndex = ($ind !== false) ? (($ind + 1) % (count($data))) : 0;
        echo $data[$nextIndex];
    }
?>