<?php

namespace icechair\dta\Segment\Field;
use icechair\dta\Segment\Field;

final class Header extends Field{
    // nur IBAN Zahlungen
    const ALLOWED_TRANSACTIONS = [
        836,837,890
    ];
    /**
     * @var \DateTime|null $date_process;
     * laenge: 6n
     *
     * Dieses Feld muss bei TA 826 und TA 827 mit dem gewünschten Verarbeitungsdatum aufgefüllt werden:
     *  - max. 60 Kalendertage in der Zukunft ab Einlieferdatum
     *  - max. 10 Kalendertage in der Vergangenheit ab Einlieferdatum
     * Für übrige Transaktionsarten sind Nullen einzusetzen, weil das Datum 'Valuta' im Feld 32A enthalten ist
     */
    protected $date_process = null;
    /**
     * @var string $bc_beneficiary
     * Bankenclearing Nummer der Bank des begünstigten
     * laenge: 12x
     *
     * TA 827 Bankzahlungen:
     *   Bei TA 827 muss für Zahlungen an Clearingbanken dieses Feld die Bankenclearing Nummer der Bank des
     *   Begünstigten enthalten.
     * BC-Nummer (Format):
     *   Manuelle Erfassung:
     *     Die BC-Nr. ist linksbündig, ohne Interpunktion darzustellen. Rest des Feldes enthält Blanks.
     *   Optische Lesung:
     *     Bei einer optischen Beleglesung hat dieses Feld folgendes Format:
     *     Pos. 1 und 2   = 07
     *     Pos. 3 bis 7   = BC-Nr.
     *     Pos. 8         = Prüfziffer der BC-Nr.
     *     Pos. 9         = Prüfziffer gesamtes Feld
     *     Pos. 10 bis 12 = Blanks
     * TA 827 Postzahlungen:
     *   Bei Zahlungen zugunsten eines Postkontos oder für Postmandate (ebenfalls TA 827) muss dieses Feld Blanks
     *   enthalten.
     * Übrige Transaktionsarten:
     *   Bei allen übrigen Transaktionsarten (TA 826, 830, 832, 836, 837, 890) muss dieses Feld Blanks enthalten
     */
    protected $bc_beneficiary;

    /**
     * @var string $ouput_id
     * Ausgabesequenznummer
     * laenge: 5n
     *
     * Wird für die Verarbeitung innerhalb der Banken benötigt und ist vom Absender mit Nullen aufzufüllen
     */
    protected $output_id = '00000';

    /**
     * @var \DateTime $date_created
     * Erstellungsdatum der DTA datei
     * laenge: 6n
     *
     * Datum der Erstellung des Datenfiles. Es muss bei allen Records des DTA-Files gleich lauten.
     * - Darf max. 90 Kalendertage vom Einlieferdatum abweichen
     */
    protected $date_created;
    /**
     * @var string $bc_contractee
     * Bankenclearing Nummer
     * laenge: 7x
     *
     * Bankenclearing-Nummer der Bank des Auftraggebers (linksbündig,Rest des Feldes mit Blanks aufgefüllt).
     * Bei TA 890 (Totalrecord) muss dieses Feld mit Blanks aufgefüllt werden. Die BC-Nr. ist ohne Interpunktion
     * darzustellen.
     */
    protected $bc_contractee = '790';

    /**
     * @var string $dta_id
     * laenge: 5x
     *
     * Zur Identifizierung des Datenfile-Absenders muss die Identifikation aufgeführt werden. Es muss bei allen Records
     * die gleiche Identifikation eingesetzt werden.
     */
    protected $dta_id = 'JF001';

    /**
     * @var int $input_id
     * laenge: 5n
     *
     * Alle Records müssen pro Datenfile mit 00001 beginnen und fortlaufend nummeriert werden.
     */
    protected $input_id = 1;

    /**
     * @var int $transaction_id
     *
     * Transaktionsart des Records
     */
    protected $transaction_id = 836;

    /**
     * @var int $payment_type
     *
     * Bei Salär- und Rentenzahlungen TA 827, 836 und 837 mit Code 1 kennzeichnen. Für übrige Zahlungen Code 0
     * einsetzen.
     */
    protected $payment_type = 0;

    /**
     * @var int $edit_flag
     *
     * Wird für die Verarbeitung innerhalb der Banken benötigt und ist vom Absender mit Null aufzufüllen.
     */
    protected $edit_flag = 0;

    /**
     * Header constructor.
     * @param \DateTime|null $date_process
     * @param string $bc_beneficiary
     * @param \DateTime $date_created
     * @param string $bc_contractee
     * @param string $dta_id
     * @param int $input_id
     * @param int $transaction_id
     * @param int $payment_type
     */
    public function __construct(\DateTime $date_created, $bc_contractee, $dta_id, $input_id, $transaction_id, $payment_type) {
        $this->length = 51;
        $this->date_process = null;
        $this->bc_beneficiary = "";
        $this->output_id = "00000";
        $this->date_created = $date_created;
        $this->bc_contractee = $bc_contractee;
        if(strlen($dta_id) != 5){
            throw new \InvalidArgumentException("dta_id must be of length 5");
        }
        $this->dta_id = $dta_id;
        $this->input_id = $input_id;
        if(!in_array($transaction_id, Header::ALLOWED_TRANSACTIONS)) {
            throw new \InvalidArgumentException("invalid transaction_id");
        }
        $this->transaction_id = $transaction_id;
        $this->payment_type = $payment_type;
        $this->edit_flag = 0;
    }

    final public function StringValue() {
        $output = "";
        if(in_array($this->transaction_id, [826,827])){
            if($this->date_process === null){
                throw new \Exception(sprintf("empty date_process for transaction_id %d not allowed",$this->transaction_id));
            }
            $output .= $this->date_process->format("ymd");
        }else{
            $output .= "000000";
        }

        if(strlen($this->bc_beneficiary) > 12){
            throw new \Exception("bc_beneficiary max length is 12");
        }
        $output .= str_pad($this->bc_beneficiary,12);

        $output .= $this->output_id;
        $output .= $this->date_created->format("ymd");

        if(strlen($this->bc_contractee) > 7){
            throw new \Exception("bc_contractee max length is 7");
        }
        $output .= str_pad($this->bc_contractee,7);

        $output .= $this->dta_id;

        $output .= str_pad($this->input_id, 5, '0', STR_PAD_LEFT);
        $output .= $this->transaction_id;
        $output .= $this->payment_type;
        $output .= $this->edit_flag;
        return $output;
    }

    /**
     * @return int
     */
    public function TransactionId(){
        return $this->transaction_id;
    }

    public function referenceNumber(){
        return $this->dta_id . str_pad($this->input_id, 11,'0', STR_PAD_LEFT);
    }
}