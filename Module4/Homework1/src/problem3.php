<?php
session_start();
include 'TicTacToe.php';

/*
                 Problem 3: Tic Tac Toe Game
                                ===============================
    Implement a browser based Tic Tac Toe Game using PHP. 
    Here is the implementation details.
    You must write all of the following functions in the `tictactoe.php` file.

    1. Write a function called initialize_board() that returns a 3 X 3 grid. 
       The function will display a 3 X 3 grid containing the numbers 1 to 9.
                     ____________
                    | 1 | 2 | 3 | 
                    | 4 | 5 | 6 | 
                    | 7 | 8 | 9 |
                    ------------
    2. Write a function called take_turns() that switches the turn. 
       The function will take the previous turn as its argument and determines
       the next turn. Determine the initial turn by generating a random number
       between 1 and 2 inclusive. The function will return the next turn.

    3. Write the following function:
            3.1. check_diagonals() - checks if the diagonal element are the same.
            3.2. check_rows() - checks if the row elements are the same.
            3.3. check_cols() - checks if the column elements are the same.
    4. Write a function called  
     that asks the player to choose a position 
    to move to and places their symbol at the position if the position is available.
    
    5. Write a function called check_availability() that returns true if the position chosen
       by the player is available, otherwise false.
       
    6. Write a function called check_win() that check if there is a win.
       This function must return a boolean value true if a player wins, false otherwise.
       N.B. If no more move is possible, the game is a tie.

    Note: You can write the functions in a separate file and then include that file at the top
    of this file. 
*/
    

// Create a new game instance
$game = new TicTacToe();

// Initialize board if not set
if (!isset($_SESSION['board'])) {
    $_SESSION['board'] = $game->initialize_board();
    // X starts first
    $_SESSION['turn'] = 'X';  
}

// Process user move
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['position'])) {
    $position = (int)$_POST['position'];

    if ($game->check_availability($_SESSION['board'], $position)) {
        $_SESSION['board'] = $game->move($_SESSION['board'], $position, $_SESSION['turn']);

        if ($game->check_wins($_SESSION['board'])) {
            echo "<h2>Player {$_SESSION['turn']} Wins!</h2>";
            session_destroy();
            exit();
        }

        $_SESSION['turn'] = $game->take_turns($_SESSION['turn']);
    } else {
        echo "<p style='color: red;'>Invalid move! Position already taken.</p>";
    }
}

// Reset game
if (isset($_POST['reset'])) {
    session_destroy();
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tic Tac Toe</title>
</head>
<body>
    <h1>Tic Tac Toe</h1>
    <p>Current Turn: <strong><?php echo $_SESSION['turn']; ?></strong></p>

    <table border="1" cellpadding="10" style="text-align:center; font-size:20px;">
        <?php foreach ($_SESSION['board'] as $row): ?>
            <tr>
                <?php foreach ($row as $cell): ?>
                    <td width="50" height="50"><?php echo htmlspecialchars($cell); ?></td>
                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
    </table>

    <form method="POST">
        <label for="position">Enter position (1-9): </label>
        <input type="number" name="position" min="1" max="9" required>
        <button type="submit">Make Move</button>
    </form>

    <form method="POST">
        <button type="submit" name="reset">Reset Game</button>
    </form>
</body>
</html>
