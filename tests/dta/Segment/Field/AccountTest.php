<?php
namespace icechair\test\dta\Segment\Field;
use icechair\dta\Segment\Field\Account;

class AccountTest extends \PHPUnit_Framework_TestCase{

    public function testInvalidLength(){
        $this->expectException(\LengthException::class);
        $account = new Account("123456789012345678987654325675645342345664564523");
        $account->stringValue();
    }

}
