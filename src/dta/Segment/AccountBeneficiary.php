<?php
namespace icechair\dta\Segment;


use icechair\dta\Segment;

final class AccountBeneficiary extends Segment{


    public function __construct(Segment\Field\BIC $bic, Segment\Field\IBAN $iban) {
        $this->segment_prefix = "03";
        $this->fields = [
            $bic,
            $iban,
            new Segment\Field\Reserve(21)
        ];
    }
}