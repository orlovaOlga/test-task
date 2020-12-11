<?php

namespace App\ChessTask;

class King extends AbstractChessmen
{
    public function move($x, $y)
    {
        if($x < 1 || $x > 8 || $y < 1 || $y > 8) {
            throw new \Exception('the move is impossible, try again');
        }

        $xDifference = abs($x - $this->x);
        $yDifference = abs($y - $this->y);

        if (($xDifference === 0 || $xDifference === 1) && ($yDifference === 1 || $yDifference === 0)) {
            $this->x = $x;
            $this->y = $y;
        } else {
            throw new \Exception('The King can\'t move like that');
        }
    }
}