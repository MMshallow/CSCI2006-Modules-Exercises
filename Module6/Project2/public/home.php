<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}
$user = $_SESSION['user'];
include '../includes/header.php';
?>

<div class="container mt-5">
    <h2>Welcome, <?= htmlspecialchars($user['first_name']) ?>!</h2>

    <div class="card mt-4">
        <div class="card-header">Your Profile</div>
        <div class="card-body">
            <?php if (!empty($user['profile_picture'])): ?>
                <img src="../uploads/<?= htmlspecialchars($user['profile_picture']) ?>" alt="Profile Picture" class="img-thumbnail mb-3" style="max-width: 150px;">
            <?php endif; ?>
            <p><strong>Full Name:</strong> <?= htmlspecialchars($user['first_name'] . ' ' . $user['last_name']) ?></p>
            <p><strong>Email:</strong> <?= htmlspecialchars($user['email']) ?></p>
            <p><strong>Account Created:</strong> <?= $user['created_at'] ?></p>
        </div>
    </div>

    <a href="logout.php" class="btn btn-danger mt-4">Logout</a>
</div>
</body>
</html>
