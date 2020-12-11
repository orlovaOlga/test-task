<?php

include __DIR__ . "/index.php";

if (isset($_GET['summ'])) {

    // Формируем массив для JSON ответа
    $banknotes = [5, 10, 20, 50, 100, 200, 500];
    $summ = $_GET['summ'];

    function getMoney($banknotes, $summ) {
        $withoutLastChar = substr($summ, 0,strlen($summ) - 1);
        if($summ % 5 !== 0) {
            throw new \Exception("Invalid amount. Chose {$withoutLastChar}0 or {$withoutLastChar}5");
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
        return $banknoteQuantity;
    }

    try{
        (getMoney($banknotes, $summ));
    } catch (Exception $e) {
        $message = $e->getMessage();
        include __DIR__ . "/error.html";
    }
    $banknotsQuantity = getMoney($banknotes, $summ);
    echo json_encode($banknotsQuantity);
}


    //
    // Переводим массив в JSON
    //

