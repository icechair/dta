<?php

namespace icechair\dta;


use icechair\dta\Segment\Field;

abstract class Segment{
    /**
     * @var string $segment_prefix
     * segment prefix
     */
    protected $segment_prefix;
    /**
     * @var Field[] $fields
     */
    protected $fields;

    /**
     * @return string
     * @throws \Exception
     */
    public final function toString(){
        $output = $this->segment_prefix;
        foreach($this->fields as $field){
            $output .= $field->toString();
        }
        //var_dump($output);
        if(strlen($output) !== 128){
            throw new \LengthException(
                sprintf(
                    "%s segment length is not 128, actual(%s)",
                    get_class($this),
                    strlen($output)
                )
            );
        }
        return $output . "\r\n";
    }
}
