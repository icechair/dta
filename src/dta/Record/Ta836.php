<?php

namespace icechair\dta\Record;


use icechair\dta\Record;
use icechair\dta\Segment\Header;

final class Ta836 extends Record{
    public function __construct(Header $header) {

        $this->segments = [
            $header,
        ];
    }
}