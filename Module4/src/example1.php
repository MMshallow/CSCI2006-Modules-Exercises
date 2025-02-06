<?php 
declare(strict_types=1);


/*
                                Example 1: Even or Odd
                                ======================
            Write a PHP program that determines whether a number is even or odd.
            Get the number from the user.
*/

echo 'Enter a number: ';
$number = readline();

if ($number % 2 == 0) {
    echo $number. ' is even.';
} else {
    echo $number. ' is odd.';
}