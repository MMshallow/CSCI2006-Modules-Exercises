<?php
session_start();
include '../includes/header.php';
$errors = $_SESSION['errors'] ?? [];
$old = $_SESSION['old'] ?? [];
unset($_SESSION['errors'], $_SESSION['old']);
?>

<div class="container mt-5">
    <h2 class="mb-4">Register</h2>
    <form action="../handler/register_handler.php" method="POST" enctype="multipart/form-data" novalidate>
        <?php foreach (['first_name', 'last_name', 'email', 'password', 'confirm_password'] as $field): ?>
            <div class="mb-3">
                <label class="form-label"><?= ucfirst(str_replace('_', ' ', $field)) ?></label>
                <input 
                    type="<?= in_array($field, ['password', 'confirm_password']) ? 'password' : 'text' ?>"
                    name="<?= $field ?>"
                    class="form-control <?= isset($errors[$field]) ? 'is-invalid' : '' ?>"
                    value="<?= htmlspecialchars($old[$field] ?? '') ?>">
                <div class="invalid-feedback"><?= $errors[$field] ?? '' ?></div>
            </div>
        <?php endforeach; ?>

        <!--Profile Picture Upload -->
        <div class="mb-3">
            <label class="form-label">Profile Picture</label>
            <input type="file" name="profile_picture" accept="image/*" class="form-control <?= isset($errors['profile_picture']) ? 'is-invalid' : '' ?>">
            <div class="invalid-feedback"><?= $errors['profile_picture'] ?? '' ?></div>
        </div>

        <button type="submit" class="btn btn-primary">Register</button>
    </form>
</div>
</body>
</html>
