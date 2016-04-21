<?php
namespace icechair\test\dta\Segment\Field;
use icechair\dta\Segment\Field\Header;

class HeaderTest extends \PHPUnit_Framework_TestCase{

    public function testInvalidDtaId(){
        $this->expectException(\InvalidArgumentException::class);
        $created = new \DateTime();
        $obj = new Header($created, "", "x", "", "", "");
    }

    public function testInvalidTransactionId(){
        $this->expectException(\InvalidArgumentException::class);
        $created = new \DateTime();
        $obj = new Header($created, "", "12345", "", "", "");
    }

}
