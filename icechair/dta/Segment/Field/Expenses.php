<?php

namespace icechair\dta\Segment\Field;


use icechair\dta\Segment\Field;

final class Expenses extends Field{

    public function __construct($value) {
        $this->length = 1;
        if(!in_array($value, [0,1,2])){
            throw new \InvalidArgumentException("Expense is invalid");
        }
        $this->value = '2';
    }

    public function StringValue() {
        return ''.$this->value;
    }
}
