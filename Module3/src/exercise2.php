<?php
    declare(strict_types=1);
?>
<!--
                           Exercise 2: Salary Data
                            =======================
    Suppose you want to display the following in your web browser.
            
            Name        Salary
            ------------------
            John        $150,000
            Alice       $175,000
            Nash        $230,000

    Use Your knowledge of HTML, CSS and PHP variables to display the 
    above information in your web browser. You must use variables to hold
    each value in the table. Display the names in 'green' and the salary in 'red'. 
    Hint: Use the echo statement to display the table.
    Use 'name' and 'salary' as the class name for the table cells.
    Assign your table to a variable called `$output`
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Module 3: Exercise 2</title>
    <style>
        table {
            width: 50%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            border: 1px solid black;
            padding: 10px;
            text-align: left;
        }
        .name {
            color: green;
            font-weight: bold;
        }
        .salary {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <?php
        final class Module32 {
            public function exercise2(): string {
                // Defines name and salary data
                $employees = [
                    ["name" => "John", "salary" => "$150,000"],
                    ["name" => "Alice", "salary" => "$175,000"],
                    ["name" => "Nash", "salary" => "$230,000"]
                ];

                // Starts table output
                $output = '<table>';
                $output .= '<tr><th>Name</th><th>Salary</th></tr>';

                // Loops through employees and populate table rows
                foreach ($employees as $employee) {
                    $output .= '<tr>';
                    $output .= '<td class="name">' . htmlspecialchars($employee["name"]) . '</td>';
                    $output .= '<td class="salary">' . htmlspecialchars($employee["salary"]) . '</td>';
                    $output .= '</tr>';
                }

                $output .= '</table>';

                return $output;
            }
        }

        // Creates an instance and display the table
        $module32 = new Module32();
        echo $module32->exercise2();
    ?>
</body>
</html>
