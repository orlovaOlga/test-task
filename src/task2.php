<?php
$colors = ['red', 'blue', 'green', 'yellow', 'lime', 'magenta', 'black', 'gold', 'gray', 'tomato'];

function getColor($colors)
{
    $chosen = [];
    $word = $colors[rand(0, 9)];
    $color = $colors[rand(0, 9)];

    if ($word === $color) {
        return getColor($colors);
    }

    $chosen['word'] = $word;
    $chosen['color'] = $color;

    return $chosen;
}

function printStrupTest($colors, $rowCount = 5, $itemsInRowCount = 5)
{
    for ($i = 0; $i < $rowCount; $i++) {
        for($j = 0; $j < $itemsInRowCount; $j++ ){
            $chosen = getColor($colors);
            echo "<span style=\"color: {$chosen['color']}\">{$chosen['word']}</span> ";
        }
        echo '<br>';
    }
}

printStrupTest($colors);
