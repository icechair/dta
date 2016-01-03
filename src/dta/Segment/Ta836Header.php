<?php

namespace icechair\dta\Segment;


use icechair\dta\Segment;

final class Ta836Header extends Segment{
    private $amount;
    public function __construct(\DateTime $date_created,
                                $bc_contractee,
                                $dta_id,
                                $input_id,
                                $payment_type,
                                Segment\Field\Account $account,
                                Segment\Field\Amount $amount) {
        $this->segment_prefix = "01";
        $this->amount = $amount;
        $this->header = new Segment\Field\Header(
            $date_created,
            $bc_contractee,
            $dta_id,
            $input_id,
            '836',
            $payment_type
        );

        $this->fields = [
            $this->header,
            new Segment\Field\ReferenceId($this->header->referenceNumber()),
            $account,
            $amount,
            new Segment\Field\Reserve(11)
        ];
    }


    public function Amount(){
        return $this->amount->Amount();
    }
}