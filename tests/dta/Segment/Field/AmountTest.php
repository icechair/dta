<?php
namespace icechair\test\dta\Segment\Field;
use icechair\dta\Segment\Field\Amount;

class AmountTest extends \PHPUnit_Framework_TestCase{

    public function testCurrencyCode(){
        $this->expectException(\InvalidArgumentException::class);
        $account = new Amount(new \DateTime(), '', 99.99);
        $account->stringValue();
    }

    public function testAmountLength(){
        $this->expectException(\LengthException::class);
        $account = new Amount(new \DateTime(), 'EUR', '999999999999999999999999999999999999');
        $account->stringValue();
    }
}
