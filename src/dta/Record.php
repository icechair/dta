<?php
namespace icechair\dta;


abstract class Record {

    /**
     * @var Segment[] $segments
     */
    protected $segments;

    /**
     * @return string
     * @throws \Exception
     */
    public function toString(){
        $output = "";
        foreach($this->segments as $segment){
            $output .= $segment->toString();
        }

        return $output;
    }
}