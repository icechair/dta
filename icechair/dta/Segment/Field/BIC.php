<?php
namespace icechair\dta\Segment\Field;

use icechair\dta\Segment\Field;

final class BIC extends Field{

    /**
     * @var string
     */
    private $bic;
    public function __construct($bic) {
        $this->length = 2 * 35;
        $this->bic = $bic;
    }

    public function StringValue() {
        $line = "A";
        $line .= str_pad($this->bic, 35);
        $line .= str_pad("",35);
        return $line;
    }
}