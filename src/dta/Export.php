<?php

namespace icechair\dta;


use icechair\dta\Record\Ta836;
use icechair\dta\Record\Ta890;
use icechair\dta\Segment\AccountBeneficiary;
use icechair\dta\Segment\Beneficiary;
use icechair\dta\Segment\Contractee;
use icechair\dta\Segment\Field\Account;
use icechair\dta\Segment\Field\Amount;
use icechair\dta\Segment\Field\BIC;
use icechair\dta\Segment\Field\Conversion;
use icechair\dta\Segment\Field\Expenses;
use icechair\dta\Segment\Field\IBAN;
use icechair\dta\Segment\Field\Ta836Address;
use icechair\dta\Segment\Field\TotalAmount;
use icechair\dta\Segment\PaymentReference;
use icechair\dta\Segment\Ta836Header;
use icechair\dta\Segment\Ta890Header;

final class Export {
    private $dta_id;
    private $transactions;
    private $created;
    /**
     * @var Record[]
     */
    private $records;
    private $total_amount;
    public function __construct($dta_id, $transactions, $created = null){
        $this->dta_id = $dta_id;
        $this->transactions = $transactions;
        $this->created = $created;
        if($this->created === null) {
            $this->created = new \DateTime();
        }
    }

    private function generateRecords(){
        $this->records = [];
        $this->total_amount = 0;
        foreach($this->transactions as $transaction){
            $record = new Ta836(
                new Ta836Header(
                    $this->created,
                    $transaction['bc_contractee'],
                    $this->dta_id,
                    count($this->records)+1,
                    $transaction['payment_type'],
                    new Account($transaction['account']),
                    new Amount($transaction['valuta'], $transaction['currency'], $transaction['amount'])
                ),
                new Contractee(
                    new Conversion($transaction['currency_conversion']),
                    new Ta836Address(
                        $transaction['name'],
                        $transaction['street'],
                        $transaction['city']
                    )
                ),
                new AccountBeneficiary(
                    new BIC($transaction['bic']),
                    new IBAN($transaction['iban'])
                ),
                new Beneficiary(
                    new Ta836Address(
                        $transaction['receiver_name'],
                        $transaction['receiver_street'],
                        $transaction['receiver_city']
                    )
                ),
                new PaymentReference(
                    new \icechair\dta\Segment\Field\PaymentReference(
                        $transaction['reference_id'],
                        $transaction['reference']
                    ),
                    new Expenses($transaction['expenses'])
                )
            );
            $this->records[] = $record;
            $this->total_amount += $transaction['amount'];
        }
    }

    public function DtaString(){
        $dta = "";
        $this->generateRecords();
        $this->records[] = new Ta890(
            new Ta890Header(
                $this->created,
                $this->dta_id,
                count($this->records)+1,
                new TotalAmount($this->total_amount)
            )
        );

        foreach($this->records as $record){
            $dta .= $record->toString();
        }
        return $dta;
    }
}