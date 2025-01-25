<?php
declare(strict_types= 1);
/**
 *                       Example 1: Displaying String Data
 *                       =================================
 *  To display a text data in a web browser, you can use the PHP echo statement. The PHP echo statement takes one argument of type 
 * string and returns a string representation of the data. You can also concatenate more than one strings together using the 
 * concatenation operator. See the example below for more information. 
 * **/
echo "Hello, welcome to the world of PHP!";

echo "This statement will show on the same line as the previous statement.";

echo "\n";

echo "We could add the new line statement to force the text to go to the new line as we did here.";

echo "\n";

echo "We can use comma separated strings", " as we did here to put two or more strings together.";

echo "\n";

echo "We could also use concatenated strings" , "\nand use the new line character to wrap the text to force it go to the new line";

echo "\n";

echo "However, this is not possible if you display it in the browser.\nThe browser uses the <br> tag to force texts to go to the new line.";

echo "\n";

echo "Try it yourself.";