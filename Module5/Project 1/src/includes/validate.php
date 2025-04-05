<?php
session_start();

if (!isset($_SESSION['validated_data'])) {
    header("Location: ../index.php");
    exit;
}

$data = $_SESSION['validated_data'];
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Validation Successful</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-success bg-opacity-10">

<div class="container mt-5">
    <div class="alert alert-success">
        <h4>Validation Successful</h4>
        <ul>
            <?php foreach ($data as $key => $value): ?>
                <li><strong><?= ucfirst(str_replace('_', ' ', $key)) ?>:</strong> <?= htmlspecialchars($key === 'password' || $key === 'confirm_password' ? '******' : $value) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>

</body>
</html>
