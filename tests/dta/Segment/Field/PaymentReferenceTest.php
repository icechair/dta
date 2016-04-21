<?php
namespace icechair\test\dta\Segment\Field;
use icechair\dta\Segment\Field\PaymentReference;

class PaymentReferenceTest extends \PHPUnit_Framework_TestCase{

    public function testInvalidId(){
        $this->expectException(\InvalidArgumentException::class);
        $obj = new PaymentReference("X", "");
    }

    public function testInvalidReference(){
        $this->expectException(\Exception::class);
        $obj = new PaymentReference("I", "");
    }
}
