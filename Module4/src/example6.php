<?php

declare(strict_types=1);

/*
                    Example 5: Sort and combine
                    ===========================
    Write a PHP function that takes two arrays as its parameters 
    and returns an associative array formed from the two arrays. 
    The function must sort the keys array before forming the associative
    array.
*/
function combine_arrays($keys, $values): array
{   sort($keys);
    return array_combine($keys, $values);
}

$names = ['John', 'Monet', 'Doe', 'Janes'];
$ages = [6, 12, 44, 60];
echo "Combined arrays: ";
print_r (combine_arrays($names, $ages));
echo "\n";
