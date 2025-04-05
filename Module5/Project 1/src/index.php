<?php
// Initialize variables
$errors = [
    'first_name' => '',
    'last_name' => '',
    'email' => '',
    'password' => '',
    'confirm_password' => ''
];

$values = [
    'first_name' => '',
    'last_name' => '',
    'email' => ''
];

function is_valid_password($password): bool {
    return preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/', $password)
        && count(array_unique(str_split($password))) === strlen($password); // unique chars
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize inputs
    foreach ($values as $key => $_) {
        $values[$key] = htmlspecialchars(trim($_POST[$key] ?? ''));
    }
    $password = $_POST['password'] ?? '';
    $confirm = $_POST['confirm_password'] ?? '';

    // Validations
    if (empty($values['first_name'])) {
        $errors['first_name'] = 'First name is required.';
    }
    if (empty($values['last_name'])) {
        $errors['last_name'] = 'Last name is required.';
    }
    if (empty($values['email']) || !filter_var($values['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Valid email is required.';
    }
    if (empty($password)) {
        $errors['password'] = 'Password is required.';
    } elseif (!is_valid_password($password)) {
        $errors['password'] = 'Password must be at least 8 characters long, contain uppercase, lowercase, number, special character, and unique characters.';
    }

    if (empty($confirm)) {
        $errors['confirm_password'] = 'Please confirm your password.';
    } elseif ($password !== $confirm) {
        $errors['confirm_password'] = 'Passwords do not match.';
    }

    // If no errors, redirect to validated.html (you could also POST or display the data here)
    if (!array_filter($errors)) {
        // Save or process data

        header("Location: includes/validate.php");

        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Registration Form</h2>
        <form method="post" novalidate>
            <div class="mb-3">
                <label for="first_name" class="form-label">First Name</label>
                <input type="text" class="form-control <?php if ($errors['first_name']) echo 'is-invalid'; ?>" name="first_name" value="<?= $values['first_name'] ?>">
                <div class="invalid-feedback"><?= $errors['first_name'] ?></div>
            </div>
            <div class="mb-3">
                <label for="last_name" class="form-label">Last Name</label>
                <input type="text" class="form-control <?php if ($errors['last_name']) echo 'is-invalid'; ?>" name="last_name" value="<?= $values['last_name'] ?>">
                <div class="invalid-feedback"><?= $errors['last_name'] ?></div>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control <?php if ($errors['email']) echo 'is-invalid'; ?>" name="email" value="<?= $values['email'] ?>">
                <div class="invalid-feedback"><?= $errors['email'] ?></div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control <?php if ($errors['password']) echo 'is-invalid'; ?>" name="password">
                <div class="invalid-feedback"><?= $errors['password'] ?></div>
            </div>
            <div class="mb-3">
                <label for="confirm_password" class="form-label">Confirm Password</label>
                <input type="password" class="form-control <?php if ($errors['confirm_password']) echo 'is-invalid'; ?>" name="confirm_password">
                <div class="invalid-feedback"><?= $errors['confirm_password'] ?></div>
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
