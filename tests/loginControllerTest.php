<?php
# ./vendor/bin/phpunit --bootstrap vendor/autoload.php login_control.php

use PHPUnit\Framework\TestCase;

require_once "login_control.php";


class transactionTest extends TestCase{
    

    public function testsimulation(){
        $sm = new login_control();
        $testSentence = "hey";
        $this->assertEquals("success", $sm->login('harunasrori' , 'pass123')); 
        // $this->assertEquals("hey", $sm->login()); 
        // $this->assertEquals("hey", $sm->login()); 
        // $this->assertEquals("hey", $sm->login()); 
        // $this->assertEquals("hey", $sm->login()); 
    }

}
?>
