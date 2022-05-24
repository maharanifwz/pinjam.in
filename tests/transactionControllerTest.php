<?php

use PHPUnit\Framework\TestCase;

require_once "transaksiController.php";


class transactionControllerTest extends TestCase{

   
    // public function testcoba(){
    //     $transac = new transaction();

    //     $this->assertEquals("heyy",  $transac->try());
    // }

    public function testTransactionDays() //Untuk mastiin datanya masuk atau enggak
    {
        $besarPinjaman = 2000000;
        $tenor = "03d";
        $startDate = "2022-05-03";
        $periode = 3;
        $transac = new transaction();
        $transac->setData($besarPinjaman, $tenor, $startDate);
        $data = array($besarPinjaman,$tenor ,$startDate, $periode );

        $this->assertEquals($data, $transac->getData());
    
    }

    // public function testTransactionMonths(){
    //     $transac = new transaction();

    // }

    // public function testGetSessionData()
    // {
    //     # code...
    // }

    // public function testSetBunga()
    // {

    // }

    // public function testPaymentDetails(){

    // }

    // public function testPaymentDetailFail(){

    // }

    // public function testTotalAngsuran(){

    // }

    // public function simulation(){

    // }

}
?>
