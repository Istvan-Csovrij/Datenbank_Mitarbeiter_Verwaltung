<?php
class Produkt
{
    public $artikel_id;
    public $artikel_name;
    public $preis;
    public $hersteller;

    // Wir setzen $id standardmäßig auf null
    public function __construct($name, $preis, $hersteller, $id = null)
    {
        $this->artikel_id = $id;
        $this->artikel_name = $name;
        $this->preis = $preis;
        $this->hersteller = $hersteller;
    }
}

class Kunde
{
    public $kunden_id;
    public $vorname;
    public $nachname;
    public $email;
    private $passwort;
    public $agb_bestaetigt;

    // Wir fügen $id am Ende hinzu und setzen den Standardwert auf null
    public function __construct($vorname, $nachname, $email, $passwort, $agb, $id = null)
    {
        $this->kunden_id = $id; // Wenn keine ID mitgegeben wird, bleibt sie leer
        $this->vorname = $vorname;
        $this->nachname = $nachname;
        $this->email = $email;
        $this->passwort = $passwort;
        $this->agb_bestaetigt = $agb;
    }
}
?>