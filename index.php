<?php
require_once "vendor/autoload.php";


$record = new \icechair\dta\Record\Ta836(
    new \icechair\dta\Segment\Header(
        new \icechair\dta\Segment\Field\Header(
            new DateTime(),
            '790',
            'JF001',
            1,
            836,
            0
        ),
        new \icechair\dta\Segment\Field\Account(
            'DE74120300001031277872'
        ),
        new \icechair\dta\Segment\Field\Amount(
            new DateTime(),
            'EUR',
            400.83
        )
    )
);

echo $record->toString();
