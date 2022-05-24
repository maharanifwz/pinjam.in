<?php
# ./vendor/bin/phpunit --bootstrap vendor/autoload.php login_control.php

use PHPUnit\Framework\TestCase;

require_once "register_control.php";
include 'config.php';
// File : login_control.php

global $mysqli;

class registerControllerTest extends TestCase{
    

    public function testsimulation(){
        $test = new register_control();
    
        $this->assertTrue($test->register('ini tes' ,'testing', 'test@gmail.com', '', 'pass123'));
        $this->assertTrue($test->register('ini tes 2' ,'tester', 'test2@gmail.com', '', 'pass123'));
        
        ///If the test is fail, the system automatically stop.
        $this->assertFalse($test->register('harun' , 'harunasrori', 'harun@gmail.com', '', 'pass123'));
        $this->assertFalse($test->register('asrori' , 'asrori', 'harun407@gmail.com', '', 'pass123'));
    }

}
?>
