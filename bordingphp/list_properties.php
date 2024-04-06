<?php
require 'db_config.php';

$stmt = $pdo->query("SELECT * FROM properties");
$properties = $stmt->fetchAll(PDO::FETCH_ASSOC);

header('Content-Type: application/json');
echo json_encode($properties);
?>
