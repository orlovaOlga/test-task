<?php
use App\ChessTask\King;
use App\ChessTask\Queen;

$king = new King(4,3);
$king->move(3,2);
$king->move(2,2);
$king->move(1,1);

$queen = new Queen(1,1);
$queen->move(7,1);
$queen->move(7,3);
echo $queen->getPosition();