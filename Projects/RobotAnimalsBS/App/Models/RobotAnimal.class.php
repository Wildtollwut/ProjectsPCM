<?php


class RobotAnimal extends Robot
{
    private $specie;
    private $noise;

    public function __construct($name, $specie, $noise, $color = "black", $x = 0, $y = 0)
    {
        parent::__construct($name, $color, $x, $y);
        $this->specie = $specie;
        $this->noise = $noise;
    }

    public function getNoise()
    {
        return $this->noise;

    }

    public function setNoise($noise)
    {
        $this->noise = $noise;

        return $this;
    }

    public function getSpecie()
    {
        return $this->specie;
    }

    public function setSpecie($specie)
    {
        $this->specie = $specie;

        return $this;
    }

    public function ausgabe()
    {
        echo "<span style='color: {$this->getColor()}'>{$this->getName()}</span> the {$this->getSpecie()} does {$this->getNoise()}";
    }

}

