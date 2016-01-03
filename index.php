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
    ),
    new \icechair\dta\Segment\Contractee(
        new \icechair\dta\Segment\Field\Conversion(1.443),
        new \icechair\dta\Segment\Field\Ta836Contractee(
            "Martin Gäbel",
            "Westerwaldstraße 57",
            "65549 Limburg an der Lahn"
        )
    ),
    new \icechair\dta\Segment\AccountBeneficiary(
        new \icechair\dta\Segment\Field\BIC("BYLADEM1001"),
        new \icechair\dta\Segment\Field\IBAN("DE74120300001031277872")
    )
);

echo $record->toString();
