<?php
declare(strict_types=1);

/*                      Exercise 1: Personal Info
                            =========================
    Write a PHP program to introduce a person. You will declare four variables
    and assign them values. The $name variable will hold the name of the person, 
    the $age variable will hold the age of the person, and $address variable will
    hold the address of the person.
    Use the print() function to introduce the person. 
    For example:
        Nash is 22 years old and lives at 123 Main Street. 
*/

final class Module31 {
    public static function exercise1(): void {
        // Define variables
        $name = "Nash";
        $age = 22;
        $address = "123 Main Street";
        
        // Print the introduction
        print("$name is $age years old and lives at $address.");
    }
} 

/* The following code will help you view your output in web browsers.
   DO NOT EDIT or REMOVE it.
*/
Module31::exercise1();
?>
