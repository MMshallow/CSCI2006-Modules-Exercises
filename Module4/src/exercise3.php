<?php
    declare(strict_types=1);
       /*                      Exercise 3
    : Palindrome Check
                            ============================
       Write a function to check whether a string is a palindrome or not.
       DO NOT USE BUILTIN FUNCTIONS to remove whitespaces or reverse the string!!
       You must name your function correctly following the PHP naming conventions.
       pass the string that you wish to check as parameter to the function.
       Note: You may need to define helper functions for this exercise. 
    */
    
    final class Module43 {
        public function is_palindrome(string $word): bool {
            // Write your code for this exercise here.
            //Code
            $cleaned_word = $this->remove_whitespace_and_lowercase($word);
            return $this->check_palindrome($cleaned_word);
        }

        private function remove_whitespace_and_lowercase(string $word): string {
            $cleaned = '';
            for ($i = 0; $i < strlen($word); $i++) {
                if ($word[$i] !== ' ') {
                    $cleaned .= strtolower($word[$i]);
                }
            }
            return $cleaned;
        }

        private function check_palindrome(string $word): bool {
            $length = strlen($word);
            for ($i = 0; $i < $length / 2; $i++) {
                if ($word[$i] !== $word[$length - $i - 1]) {
                    return false;
                }
            }
            return true;
        }
    } 
    
     /* The following code will help you view your output in web browsers.
        DO NOT EDIT or REMOVE it.
    */
    $module43 = new Module43();

    $word = 'chrome';
    $result =  $module43->is_palindrome($word);
    $result ? print $word.' is a palindrome.': print $word.' is not a a palindrome.'.'<br>';

    $word = 'Madam';
    $result =  $module43->is_palindrome($word);
    $result ? print $word.' is a palindrome.': print $word.' is not a a palindrome.'.'<br>';

    $word = 'Borrow Or Rob';
    $result =  $module43->is_palindrome($word);
    $result ? print $word.' is a palindrome.': print $word.' is not a a palindrome.'.'<br>';
 
    $word = 'Red rum sir is murder';
    $result =  $module43->is_palindrome($word);
    $result ? print $word.' is a palindrome.': print $word.' is not a a palindrome.'.'<br>';