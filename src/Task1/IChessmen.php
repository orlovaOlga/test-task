<?php

namespace App\Task1;

interface IChessmen
{
    public function move($x, $y);

    public function getPosition();
}