<?php

namespace icechair\dta\Record;


use icechair\dta\Record;
use icechair\dta\Segment\AccountBeneficiary;
use icechair\dta\Segment\Beneficiary;
use icechair\dta\Segment\Contractee;
use icechair\dta\Segment\Header;

final class Ta836 extends Record{
    public function __construct(Header $header, Contractee $contractee, AccountBeneficiary $accountBeneficiary, Beneficiary $beneficiary) {

        $this->segments = [
            $header,
            $contractee,
            $accountBeneficiary,
            $beneficiary
        ];
    }
}