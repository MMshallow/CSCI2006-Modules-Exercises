<?php
    declare(strict_types=1);
    /*                            Module 2: Exercise 1
                            ====================
    In this exercise, you will use the PHP echo statement to display messages in the browser.
    Message to display: "Hello, welcome to the world of PHP!"
        1. Define a variable called 'message' that holds the above message.
        2. Echo the message to display it in the browser.  
    */
    final class Module22 { //Changed class from Module12 to Module22 because the class was in use in Module21
        
        public function exercise2(): string { //Changed exercise1 function to exercise2
            // Write your code for this exercise here.
            //// Defines the message
            $message = 'Hello, welcome to the world of PHP!';          // Put your message text inside the quotes.
            ////Echo the message to display it in the browser
            echo $message;
            return $message;

        }
    } 
    /* The following code will help you view your output in web browsers.
        DO NOT EDIT or REMOVE it.
    */
    $module22 = new Module22();
    $module22->exercise2();