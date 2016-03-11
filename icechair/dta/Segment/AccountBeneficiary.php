<?php
namespace icechair\dta\Segment;


use icechair\dta\Segment;

final class AccountBeneficiary extends Segment{
    private $local_codes = ['CH','LI'];

    public function __construct(Segment\Field\BIC $bic, Segment\Field\IBAN $iban) {
        $this->segment_prefix = "03";
        if(in_array(substr($iban->stringValue(), 0, 2), $this->local_codes)){
            $bic = new Segment\Field\LocalBIC($bic);
        }
        $this->fields = [
            $bic,
            $iban,
            new Segment\Field\Reserve(21)
        ];
    }
}
