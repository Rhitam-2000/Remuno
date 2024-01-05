<?php 
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Validate and sanitize input
        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        if ($id === false) {
            // Handle invalid input
            echo json_encode(['error' => 'Invalid input']);
            exit;
        }
    
        require_once('db_connect.php');
        $qry = "SELECT * FROM song WHERE songid = ?";
        $stmt = $conn->prepare($qry);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result->num_rows > 0) {
            $song = $result->fetch_assoc();
            echo json_encode($song);
        } else {
            echo json_encode(['error' => 'Song not found']);
        }
        $stmt->close();
        $conn->close();
    }
    
?>
