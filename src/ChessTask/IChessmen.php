<?php

namespace App\ChessTask;

interface IChessmen
{
    public function move($x, $y);

    public function getPosition();
}