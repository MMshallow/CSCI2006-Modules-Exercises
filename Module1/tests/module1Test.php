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
include 'Module1\src\exercise1.php';
use PHPUnit\Framework\TestCase;
final class PhpInfoTest extends TestCase{
    public function testPhpInfo(): void{
        $info = new PhpInfo();
        $phpinfo = $info->phpInfo();
        $this->assertSame(phpinfo(), $phpinfo);
    }
}