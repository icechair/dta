# dta
dta file exporter

```PHP
$transactions =[ 
    [
        'bc_contractee' => '790', //Bankenclearing Nummer Auftraggeber
        'payment_type' => '0', //1 -> Salär- und Rentenzahlung, 0 -> alles andere
        'account' => 'DE74123456789012345678', // iban oder 16stellige Kontonummer, Paddingformat abhängig von der bank
        'valuta' => new DateTime(), //Datum Zahlungsauftrag,
        'currency' => 'EUR', //ISO Waehrungskuerzel
        'amount' => 100.56, //zu ueberweisende Summe,
        'currency_conversion' => null, //Wechselkurs, falls mit bank Devisenkurse vereinbart wurden
        'name' => 'Johnson Stiftung', //Name Auftraggeber
        'street' => 'Musterstraße 123', //Strasse/nr Auftraggeber
        'city' => 'DE-11223 Musterort', //PLZ/Ort Auftraggeber
        'bic' => 'HELADEXXXXX', //BIC Empfaenger,
        'iban' => 'CH33123456789012345678', //IBAN Empfaenger
        'receiver_name' => 'Michaela Musterfrau', //Name Empfaenger
        'receiver_street' => 'Woauchimmer 51', //Strasse,Nummer Empfaenger,
        'receiver_city' => 'CH-1000 Ortschaft', //PLZ Ort Empfaenger,
        'reference_id' => 'U', //Zahlungsgrund I -> Strukturierte Referenznummer 20stellig fix, U -> freitext
        'reference' => 'weil ichs kann', //Zahlungsgrund
        'expenses' => 0, //Spesenregelung 0 -> alles Auftraggeber, 1 alles Empfaenger, 2, Beide geteilt
    ]
];
$dta_id = 'JF001'; //5-stellige Identifikationsnummer, vom auftraggeber gewaehlt
$created = new DateTime();
$export = new \icechair\dta\Export($dta_id, $transactions, $created);

$dta_string = $export->DtaString();
```

Ausgabe:
```
01000000            00000160104790    JF0010000183600JF00100000000001DE74123456789012345678  160104EUR100,56                    
02            Johnson Stiftung                   Musterstrasse 123                  DE-11223 Musterort                          
03AHELADEXXXXX                                                           CH33123456789012345678                                 
04Michaela Musterfrau                Woauchimmer 51                     CH-1000 Ortschaft                                       
05Uweil ichs kann                                                                                           0                   
01000000            00000160104       JF0010000289000100,560                                                                    
```