<?php
use App\Task1\King;
use App\Task1\Queen;

require __DIR__ . '/../../vendor/autoload.php';

$king = new King(4,3);
$king->move(3,2);
$king->move(2,2);
$king->move(1,1);
echo $king->getPosition();

$queen = new Queen(1,1);
$queen->move(7,1);
$queen->move(7,3);
echo $queen->getPosition();