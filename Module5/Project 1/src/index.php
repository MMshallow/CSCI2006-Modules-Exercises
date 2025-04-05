<?php
$errors = [];
$values = [
    'first_name' => '',
    'last_name' => '',
    'email' => '',
    'password' => '',
    'confirm_password' => ''
];

function validate_password($password) {
    if (strlen($password) < 8) return false;
    if (!preg_match('/[A-Z]/', $password)) return false;
    if (!preg_match('/[a-z]/', $password)) return false;
    if (!preg_match('/[0-9]/', $password)) return false;
    if (!preg_match('/[\W]/', $password)) return false;
    if (count(array_unique(str_split($password))) < strlen($password)) return false;
    return true;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    foreach ($values as $key => $_) {
        $values[$key] = trim($_POST[$key] ?? '');
    }

    // 1 - All fields required
    foreach ($values as $key => $value) {
        if (empty($value)) {
            $errors[$key] = ucfirst(str_replace('_', ' ', $key)) . ' is required';
        }
    }

    // 2 - Valid email format
    if (!isset($errors['email']) && !filter_var($values['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Invalid email format';
    }

    // 3 - Password strength
    if (!isset($errors['password']) && !validate_password($values['password'])) {
        $errors['password'] = 'Password must be at least 8 characters long, contain uppercase, lowercase, number, special character, and unique characters';
    }

    // 5 - Confirm password match
    if (!isset($errors['confirm_password']) && $values['confirm_password'] !== $values['password']) {
        $errors['confirm_password'] = 'Passwords do not match';
    }

    // 6 - On success, redirect with session
    if (empty($errors)) {
        session_start();
        $_SESSION['validated_data'] = $values;
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
 <!-- 
                        Project 1: HTML Form Validations with PHP
                        ========================================
      Create a nicely designed and styled `Registration Page` with the following form elements.
      - First Name, Last Name, Email, Password, Confirm Password, and Submit buttons. Ensure each field and its values are on separate lines and 
      well-formed and styled. You can use forms from bootstrap to create your own registration page with the above form elements. 
      However, you CANNOT use bootstraps validations. Since Bootstrap use javascript to validate the form elements, you need to use 
      a form that does not contain any validation and implement form validations using PHP instead. 
      
      Here are the specific form field validation implementations I am looking for in your project:
       1 - All fields cannot be empty.
       2 - Email field should contain a valid email format.
       3 - Password field should be at least 8 characters long and contain at least one uppercase letter, 
          one lowercase letter, one number, and one special character.
       4 - Password must contain unique characters.
       5 - Confirm Password field should match the password field.
       6 - Validation error message should be displayed under each field.
       7 - If Validation is successful, the field values should be posted to validated.html page in the form:
         - fieldName: fieldValue
  -->
<body class="bg-light">

<div class="container mt-5">
    <h2 class="mb-4">Register</h2>
    <form action="" method="POST" novalidate>
        <div class="mb-3">
            <label for="first_name" class="form-label">First Name</label>
            <input type="text" name="first_name" class="form-control <?= isset($errors['first_name']) ? 'is-invalid' : '' ?>" value="<?= htmlspecialchars($values['first_name']) ?>">
            <div class="invalid-feedback"><?= $errors['first_name'] ?? '' ?></div>
        </div>

        <div class="mb-3">
            <label for="last_name" class="form-label">Last Name</label>
            <input type="text" name="last_name" class="form-control <?= isset($errors['last_name']) ? 'is-invalid' : '' ?>" value="<?= htmlspecialchars($values['last_name']) ?>">
            <div class="invalid-feedback"><?= $errors['last_name'] ?? '' ?></div>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input type="email" name="email" class="form-control <?= isset($errors['email']) ? 'is-invalid' : '' ?>" value="<?= htmlspecialchars($values['email']) ?>">
            <div class="invalid-feedback"><?= $errors['email'] ?? '' ?></div>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control <?= isset($errors['password']) ? 'is-invalid' : '' ?>">
            <div class="invalid-feedback"><?= $errors['password'] ?? '' ?></div>
        </div>

        <div class="mb-3">
            <label for="confirm_password" class="form-label">Confirm Password</label>
            <input type="password" name="confirm_password" class="form-control <?= isset($errors['confirm_password']) ? 'is-invalid' : '' ?>">
            <div class="invalid-feedback"><?= $errors['confirm_password'] ?? '' ?></div>
        </div>

        <button type="submit" class="btn btn-primary">Register</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
