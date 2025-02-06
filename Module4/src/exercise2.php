<?php
    declare(strict_types=1);
        /*                       Exercise 2: Composite or Prime? 
                            ===============================
        Now you learned about functions, you will begin defining your function and build its 
        body contents. Define a function that is meant to categorize positive integers as 
        composite or prime. For this class, always use snake_case and follow PHP naming 
        conventions when naming variables and functions.
        For example, this function must be called categorize_positive_integers(), because 
        that is exactly what they do. 
        Example usage:
            categorize_positive_integers(0) 
        Returns:
              'Neither composite nor prime'

            categorize_positive_integers(2) 
        Returns:
              'Prime'
            categorize_positive_integers(9) 
        Returns:
              'Composite'
    */
    
    final class Module42 {
        public function categorize_positive_integers(int $number): string {
               // Write your code for this exercise here.
               //Code
            if ($number < 2) {
                return 'Neither composite nor prime';
            }
            if ($number === 2) {
                return 'Prime';
            }
            for ($i = 2; $i <= sqrt($number); $i++) {
                if ($number % $i === 0) {
                    return 'Composite';
                }
            }
            return 'Prime';
        }
    } 
    
    /* The following code will help you view your output in web browsers.
        DO NOT EDIT or REMOVE it.
    */
    $module42 = new Module42();
    
    $number = 0;
    $result = $module42->categorize_positive_integers($number);
    echo $number.' is '.$result . '<br>';

    $number = 1;
    $result = $module42->categorize_positive_integers($number);
    echo $number.' is '.$result . '<br>';

    $number = 2;
    $result = $module42->categorize_positive_integers($number);
    echo $number.' is '.$result . '<br>';

    $number = 3;
    $result = $module42->categorize_positive_integers($number);
    echo $number.' is '.$result . '<br>';

    $number = 4;
    $result = $module42->categorize_positive_integers($number);
    echo $number.' is '.$result . '<br>';

    $number = 9;
    $result = $module42->categorize_positive_integers($number);
    echo $number.' is '.$result . '<br>';

    $number = 13;
    $result = $module42->categorize_positive_integers($number);
    echo $number.' is '.$result . '<br>';
