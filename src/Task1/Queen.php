<?php

namespace App\Task1;

class Queen extends AbstractChessmen
{

    public function move($x, $y)
    {
        if($x < 1 || $x > 8 || $y < 1 || $y > 8) {
            throw new \Exception('the move is impossible, try again');
        }

        $xDifference = abs($x - $this->x);
        $yDifference = abs($y - $this->y);

        if($xDifference === 0 && $yDifference > 1 ) {
            $this->x = $x;
            $this->y = $y;
        } elseif ($xDifference > 1 && $yDifference === 0) {
            $this->x = $x;
            $this->y = $y;
        } elseif (($xDifference > 1 && $yDifference > 1) && ($xDifference === $yDifference)) {
            $this->x = $x;
            $this->y = $y;
        } else {
            throw new \Exception('The Queen can\'t move like that');
        }


    }

}