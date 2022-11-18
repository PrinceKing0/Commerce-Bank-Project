<?php
require "C:\Users\jared\OneDrive\Desktop\VSCode Stuff\VScode css\OrangeDoorhinge\php\login-info.php";
require "C:\Users\jared\OneDrive\Desktop\VSCode Stuff\VScode css\OrangeDoorhinge\php\otp-accept.php";
require "C:\Users\jared\OneDrive\Desktop\VSCode Stuff\VScode css\OrangeDoorhinge\php\otp-email.php";

class PHPTest extends \PHPUnit\Framework\TestCase {
    public function test_password() {
        $this->assertTrue( passWCheck(1, 1) == true );
        $this->assertTrue( passWCheck("AAaaBBbb123!", "AAaaBBbb123!") == false );
    }
    public function test_otpaccept() {
        $mysqli = require "C:\Users\jared\OneDrive\Desktop\VSCode Stuff\VScode css\OrangeDoorhinge\php\database.php";
        $this->assertTrue( otpCheck1($mysqli, "a") == false );
        $this->assertTrue( userCheck1($mysqli, "a") == false );
        $this->assertTrue( passCheck(1, 1) == false );
        $this->assertTrue( passCheck("AAaaBBbb123!", "AAaaBBbb123!") == true );
    }
    public function test_otpemail() {
        $mysqli = require "C:\Users\jared\OneDrive\Desktop\VSCode Stuff\VScode css\OrangeDoorhinge\php\database.php";
        $this->assertTrue( otpCheck($mysqli) == true );
        $userId = array("id"=>444445);
        $this->assertTrue( userCheck($mysqli, $userId) == false );
    }
}