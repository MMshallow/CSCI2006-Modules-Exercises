<?php
declare(strict_types=1);
use PHPUnit\Framework\TestCase;
include 'Homework1.php'; // Ensure Homework1.php is correctly referenced

final class Homework1Test extends TestCase {
    
    public function testIsLeapYear(): void {
        $obj = new Homework1();

        $this->assertFalse($obj->isLeapYear(1990));
        $this->assertTrue($obj->isLeapYear(2000));
        $this->assertFalse($obj->isLeapYear(1900)); // 1900 is not a leap year
        $this->assertFalse($obj->isLeapYear(2025));
    }

    public function testCategorizeInteger(): void {
        $obj = new Homework1();

        $this->assertSame('Neither composite nor prime', $obj->categorizeInteger(0));
        $this->assertSame('Neither composite nor prime', $obj->categorizeInteger(1));
        $this->assertSame('Prime', $obj->categorizeInteger(2));
        $this->assertSame('Prime', $obj->categorizeInteger(3));
        $this->assertSame('Prime', $obj->categorizeInteger(13));
        $this->assertSame('Composite', $obj->categorizeInteger(4));
        $this->assertSame('Composite', $obj->categorizeInteger(9));
        $this->assertSame('Composite', $obj->categorizeInteger(15));
    }

    public function testIsPalindrome(): void {
        $obj = new Homework1();

        $this->assertFalse($obj->isPalindrome('welcome'));
        $this->assertFalse($obj->isPalindrome('chrome'));
        $this->assertFalse($obj->isPalindrome('Wow is wow'));
        $this->assertTrue($obj->isPalindrome('Borrow or Rob'));
        $this->assertTrue($obj->isPalindrome('Red rum sir is murder'));
    }

    public function testCreateProductsArray(): void {
        $obj = new Homework1();
        $expectedResult = [
            1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 12, 14, 16, 18, 15, 21, 24, 27, 20, 28, 
            32, 36, 25, 30, 35, 40, 45, 42, 48, 54, 49, 56, 63, 64, 72, 81
        ];
        $this->assertSame($expectedResult, $obj->createProductsArray(1, 9));
    }

    public function testAllPalindromeProducts(): void {
        $obj = new Homework1();
        $allList = $obj->createProductsArray(1, 9);
        $this->assertSame(['1', '2', '3', '4', '5', '6', '7', '8', '9'], $obj->allPalindromeProducts($allList));
    }

    public function testDetectMaxAndMinProducts(): void {
        $obj = new Homework1();
        $allList = $obj->createProductsArray(1, 9);
        $pals = $obj->allPalindromeProducts($allList);
        $this->assertSame([1, 9], $obj->detectMaxAndMinProducts(1, 9));
    }
}
