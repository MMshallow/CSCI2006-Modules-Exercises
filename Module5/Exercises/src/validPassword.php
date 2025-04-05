<?php 
declare(strict_types=1);

final class Module51 {
    public function is_correct_length(string $password): bool {
        // Write your solution below this line.
        return strlen($password) >= 8;

    }

    public function starts_with_lowercase_letter(string $password): bool {
        // Write your solution below this line.
        return preg_match('/^[a-z]/', $password) === 1;

    }

    public function contains_upper_case_letter(string $password): bool {
        // Write your solution below this line.
        return preg_match('/[A-Z]/', $password) === 1;


    }

    public function contains_special_chars(string $password): bool {
        // Write your solution below this line.
        return preg_match('/[\W_]/', $password) === 1;


    }

    public function contains_numbers(string $password): bool {
        // Write your solution below this.
        return preg_match('/\d/', $password) === 1;

    }
}