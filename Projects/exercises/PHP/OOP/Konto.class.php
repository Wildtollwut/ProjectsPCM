<?php  
class Konto{

    private string $kontoart = "";
    private float $kontostand = 0;

    public function __construct(float $kontostand, string $kontoart){
        $this->kontostand = $kontostand;
        $this->setkontoart($kontoart);
        echo "Object wird erzeugt";
    }

    public function __destruct(){
        echo "Object wird beseitigt";
    }

    public function einzahlen(float $betrag){
        $this->kontostand += $betrag;
    }

    public function auszahlen(float $betrag){
        $this->kontostand -= $betrag;
    }

    public function getKontostand():float{
        return $this->kontostand;
    }

    public function getKontoart():string{
        return $this->kontoart;
    }

    public function setKontoart(string $kontoart){
        $this->kontoart = $kontoart;
    }
    
}

?>