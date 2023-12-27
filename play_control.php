<?php
require_once('db_connect.php');

function get_song_id($plid, $conn)
{
    $song_in_playlist = [];
    $qry = "SELECT s.songid AS songid  FROM song s INNER JOIN belong b ON s.songid = b.songid WHERE b.playlistid = $plid";
    $result = $conn->query($qry);

    while ($row = $result->fetch_assoc()) {
        array_push($song_in_playlist, $row['songid']);
    }

    return $song_in_playlist;
}
function get_previous_song($plid, $sid, $conn)
{
    $song_in_playlist = get_song_id($plid, $conn);
    $length = count($song_in_playlist);
    $ind = array_search($sid, $song_in_playlist);
    if ($ind === 0){
        $ind=$length-1;
    }
    else{
        $ind = ($ind -1) % $length;
    }  
    $songid = $song_in_playlist[$ind];
    // Construct the response as an array
    $response = array(
        'status' => 'success',
        'message' => 'Next song loaded successfully',
        'songid' => $songid
    );

    // Send the JSON response
    header('Content-Type: application/json');
    echo json_encode($response);
}

function get_next_song($plid, $sid, $conn)
{
    $song_in_playlist = get_song_id($plid, $conn);
    $length = count($song_in_playlist);
    $ind = array_search($sid, $song_in_playlist);
    $ind = ($ind + 1) % $length;
    $songid = $song_in_playlist[$ind];

    // Construct the response as an array
    $response = array(
        'status' => 'success',
        'message' => 'Next song loaded successfully',
        'songid' => $songid
    );

    // Send the JSON response
    header('Content-Type: application/json');
    echo json_encode($response);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $plid = $_POST['plid'];
    $sid = $_POST['sid'];

    if (isset($_POST['next'])) {
        get_next_song($plid, $sid, $conn);
    }
    else{
        get_previous_song($plid, $sid, $conn);
    }
}
?>
