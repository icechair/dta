<?php

namespace icechair\dta\Segment;


abstract class Field {
    /**
     * @var int
     * field length
     */
    protected $length;
    /**
     * @var mixed
     */
    protected $value;
    /**
     * @var bool
     */
    protected $is_optional = false;
    /**
     * @return string
     */
    abstract public function StringValue();

    final public function toString(){
        if(!$this->is_optional){
            if(($this->StringValue() === '')){
                throw new \Exception(sprintf("%s is mandatory", get_class($this)));
            }
        }
        var_dump(get_class($this));

        $out = str_pad($this->StringValue(),$this->length);
        var_dump($out);
        return $out;
    }
}