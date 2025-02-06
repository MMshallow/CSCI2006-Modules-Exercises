<?php
    declare(strict_types=1);
    /*                      Exercise 1: Is The Year A Leap Year? 
                            ===================================
    Write a PHP program that can identify a year as leap year or not.
    Return true if the year is leap year and false otherwise.
    */
    
    final class Module41 {
        public function is_a_leap_year(int $year): bool {
            // Write your code for this exercise here.
            //Code
            return ($year % 4 === 0 && $year % 100 !== 0) || ($year % 400 === 0);
        }
    } 
    /* The following code will help you view your output in web browsers.
        DO NOT EDIT or REMOVE it.
    */
    $module41 = new Module41();
    
    $year = 1990;
    $result = $module41->is_a_leap_year($year);
    if ($result){
        echo "$year is a leap year.<br>";
    }else{
        echo "$year is not a leap year. <br>";
    }

    $year = 1900;
    $result = $module41->is_a_leap_year($year);
    if ($result){
        echo "$year is a leap year. <br>";
    }else{
        echo "$year is not a leap year.<br>";
    }

    $year = 2000;
    $result = $module41->is_a_leap_year($year);
    if ($result){
        echo "$year is a leap year. <br>";
    }else{
        echo "$year is not a leap year. <br>";
    }

    $year = 2025;
    $result = $module41->is_a_leap_year($year);
    if ($result){
        echo "$year is a leap year. <br>";
    }else{
        echo "$year is not a leap year. <br>";
    }
