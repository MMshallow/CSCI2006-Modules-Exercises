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
include 'Module5\Exercises\src\validPassword.php';
include 'Module5\Exercises\src\exercise2.php';
include 'Module5\Exercises\src\exercise3.php';

use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\assertIsArray;

final class Module5Test extends TestCase{
    public function testValidatePassword() {
        $obj = new Module51();

        $result = $obj->contains_numbers('abd');
        $this->assertFalse($result);

        $result = $obj->contains_numbers('1abd');
        $this->assertTrue($result);

        $result = $obj->contains_numbers('abd2');
        $this->assertTrue($result);

        $result = $obj->contains_special_chars('123');
        $this->assertFalse($result);

        $result = $obj->contains_special_chars('abc12');
        $this->assertFalse($result);

        $result = $obj->contains_special_chars('_123');
        $this->assertTrue($result);

        $result = $obj->contains_special_chars('cgf!`@abd125');
        $this->assertTrue($result);

        $result = $obj->contains_upper_case_letter('abc123');
        $this->assertFalse($result);

        $result = $obj->contains_upper_case_letter('123');
        $this->assertFalse($result);

        $result = $obj->contains_upper_case_letter('Abc123');
        $this->assertTrue($result);

        $result = $obj->is_correct_length('adrft');
        $this->assertFalse($result);

        $result = $obj->is_correct_length('adrfth1235');
        $this->assertTrue($result);

        $result = $obj->is_correct_length('adrfth5');
        $this->assertFalse($result);

        $result = $obj->starts_with_lowercase_letter('Abc125');
        $this->assertFalse($result);

        $result = $obj->starts_with_lowercase_letter('cbc125');
        $this->assertTrue($result);

    }
    public function testUploadIsSuccessful(): void{
        $obj = new Module52();
        
        $result = $obj->upload_is_successful();
        
    }
    public function testRadioButtonHandler(): void{
        $obj = new Module53();

        $result = $obj->radio_button_handler();

        $result = $obj->checkbox_button_handler();
        $this->assertIsArray($result);

        $this->assertLessThanOrEqual(3, count($result));

    }
}