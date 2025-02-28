<?php 
declare(strict_types=1);

/*
                                Problem 2: Number Guessing Game
                                ===============================
    Implement the Number Guessing Game using PHP. 
    The game starts with asking the user for a start number and end number. The computer will generate
    a secrete number between the start and end numbers. The player will guess the computer number. if 
    the player number is the same as the secrete number, the player wins and the game is over. If the player guesses 
    lower than the secrete number, display to the player that they guessed lower and allow them to guess again. If
    the player guesses higher than the secrete number, display to the player that they guessed higher and allow them
    to guess again. This process will continue until the player guesses the secrete number or the player plays floor((end - start) / 2).
 */

final class Problem2 {

    // Function to get a valid start and end range from the user
    public function get_user_inputs(): array {
        while (true) {
            $start = readline("Enter the start number: ");
            $end = readline("Enter the end number: ");

            // Validate numeric input
            if (!is_numeric($start) || !is_numeric($end)) {
                echo "Error: Please enter valid numbers only.\n";
                continue;
            }

            // Convert inputs to integers
            $start = (int) $start;
            $end = (int) $end;

            // Ensuring valid range
            if ($start < $end && $start >= 0) {
                return [$start, $end];
            }

            echo "Error: Start number must be **less than** the end number and **non-negative**.\n";
        }
    }

    // Function to compare the user's guess with the secret number
    public function compare_guess(int $secret, int $guess): string {
        if ($guess === $secret) {
            return "correct";
        } elseif ($guess > $secret) {
            return "high";
        } else {
            return "low";
        }
    }
}

// Create an instance of Problem2
$obj = new Problem2();
$data = $obj->get_user_inputs();

$start = $data[0];
$end = $data[1];
$secret_number = rand($start, $end); // Generate secret number

$max_rounds = max(1, floor(($end - $start) / 2)); // Ensure at least 1 attempt
$rounds = 0;

echo "\nI have selected a number between $start and $end. Try to guess it!\n";

while ($rounds < $max_rounds) {
    $rounds++;
    
    // Get a valid guess
    while (true) {
        $guess = readline("Enter your guess: ");

        if (is_numeric($guess)) {
            $guess = (int) $guess;
            break;
        }
        echo "Error: Please enter a valid number.\n";
    }

    $result = $obj->compare_guess($secret_number, $guess);

    if ($result === "correct") {
        echo "Congratulations! You guessed the correct number $secret_number in $rounds rounds.\n";
        exit();
    } elseif ($result === "high") {
        echo "Your guess is too high. Try again.\n";
    } else {
        echo "Your guess is too low. Try again.\n";
    }
}

echo "You lost! The secret number was $secret_number. Better luck next time!\n";
