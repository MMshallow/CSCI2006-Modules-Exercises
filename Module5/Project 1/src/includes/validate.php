<?php
session_start();
$data = $_SESSION['validated_data'] ?? null;
if (!$data) {
    header("Location: ../index.php");
    exit;
}
session_destroy(); // Clear session after use
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Validated</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Form Submitted Successfully</h2>
    <ul class="list-group">
        <?php foreach ($data as $field => $value): ?>
            <li class="list-group-item"><strong><?= htmlspecialchars($field) ?>:</strong> <?= htmlspecialchars($value) ?></li>
        <?php endforeach; ?>
    </ul>
</div>
</body>
</html>
