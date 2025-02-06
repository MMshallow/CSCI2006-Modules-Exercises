<?php 


/* 
                        Example 3: Sum of Numbers in a Range
                        ====================================
    Write a PHP program that asks the user for a start and end numbers and finds the
    sum of positive integers in the range. This program will discard negative integers.
*/

// Ask the user for a start and end numbers
$start = readline('Enter the start number: ');
$end = readline('Enter the end number: ');

if ($start < 0 and $end <= 0) {
    echo "Wrong start and end numbers.";
} elseif ($end <=0){
    echo "The end number cannot be zero or negative.";
}elseif ($start > $end) {
    echo "Start number cannot be greater than end number.";
} else {
    $total = 0;
    if ($start >= 0) {
        for ($i = $start; $i <= $end; $i++) {
            $total += $i;
        }
    } else {
        for ($i = 1; $i <= $end; $i++) {
            $total += $i;
        }
    }
    echo "The sum of all positive integers between $start and $end is $total.";
}