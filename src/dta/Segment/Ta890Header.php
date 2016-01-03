<?php

namespace icechair\dta\Segment;


use icechair\dta\Segment;

final class Ta890Header extends Segment{
    private $amount;
    public function __construct(\DateTime $date_created,
                                $dta_id,
                                $input_id,
                                Segment\Field\TotalAmount $total_amount) {
        $this->segment_prefix = "01";
        $this->amount = $total_amount;
        $this->header = new Segment\Field\Header(
            $date_created,
            "",
            $dta_id,
            $input_id,
            '890',
            0
        );

        $this->fields = [
            $this->header,
            $total_amount,
            new Segment\Field\Reserve(59)
        ];
    }


    public function Amount(){
        return $this->amount->Amount();
    }
}