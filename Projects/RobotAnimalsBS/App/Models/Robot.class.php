<?php

class Robot
{
    private $color = "";
    private $name = "";
    private $x_coordinate = 0;
    private $y_coordinate = 0;

    function __construct($name, $x_coordinate, $y_coordinate, $color)
    {
        $this->color = $color;
        $this->name = $name;
        $this->x_coordinate = $x_coordinate;
        $this->y_coordinate = $y_coordinate;

    }

    function moveX()
    {
        $this->x_coordinate = $this->x_coordinate + 1;
    }

    function moveY()
    {
        $this->y_coordinate = $this->y_coordinate + 1;
    }

    function getX()
    {
        return $this->x_coordinate;
    }

    function getY()
    {
        return $this->y_coordinate;
    }

    function getColor()
    {
        return $this->color;
    }

    function getName()
    {
        return $this->name;
    }

    function setX($x_coordinate)
    {
        if ($x_coordinate) {
            $this->x_coordinate = $x_coordinate;
        } else {
            $this->x_coordinate = 0;
        }

        // $this->x = $x ?: 0;
    }

    function setY($y_coordinate)
    {
        if ($y_coordinate) {
            $this->y_coordinate = $y_coordinate;
        } else {
            $this->y_coordinate = 0;
        }

        // $this->y = $y ?: 0;
    }

    function setColor($color)
    {
        $this->color = $color;
    }

    function setName($name)
    {
        $this->name = $name;
    }
}








