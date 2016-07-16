<?php

namespace icechair\dta\Segment\Field;


use icechair\dta\Segment\Field;

final class Ta836BeneficiaryAddress extends Field{

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
        $this->length = 3 * 24;
        $this->name = iconv("UTF-8", "ASCII//TRANSLIT", $name);
        $this->street = iconv("UTF-8", "ASCII//TRANSLIT",$street);
        $this->city = iconv("UTF-8", "ASCII//TRANSLIT", $city);
    }

    public function StringValue() {
        $line = "";
        if(strlen($this->name) > 24){
            $line .= substr($this->name, 0, 24);
            throw new \LengthException(
                sprintf(
                    "receiver_name length > 24",
                    get_class($this)
                )
            );
        }else{
            $line .= str_pad($this->name, 24);
        }

        if(strlen($this->street) > 24){
            $line .= substr($this->street, 0, 24);
            throw new \LengthException(
                sprintf(
                    "receiver_street length > 24",
                    get_class($this)
                )
            );
        }else{
            $line .= str_pad($this->street, 24);
        }

        if(strlen($this->city) > 24){
            $line .= substr($this->city, 0, 24);
            throw new \LengthException(
                sprintf(
                    "receiver_city length > 24",
                    get_class($this)
                )
            );
        }else{
            $line .= str_pad($this->city, 24);
        }
        return $line;
    }
}
