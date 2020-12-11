/* Article FructCode.com */
$(document).ready(function () {
    $("#btn").click(
        function () {

            //if ($('#typedAmount').value === '') {
            //    console.log('asdfasdf');
            //    return false;
            //}

            sendAjaxForm('result_form', 'ajax_form', 'calculate.php');
            return false;
        }
    );
});

function sendAjaxForm(result_form, ajax_form, url) {
    $.ajax({
        url: 'calculate.php', //url страницы (calculate.php)
        type: "POST", //метод отправки
        dataType: "html", //формат данных
        data: $("#" + ajax_form).serialize(),  // Сеарилизуем объект
        success: function (response) { //Данные отправлены успешно
            result = $.parseJSON(response);

            if(result.status === 'error'){
                $('#error_message').text(result.message);
                $('#error_message').show();
                $('#calculated_results').hide();

            } else {
                Object.entries(result.data).forEach(function(value) {
                    $('#nominal_'+value[0]).text(value[1]);
                });
                $('#error_message').hide();
                $('#calculated_results').show();
            }

            $('#result_form').html;
        },
        error: function (response) { // Данные не отправлены
            $('#error_place').text('Ошибка. Данные не отправлены.');
        }
    });
}