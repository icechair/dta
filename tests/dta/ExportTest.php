<?php

namespace icechair\tests;

class ExportTest extends \PHPUnit_Framework_TestCase {

    public function testLocalIBAN(){


        $dta_id = 'JF001';
        $index = 1;
        $now = new \DateTime('2015-01-01 09:00:00');
        $valuta = new \DateTime('2015-02-01 12:00:00');

        $transactions = [
            [
                'bc_contractee' => '790', //Bankenclearing Nummer Auftraggeber
                'payment_type' => '0', //1 -> Salär- und Rentenzahlung, 0 -> alles andere
                'account' => 'DE74123456789012345678', // iban oder 16stellige Kontonummer, Paddingformat abhängig von der bank
                'valuta' => $valuta, //Datum Zahlungsauftrag,
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
            ],
            [
                'bc_contractee' => '790', //Bankenclearing Nummer Auftraggeber
                'payment_type' => '1', //1 -> Salär- und Rentenzahlung, 0 -> alles andere
                'account' => 'DE74123456789012345678', // iban oder 16stellige Kontonummer, Paddingformat abhängig von der bank
                'valuta' => $valuta, //Datum Zahlungsauftrag,
                'currency' => 'EUR', //ISO Waehrungskuerzel
                'amount' => 200.56, //zu ueberweisende Summe,
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
        $export = new \icechair\dta\Export($dta_id, $transactions, $now);
        $expected = (dirname(__FILE__).'/../data/export-ch-iban.txt');
        $this->assertStringEqualsFile($expected,$export->DtaString());
    }

    public function testForeignIBAN(){


        $dta_id = 'JF001';
        $index = 1;
        $now = new \DateTime('2015-01-01 09:00:00');
        $valuta = new \DateTime('2015-02-01 12:00:00');

        $transactions = [
            [
                'bc_contractee' => '790', //Bankenclearing Nummer Auftraggeber
                'payment_type' => '0', //1 -> Salär- und Rentenzahlung, 0 -> alles andere
                'account' => 'DE74123456789012345678', // iban oder 16stellige Kontonummer, Paddingformat abhängig von der bank
                'valuta' => $valuta, //Datum Zahlungsauftrag,
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
            ],
            [
                'bc_contractee' => '790', //Bankenclearing Nummer Auftraggeber
                'payment_type' => '1', //1 -> Salär- und Rentenzahlung, 0 -> alles andere
                'account' => 'DE74123456789012345678', // iban oder 16stellige Kontonummer, Paddingformat abhängig von der bank
                'valuta' => $valuta, //Datum Zahlungsauftrag,
                'currency' => 'EUR', //ISO Waehrungskuerzel
                'amount' => 200.56, //zu ueberweisende Summe,
                'currency_conversion' => null, //Wechselkurs, falls mit bank Devisenkurse vereinbart wurden
                'name' => 'Johnson Stiftung', //Name Auftraggeber
                'street' => 'Musterstraße 123', //Strasse/nr Auftraggeber
                'city' => 'DE-11223 Musterort', //PLZ/Ort Auftraggeber
                'bic' => 'HELADEXXXXX', //BIC Empfaenger,
                'iban' => 'DE33123456789012345678', //IBAN Empfaenger
                'receiver_name' => 'Michaela Musterfrau', //Name Empfaenger
                'receiver_street' => 'Woauchimmer 51', //Strasse,Nummer Empfaenger,
                'receiver_city' => 'CH-1000 Ortschaft', //PLZ Ort Empfaenger,
                'reference_id' => 'U', //Zahlungsgrund I -> Strukturierte Referenznummer 20stellig fix, U -> freitext
                'reference' => 'weil ichs kann', //Zahlungsgrund
                'expenses' => 0, //Spesenregelung 0 -> alles Auftraggeber, 1 alles Empfaenger, 2, Beide geteilt
            ]
        ];
        $export = new \icechair\dta\Export($dta_id, $transactions, $now);
        $expected = (dirname(__FILE__).'/../data/export-de-iban.txt');
        var_dump($expected);
        $this->assertStringEqualsFile($expected,$export->DtaString());
    }
}
