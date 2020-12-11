<?php

if (isset($_POST['summ'])) {

    $banknotes = [5, 10, 20, 50, 100, 200, 500];
    $summ = $_POST['summ'];

    $banknotesQuantity = getMoney($banknotes, $summ);
    echo json_encode($banknotesQuantity);
}


function getMoney($banknotes, $summ) {
    $withoutLastChar = substr($summ, 0,strlen($summ) - 1);
    if($summ % 5 !== 0) {
        echo json_encode(["status" => "error", "message" => "Неверная сумма. Введите {$withoutLastChar}0 или {$withoutLastChar}5"]);
        die;
    }

    $banknoteQuantity = [5 => 0, 10 => 0, 20 => 0, 50 => 0, 100 => 0, 200 => 0, 500 => 0];

    while ($summ > 0) {
        $i = count($banknotes) - 1;
        while ( $i >= 0) {
            if ($summ >= $banknotes[$i]) {
                $quantity = $summ / $banknotes[$i];

                if(gettype($quantity) !== 'integer') {
                    $quantity = explode('.', $quantity)[0];
                }
                $summ = $summ - $banknotes[$i] * $quantity;
                $banknoteQuantity[$banknotes[$i]] =+ $quantity;
            }
            $i--;
        }
    }
    return [
        'status' => 'success',
        'data' => $banknoteQuantity
    ];
}



