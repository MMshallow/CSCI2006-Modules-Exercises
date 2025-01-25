<?php
    declare(strict_types= 1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1> Welcome to the World of PHP!</h1>
    <?php
    /**
    *                       Example 2: Embedding PHP within HTML
    *                       ====================================
    * A PHP text data that is intended to be displayed in a web browser, is usually embedded within HTML document. 
    * This provides us with better control over how the text is rendered inside the web browser. You can add styles or 
    * enhance interactions by embedding PHP inside HTML document. Explore the following example to learn more about 
    * embedding PHP within HTML document. 
    * **/
    ?>
    <h2> <?php echo "What time is it now?"?> </h2><hr />
    <p>The time is: 
        <?php 
            echo date("H:i:s");
        ?>
    <!-- Run this script in the browser. You can also run it in VSCode but the output will be different. -->
</body>
</html>

