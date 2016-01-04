<?php
namespace icechair\dta\Segment\Field;


use icechair\dta\Segment\Field;

final class TotalAmount extends Field{

    public function __construct($value) {
        $this->length = 16;
        $this->value = $value;
    }

    public function StringValue() {
        return number_format($this->value, 3,',','');
    }

    public function Amount(){
        return $this->value;
    }
}