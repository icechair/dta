<?php
namespace icechair\test\dta\Segment\Field;
use icechair\dta\Segment\Field\Ta836Address;

class Ta836AddressTest extends \PHPUnit_Framework_TestCase{

    public function testTa836Address(){
        $name = "Max Mustermann";
        $street = "Musterstrasse 1";
        $city = "12345 Musterstadt";
        $address = new Ta836Address($name, $street, $city);

        $expected = str_pad($name, 35);
        $expected .= str_pad($street, 35);
        $expected .= str_pad($city, 35);
        $this->assertEquals($expected, $address->StringValue());

        $name = str_pad($name, 36, "x");
        $street = str_pad($street, 36, "x");
        $city = str_pad($city, 36, "x");
        $address = new Ta836Address($name, $street, $city);

        $expected = substr($name, 0, 35);
        $expected .= substr($street, 0, 35);
        $expected .= substr($city, 0, 35);
        $this->assertEquals($expected, $address->StringValue());
    }
}
