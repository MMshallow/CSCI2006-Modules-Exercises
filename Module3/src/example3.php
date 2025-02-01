<?php

declare(strict_types=1);
?>
<DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!--
                        Example 3: Process User Inputs
                        ==============================
    White a PHP program that processes user name from a form field and says hello
    to the user. Your program is expected to display the hello message in side the 
    the browser window.  
    -->
    <form method="POST" action="">
        <label for="username">Enter your name:</label>
        <input type="text" id="username" name="username">
        <button type="submit">Submit</button>
    </form>
    
    <?php
    // Use an if statement to avoid warnings.
        if (isset($_POST['username'])) {
            $userName = $_POST['username'];
            echo "Hello, " . $userName . "!";
        }
    ?>

</body>

</html>