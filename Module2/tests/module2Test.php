<?php
declare(strict_types = 1);
/*
    DO NOT OPEN this file!!! 
    ========================
    If you are here and reading this message,
    you have to close this file and leave immediately. Working in this file,
    writing code here, or changing the code in this file will break the PHP test
    and result in unexpected behaviour or test failures. 
*/
include 'Module2\src\exercise1.php';
include 'Module2\src\exercise2.php';
use PHPUnit\Framework\TestCase;

final class Module2Test extends TestCase{
    public function testExercise1(): void{
        $handle = fopen('Module2\src\exercise1.php', "r");
        $scriptContent = fread($handle, filesize('Module2\src\exercise1.php'));
        fclose($handle); 

        $obj = new Module21();
        $result = $obj->exercise1();
        strip_tags($result);

        $is_true = str_contains($scriptContent, 'echo $message;');
        $actual = "Hello, welcome to the world of PHP!";
        $this->assertSame($actual, $result);
        $this->assertSame(true, $is_true);
    }
    public function testExercise2(): void{
        $handle = fopen('Module2\src\exercise2.php', "r");
        $scriptContent = fread($handle, filesize('Module2\src\exercise2.php'));
        fclose($handle); 

        $obj = new Module22();
        $result = $obj->exercise2();

        $this->assertSame(true, str_contains($scriptContent, '<h1>'));
        $this->assertSame(true, str_contains($scriptContent, '</h1>'));
        $this->assertSame(true, str_contains($scriptContent, '<p>'));
        $this->assertSame(true, str_contains($scriptContent, '</p>'));
        $this->assertSame(true, str_contains($scriptContent, 'echo $message;'));
        $this->assertSame(true, str_starts_with($result, '<h1>'));
        $this->assertSame(true, str_ends_with($result, '</p>'));
    }
}