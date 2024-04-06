<?php

session_start();
require 'db_config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userType = $_POST['user_type'];
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ? AND user_type = ?");
    $stmt->execute([$email, $userType]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['user_type'] = $user['user_type'];
        
        header('Location: ' . determineRedirectPage($user['user_type']));
        exit();
    } else {
        
    }
}

function determineRedirectPage($userType) {
    switch ($userType) {
        case 'landlord':
            return 'landlord_dashboard.php';
        case 'warden':
            return 'warden_dashboard.php';
        case 'student':
            return 'student_dashboard.php';
        case 'webmaster':
            return 'webmaster_dashboard.php';
        default:
            return 'login.php';
    }
}
?>
