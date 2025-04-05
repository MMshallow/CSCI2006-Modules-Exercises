<?php 
declare(strict_types= 1);


/*
                            Exercise 3: Radio Buttons and Checkboxes
                            ========================================
    Write a PHP program to handle form submissions with radio buttons and checkboxes.
    In this case, you will use two different functions to handle the form data, one for 
    the radio buttons and one for the checkboxes. You must return the selected items in each case.
    N.B. The checkboxes allow you to select multiple items at the same time. You
*/

final class Module53 {
    public function radio_button_handler(){
        $gender = "";
        // Write your solution below this line

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["gender"])) {
            $gender = $_POST["gender"];
        }

        return $gender;
    }
    public final function checkbox_button_handler(){
        $hobbies = [];
        // Write your solution below this line
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["hobbies"])) {
            $hobbies = $_POST["hobbies"];
        }

        return $hobbies;
    }
}

// DO NOT REMOVE or EDIT the following code
$obj = new Module53();
$gender = $obj->radio_button_handler();
$hobbies = $obj->checkbox_button_handler();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>radio and Checkboxes</title>
</head>
<body>
    <form method="POST">
    <input type="radio" name="gender" value="Male" <?= $gender == "Male" ? "checked" : ""; ?>> Male
    <input type="radio" name="gender" value="Female" <?= $gender == "Female" ? "checked" : ""; ?>> Female
    <p><button type="submit">Submit</button></p>

    <input type="checkbox" name="hobbies[]" value="Reading" <?= in_array("Reading", $hobbies) ? "checked" : ""; ?>> Reading
    <input type="checkbox" name="hobbies[]" value="Traveling" <?= in_array("Traveling", $hobbies) ? "checked" : ""; ?>> Traveling
    <input type="checkbox" name="hobbies[]" value="Gaming" <?= in_array("Gaming", $hobbies) ? "checked" : ""; ?>> Gaming
    <p><button type="submit">Submit</button></p>
</form>
<p>Selected Gender: <?= $gender; ?></p>
<p>Selected Hobbies: <?= implode(", ", $hobbies); ?></p>
</body>
</html>
