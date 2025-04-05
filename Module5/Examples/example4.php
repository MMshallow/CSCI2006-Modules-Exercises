<?php

declare(strict_types=1);

/*
                        Example 4: Dropdown Selection
                        =============================
    When working with forms, sometimes you may want to handle dropdown selections.
    You can easily achieve this by employing PHP's form handling functionality. Here
    is an example of how you can implement dropdown selection functionality in PHP.
*/

// Declare a variable to hold the selected item.
$selected = "";
// Check for form submission.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selected = $_POST["fruit"]; // Get the selected item
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dropdown Selections</title>
</head>

<body>
    <form method="POST">
        <select name="fruit">
            <option value="Apple" <?= $selected == "Apple" ? "selected" : ""; ?>>Apple</option>
            <option value="Banana" <?= $selected == "Banana" ? "selected" : ""; ?>>Banana</option>
            <option value="Cherry" <?= $selected == "Cherry" ? "selected" : ""; ?>>Cherry</option>
        </select>
        <button type="submit">Submit</button>
    </form>
    <p>Selected Fruit: <?= $selected; ?></p>
</body>

</html>