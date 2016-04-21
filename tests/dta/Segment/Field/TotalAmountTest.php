<?php
namespace icechair\test\dta\Segment\Field;
use icechair\dta\Segment\Field\TotalAmount;

class TotalAmountTest extends \PHPUnit_Framework_TestCase{

    public function testTotalAmount(){
        $totalAmount = new TotalAmount(33.25);

        $this->assertEquals(33.25, $totalAmount->Amount());
        $this->assertEquals("33,250", $totalAmount->StringValue());
    }
}
