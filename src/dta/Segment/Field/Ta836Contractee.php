<?php

namespace icechair\dta\Segment\Field;


use icechair\dta\Segment\Field;

final class Ta836Contractee extends Field{

    /**
     * @var string
     * Firstname/Lastname
     */
    private $name;
    /**
     * @var string
     * Street/Streeno
     */
    private $street;
    /**
     * @var string
     * Zip/City
     */
    private $city;
    /**
     * Ta836Contractee constructor.
     * @param string $name
     * @param string $street
     * @param string $city
     */
    public function __construct($name, $street, $city) {
        $this->length = 3 * 35;
        $this->name = iconv("UTF-8", "ASCII//TRANSLIT", $name);
        $this->street = iconv("UTF-8", "ASCII//TRANSLIT",$street);
        $this->city = iconv("UTF-8", "ASCII//TRANSLIT", $city);
    }

    public function StringValue() {
        $line = "";
        if(strlen($this->name) > 35){
            $line .= substr($this->name, 0, 35);
        }else{
            $line .= str_pad($this->name, 35);
        }

        if(strlen($this->street) > 35){
            $line .= substr($this->street, 0, 35);
        }else{
            $line .= str_pad($this->street, 35);
        }

        if(strlen($this->city) > 35){
            $line .= substr($this->city, 0, 35);
        }else{
            $line .= str_pad($this->city, 35);
        }
        return $line;
    }
}