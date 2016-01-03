<?php

namespace icechair\dta\Segment\Field;


use icechair\dta\Segment\Field;

final class Conversion extends Field{

    /**
     * Conversion constructor.
     * @param float|null $value
     * @param bool $is_optional
     */
    public function __construct($value){
        $this->value = $value;
        $this->is_optional = true;
        $this->length = 12;
    }
    public function StringValue() {
        return $this->value?number_format($this->value,6,',',''):'';
    }
}