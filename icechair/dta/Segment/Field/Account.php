<?php

namespace icechair\dta\Segment\Field;


use icechair\dta\Segment\Field;

final class Account extends Field{

    public function __construct($account){
        $this->length = 24;
        if(strlen($account > $this->length)) {
            throw new \LengthException(
                sprintf("account length > %d",
                    get_class($this),
                    $this->length
                )
            );
        }
        $this->value = $account;
    }
    public function StringValue() {
        return str_pad($this->value, $this->length);
    }
}
