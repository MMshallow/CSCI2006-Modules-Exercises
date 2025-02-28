<?php 
declare(strict_types=1);

/*
                            Problem 1: Generate Random Password
                            ===================================
    Write a PHP program that ask the user to enter their first name, last name, and date of birth
    and generate a random password from these data. The password must have the following characters:
        1. The minimum length of the password is 6 characters.
        2. The password must contain at least 1 upper-case characters, 1 lower-case characters, and 1 digit.
        3. The password cannot start with a digit.
        4. The password must contain unique characters.
    
*/

final class Problem1 {

    // Function to get user information
    public function get_user_info(): array {
        // Simulating user input
        $first_name = "Mahdi";
        $last_name = "Shallow";
        $dob = "2000-05-14"; // YYYY-MM-DD format

        return [
            'first_name' => $first_name,
            'last_name' => $last_name,
            'dob' => $dob
        ];
    }

    // Function to generate a unique password
    public function generate_password(array $data): string {
        $all_chars = array_merge(
            str_split($data['first_name']),
            str_split($data['last_name']),
            str_split(str_replace("-", "", $data['dob']))
        );

        // Remove duplicates
        $unique_chars = array_unique($all_chars);
        shuffle($unique_chars);

        // Ensure the password has at least one uppercase, one lowercase, and one digit
        $password = "";
        $has_upper = false;
        $has_lower = false;
        $has_digit = false;

        foreach ($unique_chars as $char) {
            if (ctype_upper($char)) $has_upper = true;
            if (ctype_lower($char)) $has_lower = true;
            if (ctype_digit($char)) $has_digit = true;
            $password .= $char;
            
            // Stop if we meet the length requirement
            if (strlen($password) >= 6 && $has_upper && $has_lower && $has_digit) {
                break;
            }
        }

        // Ensure the first character is not a digit
        if (ctype_digit($password[0])) {
            for ($i = 1; $i < strlen($password); $i++) {
                if (!ctype_digit($password[$i])) {
                    // Swap first character with a non-digit
                    [$password[0], $password[$i]] = [$password[$i], $password[0]];
                    break;
                }
            }
        }

        return $password;
    }
}

// Instantiating the class and generating password
/* The following code will help you view your output in web browsers.
    DO NOT EDIT or REMOVE it.
*/
$obj = new Problem1();
$info = $obj->get_user_info();
$pwd = $obj->generate_password($info);
print_r($pwd);
