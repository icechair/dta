<?php

namespace icechair\dta;


interface DtaString {
    /**
     * @return string
     * creates the required data as string
     */
    public function toDtaString();
}