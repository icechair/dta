<?php

namespace icechair\dta\Record;


use icechair\dta\Record;
use icechair\dta\Segment\AccountBeneficiary;
use icechair\dta\Segment\Beneficiary;
use icechair\dta\Segment\Contractee;
use icechair\dta\Segment\Ta836Header;
use icechair\dta\Segment\PaymentReference;

final class Ta836 extends Record{
    private $header;
    public function __construct(Ta836Header $header, Contractee $contractee, AccountBeneficiary $accountBeneficiary, Beneficiary $beneficiary, PaymentReference $paymentReference) {
        $this->header = $header;

        $this->segments = [
            $header,
            $contractee,
            $accountBeneficiary,
            $beneficiary,
            $paymentReference
        ];
    }


    public function Amount() {
        return $this->header->Amount();
    }
}