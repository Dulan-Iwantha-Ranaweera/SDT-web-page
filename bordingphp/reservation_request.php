<?php
require 'db_config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $propertyId = $_POST['property_id'];
    $studentId = $_SESSION['user_id']; 

    
    $stmt = $pdo->prepare("INSERT INTO reservations (property_id, student_id) VALUES (?, ?)");
    $result = $stmt->execute([$propertyId, $studentId]);

    if ($result) {
  
    } else {

    }
}
?>
