<?php

namespace icechair\dta\Segment;


use icechair\dta\Segment;

final class PaymentReference extends Segment{

    public function __construct(Segment\Field\PaymentReference $reference, Segment\Field\Expenses $expenses) {

        $this->segment_prefix = "05";
        $this->fields = [
            $reference,
            $expenses,
            new Segment\Field\Reserve(19)
        ];
    }
}