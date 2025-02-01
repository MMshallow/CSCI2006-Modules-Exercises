<?php
declare(strict_types = 1);
/*
    DO NOT OPEN this file!!! 
    ========================
    If you are here and reading this message,
    you have to close this file and leave immediately. Working in this file,
    writing code here, or changing the code in this file will break the PHP test
    and result in unexpected behavior or test failures. 
*/
include 'Module3\src\exercise1.php';
include 'Module3\src\exercise2.php';
include 'Module3\src\exercise3.php';
use PHPUnit\Framework\TestCase;

final class Module3Test extends TestCase{
    public function testExercise1(): void{
        $handle = fopen('Module3\src\exercise1.php', "r");
        $scriptContent = fread($handle, filesize('Module3\src\exercise1.php'));
        fclose($handle); 

        $obj = new Module31();
        //$result = $obj->exercise1();
        
        $is_true = str_contains($scriptContent, '$name =') && str_contains($scriptContent, '$age =') && str_contains($scriptContent, '$address =');
        $echo_in_file = str_contains($scriptContent,'print $name." is ". $age." years old and lives at ".$address;');
        
        $this->assertSame(true, $is_true);
        $this->assertSame(true, $echo_in_file);
    }
    public function testExercise2(): void{
        $handle = fopen('Module3\src\exercise2.php', "r");
        $scriptContent = fread($handle, filesize('Module3\src\exercise2.php'));
        fclose($handle); 

        $obj = new Module32();
        $result = $obj->exercise2();
    
        $this->assertSame(true, str_starts_with($result, '<table'));
        $this->assertSame(true, str_ends_with($result, '</table>'));
        $this->assertSame(true, str_contains($result, "td class='name'"));
        $this->assertSame(true, str_contains($result, "td class='salary'"));
        $this->assertSame(true, str_contains($result, "<thead>"));
        $this->assertSame(true, str_contains($scriptContent, 'echo $output;'));
    }
    public function testAdd(): void{
       
        $obj = new Module33();
        $num1 = 9.0; $num2 = 3.0;
        $sum = $obj->add($num1, $num2);
        $this->assertEquals($sum, $num1 + $num2);
    }
    public function testSubtract(): void{
       
        $obj = new Module33();
        $num1 = 9.0; $num2 = 3.0;
        $difference = $obj->subtract($num1, $num2);
        $this->assertEquals($difference, $num1 - $num2) || $this->assertEquals(-$difference, $num2 - $num1);
    }
    public function testMultiply(): void{
       
        $obj = new Module33();
        $num1 = 9.0; $num2 = 3.0;
        $product = $obj->multiply($num1, $num2);
        $this->assertEquals($product, $num1 * $num2);
    }
    public function testQuotient(): void{
       
        $obj = new Module33();
        $num1 = 9.0; $num2 = 3.0;
        $quotient = $obj->multiply($num1, $num2);
        $this->assertEquals($quotient, $num1 * $num2);
    }
}