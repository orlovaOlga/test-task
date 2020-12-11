<?php

namespace App\Task1;

abstract class AbstractChessmen implements IChessmen
{
    protected $x;
    protected $y;

    public function __construct($x, $y)
    {
        $this->x = $x;
        $this->y = $y;

    }

    public function getPosition()
    {
        return "x = {$this->x} y = {$this->y}";
    }

}