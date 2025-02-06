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
include 'Module4\src\exercise1.php';
include 'Module4\src\exercise2.php';
include 'Module4\src\exercise3.php';
include 'Module4\src\exercise4.php';
use PHPUnit\Framework\TestCase;

final class Module4Test extends TestCase{
    public function testIs_a_leap_year() {
        $obj = new Module41();

        $result = $obj->is_a_leap_year(1990);
        $this->assertFalse($result);

        $result = $obj->is_a_leap_year(2000);
        $this->assertTrue($result);

        $result = $obj->is_a_leap_year(1900);
        $this->assertTrue($result);

        $result = $obj->is_a_leap_year(2025);
        $this->assertFalse($result);

    }
    public function testCategorize_positive_integers(): void{
        $obj = new Module42();
        
        $result = $obj->categorize_positive_integers(0);
        $this->assertSame('Neither composite nor prime', $result);
        
        $result = $obj->categorize_positive_integers(1);
        $this->assertSame('Neither composite nor prime', $result);

        $result = $obj->categorize_positive_integers(2);
        $this->assertSame('Prime', $result);

        $result = $obj->categorize_positive_integers(3);
        $this->assertSame('Prime', $result);

        $result = $obj->categorize_positive_integers(13);
        $this->assertSame('Prime', $result);

        $result = $obj->categorize_positive_integers(4);
        $this->assertSame('Composite', $result);

        $result = $obj->categorize_positive_integers(9);
        $this->assertSame('Composite', $result);

        $result = $obj->categorize_positive_integers(15);
        $this->assertSame('Composite', $result);
    }
    public function testIs_palindrome(): void{
        $obj = new Module43();

        $result = $obj->is_palindrome('welcome');
        $this->assertSame(false, $result);

        $result = $obj->is_palindrome('chrome');
        $this->assertSame(false, $result);

        $result = $obj->is_palindrome('Wow is wow');
        $this->assertSame(false, $result);
        
        $result = $obj->is_palindrome('Borrow or Rob');
        $this->assertSame(true, $result);

        $result = $obj->is_palindrome('Red rum sir is murder');
        $this->assertSame(true, $result);
    }
    public  function testCreate_products_array(): void{
        $obj = new Module44();

        $result = $obj->create_products_array(1, 9);
        $this->assertSame([1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 12, 14, 16, 18, 15, 21, 24, 27, 20, 28, 32, 36, 25, 30, 35, 40, 45, 42, 48, 54, 49, 56, 63, 64, 72, 81], $result);
    }
    public  function testAll_palindrome_products(): void{
        $obj = new Module44();
        $all_list = $obj->create_products_array(1, 9);
        $result = $obj->all_palindrome_products($all_list);
        $this->assertSame(['1', '2', '3', '4', '5', '6', '7', '8', '9'], $result);
    }
    public  function testDetect_max_and_min_products(): void{
        $obj = new Module44();
        $all_list = $obj->create_products_array(1, 9);
        $pals = $obj->all_palindrome_products($all_list);
        $min_max = $obj->detect_max_and_min_products(1, 9);
        $this->assertSame([1, 9], $min_max);
    }
}