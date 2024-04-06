<?php

require 'db_config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $reservationId = $_POST['reservation_id'];
    $action = $_POST['action'];

    $status = $action === 'approve' ? 'accepted' : 'denied';
    
 
    $stmt = $pdo->prepare("UPDATE reservations SET status = ? WHERE reservation_id = ?");
    $result = $stmt->execute([$status, $reservationId]);

    if ($result) {
   
    } else {
        
    }
}
?>
