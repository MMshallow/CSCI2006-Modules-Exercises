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
                        Example 4: Basic Calculator
                        ==============================
    White a PHP program that asks the user to enter two numbers and echoes the sum,--
    difference, product, quotient,modulo, and exponent of the two numbers.
    -->
    <form method="POST" action="">
        <label for="num1">Number 1:</label>
        <input type="number" id="num1" name="num1"> <br>
        <label for="num2">Number 2:</label>
        <input type="number" id="num2" name="num2"> <br>
        <button type="submit">Submit</button>
    </form>
    
    <?php
        if (isset($_POST['num1'])) {
            $num1 = $_POST['num1'];
        }
        if (isset($_POST['num2'])) {
            $num2 = $_POST['num2'];
        }

        echo "The sum of " . $num1 . " and " . $num2 ." is " . $num1 + $num2 . "<br>";
        echo "The difference of " . $num1 . " and " . $num2 ." is " . $num1 - $num2 . "<br>";
        echo "The product of " . $num1 . " and " . $num2 ." is " . $num1 * $num2 . "<br>";
        echo "The quotient of " . $num1 . " and " . $num2 ." is " . $num1 / $num2 . "<br>";
        echo "The modulo of " . $num1 . " and " . $num2 ." is " . $num1 % $num2 . "<br>";
        echo "The exponentiation of " . $num1 . " and " . $num2 ." is " . $num1 ** $num2 . "<br>";
    ?>

</body>

</html>