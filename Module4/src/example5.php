<?php

declare(strict_types=1);

/*
                    Example 5: Is Element in Array?
                    ===============================
    Write a PHP function that takes an array and an element of the array
    as its parameters and returns a boolean value. The function must return 
    true if the element is in the array or false otherwise.
*/
function is_in_array($array, $element): bool
{
    return in_array($element, $array, true);
}

$array = [1, 5, 26, 0, 4, 28];
$element = 6;
echo is_in_array($array, $element) ? "$element is in the array" : "$element is not in the array";
echo "\n";

$element = 0;
echo is_in_array($array, $element) ? "$element is in the array" : "$element is not in the array";
echo "\n";