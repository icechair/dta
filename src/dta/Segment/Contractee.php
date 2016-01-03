<?php
namespace icechair\dta\Segment;


use icechair\dta\Segment;

Final class Contractee extends Segment{

    public function __construct(Segment\Field\Conversion $conversion, Segment\Field\Ta836Address $contractee) {
        $this->segment_prefix = '02';
        $this->fields = [
            $conversion,
            $contractee,
            new Segment\Field\Reserve(9)
        ];
    }
}