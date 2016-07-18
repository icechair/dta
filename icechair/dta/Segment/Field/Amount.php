<?php

namespace icechair\dta\Segment\Field;


use icechair\dta\Segment\Field;

final class Amount extends Field{

    /**
     * @var \DateTime $valuta
     */
    private $valuta;
    /**
     * @var string currency
     * ISO Currency code
     */
    private $currency;
    /**
     * @var float $amount
     */
    private $amount;

    public function __construct(\DateTime $valuta, $currency, $amount) {
        $this->length = 24;
        $this->valuta = $valuta;
        if(strlen($currency) != 3){
            throw new \InvalidArgumentException("currency code invalid");
        }
        $this->currency = $currency;
        $this->amount = $amount;
    }

    public function StringValue() {
        $string = $this->valuta->format("ymd")
            . $this->currency
            . number_format($this->amount,2, ',','');
        if(strlen($string) > $this->length) {
            throw new \LengthException(
                sprintf(
                    '%s: valuta +currency + amount length > %d',
                    get_class($this),
                    $this->length
                )
            );
        }
        return $string;
    }

    public function Amount(){
        return $this->amount;
    }
}
