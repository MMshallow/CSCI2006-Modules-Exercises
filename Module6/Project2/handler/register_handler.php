<?php
session_start();
require '../config/database.php';

function validate_password($password) {
    if (strlen($password) < 8) return false;
    if (!preg_match('/[A-Z]/', $password)) return false;
    if (!preg_match('/[a-z]/', $password)) return false;
    if (!preg_match('/[0-9]/', $password)) return false;
    if (!preg_match('/[\W]/', $password)) return false;
    if (count(array_unique(str_split($password))) < strlen($password)) return false;
    return true;
}

$errors = [];
$data = [];

foreach (['first_name', 'last_name', 'email', 'password', 'confirm_password'] as $field) {
    $data[$field] = trim($_POST[$field] ?? '');
    if (empty($data[$field])) {
        $errors[$field] = ucfirst(str_replace('_', ' ', $field)) . ' is required';
    }
}

// Email format
if (!isset($errors['email']) && !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = 'Invalid email format';
}

// Password validation
if (!isset($errors['password']) && !validate_password($data['password'])) {
    $errors['password'] = 'Password must be strong and contain unique characters';
}

// Confirm password
if (!isset($errors['confirm_password']) && $data['password'] !== $data['confirm_password']) {
    $errors['confirm_password'] = 'Passwords do not match';
}

// Handle profile picture upload
$upload_path = '../uploads/';
$filename = null;

if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] === UPLOAD_ERR_OK) {
    $file_tmp = $_FILES['profile_picture']['tmp_name'];
    $file_name = basename($_FILES['profile_picture']['name']);
    $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
    $allowed = ['jpg', 'jpeg', 'png', 'gif'];

    if (in_array($file_ext, $allowed)) {
        $new_name = uniqid() . '.' . $file_ext;
        if (!is_dir($upload_path)) {
            mkdir($upload_path, 0755, true);
        }
        move_uploaded_file($file_tmp, $upload_path . $new_name);
        $filename = $new_name;
    } else {
        $errors['profile_picture'] = 'Only JPG, PNG, or GIF files are allowed';
    }
}

if ($errors) {
    $_SESSION['errors'] = $errors;
    $_SESSION['old'] = $data;
    header('Location: ../public/register.php');
    exit;
}

$hashed = password_hash($data['password'], PASSWORD_DEFAULT);

try {
    $stmt = $pdo->prepare("INSERT INTO users (first_name, last_name, email, password, profile_picture) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$data['first_name'], $data['last_name'], $data['email'], $hashed, $filename]);
    header('Location: ../public/login.php');
    exit;
} catch (PDOException $e) {
    $_SESSION['errors'] = ['email' => 'Email already exists'];
    $_SESSION['old'] = $data;
    header('Location: ../public/register.php');
    exit;
}
