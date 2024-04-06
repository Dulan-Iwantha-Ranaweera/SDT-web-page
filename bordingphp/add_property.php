<?php
require 'db_config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_SESSION['user_id']; 
    $title = trim($_POST['property_name']);
    $location = trim($_POST['location']);
    $status = $_POST['status'];

    
    $stmt = $pdo->prepare("INSERT INTO properties (user_id, title, location, status) VALUES (?, ?, ?, ?)");
    $result = $stmt->execute([$userId, $title, $location, $status]);

    if ($result) {
        
    } else {

    }
}
?>
