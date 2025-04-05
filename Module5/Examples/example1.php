<?php 
declare(strict_types=1);

/**
                    Example 1: Basic Form Submission
                    ================================

    Create a form field using HTML forms that accepts a users full name and say hello to
    the user when the form is submitted.
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basic Form Submission</title>
</head>
<body>
    <form method="POST">
        <label for="name">Name: </label>
        <input type="text" name="name" id="name" placeholder="Enter your name">
        <button type="submit">Submit</button>
    </form>
</body>
</html>
<?php 
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $name = htmlspecialchars($_POST["name"]);
        echo "<h3>Hello, $name.";
    }
 ?>