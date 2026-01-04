<?php
session_start();

// Guest login
if (isset($_GET['guest']) && $_GET['guest'] === 'true') {
    $_SESSION['logged_in'] = true;
    $_SESSION['role'] = 'guest';
    header('Location: main.php');
    exit;
}

// Admin login
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // Simple hardcoded credentials (beginner level)
    if ($email === 'admin@cvsu.edu.ph' && $password === 'admin123') {
        $_SESSION['logged_in'] = true;
        $_SESSION['role'] = 'admin';
        header('Location: main.php');
        exit;
    } else {
        header('Location: index.php?error=1');
        exit;
    }
}

// If accessed directly, redirect to index
header('Location: index.php');
exit;
?>
