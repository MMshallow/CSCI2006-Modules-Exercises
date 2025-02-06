<?php 

/*
                        Example 2: Largest and smallest
                        ===============================
    Write a PHP program that asks the user to inter three numbers and find the largest 
    and the smallest numbers. 
*/

$a = readline("Enter the first number: ");
$b = readline("Enter the second number: ");
$c = readline("Enter the third number: ");

// Check if the numbers are the same.
if ($a == $b && $b == $c) {
    echo "The numbers are the same.";
} 

// Find the largest number.
if ($a > $b && $b >= $c) {
    echo $a ." is the largest number.\n";
}elseif ($b > $a && $a >= $c) {
    echo $b ." is the largest number.\n";
} else {
    echo $c ." is the largest number.\n";
}

// Find the smallest number.
if ($a < $b && $b <= $c) {
    echo $a ." is the smallest number.\n";
}elseif ($b < $a && $a <= $c) {
    echo $b ." is the smallest number.\n";
} else {
    echo $c ." is the smallest number.\n";
}

