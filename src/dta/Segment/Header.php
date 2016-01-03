<?php

namespace icechair\dta\Segment;


use icechair\dta\Segment;

final class Header extends Segment{
    private $amount;
    public function __construct(Segment\Field\Header $header, Segment\Field\Account $account, Segment\Field\Amount $amount) {
        $this->segment_prefix = "01";
        $this->amount = $amount;
        $this->fields = [
            $header,
            new Segment\Field\ReferenceId($header->referenceNumber()),
            $account,
            $amount,
            new Segment\Field\Reserve(11)
        ];
    }


    public function Amount(){
        return $this->amount->Amount();
    }
}