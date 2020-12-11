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
<form action="action_ajax_form.php" method="get" id="ajax_form">
    <fieldset>
        <h2 align="center">Банкомат</h2>
        <p align="center">Номинал в наличии <br><label>
        <p align="center">
            <input type="text" name="banknotes" size="40" value="5, 10, 20, 50, 100, 200, 500" readonly>
            </label></p>
        <p align="center">Ваша сумма <br><label>
                <input type="text" name="summ" size="40">
            </label></p>
        <p align="right"><input type="submit"></p>
    </fieldset>
</form>

<br>

<div id="result_form">
    <table frame="border" bgcolor="#FFE7AE" width="60" bordercolor="black" border="1">
        <caption align="left">Ответ:</caption>
        <tr>
            <th>Номинал</th>
            <th>Количество</th>
        </tr>
        <?php foreach (json_decode($banknotes) as $banknote):?>
            <tr><td><?php echo $banknote ?></td><td><?php echo $banknotsQuantity[$banknote] ?></td></tr>
        <?php endforeach;?>
    </table>
</div>

</body>
</html>