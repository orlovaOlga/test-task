<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <title>Article FRUCTCODE.COM. How to send html-form with Ajax.</title>
    <meta name="description" content="Article FRUCTCODE.COM. How to send ajax form.">
    <meta name="author" content="fructcode.com">

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script src="ajax.js"></script>

</head>

<body>
<form action="calculate.php" id="ajax_form">
    <fieldset>
        <h2 align="center">Банкомат</h2>
        <p align="center">Номинал в наличии <br><label>
        <p align="center">
            <input type="text" name="banknotes" size="40" placeholder="5, 10, 20, 50, 100, 200, 500" disabled>
            </label></p>
        <p align="center">Ваша сумма <br><label>
                <input id="typedAmount" type="text" name="summ" size="40">
            </label></p>
        <p align="center"><button id="btn">Отправить</button></p>
    </fieldset>
</form>

<br>

<div align="center">
    <div id="response">
        Ответ:
        <div id="error_message"></div>
        <div id="calculated_results" hidden>
            <table frame="border" bgcolor="#FFE7AE" width="60" bordercolor="black" border="1">
                <tr>
                    <th>Номинал</th>
                    <th>Количество</th>
                </tr>
                <tr>
                    <td>5</td><td id="nominal_5">0</td>
                </tr>
                <tr>
                    <td>10</td><td id="nominal_10">0</td>
                </tr>
                <tr>
                    <td>20</td><td id="nominal_20">0</td>
                </tr>
                <tr>
                    <td>50</td><td id="nominal_50">0</td>
                </tr>
                <tr>
                    <td>100</td><td id="nominal_100">0</td>
                </tr>
                <tr>
                    <td>200</td><td id="nominal_200">0</td>
                </tr>
                <tr>
                    <td>500</td><td id="nominal_500">0</td>
                </tr>
            </table>
        </div>
    </div>
</div>

<div id="result_form">

</div>

</body>
</html>