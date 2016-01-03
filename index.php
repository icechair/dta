<?php
require_once "vendor/autoload.php";

$dta_id = 'JF001';
$index = 1;
$now = new DateTime();
$record = new \icechair\dta\Record\Ta836(
    new \icechair\dta\Segment\Ta836Header(
        $now,
        '790',
        $dta_id,
        $index,
        0,
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
        new \icechair\dta\Segment\Field\Ta836Address(
            "Martin Gäbel",
            "Westerwaldstraße 57",
            "65549 Limburg an der Lahn"
        )
    ),
    new \icechair\dta\Segment\AccountBeneficiary(
        new \icechair\dta\Segment\Field\BIC("BYLADEM1001"),
        new \icechair\dta\Segment\Field\IBAN("DE74120300001031277872")
    ),
    new \icechair\dta\Segment\Beneficiary(
        new \icechair\dta\Segment\Field\Ta836Address(
            "Dusti Jeuckü",
            "MusterStraße 123",
            "35794 Waldernbach"
        )
    ),
    new \icechair\dta\Segment\PaymentReference(
        new \icechair\dta\Segment\Field\PaymentReference(
            "U",
            "FreitextFeld"
        ),
        new \icechair\dta\Segment\Field\Expenses(0)
    )
);
++$index;

$total = new \icechair\dta\Record\Ta890(
    new \icechair\dta\Segment\Ta890Header(
        $now,
        $dta_id,
        $index,
        new \icechair\dta\Segment\Field\TotalAmount($record->Amount())
    )
);

echo $record->toString();
echo $total->toString();