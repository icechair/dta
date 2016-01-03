<?php

namespace icechair\dta\Segment;


use icechair\dta\Segment;

final class Header extends Segment{

    public function __construct(Segment\Field\Header $header, Segment\Field\Account $account, Segment\Field\Amount $amount) {
        $this->segment_prefix = "01";
        $this->fields = [
            $header,
            new Segment\Field\ReferenceId($header->referenceNumber()),
            $account,
            $amount,
            new Segment\Field\Reserve(11)
        ];
    }
}