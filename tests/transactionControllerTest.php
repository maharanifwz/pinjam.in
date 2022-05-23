<?php
use PHPUnit\Framework\TestCase;

require_once "transaksiController.php";


class transactionTest extends TestCase{
    

    public function testsimulation(){
        $sm = new transaction();
        $testSentence = "hey";
        $this->assertEquals("hey", $sm->simulation()); 
        $this->assertEquals("tara", $sm->rincian());
        $this->assertEquals("yuhu", $sm->total());
        $this->assertEquals("lala", $sm->total());
    }

    // public function testrincian(){
    //     $testSentence = "yes";
    //     $this->assertEquals("yes", $sm->rincian());
    // }

    // public function testtotal(){
    //     $testSentence = "yuhu";
    //    $this->assertEquals("yuhu", $sm->total());
    // }

}
?>
