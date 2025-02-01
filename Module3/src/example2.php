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
    <?php
    /* 
                    Example 2: Parsing URL Data
                    ===========================
        Write a PHP scrip that will parse a URL and displays the `scheme`, `host`, `path`, and `port` data 
        on separate lines. 
    
    */
    $url = 'https://www.w3schools.com/php/';
    $urlData = parse_url($url);
    
    echo 'Scheme: '. $urlData['scheme'].'<br>'; 
    echo 'Host: '.$urlData['host'].'<br>';
    echo 'path: '. $urlData['path'].'<br>';

    ?>
</body>
</html>