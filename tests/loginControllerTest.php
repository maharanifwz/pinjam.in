<?php
# ./vendor/bin/phpunit --bootstrap vendor/autoload.php login_control.php

use PHPUnit\Framework\TestCase;

require_once "login_control.php";
include 'config.php';
// File : login_control.php

global $mysqli;

class loginControllerTest extends TestCase{
    

    public function testsimulation(){
        $sm = new login_control();
        $testSentence = "hey";
        $username1 = 'harunasrori';
        $pass1 = 'pass123';

        $this->assertTrue($sm->login($username1 , $pass1));
        $this->assertTrue($sm->login('hania' , '123')); 

        
        $this->assertFalse($sm->login('ini pasti salah' , 'pass123'));
        ///If the test is fail, the system automatically stop.
        $this->assertFalse($sm->login($username1 , $pass1)); 
        $this->assertTrue($sm->login('tes123' , 'pass123'));  
        // $this->assertFalse( $sm->login('haroen' , 'pass123')); 
    }

}
?>
