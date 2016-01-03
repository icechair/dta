<?php

namespace icechair\dta\Segment\Field;


use icechair\dta\Segment\Field;

final class Account extends Field{

    public function __construct($account){
        $this->length = 24;
        $this->value = $account;
    }
    public function StringValue() {
        return $this->value;
    }
}