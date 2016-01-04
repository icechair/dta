<?php

namespace icechair\dta\Segment\Field;


use icechair\dta\Segment\Field;

final class Reserve extends Field{

    public function __construct($length) {
        $this->length = $length;
        $this->is_optional = true;
    }

    public function StringValue() {
        return "";
    }
}