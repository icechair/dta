<?php
namespace icechair\dta\Segment\Field;

use icechair\dta\Segment\Field;

final class LocalBIC extends Field{

    /**
     * @var string
     */
    private $bic;
    public function __construct(BIC $bic) {
    }

    public function StringValue() {
        $line = "D";
        $line .= str_pad("", 35);
        $line .= str_pad("",35);
        return $line;
    }
}
