<?php

namespace icechair\dta\Segment\Field;


use icechair\dta\Segment\Field;

final class IBAN extends Field{
    /**
     * @var string
     */
    private $iban;

    public function __construct($iban) {
        $this->length = 34;
        $this->iban = $iban;
    }

    public function StringValue() {
        return str_pad($this->iban, $this->length);
    }
}
