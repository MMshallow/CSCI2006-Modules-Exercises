<?php

/*
                            Example 4: Create a Fibonacci Series
                            ====================================
    Write a PHP program that creates a Fibonacci Series and displays the numbers on a single
    line separated by whitespace. The program must ask the user for a number for which to find 
    the Fibonacci Series.
*/

// Ask the user for a number.
$number = readline("Enter a number to find Fibonacci series: ");

if ($number < 0) {
    echo "This program does not find the Fibonacci Series for negative numbers.";
} else {
    $a = 0;
    $b = 1;
    $c = 3;
    echo "$a $b ";
    while ($c < $number) {
        $c = $a + $b;
        echo " $c ";
        $a = $b;
        $b = $c;
    }
}