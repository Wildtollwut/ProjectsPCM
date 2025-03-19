<?php

class Adresse {
    private string $ort ="";
    private string $plz = "";
    private string $strasse = "";
    private string $nr = "";


    

    /**
     * Get the value of ort
     */ 
    public function getOrt()
    {
        return $this->ort;
    }

    /**
     * Set the value of ort
     *
     * @return  self
     */ 
    public function setOrt($ort)
    {
        $this->ort = $ort;

        return $this;
    }

    /**
     * Get the value of plz
     */ 
    public function getPlz()
    {
        return $this->plz;
    }

    /**
     * Set the value of plz
     *
     * @return  self
     */ 
    public function setPlz($plz)
    {
        $this->plz = $plz;

        return $this;
    }

    /**
     * Get the value of strasse
     */ 
    public function getStrasse()
    {
        return $this->strasse;
    }

    /**
     * Set the value of strasse
     *
     * @return  self
     */ 
    public function setStrasse($strasse)
    {
        $this->strasse = $strasse;

        return $this;
    }

    /**
     * Get the value of nr
     */ 
    public function getNr()
    {
        return $this->nr;
    }

    /**
     * Set the value of nr
     *
     * @return  self
     */ 
    public function setNr($nr)
    {
        $this->nr = $nr;

        return $this;
    }
}
?>