<?php
session_start();
include '../includes/header.php';
$login_error = $_SESSION['login_error'] ?? '';
unset($_SESSION['login_error']);
?>

<div class="container mt-5">
    <h2 class="mb-4">Login</h2>
    <form action="../handler/login_handler.php" method="POST">
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <?php if ($login_error): ?>
            <div class="alert alert-danger"><?= $login_error ?></div>
        <?php endif; ?>

        <button type="submit" class="btn btn-success">Login</button>
    </form>
</div>
</body>
</html>
