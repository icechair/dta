<?php

namespace icechair\dta\Record;


use icechair\dta\Record;
use icechair\dta\Segment\Ta890Header;

final class Ta890 extends Record{

    public function __construct(Ta890Header $header) {
        $this->header = $header;
        $this->segments = [
            $header
        ];
    }

    public function Amount() {
        return $this->header->Amount();
    }
}