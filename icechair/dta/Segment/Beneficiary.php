<?php

namespace icechair\dta\Segment;


use icechair\dta\Segment;

final class Beneficiary extends Segment{


    public function __construct(Segment\Field\Ta836BeneficiaryAddress $address) {

        $this->segment_prefix = "04";
        $this->fields = [
            $address,
            new Segment\Field\Reserve(54)
        ];
    }

}
