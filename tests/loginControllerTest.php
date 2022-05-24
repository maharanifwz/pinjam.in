<?php
# ./vendor/bin/phpunit --bootstrap vendor/autoload.php login_control.php

use PHPUnit\Framework\TestCase;

require_once "login_control.php";


class loginControllerTest extends TestCase{
    

    public function testsimulation(){
        $sm = new login_control();
        $testSentence = "hey";
        $this->assertEquals(true, $sm->login('harunasrori' , 'pass123')); 
        $this->assertEquals(true, $sm->login('hania' , '123')); 
        $this->assertEquals(false, $sm->login('ini pasti salah' , 'pass123')); 
        $this->assertEquals(true, $sm->login('tes123' , 'pass123')); 
        $this->assertEquals(false, $sm->login('haroen' , 'pass123')); 
    }

}
?>
