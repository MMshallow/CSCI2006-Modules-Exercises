<?php 
declare(strict_types=1);

/**
                    Example 2: Form Validation
                    ==========================

    Use PHP to validate an email field. An email field is valid if it is not
    empty and contains the correct characters.
 */
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validation</title>
</head>
<body>
    <form method="POST">
        <label for="email">Email: </label>
        <input type="text" name="email" id="email" placeholder="Enter your email">
        <button type="submit">Submit</button>
    </form>
    <?php 
    $error = '';
    $email = '';
    $text = '';
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (empty($_POST["email"])) {
            $error = "Email field cannot be blank.";
            echo '<p style="color: red; font-size: 10px,">' . $error . '</p>';
        } elseif(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $error = "Email is not valid.";
            echo '<p style="color: red; font-size: 10px,">' . $error . '</p>';
        } else {
            $text = "Email is: ";
            $email = htmlspecialchars($_POST["email"]);
            echo '<p>' . $text  . '<span style="color: blue; font-size: 10px,">' . $email . '</span></p>';
    
        }
    }
    ?>
</body>
</html>

