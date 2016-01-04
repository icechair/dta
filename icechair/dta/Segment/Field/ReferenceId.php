<?php
namespace icechair\dta\Segment\Field;


use icechair\dta\Segment\Field;

final class ReferenceId extends Field{

    public function __construct($value) {
        $this->length = 16;
        $this->value = $value;
    }

    public function StringValue() {
        return $this->value;
    }
}