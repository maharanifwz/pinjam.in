<?php

use PHPUnit\Framework\TestCase;

require_once "transaksiController.php";


class transactionControllerTest extends TestCase{

    public function testTransactionDays() //Untuk mastiin datanya masuk atau enggak
    {
        //variable for object initiation
        $besarPinjaman = 2000000;
        $tenor = "03d";
        $startDate = "2022-05-03";
        $periode = 3;
        $data = array($besarPinjaman,$tenor ,$startDate, $periode );
        $paymentData = array(676667, 673334, 670001);

        //Create object and call functio
        $transac = new transaction();
        $transac->setData($besarPinjaman, $tenor, $startDate);
        $condition = $transac->setBunga();
        $transac->paymentDetails();

        // Testing
        $this->assertEquals($data, $transac->getData()); //save data
        $this->assertTrue($condition); //return bunga 
        $this->assertEquals($paymentData, $transac->getPaymentData()); //total payment every installment
        $this->assertEquals("2,020,002", $transac->totalPayment()); //sum of total payment every installment
        $this->assertStringStartsWith("<h3>Untuk", $transac->paymentDetailFail()); //check output for fail input
        $this->assertEquals(676667, $transac->simulation()); //check output for simulation
    }

    public function testTransactionMonths(){
        //Variable for object initiation
        $besarPinjaman = 25000000;
        $tenor = "3m";
        $startDate = "2022-05";
        $periode = 3;
        $paymentData = array(10833334, 10000001, 9166668);
        $data = array($besarPinjaman,$tenor ,$startDate, $periode );

        //Create object and call function
        $transac = new transaction();
        $transac->setData($besarPinjaman, $tenor, $startDate);
        $condition = $transac->setBunga();
        $transac->paymentDetails();

        //Testing
        $this->assertEquals($data, $transac->getData()); //save data
        $this->assertTrue($condition); //return bunga
        $this->assertEquals($paymentData, $transac->getPaymentData());
        $this->assertEquals("30,000,003", $transac->totalPayment());
        $this->assertStringStartsWith("<h3>Untuk", $transac->paymentDetailFail());
        $this->assertEquals(10833334.0, $transac->simulation());
    }

}
?>
