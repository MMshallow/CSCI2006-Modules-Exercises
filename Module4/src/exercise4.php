<?php
    declare(strict_types=1);
    /*                      Exercise 4: Create Palindrome Array
                            ===================================
        In this exercise, you will write a number of functions to achieve the following task.
            Write a program that detects palindrome numbers in the list of numbers generated 
            by multiplying the numbers in a given range, and return the smallest and largest palindrome number.
        1. Create a function called create_products_array($start, $end) that takes the start snd end and returns 
            a list of unique products in the range. 
        2. Create a function called all_palindrome_products($products_list) that takes a list containing
            products returned by the function create_products_array and returns a list containing all products that are
            palindromes. 
        3. Create a function called detect_max_and_min_products($start, $end) that takes the range $start and $end and 
            returns the maximum and minimum value of the palindrome products.  
    */
    
    final class Module44 {
        public function detect_max_and_min_products(int $start, int $end): array {
                   // Write your code for this exercise here.
                   //Code
            $products = $this->create_products_array($start, $end);
            $palindromes = $this->all_palindrome_products($products);
            
            if (empty($palindromes)) {
                return ['No palindrome found'];
            }
            
            return [min($palindromes), max($palindromes)];
        }

        public function create_products_array(int $start, int $end): array {
             // Write your code for this exercise here.
             //Code
            $products = [];
            for ($i = $start; $i <= $end; $i++) {
                for ($j = $i; $j <= $end; $j++) {
                    $products[] = $i * $j;
                }
            }
            return array_unique($products);
        }

        public function all_palindrome_products(array $products_list): array {
             // Write your code for this exercise here.
             //Code
            return array_filter($products_list, function($num) {
                return $this->is_palindrome((string)$num);
            });
        }

        private function is_palindrome(string $num): bool {
            $length = strlen($num);
            for ($i = 0; $i < $length / 2; $i++) {
                if ($num[$i] !== $num[$length - $i - 1]) {
                    return false;
                }
            }
            return true;
        }
    } 
    
    /* The following code will help you view your output in web browsers.
        DO NOT EDIT or REMOVE it.
    */
    $module44 = new Module44();
    $lists = $module44->create_products_array(1, 9);
    echo "<br>All products <br>";
    foreach ($lists as $l) {
        echo $l. " ";
    }
    echo "<br>Palindrome products <br>";
    $pals = $module44->all_palindrome_products($lists);
    foreach ($pals as $p) {
        echo $p. " ";
    }
    echo "<br>Min and max values<br>";
    $final = $module44->detect_max_and_min_products(1, 9);
    foreach ($final as $f) {
        echo $f. " ";
    }
    
    