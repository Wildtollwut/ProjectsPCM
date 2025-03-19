<?php


class Kunde{
    public string $vname = "";
    public string $nname = "";
    public int $alter = 0;
    public string $geschlecht = "";
    public string $adresse = "";

    public function __construct(string $vname, string $nname, int $alter, string $geschlecht, string $adresse){
        $this->setVname($vname);
        $this->setNachname($nname);
        $this->setAlter($alter);
        $this->setGeschlecht($geschlecht);
        $this->setAdresse($adresse);
    }
    

    public function setVname(string $vname){
        $this->vname = $vname;
    }

    public function getVname(): string{
        return $this->vname;
    }

    public function setNachname(string $nname){
        $this->nname = $nname;
    }

    public function getNachname(): string{
        return $this->nname;
    }

    public function setAlter(int $alter){
        $this->alter = $alter;
    }

    


    /**
     * Set the value of alter
     *
     * @return  self
     */ 
    public function setAlter($alter)
    {
        $this->alter = $alter;

        return $this;
    }
}

?>