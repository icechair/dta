<?php

namespace icechair\dta\Segment\Field;


use icechair\dta\Segment\Field;

final class PaymentReference extends Field{

    private $id;
    private $reference;

    public function __construct($id, $reference){
        $this->length = 1 + (3 * 35);
        if(!in_array($id, ['I','U'])){
            throw new \InvalidArgumentException("id either 'I' or 'U'");
        }
        $this->id = $id;
        if($id == 'I' && strlen($reference) !== 20){
            throw new \Exception("reference is not structured");
        }

        $this->reference = $reference;
    }

    public function StringValue() {
        return $this->id . $this->reference;
    }

}