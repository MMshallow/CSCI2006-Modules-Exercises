<?php 
declare(strict_types=1);
include "validPassword.php";

/*
                        Exercise 1: Password Validation
                        ===============================
    Write a PHP program that will validate password according to the following
    specifications:
        1. Password must be at least 8 characters long.
        2. Password must start with a letter in lower case.
        3. Password must contain at least one upper case letter, one special character, and one number.
    Your program must display an appropriate error message if any of the criteria fails.
    Write Separate functions to validate password against each criteria inside the `validatePassword.php` file. 
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Validator</title>
</head>
<body>
    <h2>Password Validation</h2><hr>
    <form method="POST">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" />
        <button type="submit">Validate</button>
    </form>
    <?php 
    // DO NOT REMOVE or EDIT the following code
        $obj = new Module51();
        
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $data = $_POST["password"];
            $valid = $obj->is_correct_length($data) && $obj->starts_with_lowercase_letter($data) &&
                    $obj->contains_special_chars($data) && $obj->contains_numbers($data) &&
                    $obj->contains_upper_case_letter($data);
            if ($valid){
                $message = "Your Password passed all validations.";
                echo '<p style="color: green; font-size = 10px;">' . $message . '</p>';
            } elseif (empty($_POST["password"])){
                $message = "Password field cannot be empty.";
                echo '<p style="color: red; font-size = 10px;">' . $message . '</p>';
            } else {
                if(!$obj->is_correct_length($data)){
                    $message = "Password must be at least 8 characters long.";
                    echo '<p style="color: red; font-size = 10px;">' . $message . '</p>';
                } 
                if(!$obj->starts_with_lowercase_letter($data)) {
                    $message = "Password must start with a letter in lower case.";
                    echo '<p style="color: red; font-size = 10px;">' . $message . '</p>';
                } 
                if(!$obj->contains_upper_case_letter($data)) {
                    $message = "Password must contain at least one upper case letter.";
                    echo '<p style="color: red; font-size = 10px;">' . $message . '</p>';
                } 
                if(!$obj->contains_special_chars($data)) {
                    $message = "Password must contain at least one special character.";
                    echo '<p style="color: red; font-size = 10px;">' . $message . '</p>';
                }
                if(!$obj->contains_numbers($data)) {
                    $message = "Password must contain at least one number.";
                    echo '<p style="color: red; font-size = 10px;">' . $message . '</p>';
                }
            }
        }
    ?>
</body>
</html>
