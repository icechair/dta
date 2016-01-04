<?php
$__libpath = dirname(__FILE__).'/dta/';
$files = glob($__libpath.'*.php');
$files = array_merge($files, glob($__libpath.'Record/*.php'));
$files = array_merge($files, glob($__libpath.'Segment/*.php'));
$files = array_merge($files, glob($__libpath.'Segment/Field/*.php'));

foreach($files as $file){
    require_once $file;
}