<?php
declare(strict_types=1);

final class TicTacToe {
    // Function to determine the next turn (X or O)
    public function take_turns(string $turn): string {
        return ($turn === 'X') ? 'O' : 'X';
    }

    // Function to initialize the board with numbers 1-9
    public function initialize_board(): array {
        return [
            [1, 2, 3],
            [4, 5, 6],
            [7, 8, 9]
        ];
    }

    // Function to check if a move position is available
    public function check_availability(array $board, int $pos): bool {
        foreach ($board as $row) {
            if (in_array($pos, $row, true)) {
                return true;
            }
        }
        return false;
    }

    // Function to check if diagonal elements are the same
    public function check_diagonals(array $board): bool {
        return ($board[0][0] === $board[1][1] && $board[1][1] === $board[2][2]) ||
               ($board[0][2] === $board[1][1] && $board[1][1] === $board[2][0]);
    }

    // Function to check if columns contain the same symbols
    public function check_cols(array $board): bool {
        for ($col = 0; $col < 3; $col++) {
            if ($board[0][$col] === $board[1][$col] && $board[1][$col] === $board[2][$col]) {
                return true;
            }
        }
        return false;
    }

    // Function to check if rows contain the same symbols
    public function check_rows(array $board): bool {
        foreach ($board as $row) {
            if ($row[0] === $row[1] && $row[1] === $row[2]) {
                return true;
            }
        }
        return false;
    }

    // Function to place a symbol on the board
    public function move(array $board, int $pos, string $symbol): array {
        for ($i = 0; $i < 3; $i++) {
            for ($j = 0; $j < 3; $j++) {
                if ($board[$i][$j] == $pos) {
                    $board[$i][$j] = $symbol;
                    return $board;
                }
            }
        }
        return $board;
    }

    // Function to check if a player has won
    public function check_wins(array $board): bool {
        return $this->check_rows($board) || $this->check_cols($board) || $this->check_diagonals($board);
    }
}
?>
