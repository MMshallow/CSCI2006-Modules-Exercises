<?php
session_start();
require '../config/database.php';

$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';

// Look up user by email
$stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
$stmt->execute([$email]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user && password_verify($password, $user['password'])) {
    //  Include profile_picture in session
    $_SESSION['user'] = [
        'id' => $user['id'],
        'first_name' => $user['first_name'],
        'last_name' => $user['last_name'],
        'email' => $user['email'],
        'created_at' => $user['created_at'],
        'profile_picture' => $user['profile_picture'] ?? null
    ];
    header("Location: ../public/home.php");
    exit;
} else {
    // Failed login
    $_SESSION['login_error'] = 'Invalid email or password';
    header("Location: ../public/login.php");
    exit;
}
