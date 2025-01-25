<?php
    declare(strict_types=1);
/*
                            Module 1: Exercise 1
                            ====================
    In this exercise, you will use a php buit-in function that will desplay the information related to PHP.
    You will need to change a single line of code. DO NOT change the rest of the code in anyways!
    To run the test for this exercise, run the following command: 
            ./vendor/bin/phpunit ./Module1/tests/phpInfoTest.php
    */
    final class PhpInfo {
        public function phpInfo(): bool{
            $user_info = phpinfo(); // I replaced empty string with phpinfo() function
            return $user_info;
        }
    } 
    /* The following code will help you view your output in web browsers.
        DO NOT EDIT or REMOVE it.
    */
    $info = new PhpInfo();
    $info->phpInfo();
   